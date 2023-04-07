<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    public function simpanData($data = null)
    {
        $this->insert($data);
    }

    public function cekData($where = null)
    {
        return $this->getWhere($where);
    }

    public function getUserWhere($where = null)
    {
        return $this->getWhere($where);
    }

    public function cekUserAccess($where = null)
    {
        $this->select('*');
        $this->from('access_menu');
        $this->where($where);
        return $this->get();
    }

    public function getUserLimit()
    {
        $this->select('*');
        $this->from('user');
        $this->limit(10, 0);
        return $this->get();
    }
}
