<?php

namespace Petslane\Bondora\Definition;

class Definition {

    public function __construct($params = null) {
        $class = get_class($this);

        if (!$params) {
            return null;
        }

        $modal = new $class;
        foreach ($params as $field=>$value) {
            if (!property_exists($modal, $field)) {
                continue;
            }

            $type = $this->getType('var', $modal, $field);
            $is_array = false;
            if (substr($type, -2) == '[]') {
                $is_array = true;
                $type = substr($type, 0, -2);
            }

            if ($type == 'bool' && !$is_array) {
                $this->{$field} = (bool) $value;
            } else if ($type == 'string' && !$is_array) {
                $this->{$field} = (string) $value;
            } else if ($type == 'int' && !$is_array) {
                $this->{$field} = (int) $value;
            } else if ($type == 'float' && !$is_array) {
                $this->{$field} = (float) $value;
            } else if ($type == '\DateTime' && !$is_array) {
                $valueDate = \DateTime::createFromFormat('Y-m-d\TH:i:s', $value);
                if (!$valueDate == !!$value) {
                    throw new \Exception('Unable to parse date: ' . $value);
                }
                $this->{$field} = $valueDate;
            } else if ($type != 'Definition' && file_exists(__DIR__ . '/' . $type . '.php')) {
                $ns_class = '\\' . __NAMESPACE__ . '\\' . $type;
                if ($is_array) {
                    $val = array();
                    if ($value) {
                        foreach ($value as $v) {
                            $val[] = new $ns_class($v);
                        }
                    }
                } else {
                    $val = null;
                    if ($value) {
                        $val = new $ns_class($value);
                    }
                }
                $this->{$field} = $val;
            } else {
                throw new \Exception('Unexpected property type (' . $type . ') for ' . $class . '::' . $field);
            }
        }
    }

    private function getType($tag, $class, $method=null) {
        $rc = new \ReflectionClass($class);
        if ($method) {
            $rc = $rc->getProperty($method);
        } else if ($method) {
            throw new \Exception('Did not find method/property "'.$method.'" in class "'.$rc->getName().'"');
        }
        $comment = $rc->getDocComment();
        if (!$comment) {
            return false;
        }

        return self::parse($comment, $tag);
    }

    public static function parse($doc, $tag='var') {
        $doc = preg_replace('/(\/)+|(\t)+|(\*)+/', '', $doc);

        foreach (explode("\n", $doc) as $line) {

            $line = trim($line);
            $line = preg_replace('/\s+/', ' ', $line);

            if (empty($line)) {
                continue;
            }

            if ($line{0} != '@') {
                continue;
            }

            $tokens = explode(' ', $line);

            if (empty($tokens)) {
                continue;
            }

            $name = str_replace('@', '', array_shift($tokens));

            if ($name != $tag) {
                continue;
            }


            $type = array_shift($tokens);
            if (count(explode('|', $type)) > 1) {
                throw new \Exception('Only one type option allowed in "@'.$name.'"');
            }

            return $type;
        }

        return null;
    }
}