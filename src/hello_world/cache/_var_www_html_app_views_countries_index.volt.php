<h4>Pays</h4>
<div class="row">
<?= $this->tag->linkTo(['countries/add', 'Ajouter un pays', 'class' => 'btn btn-primary']) ?>
</div>

<table class="table mt-5">
    <tr>
        <th>Name</th>
        <th>Short</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($countries as $country) { ?>
        <tr>
            <td><?= $country->name ?></td>
            <td><?= $country->short_name ?></td>
            <td><?= $country->created_at ?></td>
            <td><?= $country->updated_at ?></td>
            <td><a href="/countries/delete/<?= $country->id ?>"><button>Effacer</button></a></td>
        </tr>
    <?php } ?>
</table>
