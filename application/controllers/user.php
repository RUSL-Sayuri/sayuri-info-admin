<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author thejan rajapakshe <coder [dot] clix [at] gmail [dot] com
 */
class User extends CI_Controller {

    public function index() {
        $this->login();
    }

    public function login() {
        session_start();
        $this->load->library('session');
        if ($this->session->userdata('logged_in') == FALSE) {
            $this->load->view('login');
        } else {
            redirect('dashboard');
        }
    }

    public function signout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $data = array('result_success' => 'Successfully signed out');
        $this->load->view('login', $data);
    }

    public function loginCheck() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            //session_start();
            $this->load->library('session');

            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $hash_password = sha1($password);
            $this->load->database();
            $this->db->select('password, id');
            $this->db->from('admin_users');
            $this->db->where('username', $username);
            $this->db->where('active', 1);
            $query = $this->db->get();
            $result = $query->result();
            if ($query->num_rows() > 0) {
                if ($result[0]->password == $hash_password) {
                    $this->session->set_userdata(array('id' => $result[0]->id, 'username' => $username, 'logged_in' => TRUE));
                    redirect('dashboard');
                } else {
                    $data = array('result' => "Login Failed");
                    $this->load->view('login', $data);
                }
            } else {
                $data = array('result' => "Login Failed");
                $this->load->view('login', $data);
            }
        }
    }

}
