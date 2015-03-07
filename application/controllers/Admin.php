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
        $this->data['title'] = 'Books Maintenance';	
        $this->data['books'] = $this->books->all();
        $this->data['pagebody'] = 'admin_list';    // this is the view we want shown
	$this->render();
    }
    
    // add a new quotation
    function add()
    {
        $book = $this->books->create();
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
        $this->data['message'] = $message;
        $this->data['fid'] = makeTextField('ID#', 'bookID', $book->bookID, "Unique book "
                . "identifier, system-assigned", 10, 10, true);
        $this->data['ftitle'] = makeTextField('Title', 'title', $book->title);
        $this->data['fauthor'] = makeTextField('Author', 'author', $book->author);
        $this->data['fdate_pub'] = makeTextArea('Date Published', 'date_pub', $book->date_pub);
        $this->data['fdate_load'] = makeTextField('Date Uploaded', 'date_load', $book->date_load);
        $this->data['fuploader'] = makeTextArea('Uploader', 'uploader', $book->uploader);
        $this->data['pagebody'] = 'book_edit';
        $this->data['fsubmit'] = makeSubmitButton('Process Book',
                "Click here to validate the book data", 'btn-success');
        $this->render();
    }
    
    // process a quotation edit
    function confirm()
    {
        $record = $this->books->create();
        // Extract submitted fields
        $record->bookID = $this->input->post('bookID');
        $record->title = $this->input->post('title');
        $record->author = $this->input->post('author');
        $record->date_pub = $this->input->post('date_pub');
        $record->date_load = $this->input->post('date_load');
        $record->uploader = $this->input->post('uploader');
        // validation
        if(empty($record->title))
            $this->errors[] = 'You must specify a title.';
        if(empty($record->author))
            $this->errors[] = 'You must specify an author.';
        if(empty($record->uploader))
            $this->errors[] = 'You must specify an uploader.';

        // redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->present($record);
            return;// make sure we don't try to save anything
        }
        // Save stuff
        if(empty($record->bookID)) $this->books->add($record);
        else $this->books->update($record);
        redirect('/admin');
        
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */