<h4>Ajouter un pays</h4>

<form action="/countries/add" method="post" class="row">
    {{form.get('name')}}
    {{form.get('short_name')}}
    {{form.get('Submit')}}
</form>

{% if erreurs is defined %}
<div class="alert alert-danger col-6 mt-1">
    {{erreurs}}
</div>
{% endif %}