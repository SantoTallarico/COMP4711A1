<table cols="" border="0">
    <tr>
        <th>Delete</th>
        <th>Edit</th>
        <th>Genre ID</th>
        <th>Genre Name</th>
    </tr>
    {genres}
    <tr>
        <td><a class="btn" href="/admin/delete/{genreID}">Delete</a></td>
        <td><a class="btn" href='/admin/edit/{genreID}'>Edit</button></td>
        <td>{genreID}</td>
        <td>{genreName}</td>
    </tr>
    {/genres}
</table>
