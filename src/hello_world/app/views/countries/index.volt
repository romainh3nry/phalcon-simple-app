<h4>Pays</h4>
<div class="row">
{{ link_to('countries/add', 'Ajouter un pays', 'class' : 'btn btn-primary') }}
</div>

<table class="table mt-5">
    <tr>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    {% for country in countries %}
        <tr>
            <td>{{country.name}}</td>
            <td></td>
            <td></td>
        </tr>
    {% endfor %}
</table>
