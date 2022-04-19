<?= $this->tag->image(['img/logo.png', 'alt' => 'un logo', 'width' => '400px']) ?>

<h3>Signup</h3>

<form action="/utilisateur/signup" method="post">
    <?= $form->get('firstname') ?>
    <?= $form->get('lastname') ?>
    <?= $form->get('email') ?>
    <?= $form->get('password') ?>
    <?= $form->get('Signup') ?>
</form>

<?php if (isset($erreurs)) { ?>
<div class="alert alert-danger col-6 mt-1">
    <?= $erreurs ?>
</div>
<?php } ?>

<?php foreach (explode('|', 'tomates|courgettes|aubergines') as $element) { ?>
    <p><?= $element ?></p>
<?php } ?>