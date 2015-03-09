<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 */
class Search extends Application {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }
    
    public function index() {
        $this->data['pageTitle'] = 'Advanced Search';

        $this->data['ftitle'] = makeTextField('Title', 'title', '', ''.BR);
        $this->data['fauthor'] = makeTextField('Author', 'author', '', ''.BR);
        $this->data['fgenre'] = makeTextField('Genre', 'genre', '', ''.BR);
        $this->data['fuploader'] = makeTextField('Uploader', 'uploader', '', ''.BR);
        $this->data['pagebody'] = 'advanced_search';
        $this->data['fsubmit'] = makeSubmitButton('Search Books',
                "Click here to commence search", 'btn-success');
        
        $this->render();
    }
    
    public function advsearch() {
        $query = $this->comics->advsearch($this->input->post('title'), $this->input->post('author'),
                                $this->input->post('uploader'));
        $querygenres = $this->book_genres->advsearchgenre($this->input->post('genre'));
        $this->results($query, $querygenres);
    }
    
    public function results($query, $querygenres)
    {
        $this->data['pagebody'] = 'results';
        $this->data['pageTitle'] = 'Results';
        $this->data['books'] = $query->result();
        $this->data['genre'] = $querygenres->result();
        
        $this->render();
    }
    
    public function searchtitle() {
        $input = $this->input->post('search');
        $query = $this->comics->searchtitle($input);
        
        $this->results($query);
    }
}
