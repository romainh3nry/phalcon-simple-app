<form action="/movies/add" method="post" class="p-4 col-6">
    <?php foreach ($form as $field) { ?>
        <?= $field ?>
    <?php } ?>
</form>