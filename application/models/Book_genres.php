<?php

/**
 * This is a "CMS" model for genres.
 *
 * @author peter chan
 */
class Book_genres extends MY_Model {

    // Constructor
    public function __construct() {
       parent::__construct('book_genres', 'genreID');	
    }
    
    // retrieve the most recently added quote
    function last() {
	$key = $this->highest();
	return $this->get($key);
    }

}