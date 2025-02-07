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

            <h1 class="center-align"> Gerenciamento </h1>
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

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do ponto turistico</th>
                        <th>Cidade</th>
                        <th cosplan="2">Opções</th>
                    </tr>
                </thead>
                <tbody id="turismos"></tbody>
            </table>
        
        </div>

    </main>

    <script src="script.js"></script>



    <!--------------------------------------------- Só para organização -------------------------------------------------------->



</body>

</html>