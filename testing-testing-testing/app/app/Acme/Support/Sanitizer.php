<?php

namespace Acme\Support;

abstract class Sanitizer
{
    public function sanitize(array $data, array $rules = null)
    {
        $rules = $rules ?: $this->getRules();

        foreach ($rules as $field => $sanitizers) {
            if (!isset($data[$field])) continue;
            $data[$field] = $this->applySanitizersTo($data[$field], $sanitizers);

        }

        return $data;
    }

    /**
     * @param $sanitizers
     * @return array
     */
    private function splitSanitizers($sanitizers)
    {
        return is_array($sanitizers) ? $sanitizers : explode('|', $sanitizers);
    }

    /**
     * @param array $data
     * @param $sanitizers
     * @return array
     */
    private function applySanitizersTo($value, $sanitizers)
    {
        foreach ($this->splitSanitizers($sanitizers) as $sanitizer) {
            $method = 'sanitize' . ucwords($sanitizer);

            $value = method_exists($this, $method)
                ? call_user_func([$this, $method], $value)
                : call_user_func($sanitizer, $value);
        }
        return $value;
    }

    public function getRules()
    {
        return $this->rules;
    }
}
