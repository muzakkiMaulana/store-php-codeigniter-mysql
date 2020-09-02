<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        
        if($this->session->userdata('role_id') == 1 ){

            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/navbar', FALSE);
            $this->load->view('admin/layout/sidebar', FALSE);
            $this->load->view('admin/index', FALSE);
            $this->load->view('admin/layout/footer', FALSE);

        } else {
            
            redirect('home');
            
        }
    }

}
