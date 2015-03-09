<div class="row">
    <div class="errors">{message}</div>
    <form action="/admin/confirm" method="post">
        {fbookID}
        {ftitle}
        {fauthor}
        
        <select multiple>
            {fgenres}
            <option>
                {genreID}{genreName}
            </option>
            {/fgenres}
        </select>
        
        {fdate_pub}
        {fdate_load}
        {fuploader}
        {fsubmit}
    </form>
</div>
