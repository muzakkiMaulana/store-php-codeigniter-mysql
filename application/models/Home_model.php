<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function fetch_data_product()
    {
        $this->db->order_by('id', 'asc');
        $query_product = $this->db->get('products');
        return $query_product->result_array();
    }

    public function fetch_data_images_product()
    {
        return $this->db->get('images_products')->result_array();
    }

    public function product_by_id($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row_array();
    }

    function fetch_menu()
    {
        $query_menu = $this->db->query('SELECT * FROM menu ORDER BY id ASC');
        return $query_menu->result();
    }
    function fetch_submenu()
    {
        $query_submenu = $this->db->get('sub_menu');
        return $query_submenu->result(); 
    }
    function upload_image()
    {
        
    }
}