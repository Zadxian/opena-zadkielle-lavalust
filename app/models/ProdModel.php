<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProdModel
 * 
 * Automatically generated via CLI.
 */
class ProdModel extends Model {
    protected $table = '';
    protected $fillable = [];

    public function __construct()
    {
        parent::__construct();
    }
     public function finduser($name)
    {
        return $this->db->table('users')
                        ->where('name', $name)
                        ->row();
    }

    public function All()
    {
        return $this->db->table('products')
                        ->order_by('created_at', 'DESC')
                        ->result_array();
    }

    public function getById($id)
    {
        return $this->db->table('products')
                        ->where('id', $id)
                        ->row_array();
    }

    public function createProd($data)
    {
        $this->db->table('products')->insert($data);
        return $this->db->last_id();
    }

    public function updateProd($id, $data)
    {
        return $this->db->table('products')
                        ->where('id', $id)
                        ->update($data);
    }

    public function deleteProd($id)
    {
        return $this->db->table('products')
                        ->where('id', $id)
                        ->delete();
    }
    
}