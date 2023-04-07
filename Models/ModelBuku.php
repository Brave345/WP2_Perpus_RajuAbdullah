<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';

    //manajemen buku
    public function getBuku()
    {
        return $this->findAll();
    }

    public function bukuWhere($where)
    {
        return $this->where($where)->get();
    }

    public function simpanBuku($data = null)
    {
        $this->insert($data);
    }

    public function updateBuku($data = null, $where = null)
    {
        $this->update($where, $data);
    }

    public function hapusBuku($where = null)
    {
        $this->delete($where);
    }

    public function total($field, $where)
    {
        $this->selectSum($field);
        if (!empty($where) && count($where) > 0) {
            $this->where($where);
        }
        return $this->get()->getRow($field);
    }

    //manajemen kategori
    public function getKategori()
    {
        return $this->db->table('kategori')->get();
    }

    public function kategoriWhere($where)
    {
        return $this->db->table('kategori')->where($where)->get();
    }

    public function simpanKategori($data = null)
    {
        $this->db->table('kategori')->insert($data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->table('kategori')->delete($where);
    }

    public function updateKategori($where = null, $data = null)
    {
        $this->db->table('kategori')->update($data, $where);
    }

    //join
    public function joinKategoriBuku($where)
    {
        $this->select('buku.id_kategori,kategori.kategori');
        $this->from('buku');
        $this->join('kategori', 'kategori.id = buku.id_kategori');
        $this->where($where);
        return $this->get();
    }
}
