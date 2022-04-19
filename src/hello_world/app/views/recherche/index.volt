<h3>recherche</h3>

<form action="/recherche" method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <button type="submit">Confirm</button>
</form>

{% if email %}
<p>{{email}}</p>
{% endif %}

{% if password %}
<p>{{password}}</p>
{% endif %}
