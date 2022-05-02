<form action="/movies/add" method="post" class="p-4 col-6">
    {% for field in form %}
        {{field}}
    {% endfor %}
</form>