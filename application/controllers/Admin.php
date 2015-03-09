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
    
    // edit an existing book
    function edit($bookID)
    {
        $book = $this->comics->get($bookID);
        $this->Present($book);
    }
    
    // delete an existing book
    function delete($bookID)
    {
        $book = $this->comics->get($bookID);
        $this->deletePresent($book);
    }
    
    //Present a quotation for adding/editing
    function deletePresent($book)
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
        // textfields now are readonly to prevent tampering by user
        $this->data['pageTitle'] = 'Delete Book';	
        $this->data['message'] = $message;
        $this->data['fbookID'] = makeTextField('ID#', 'bookID', $book->bookID, "", 10, 10, "", true);
        $this->data['ftitle'] = makeTextField('Title', 'title', $book->title, "", 10, 10, "", true);
        $this->data['fauthor'] = makeTextField('Author', 'author', $book->author, "", 10, 10, "", true);
        $this->data['fdate_pub'] = makeTextField('Date Published', 'date_pub', $book->date_pub, "", 10, 10, "", true);
        $this->data['fdate_load'] = makeTextField('Date Uploaded', 'date_load', $book->date_load, "", 10, 10, "", true);
        $this->data['fuploader'] = makeTextField('Uploader', 'uploader', $book->uploader, "", 10, 10, "", true);
        $this->data['pagebody'] = 'book_delete';
        $this->data['fsubmit'] = makeSubmitButton('For Sure???',
                "Click here to validate the book data", 'btn-success');
        $this->render();
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
        //if it's add record then disable id
        if(empty($book->bookID)){
            $this->data['fbookID'] = makeTextField('ID#', 'bookID', $book->bookID, "Unique book "
                . "identifier, system-assigned" . BR, 10, 10, true);
        }
        else{
            $this->data['fbookID'] = makeTextField('ID#', 'bookID', $book->bookID, "Unique book "
                . "identifier, system-assigned" . BR, 10, 10, "", true);
        }
        
        $this->data['ftitle'] = makeTextField('Title', 'title', $book->title, ''.BR);
        $this->data['fauthor'] = makeTextField('Author', 'author', $book->author, ''.BR);
        $this->data['fdate_pub'] = makeTextField('Date Published', 'date_pub', $book->date_pub, "Date format:"
                . " YYYY/MM/DD" . BR . BR);
        //auto insert upload date
        $date = new DateTime(null, new DateTimeZone('America/New_York'));
        $formatDate = $date->format('Y-m-d');
        
        if(empty($book->date_load)){
            $book->date_load = $formatDate;
            $this->data['fdate_load'] = makeTextField('Date Uploaded', 'date_load', $book->date_load, "Auto date insert"
                .BR .BR, 10, 10, true);
        }
        else{
            $this->data['fdate_load'] = makeTextField('Date Uploaded', 'date_load', $book->date_load, "Date format:"
                . " YYYY/MM/DD" . BR . BR);
        }
        $this->data['fuploader'] = makeTextField('Uploader', 'uploader', $book->uploader, ''.BR);
        //genre list
        $this->data['genres'] = $this->genres->all();
        
        $this->data['pagebody'] = 'book_edit';
        $this->data['fsubmit'] = makeSubmitButton('Process Book',
                "Click here to validate the book data", 'btn-success');
        $this->render();
    }
    
    // delete a book
    function confirmDelete()
    {
        $record = $this->comics->get($this->input->post('bookID'));
        if($this->comics->exists($record->bookID))
        {
            $this->comics->delete($record->bookID);
            redirect('/admin');
        }
        else
        {
            $this->deletePresent($record);
        }
            
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
        // selected genres array
        $arrayGen = array();
        foreach($this->input->post('genres') as $genre)
        {
            $arrayGen[] = $genre;
        }

        
        $recordGen = $this->genres->create();
        $recordGen->genreID = $this->input->post('genres');
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
        // check if date is after date published
        if($record->date_load < $record->date_pub)
            $this->errors[] = 'Date published should be before upload date';
        if(empty($record->uploader))
            $this->errors[] = 'You must specify an uploader.';
        

        // redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->present($record);
            return;// make sure we don't try to save anything
        }
        // Save stuff
        if(empty($record->bookID))
        {
            $this->comics->add($record);
            //$this->book_genres->add($recordGen);
            foreach($arrayGen as $gen)
            {
                $book_gen = $this->book_genres->create();
                $book_gen->bookID = $this->comics->last()->bookID;
                $book_gen->genreID = $gen->genreID;
                $book_gen->genreName = $gen->genreName;
                $this->book_genres->add($book_gen);
            }
        }
        //if(empty($record->bookID)) $this->present($record);
        else
        {
            $this->comics->update($record);
            //$this->book_genres->add($recordGen);
            foreach($arrayGen as $gen)
            {
                $book_gen = $this->book_genres->create();
                $book_gen->bookID = $this->comics->last()->bookID;
                $book_gen->genreID = $gen->genreID;
                $book_gen->genreName = $gen->genreName;
                $this->book_genres->update($book_gen);
            }
        }
        redirect('/admin');
        
    }
    
    // For editing genre
    function genre()
    {
        $this->data['pageTitle'] = 'Genre Maintenance';	
        $this->data['genres'] = $this->genres->all();
        $this->data['pagebody'] = 'genre_list';    // this is the view we want shown
	$this->render();
    }
    
    // add a new quotation
    function addGen()
    {
        $genre = $this->genres->create();
        $this->presentGen($genre);
    }

    // edit an existing genre
    function editGen($genreID)
    {
        $genre = $this->genres->get($genreID);
        $this->presentGen($genre);
    }
    
    // delete an existing genre
    function deleteGen($genreID)
    {
        $genre = $this->genres->get($genreID);
        $this->delGenPresent($genre);
    }
    
    //Present a quotation for adding/editing
    function delGenPresent($genre)
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
        // textfields now are readonly to prevent tampering by user
        $this->data['pageTitle'] = 'Delete Genre';	
        $this->data['message'] = $message;
        $this->data['fgenreID'] = makeTextField('ID#', 'genreID', $genre->genreID, "", 10, 10, "", true);
        $this->data['fgenreName'] = makeTextField('Name', 'genreName', $genre->genreName, "", 20, 20, "", true);
        $this->data['pagebody'] = 'genre_delete';
        $this->data['fsubmit'] = makeSubmitButton('For Sure???',
                "Click here to delete genre", 'btn-success');
        $this->render();
    }    

