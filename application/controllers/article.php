<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author thejan rajapakshe <coder [dot] clix [at] gmail [dot] com
 */
class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articles');
    }

    public function index($data = array()) {
        session_start();
        $articles = $this->articles->get_all_articles();
        $data['articles'] = $articles;
        $this->load->view('articles/articles', $data);
    }

    public function new_article() {
        $this->load->library('form_validation');
        $this->load->database();

        $this->form_validation->set_rules('article_title', 'Article Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('articles');
        } else {

            $article_title = $this->input->post('article_title');
            $article_description = $this->input->post('article_description');
            $article_content = $this->input->post('article_content');
            $article_author = $this->input->post('article_author');
            $article_type = $this->input->post('article_type');
            $article_downloadable = ($this->input->post('article_downloadable') == 'on' ? 1 : 0);
            $article_image = $_FILES['article_image_file'];

            $article_data = array(
                'title' => $article_title,
                'description' => $article_description,
                'content' => $article_content,
                'author' => $article_author,
                'type' => $article_type,
                'preview' => pathinfo($article_image['name'], PATHINFO_EXTENSION),
                'downloadable' => $article_downloadable,
            );

            if ($article_downloadable == 1) {
                $article_attachment = $_FILES['article_attachment'];
                $article_data['file'] = $article_attachment['name'];
                $config['upload_path'] = './assests/article_archive/';
                $config['allowed_types'] = 'pdf|docx|doc|jpg|png|bmp|odf';
                $config['max_size'] = 1024;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('article_attachment')) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    $this->load->view('articles/articles', $error);
                }
            }

            $article_id = $this->articles->insert($article_data);

            $config['upload_path'] = './assests/img/article/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 100;
            $config['file_name'] = $article_id;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('article_image_file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('articles/articles', $error);
            }
            $this->index(array('success' => 'Article added successfully'));
        }
    }

    public function edit_article($id) {
        $article = $this->articles->get_article_data($id);

        if (!$article) {
            echo 'No Article';
        }
        $values['article_title'] = $article->title;
        $values['article_description'] = $article->description;
        $values['article_content'] = $article->content;
        $values['article_type'] = $article->type;
        $values['article_author'] = $article->author;
        $values['article_downloadable'] = $article->downloadable;
        $values['article_attachment'] = $article->file;

        $this->load->view('articles/edit_article', array('values' => $values));
    }

    public function publish_article($id) {
        $this->articles->publish_unpublish_article($id, 1);
        $this->index();
    }

    public function unpublish_article($id) {
        $this->articles->publish_unpublish_article($id, 0);
        $this->index();
    }

}
