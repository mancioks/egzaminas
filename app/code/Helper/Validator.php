<?php

namespace Helper;

class Validator
{
    public static function checkEmail($email)
    {
        return strpos($email, '@');
    }

    public static function checkAllFilled($elements = [])
    {
        $filled = true;
        foreach ($elements as $element) {
            if (!$element || $element == "") {
                $filled = false;
            }
        }

        return $filled;
    }
}