//Present a quotation for adding/editing
    function presentGen($genre)
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
        $this->data['pageTitle'] = 'Add/Edit Genre';	
        $this->data['message'] = $message;
        //if it's add record then disable id
        if(empty($genre->genreID)){
            $this->data['fgenreID'] = makeTextField('ID#', 'genreID', $genre->genreID, "Unique genre "
                . "identifier, system-assigned" . BR, 10, 10, true);
        }
        else{
            $this->data['fgenreID'] = makeTextField('ID#', 'genreID', $genre->genreID, "Unique genre "
                . "identifier, system-assigned" . BR, 10, 10, "", true);
        }
        
        $this->data['fgenreName'] = makeTextField('Name', 'genreName', $genre->genreName, ''.BR);
        $this->data['pagebody'] = 'genre_edit';
        $this->data['fsubmit'] = makeSubmitButton('Process Genre',
                "Click here to validate the genre data", 'btn-success');
        $this->render();
    }
    
    // delete a book
    function confirmDeleteGen()
    {
        $record = $this->genres->get($this->input->post('genreID'));
        if($this->genres->exists($record->genreID))
        {
            $this->book_genres->delete($record->genreID);
            $this->genres->delete($record->genreID);
            redirect('/admin/genre');
        }
        else
        {
            $this->delPresentGen($record);
        }
            
    }
    // process a quotation edit
    function confirmGen()
    {
        $record = $this->genres->create();
        // Extract submitted fields
        $record->genreID = $this->input->post('genreID');
        $record->genreName = $this->input->post('genreName');
        // validation
        if(empty($record->genreName))
            $this->errors[] = 'You must specify a name.';
        
        // redisplay if any errors
        if(count($this->errors) > 0)
        {
            $this->presentGen($record);
            return;// make sure we don't try to save anything
        }
        // Save stuff
        if(empty($record->genreID)) $this->genres->add($record);
        //if(empty($record->bookID)) $this->present($record);
        else
        {
            $this->book_genres->update($record);
            $this->genres->update($record);
        }
        redirect('/admin/genre');
        
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */