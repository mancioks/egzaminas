<?php

namespace Core;

use Helper\Database;
use Helper\Url;
use Core\Request;

class BaseController
{
    protected $db;
    protected $request;
    public $data;

    public function __construct() {
        $this->db = (new Database())->db;
        $this->request = new Request();
    }

    protected function render($template, $data = [])
    {
        $this->data = $data;

        include_once PROJECT_ROOT_DIR . '/app/design/parts/header.php';

        include_once PROJECT_ROOT_DIR . '/app/design/' . $template . '.php';

        include_once PROJECT_ROOT_DIR . '/app/design/parts/footer.php';
    }

    public function url($path, $param = null) {
        return Url::link($path, $param);
    }

    public function index()
    {
        \Controller\Error::show(404);
    }
}