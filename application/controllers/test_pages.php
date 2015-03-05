<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test_pages
 *
 * @author jayan_000
 */
class Test_pages extends CI_Controller {
    public function open_page($page_id) {
        $this->load->view($page_id);
    }
}
