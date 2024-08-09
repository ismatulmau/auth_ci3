<?php
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan tidak ada spasi atau output di sini
        $this->load->helper('url');
        $this->load->library('session');

        // Periksa apakah user sudah login, jika tidak redirect ke login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard');
    }
}
