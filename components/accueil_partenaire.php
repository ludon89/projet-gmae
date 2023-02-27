<div class="row gx-5 align-items-center">
    <div class="col-lg-6 order-lg-2">
        <div class="p-5"><img class="img-fluid" src="<?= $acteur["logo"] ?>" alt="..." /></div>
    </div>
    <div class="col-lg-6 order-lg-1">
        <div class="p-5">
            <h2 class="display-4"><?= $acteur['acteur'] ?></h2>
            <p><?= $acteur['description'] ?></p>
            <a class="btn btn-success" href="partenaire.php?id=<?= $acteur["id_acteur"] ?>">En Savoir +</a>
        </div>
    </div>
</div>
