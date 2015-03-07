<table cols="" border="0">
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date Published</th>
        <th>Date Loaded</th>
        <th>Uploader</th>
    </tr>
    {books}
    <tr>
        <td>{bookID}</td>
        <td>{title}</td>
        <td>{author}</td>
        <td>{date_pub}</td>
        <td>{date_load}</td>
        <td>{uploader}</td>
    </tr>
    {/quotes}
</table>

<a href='/admin/add'>Add a new quotation</a>