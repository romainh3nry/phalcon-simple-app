<h4>Pays</h4>
<div class="row">
<?= $this->tag->linkTo(['countries/add', 'Ajouter un pays', 'class' => 'btn btn-primary']) ?>
</div>

<table class="table mt-5">
    <tr>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    <?php foreach ($countries as $country) { ?>
        <tr>
            <td><?= $country->name ?></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
</table>
