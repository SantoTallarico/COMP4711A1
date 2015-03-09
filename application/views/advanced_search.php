<?php

/* 
 * Advanced Search Page
 * Allows users to search books using various criteria
 */

?>
<div class="advanced_search">
    <div class="row">
        <div class="errors">{message}</div>
        <form action="/results" method="post">
            {ftitle}
            {fauthor}
            {fgenre}
            {fuploader}
            {fsubmit}
        </form>
    </div>
</div>