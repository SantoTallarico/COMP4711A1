<table cols="" border="0">
    <tr>
        <th>Delete</th>
        <th>Edit</th>
        <th>Book ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date Published</th>
        <th>Date Loaded</th>
        <th>Uploader</th>
    </tr>
    {books}
    <tr>
        <td><a class="btn" href="/admin/delete/{bookID}">Delete</a></td>
        <td><a class="btn" href='/admin/edit/{bookID}'>Edit</button></td>
        <td>{bookID}</td>
        <td>{title}</td>
        <td>{author}</td>
        <td>{date_pub}</td>
        <td>{date_load}</td>
        <td>{uploader}</td>
    </tr>
    {/books}
</table>

<a href='/admin/add'>Add a new book</a>
<a href='/admin/genre'>Edit Genre</a>