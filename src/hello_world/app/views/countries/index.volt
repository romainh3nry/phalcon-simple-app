<h4>Pays</h4>
<div class="row">
{{ link_to('countries/add', 'Ajouter un pays', 'class' : 'btn btn-primary') }}
</div>

<table class="table mt-5">
    <tr>
        <th>Name</th>
        <th>Short</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </tr>
    {% for country in countries %}
        <tr>
            <td>{{country.name}}</td>
            <td>{{country.short_name}}</td>
            <td>{{country.created_at}}</td>
            <td>{{country.updated_at}}</td>
            <td><a href="/countries/delete/{{country.id}}"><button>Effacer</button></a></td>
        </tr>
    {% endfor %}
</table>
