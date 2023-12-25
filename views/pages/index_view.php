<h1>Note list</h1>
<div>Create new note</div>
<form name="create" action="/api/store" method="post">
    <label for="note"></label>
    <input type="text" name="note"/>
    <input type="submit" value="Create"/>
</form>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>note</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<script src="/js/main.js"></script>