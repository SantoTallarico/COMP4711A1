<?php
/**
 * Description of Summary
 */
class Summary extends Application {

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
    
    public function book($num)
    {
        $this->data['pagebody'] = 'summary';
        $this->data['pageTitle'] = 'Book Summary';
		
        $source = (array) $this->comics->get($num);
        $this->data['title'] = $source['title'];
        $this->data['author'] = $source['author'];
        $this->data['date_pub'] = $source['date_pub'];
        $this->data['date_load'] = $source['date_load'];
        $this->data['uploader'] = $source['uploader'];

        $this->render();
    }
}
