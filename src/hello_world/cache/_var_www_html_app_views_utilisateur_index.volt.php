<h3>Utilisateurs (<?= $count ?>)</h3>

<?php foreach ($users as $user) { ?>
    <p><a href='/utilisateur/profil/<?= $user->id ?>'><?= $user->firstname ?> - <?= $user->lastname ?></p></a>
<?php } ?>

<a href="/">Back to home</a>