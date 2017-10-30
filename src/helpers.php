<?php

// @codeCoverageIgnoreStart
if (!function_exists('str_replace_tokens')) {

    // @codeCoverageIgnoreEnd

    function str_replace_tokens($subject, array $tokens = [], $prefix = ':')
    {
        foreach ($tokens as $token => $value) {
            $subject = str_replace(
                $prefix.$token,
                $value,
                $subject);
        }

        return $subject;
    }
}
// @codeCoverageIgnoreStart
if (!function_exists('checkrEntityClassName')) {

    // @codeCoverageIgnoreEnd
    function checkrEntityClassName($name)
    {
        $namespace = '\Lyal\Checkr\Entities';
        if (class_exists($namespace.'\Resources\\'.resourceNameFormat($name))) {
            return $namespace.'\Resources\\'.resourceNameFormat($name);
        }

        if (class_exists($namespace.'\Screenings\\'.resourceNameFormat($name))) {
            return $namespace.'\Screenings\\'.resourceNameFormat($name);
        }

        return false;
    }
}

// @codeCoverageIgnoreStart
if (!function_exists('resourceNameFormat')) {
    // @codeCoverageIgnoreEnd
    function resourceNameFormat($name)
    {
        return studly_case(str_singular(str_replace('test_', '', $name)));
    }
}
