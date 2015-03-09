<?php

/*
 * Comments and stuff
 */
?>
<div class="results">
    <table cols="" border="0">
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Genre(s)</th>
        <th>Author</th>
        <th>Uploader</th>
    </tr>
    {books}
    <tr>
        <td>{bookID}</td>
        <td>{title}</td>
        <td>{genres}{genre}{/genres}</td>
        <td>{author}</td>
        <td>{uploader}</td>
    </tr>
    {/books}
</table>
</div>