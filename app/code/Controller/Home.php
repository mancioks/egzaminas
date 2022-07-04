<?php

namespace Controller;

use Core\BaseController;
use Model\Topic;

class Home extends BaseController
{
    public function index()
    {
        $topics = Topic::all();
        $this->render('home/index', compact('topics'));
    }
}