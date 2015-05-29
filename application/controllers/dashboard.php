<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author thejan rajapakshe <coder [dot] clix [at] gmail [dot] com
 */
class dashboard extends CI_Controller {

    public function index() {
        session_start();
        $this->load->library('session');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('user/login');
        } else {

            $this->config->load('ga_api');
            $ga_params = array(
                'applicationName' => $this->config->item('ga_api_applicationName'),
                'clientID' => $this->config->item('ga_api_clientId'),
                'clientSecret' => $this->config->item('ga_api_clientSecret'),
                'redirectUri' => $this->config->item('ga_api_redirectUri'),
                'developerKey' => $this->config->item('ga_api_developerKey'),
                'profileID' => $this->config->item('ga_api_profileId')
            );

            $this->load->library('GoogleAnalytics', $ga_params);
            
            $data = array(
                'users' => $this->googleanalytics->get_total('users'),
                'sessions' => $this->googleanalytics->get_total('sessions'),
                'browsers' => $this->googleanalytics->get_dimensions('browser', 'sessions'),
                'countries' => $this->googleanalytics->get_dimensions('country', 'sessions'),
                'operatingSystems' => $this->googleanalytics->get_dimensions('operatingSystem', 'sessions'),
                'profileInfo' => $this->googleanalytics->get_profile_info()
            );

            if($this->googleanalytics->access_token_ready){
                $this->load->view('dashboard', $data);
            }
        }
    }

    public function googleRedirect($authURL) {
        $this->load->view('googleAuth', array('auth' => $authURL));
    }
    
    public function ga_logout() {
        $this->config->load('ga_api');
            $ga_params = array(
                'applicationName' => $this->config->item('ga_api_applicationName'),
                'clientID' => $this->config->item('ga_api_clientId'),
                'clientSecret' => $this->config->item('ga_api_clientSecret'),
                'redirectUri' => $this->config->item('ga_api_redirectUri'),
                'developerKey' => $this->config->item('ga_api_developerKey'),
                'profileID' => $this->config->item('ga_api_profileId')
            );

            $this->load->library('GoogleAnalytics', $ga_params);
            $this->googleanalytics->logout();
            $this->index();
    }

}
