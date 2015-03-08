<?php

/**
 * Our homepage. Show the most recently added quote.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Admin extends Application {

    function __construct()
    {
	parent::__construct();
        $this->load->helper('formfields');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->data['pageTitle'] = 'Books Maintenance';	
        $this->data['books'] = $this->comics->all();
        $this->data['pagebody'] = 'admin_list';    // this is the view we want shown
	$this->render();
    }
    
    // add a new quotation
    function add()
    {
        $book = $this->comics->create();
        $this->present($book);
    }
    
    //Present a quotation for adding/editing
    function present($book)
    {
        // format any errors
        $message ='';
        if(count($this->errors) > 0)
        {
            foreach($this->errors as $booboo)
            {
                $message .=$booboo . BR;
            }
        }
        $this->data['pageTitle'] = 'Add Book';	
        $this->data['message'] = $message;
        $this->data['fbookID'] = makeTextField('ID#', 'bookID', $book->bookID, "Unique book "
                . "identifier, system-assigned" . BR, 10, 10, true);
        $this->data['ftitle'] = makeTextField('Title', 'title', $book->title, ''.BR);
        $this->data['fauthor'] = makeTextField('Author', 'author', $book->author, ''.BR);
        $this->data['fdate_pub'] = makeTextField('Date Published', 'date_pub', $book->date_pub, "Date format:"
                . " YYYY/MM/DD" . BR . BR);
        $date = new DateTime(null, new DateTimeZone('America/New_York'));
        //auto insert upload date
        $formatDate = $date->format('Y-m-d');
        $book->date_load = $formatDate;
        $this->data['fdate_load'] = makeTextField('Date Uploaded', 'date_load', $book->date_load, "Auto date insert"
                .BR .BR, 10, 10, true);
        $this->data['fuploader'] = makeTextField('Uploader', 'uploader', $book->uploader, ''.BR);
        $this->data['pagebody'] = 'book_edit';
        $this->data['fsubmit'] = makeSubmitButton('Process Book',
                "Click here to validate the book data", 'btn-success');
        $this->render();
    }
    
    // process a quotation edit
    function confirm()
    {
        $record = $this->comics->create();
        // Extract submitted fields
        $record->bookID = $this->input->post('bookID');
        $record->title = $this->input->post('title');
        $record->author = $this->input->post('author');
        //set date published to a variable to check date format later
        $dateVal = $this->input->post('date_pub');
        //make today's Date and set time zone and date format
        $date = new DateTime(null, new DateTimeZone('America/New_York'));
        $formatDate = $date->format('Y-m-d');
        $record->date_load = $formatDate;
        $record->uploader = $this->input->post('uploader');
        // validation
        if(empty($record->title))
            $this->errors[] = 'You must specify a title.';
        if(empty($record->author))
            $this->errors[] = 'You must specify an author.';
        // date format validation
        if(($timeVal = strtotime($dateVal)) === false)
                $this->errors[] = 'Date format YYYY/MM/DD';
        else
            $record->date_pub = date('Y-m-d', $timeVal);
        
        if(empty($record->date_pub))
            $this->errors[] = 'You must specify a publish date. YYYY/MM/DD';
        if(empty($record->uploader))
            $this->errors[] = 'You must specify an uploader.';
        

        // redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->present($record);
            return;// make sure we don't try to save anything
        }
        // Save stuff
        if(empty($record->bookID)) $this->comics->add($record);
        else $this->comics->update($record);
        redirect('/admin');
        
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */