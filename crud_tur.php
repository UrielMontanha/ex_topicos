<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gerenciamento </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<style>
    /* tamanho da fonte */
    .input-field label {
        font-size: 16px !important;
        /* Forçando o tamanho com !important */
    }



    /* cor label focus  */
    .input-field input:focus+label {
        color: black !important;
    }

    /* cor label underline focus  */
    .row .input-field input:focus {
        border-bottom: 1px solid black !important;
        box-shadow: 0 1px 0 0 black !important
    }

    .material-icons {
        color: white !important;
    }

    .material-icons.active {
        color: white !important;
    }

    /* cor checkbox */
    .checkbox-black[type="checkbox"].filled-in:checked+span:not(.lever):after {
        border: 2px solid #607d8b;
        background-color: #607d8b;
    }

    /* cores do radio */
    [type="radio"]:checked+span:after,
    [type="radio"].with-gap:checked+span:after {
        background-color: black;
    }

    [type="radio"]:checked+span:after,
    [type="radio"].with-gap:checked+span:before,
    [type="radio"].with-gap:checked+span:after {
        border: 2px solid black;
    }

    /*cores do select */
    ul.dropdown-content li>a,
    ul.dropdown-content li>span {
        color: #000000;
        /* Cor do texto das opções */
        /* background-color: #f1f1f1;  Cor de fundo das opções */
    }


    /* Altera a cor do fundo do cabeçalho do Datepicker */
    .datepicker-date-display {
        background-color: #00aaff;
        /* Cor do cabeçalho */
    }

    /* Altera a cor do texto da data selecionada no cabeçalho */
    .datepicker-date-display .year-text,
    .datepicker-date-display .date-text {
        color: #fff;
        /* Cor do texto da data no cabeçalho */
    }

    /* Altera a cor dos dias do calendário */
    .datepicker-table td div {
        color: #333;
        /* Cor dos dias */
    }

    /* Altera a cor de fundo dos dias ao passar o mouse */
    .datepicker-table td div:hover {
        background-color: #ffcc00;
        /* Cor de fundo ao passar o mouse */
        color: #fff;
    }

    /* Altera a cor do dia selecionado */
    .is-selected {
        background-color: #00aaff;
        /* Cor de fundo do dia selecionado */
        color: #fff;
        /* Cor do texto do dia selecionado */
    }

    /* Altera a cor dos botões de navegação (próximo e anterior) */
    .datepicker-controls .datepicker-prev,
    .datepicker-controls .datepicker-next {
        color: #00aaff;
        /* Cor das setas de navegação */
    }
</style>

<body>

    <?php include_once "header.php"; ?>

    <form onsubmit="return salvarTurismo(event);">

        <main class="container">

            <h1 class="center-align"> Inserir local turístico </h1>
            <div class="card-panel">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="id" name="id" type="text" class="validate" placeholder="ID">

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" name="nome" type="text" class="validate" placeholder="Nome do ponto turístico" pattern="^[A-Za-zÀ-ÿ\s]+$" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input id="descricao" name="descricao" type="text" class="validate" placeholder="Descrição" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input id="cidade" name="cidade" type="text" class="validate" placeholder="Cidade" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input id="pais" name="pais" type="text" class="validate" placeholder="País" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <p class="center-align">
                            <button class="btn waves-effect waves-light blue-grey darken-3" type="submit" name="action"><i class="material-icons right">send</i>Salvar</button>
                        </p>
                    </div>
                </div>

        </main>

    </form>



    <br><br><br> <!--------------------------------------------- Só para organização -------------------------------------------------------->



    <main class="container">
        <div class="card-panel">

            <h1 class="center-align"> Gerenciamento </h1>

            <a href="relatorio.php" class="blue-grey darken-3 waves-effect waves-light btn"><i class="material-icons right">add</i>Gerar relatório</a>

            <br><br><br>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do ponto turístico</th>
                        <th>Cidade</th>
                        <th cosplan="2">Opções</th>
                    </tr>
                </thead>
                <tbody id="turismos"></tbody>
            </table>

        </div>

    </main>

    <script src="script.js">
        document.addEventListener("DOMContentLoaded", () => {
        listarTodos();
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        });

    </script>

                        <!--------------------------------------------- Só para organização -------------------------------------------------------->

    <div id="modalConfirmacao" class="modal">
        <div class="modal-content">
        <h4>Confirmar exclusão</h4>
        <p>Você tem certeza que deseja excluir este local turístico?</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close red white-text darken-4 btn-flat">Cancelar</a>
            <a href="#!" id="confirmarExcluir" class="modal-close green white-text btn-flat">Confirmar</a>
        </div>
    </div>



    <br><br><br><br><br> <!--------------------------------------------- Só para organização -------------------------------------------------------->


    <footer class="page-footer #212121 grey darken-4">
        <div class="container">
            <div class="row">

                <div class="col l4 s12">
                    <h5 class="white-text">Endereço</h5>
                    <p class="grey-text text-lighten-4">Uruguaiana RS</p>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Turismo</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Fale conosco</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">As belezas naturais e a diversidade cultural do país</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Capitão América</a></li>
                    </ul>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Redes Sociais</h5>
                    <ul>
                        <div class="col s12 m2 offset-m3 center-aling"><img class="responsive-img" width="50px" src="imagens/email.png"></div>
                        <div class="col s12 m2 center-aling"><img class="responsive-img" width="50px" src="imagens/whatsapp.png"></div>
                        <div class="col s12 m2 center-aling"><img class="responsive-img" width="50px" src="imagens/telephone.png"></div>
                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                @1542343543
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>



</body>

</html>