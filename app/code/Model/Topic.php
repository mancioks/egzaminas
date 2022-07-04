<?php

namespace Model;

use Core\BaseModel;

class Topic extends BaseModel
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    protected $table = 'topics';

    public function load($id)
    {
        $data = $this->db->fetch_row('SELECT * FROM topics WHERE id = ?', $id);

        if($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];

            return $this;
        }

        return false;
    }
}