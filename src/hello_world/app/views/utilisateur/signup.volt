{{ image('img/logo.png', 'alt' : 'un logo', 'width' : '400px') }}

<h3>Signup</h3>

<form action="/utilisateur/signup" method="post">
    {{form.get('firstname')}}
    {{form.get('lastname')}}
    {{form.get('email')}}
    {{form.get('password')}}
    {{form.get('Signup')}}
</form>

{% if erreurs is defined %}
<div class="alert alert-danger col-6 mt-1">
    {{erreurs}}
</div>
{% endif %}

{% for element in v_explode('|', 'tomates|courgettes|aubergines') %}
    <p>{{element}}</p>
{% endfor %}