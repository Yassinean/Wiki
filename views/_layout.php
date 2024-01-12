<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- component -->
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <!-- Add this in your HTML file, preferably in the head section -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title><?= ucfirst($page) ?></title>
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
</head>

<body class="dark:bg-gray-800 dark:text-gray-100 relative">
    <!-- <h1><= //ucfirst($page) ?> View</h1> -->
    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>
    <footer></footer>
    <script src="<?= PATH ?>assets/js/main.js"></script>
    </body>

</html>