<?php
require_once '../controllers/wikisController.php';
require_once '../controllers/categorieController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visiteur</title>
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public/css/visiteur.css">
  <style>
    @media (max-width: 991.98px) {
      .navbar .d-lg-inline {
        display: none;
      }

      .navbar .d-lg-none {
        display: block;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <img src="../../public/images/Wikipedia_svg_logo.png" alt="" width="60px">
      <a class="navbar-brand text-light me-auto" href="#">Wiképidia</a>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <img src="../../public/images/Wikipedia_svg_logo.png" alt="" width="60px">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Wiképidia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#">Wikis</a>
            </li>
          </ul>
          <form method="get" class="d-lg-none">
            <div class="form-outline">
              <input id="search-input-mobile" type="search" name="search" class="form-control" placeholder="Search" />
            </div>
          </form>
          <a href="login.php" class="login_button d-lg-none">Login</a>

        </div>
      </div>

      <a href="login.php" class="login_button d-none d-lg-inline">Login</a>

      <form method="get" class="d-none d-lg-inline">
        <div class="form-outline" data-mdb-input-init>
          <input id="search-input" type="search" name="search" id="form1" class="form-control mx-3" placeholder="Search" />
        </div>
      </form>

      <button class="navbar-toggler pe-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </div>
  </nav>



  <section class="hero-section">
    <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column ">
      <h1>Wiképidia</h1>
      <h2>Wikipedia is a free-content online encyclopedia, written and maintained by a community of volunteers, collectively known as Wikipedians, through open collaboration and the use of wiki . Wikipedia is the largest and most-read reference work in history. </h2>
    </div>
  </section>

  <section>
    <h1 id="wiki" class="text-center mt-5">Nouveau Wikis </h1>
    <div class="d-flex flex-row align-items-center flex-wrap justify-content-center gap-3 mt-4">
      <?php foreach ($resultcat as $cat) { ?>
        <a href="index.php?id_cat=<?= $cat['id'] ?>">
          <button type="button" name="filter" class="btn btn-primary btn-rounded" data-mdb-ripple-init><?= $cat['name'] ?></button></a>
      <?php } ?>
    </div>
    <div class="  container mt-5">
      <div class=" ALL row">
        <?php foreach ($all as $wiik) { ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <p class="card-text">
              <div class="text-muted d-flex justify-content-between px-3 ">
                <div><i class="far fa-user"></i> <?= $wiik['name'] ?></div>
                <div><i class="fas fa-calendar-alt"></i> <?php echo (new DateTime($wiik['date_created']))->format('Y-m-d'); ?></div>
              </div>
              </p>
              <img class="card-img-top" src="<?= $wiik['imageWiki'] ?>" alt="Card image cap" height="200px">
              <div class="card-body">
                <h5 class="card-title"><?= $wiik['title'] ?></h5>
                <p class="card-text">
                  <?= substr($wiik['content'], 0, 200)  ?>...
                </p>
                <a href="singleWiki.php?single=<?= $wiik['idWiki'] ?>" class="btn btn-primary">Découvrez plus</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var searchInput = document.getElementById('search-input');

      searchInput.addEventListener('input', function() {
        var searchText = this.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector('.ALL').innerHTML = xhr.responseText;
          }
        }

        xhr.open('GET', 'search.php?searchText=' + searchText, true);
        xhr.send();
      });
    });
  </script>
</body>

</html>