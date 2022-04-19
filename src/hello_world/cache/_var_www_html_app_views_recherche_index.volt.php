<h3>recherche</h3>

<form action="/recherche" method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <button type="submit">Confirm</button>
</form>

<?php if ($email) { ?>
<p><?= $email ?></p>
<?php } ?>

<?php if ($password) { ?>
<p><?= $password ?></p>
<?php } ?>
