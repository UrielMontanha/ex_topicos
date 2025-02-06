<?php
session_start();

$pagina_Corrente = basename($_SERVER['SCRIPT_NAME']);
?>

<header>
    <div class="navbar-fixed">
        <nav class="grey darken-4">
            <div class="nav-wrapper">

                <!-- Logo -->
                <a href="#" class="brand-logo">TURISMO</a>

                <!-- Menu para telas grandes -->
                <ul class="right hide-on-med-and-down">

                    <li class="<?php if ($pagina_Corrente == 'index.php') {
                                    echo 'active';
                                } ?>">
                        <a href="index.php">Início</a>
                    </li>

                    <li style="margin-right: 80px;" class="<?php if ($pagina_Corrente == 'crud_tur.php') {
                                                                echo 'active';
                                                            } ?>">
                        <a href="crud_tur.php">Gerenciar locais</a>
                    </li>

                    <!-- Menu mobile -->
                    <ul id="nav-mobile" class="sidenav">
                        <li class="<?php if ($pagina_Corrente == 'index.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="index.php">Início</a>
                        </li>

                        <li class="<?php if ($pagina_Corrente == 'crud_tur.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="crud_tur.php">Gerenciar locais</a>
                        </li>

                    </ul>

                    <!-- Hamburger -->
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
            </div>
        </nav>
    </div>

</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    // Inicializa o Sidenav para o menu mobile
    $(document).ready(function() {
        $('.sidenav').sidenav();
    });
</script>