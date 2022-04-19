<h3>Utilisateurs ({{count}})</h3>

{% for user in users %}
    <p><a href='/utilisateur/profil/{{user.id}}'>{{ user.firstname }} - {{ user.lastname }}</p></a>
{% endfor %}

<a href="/">Back to home</a>