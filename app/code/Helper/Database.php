<?php

namespace Helper;

use vielhuber\dbhelper\dbhelper;

class Database
{
    public $db;

    public function __construct()
    {
        $this->db = new dbhelper();
        $this->db->connect('pdo', 'mysql', '127.0.0.1', 'root', 'root', 'egzaminas', 3306);
    }
}