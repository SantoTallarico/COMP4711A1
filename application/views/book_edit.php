<div class="row">
    <div class="errors">{message}</div>
    <form action="/admin/confirm" method="post">
        {fbookID}
        {ftitle}
        {fauthor}
        
        <select multiple name="genres[]">
            {genres}
            <option>
                {genreID}{genreName}
            </option>
            {/genres}
        </select>
        
        {fdate_pub}
        {fdate_load}
        {fuploader}
        {fsubmit}
    </form>
</div>
