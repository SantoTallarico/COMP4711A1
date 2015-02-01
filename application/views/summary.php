<?php

/*
 * The general "skeleton" of the book summary page. Information (title,
 * author, cover image, genre, etc.) are shown as well as links to individual
 * chapters of the book.
 * No formatting has been done yet; will be done in future iterations as we figure
 * out how much "summary information" we'll need.
 */
?>
<div class="summary">
	<img src="/data/{pic}" title="{who}"/>
	<div class="info">
		<p>Title: {title}</p>
		<p>Author: {author}</p>
		<p>Genre: {genre}</p>
		<p>Date Added: {date}</p>
	</div>
	<div class="synopsis">
		<h4>Sypnosis</h4>
		<p>
			A brief desciption of the book's general plot will be show here.
			Note that the chapter link will take you to the general skeleton of the
			chapter page with no data displayed.
		</p>
    <div class="chapterlist">
	<h4>Chapters:</h4>
        <a href="reading">Chapter 1</a>
</div>