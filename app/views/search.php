<?php 
require '../controllers/wikisController.php';
?>
<div class="row">
        <?php foreach ($search as $search) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <p class="card-text">
                        <div class="text-muted d-flex justify-content-between px-3 ">
                            <div><i class="far fa-user"></i> <?= $search['name'] ?></div>
                            <div><i class="fas fa-calendar-alt"></i> <?php echo (new DateTime($search['date_created']))->format('Y-m-d'); ?></div>
                        </div>
                    </p>
                    <img class="card-img-top" src="<?= $search['imageWiki'] ?>" alt="Card image cap" height="200px" >
                    <div class="card-body">
                        <h5 class="card-title"><?= $search['title'] ?></h5>
                        <p class="card-text">
                        <?= substr($search['content'],0,200)  ?>...
                        </p>
                        <a href="singleWiki.php?single=<?= $search['idWiki'] ?>" class="btn btn-dark">Découvrez plus</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>