<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Homepage
 *
 * @author KappaIndustries
 */
class Homepage extends Application {

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
    }
    
    public function index()
    {
        $this->data['pagebody'] = 'homepage';
        $this->data['pageTitle'] = 'Homepage';
		
		// Create the links for all comic books
		$source = $this->comics->all();
        $authors = array();
		
		foreach ($source as $record) {
            $authors[] = array('title' => $record['title'], 'href' => $record['where']);
        }
        $this->data['comics'] = $authors;
		
        $this->render();
    }
}
