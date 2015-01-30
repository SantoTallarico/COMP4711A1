<?php

/**
 * This is a "CMS" model for comics, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author peter chan
 */
class Comics extends CI_Model {

    // The data is purely made up
    var $data = array(
        array('id' => '1', 'author' => 'Rene Ye', 'title' => 'Tie em up for coffee with cat.', 'genre'=>'Hentai',
            'where' => 'location1', 'date' => 'dd/mm/yyyy'),
        array('id' => '2', 'author' => 'Santo Tallarico', 'title' => 'Cowboy smoking a joint.', 'genre'=>'Western',
            'where' => 'location2', 'date' => 'dd/mm/yyyy'),
        array('id' => '3', 'author' => 'Lester Aquilario', 'title' => 'Faceless profile.', 'genre'=>'Drama',
            'where' => 'location3', 'date' => 'dd/mm/yyyy'),
        array('id' => '4', 'author' => 'Peter Chan', 'title' => 'Baby drinking martini.', 'genre'=>'Spy',
            'where' => 'location4', 'date' => 'dd/mm/yyyy'),
        array('id' => '5', 'author' => 'Rene Ye', 'title' => 'Spaking in agile.', 'genre'=>'Hentai',
            'where' => 'location5', 'date' => 'dd/mm/yyyy'),
        array('id' => '6', 'author' => 'Santo Tallarico', 'title' => 'Broke back mountain.', 'genre'=>'Twisted Western',
            'where' => 'location6', 'date' => 'dd/mm/yyyy')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single quote
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record) {
            if ($record['id'] == $which) {
                return $record;
            }
        }
        return null;
    }

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    // retrieve the first quote
    public function first() {
        return $this->data[0];
    }

    // retrieve the last quote
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }

}
