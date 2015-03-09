<?php

/**
 * Description of Results
 *
 */
class Results extends Application {

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
        $this->data['pagebody'] = 'results';
        $this->data['pageTitle'] = 'Results';
        $this->render();
    }
    
    public function searchtitle() {
        $input = $this->input->post('search');
        $query = $this->comics->db->query("SELECT * FROM books b WHERE b.title LIKE '%$input%'");
        
        $this->data['books'] = $query->result();
        
        $this->index();
    }
}
