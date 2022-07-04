<?php

namespace Core;

use Helper\Database;

class BaseModel
{
    protected $db;
    protected $id;
    protected $table;

    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->db = (new Database())->db;
    }

    public function create($data = [])
    {
        $this->db->insert($this->table, $data);
    }

    public function update($data = [])
    {
        $this->db->update($this->table, $data, ['id' => $this->id]);
    }

    public function delete()
    {
        if ($this->id) {
            $this->db->delete($this->table, ['id' => $this->id]);
        }
    }

    public static function all()
    {
        $db = (new Database())->db;
        $table = (new static())->table;

        $ids = $db->fetch_col('SELECT id FROM ' . $table);

        $elements = [];

        foreach ($ids as $id) {
            $elements[] = (new static())->load($id);
        }

        return $elements;
    }
}