<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'template', 'session'));
        $this->load->model('user_model');
    }

    public function users()
    {
        $data = array(
            'info_users' => $this->user_model->get_users()
        );
        $this->template->portal_template('user/users', $data);
    }

    public function user($id)
    {
        $user = $this->user_model->get_user($id);
        $this->load->view('user', array('user' => $user));
    }

    public function add_user()
    {
        // validation input name, email, phone, picture file
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        // validation input name, email, phone, picture

        if ($this->form_validation->run() == FALSE) {
            $this->template->portal_template('user/user_add');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            // upload picture
            $config['upload_path'] = 'assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                $this->template->portal_template('user/user_add');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $picture = $data['upload_data']['file_name'];

                $resp = $this->user_model->insert_user($name, $email, $phone, $picture);
                if ($resp) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success edit user</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit user</div>');
                }
                
                redirect('user/users');
            }
                                     
        }
    }

    public function edit_user($id)
    {
        // validation input name, email, phone, picture
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        // validation input name, email, phone, picture

        if ($this->form_validation->run() == FALSE) {
            $user = $this->user_model->get_user($id);
            $this->template->portal_template('user/user_update', array('user' => $user));
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $picture = $this->input->post('picture');

            // upload picture
            $config['upload_path'] = 'assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                $this->template->portal_template('user/user_add');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $picture = $data['upload_data']['file_name'];

                $resp = $this->user_model->update_user($id, $name, $email, $phone, $picture);
                if ($resp) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success edit user</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit user</div>');
                }
                
                redirect('user/users');
            }
                         
        }
    }

    public function delete_user($id)
    {
        $resp = $this->user_model->delete_user($id);
        if ($resp) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success delete user</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete user</div>');
        }
        redirect('user/users');
    }
    
}
