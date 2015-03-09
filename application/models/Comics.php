<?php

/**
 * This is a "CMS" model for comics.
 *
 * @author peter chan
 */
class Comics extends MY_Model {

    // Constructor
    public function __construct() {
       parent::__construct('books', 'bookID');	
    }
    
    // retrieve the most recently added quote
    function last() {
	$key = $this->highest();
	return $this->get($key);
    }
    
     public function searchtitle($input) {
        $this->db->like('title', $input);
        $query = $this->db->get('books');
        return $query;
    }
    
    public function advsearch($title, $author, $uploader) {
        if(!empty($title))
            $this->db->like('title', $title);
        if(!empty($author))
            $this->db->like('author', $author);
        if(!empty($uploader))
            $this->db->like('uploader', $uploader);
        $query = $this->db->get('books');
        return $query;
    }
}