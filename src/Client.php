<?php

namespace Petslane\Bondora;

class Client {

    const METHOD_POST = 'post';
    const METHOD_GET = 'get';

    private $error_code;
    private $error_message;

    private $curl_info;

    private $http_header;
    private $http_body;

    public function __construct($url, $params, $method, $headers=array()) {
        if (!$url) {
            throw new \InvalidArgumentException('URL missing');
        }

        if (!in_array($method, array(self::METHOD_GET, self::METHOD_POST))) {
            throw new \InvalidArgumentException('Invalid method type');
        }

        $curl = curl_init();
        $options = array(
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'petslane-php-bondora-api',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_VERBOSE => false,
            CURLOPT_ENCODING => 'gzip, deflate',
        );
        if ($method == self::METHOD_POST) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $params;
        } else if ($params) {
            if (parse_url($url, PHP_URL_QUERY)) {
                $options[CURLOPT_URL] .= '&';
            } else {
                $options[CURLOPT_URL] .= '?';
            }
            $options[CURLOPT_URL] .= http_build_query($params);
        }
        if ($headers) {
            foreach ($headers as $name=>$value) {
                $options[CURLOPT_HTTPHEADER][] = $name . ': ' . $value;
            }
        }
        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        if (!$response) {
            $this->error_code = curl_errno($curl);
            $this->error_message = curl_error($curl);
            throw new ClientException($this->error_message, $this->error_code);
        } else {
            $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
            $http_header = trim(substr($response, 0, $header_size));
            $http_header = explode("\n", $http_header);
            foreach ($http_header as $row) {
                $row = explode(': ', trim($row), 2);
                if (count($row) < 2) {
                    continue;
                }
                $this->http_header[trim(strtolower($row[0]))] = trim($row[1]);
            }
            $this->http_body = substr($response, $header_size);
        }

        $this->curl_info = curl_getinfo($curl);

        curl_close($curl);
    }

    public function getHttpCode() {
        return (int) $this->curl_info['http_code'];
    }

    public function getHeader($name) {
        if (!isset($this->http_header[strtolower($name)])) {
            return false;
        }
        return $this->http_header[strtolower($name)];
    }

    public function getBody() {
        return $this->http_body;
    }

}