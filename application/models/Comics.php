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
}