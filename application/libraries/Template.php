<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
    }
    public function portal_template($view, $data = null)
    {
        $this->CI->load->view('template/header');
        $this->CI->load->view($view, $data);
        $this->CI->load->view('template/footer');

    }
}
