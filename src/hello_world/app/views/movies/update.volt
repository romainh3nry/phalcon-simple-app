update

<form action="/movies/update/{{movie.id}}" method="post">
    {{form.get('title')}}
    {{form.get('year')}}
    {{form.get('country')}}
    {{form.get('director')}}
    {{form.get('plot')}}
    {{form.get('Ajouter')}}
</form>