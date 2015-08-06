<?php

namespace Acme\Parsers;

use Acme\Parsers\Exceptions\UnrecognizedType;

class Field
{
    public function parse($string)
    {
        $chunks = $this->splitFieldsIntoChunk($string);
        $parsed = [];

        foreach ($chunks as $chunk) {
            $parsed = $this->parseChunk($chunk, $parsed);
        }

        return $parsed;
    }

    /**
     * @param $string
     * @return array
     */
    private function splitFieldsIntoChunk($string)
    {
        return preg_split('/, ?/', $string);
    }

    /**
     * @param $declaration
     * @param $parsed
     * @return mixed
     * @throws UnrecognizedType
     */
    private function parseChunk($declaration, $parsed)
    {
        list($property, $type) = explode(':', $declaration);

        if ( ! $this->typeIsRecognize($type)) {
            throw new UnrecognizedType;
        }

        $parsed[$property] = $type;
        return $parsed;
    }

    /**
     * @param $type
     * @return bool
     */
    private function typeIsRecognize($type)
    {
        return $type == 'string' or $type == 'text';
    }
}
