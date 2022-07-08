<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    public function insert_user($name, $email, $phone, $picture)
    {
        $data = array(
            'name'  => $name,
            'email' => $email,
            'phone' => $phone,
            'picture' => $picture
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $name, $email, $phone, $picture)
    {
        $data = array(
            'name'  => $name,
            'email' => $email,
            'phone' => $phone,
            'picture' => $picture
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);

        return $this->db->affected_rows();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        return $this->db->affected_rows();
    }
}
