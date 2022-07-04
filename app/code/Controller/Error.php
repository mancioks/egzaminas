<?php

namespace Controller;

use Core\BaseController;

class Error extends BaseController
{
    public static function show($type = 404)
    {
        $object = new static();
        $object->render("parts/".$type);
    }
}