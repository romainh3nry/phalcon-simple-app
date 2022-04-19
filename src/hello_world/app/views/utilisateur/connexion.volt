<h3>Connexion</h3>

<form action="/utilisateur/connexion" method="post">
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

{% if login %}
{{login}}
{% endif %}

{% if session %}
{{session}}
{% endif %}