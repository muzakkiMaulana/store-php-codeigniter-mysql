<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
           
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('auth/index');
            $this->load->view('layout/footer');
            
        } else {
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            
            if ($user['is_active'] == 1 ) {
                
                if (password_verify($password, $user['password'])) {
            
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];

                    if ($data['role_id'] == 1) {
                        
                        $this->session->set_userdata($data);
                        redirect('admin');

                    } else {// } elseif ($data['role_id'] == 2) {

                        $this->session->set_userdata($data);
                        redirect('home');
                    }
                    

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Wrong Password!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
                }
                

            } else {
                $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                your account not actived
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
            
            }

        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email dosent exist!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            
            redirect('auth');
            
        }
        
        
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already register'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
            'matches' => 'Password dosent match!',
            'min_length' => 'Password too short'
        ]);

        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/header');
            $this->load->view('auth/registration');
            $this->load->view('layout/footer');

        } else { 
            $data = [
                'name' => htmlspecialchars($this->input->post('name', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => '2',
                'is_active' => '1',
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            your account success created, Please Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/registration');
        }
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            you have been logged out!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            
            redirect();
            
    }

}


