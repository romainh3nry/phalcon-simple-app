{%- macro afficher_profil(id, firstname, lastname, email) %}
<p>Id : {{ id }}</p>
<p>Firstname : {{ firstname }}</p>
<p>Lastname : {{ lastname }}</p>
<p>Email : {{ email }}</p>
{% endmacro %}

<h3>Profil</h3>

{% if user %}
{{ afficher_profil(user.id, user.firstname, user.lastname, user.email) }}
{% else %}
<p>User not valid</p>
{% endif %}