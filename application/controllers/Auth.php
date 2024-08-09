<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function register() {
        $this->load->view('register');
    }

    public function register_user() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->User_model->register($username, $email, $password);
            redirect('auth/login');
        }
    }

    public function login() {
        $this->load->view('login');
    }

    public function login_user() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->login($username, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>
