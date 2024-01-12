<?php
$wikis = new Wiki();
$auteur = new Admin();


?>

<div id="resultat">
    <h1 class="text-center text-4xl mt-4">Wiki Récent</h1>
    <?php foreach ($wikis->afficheWikis() as $wiki) : ?>
        <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
            <a rel="noopener noreferrer" href="index.php?page=single" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                <!-- Adjust the content based on your database columns -->
                <img src="<?= $wiki['imageWiki']; ?>" alt="" class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
                <div class="p-6 space-y-2 lg:col-span-5">
                    <p class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline"><?= $wiki['title']; ?></p>
                    <span class="text-xs dark:text-gray-400"><?= $wiki['date_created']; ?></span>
                    <span class="text-xs dark:text-gray-400"><?= $wiki['auteur_id']; ?></span>
                    <p><?= $wiki['content']; ?></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>