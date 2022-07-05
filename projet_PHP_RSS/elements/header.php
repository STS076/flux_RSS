<header class="background">

    <nav class="navbar navbar-expand-lg shadow-5-strong mb-4 pb-4">
        <div class="container-fluid">
            <a class="navbar-brand me-5 pe-5" href="home.php"><img class="coeur" src="../public/img/icone.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupported" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupported">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item ">
                        <a href="home.php" class="nav-link  fw-bold  active titre me-5">Accueil</a>

                    </li>
                    <li class="nav-item">

                        <?php if (isset($_SESSION['user'])) {  ?>
                            <a class="nav-link fw-bold active titre me-5 " href="logout.php">
                                Deconnexion
                            </a>
                        <?php } else {  ?>
                            <a class="nav-link fw-bold active titre me-5 " href="login.php">
                                S'indentifier
                            </a>
                        <?php   }
                        ?>

                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link  fw-bold  active titre me-5">Abonnez-vous</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold  active titre me-5" href="settings.php">Fil sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold  active titre" href="#" tabindex="-1" aria-disabled="true">Résultats</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="pb-4">
        <h1 class="text-center py-4 ">TITRE DE NOTRE SITE</h1>
    </div>

    <nav class="navbar navbar-expand-lg shadow-5-strong recherche p-4 mt-4">
        <div class="container-fluid ">
            <a class="navbar-brand " href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active titre box mx-3 px-4 fw-bold text-dark" href="#">Tour de France<i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active titre box mx-3 px-4 fw-bold text-dark" href="#">Jeux Olympiques <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active titre box mx-3 px-4 fw-bold text-dark" href="#">Sports extrêmes<i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active titre box mx-3 px-4 fw-bold text-dark" href="#">Voile<i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active titre box mx-3 px-4 fw-bold text-dark" href="#">Sports d'hiver<i class="bi bi-chevron-down"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</header>