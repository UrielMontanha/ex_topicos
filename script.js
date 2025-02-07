document.addEventListener("DOMContentLoaded", () => {
    listarTodos();
});

function listarTodos() {
    fetch("listar.php",
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(turismos => inserirTurismos(turismos))
        .catch(error => console.log(error));
}

function inserirTurismos(turismos) {
    for (const turismo of turismos) {
        inserirTurismo(turismo);
    }
}

function inserirTurismo(turismo) {
    
    let tbody = document.getElementById('turismos');
    
    let tr = document.createElement('tr');
    
    let tdId = document.createElement('td');
    tdId.innerHTML = turismo.id;
    
    let tdNome = document.createElement('td');
    tdNome.innerHTML = turismo.nome;
    
    let tdDescricao = document.createElement('td');
    tdDescricao.innerHTML = turismo.descricao;
    
    let tdCidade = document.createElement('td');
    tdCidade.innerHTML = turismo.cidade;
    
    let tdPais = document.createElement('td');
    tdPais.innerHTML = turismo.pais;
    
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaTurismo, false);
    btnAlterar.id = turismo.id;
    btnAlterar.className = "btn waves-effect waves-light light-blue darken-4 white-text";
    let iconeAlterar = document.createElement('i');
    iconeAlterar.innerHTML = "edit";
    iconeAlterar.className = "material-icons right";
    btnAlterar.appendChild(iconeAlterar);
    tdAlterar.appendChild(btnAlterar);

    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id = turismo.id;
    btnExcluir.className = "btn waves-effect waves-light red darken-4 white-text";
    btnExcluir.innerHTML = "Excluir";
    let iconeExcluir = document.createElement('i');
    iconeExcluir.innerHTML = "delete";
    iconeExcluir.className = "material-icons right";
    btnExcluir.appendChild(iconeExcluir);
    tdExcluir.appendChild(btnExcluir);
    
    
    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdCidade);
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);
    tbody.appendChild(tr);
}

function excluir(evt) {
    let id = evt.currentTarget.id;
    let excluir = confirm("Você tem certeza que deseja excluir estas informações?");
    if (excluir == true) {
        fetch('excluir.php?id=' + id,
            {
                method: "GET",
                headers: { 'Content-Type': "application/json; charset=UTF-8" }
            }
        )
            .then(response => response.json())
            .then(retorno => excluirTurismo(retorno, id))
            .catch(error => console.log(error));
    }
}

function excluirTurismo(retorno, id) {
    if (retorno == true) {
        let tbody = document.getElementById('turismos');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarTurismo(turismo) {
    let tbody = document.getElementById('turismos');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == turismo.id) {
            tr.children[1].innerHTML = turismo.nome;
            tr.children[2].innerHTML = turismo.descricao;
            tr.children[3].innerHTML = turismo.cidade;
            tr.children[4].innerHTML = turismo.pais;
        }
    }
}

function buscaTurismo(evt) {
    let id = evt.currentTarget.id;
    fetch('buscaTurismo.php?id=' + id,
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(turismo => preencheForm(turismo))
        .catch(error => console.log(error));
}

function preencheForm(turismo) {
    let inputIDTurismo = document.getElementsByName("id")[0];
    inputIDTurismo.value = turismo.id;
    let inputNome = document.getElementsByName("nome")[0];
    inputNome.value = turismo.nome
    let inputDescricao = document.getElementsByName("descricao")[0];
    inputDescricao.value = turismo.descricao;
    let inputCidade = document.getElementsByName("cidade")[0];
    inputCidade.value = turismo.cidade;
    let inputPais = document.getElementsByName("pais")[0];
    inputPais.value = turismo.pais;
}

function salvarTurismo(event) {
    // parar o comportamento padrão do form
    event.preventDefault();
    // obtém o input id_usuario
    let inputIDTurismo = document.getElementsByName("id")[0];
    // pega o valor do input id_usuario
    let id = inputIDTurismo.value;

    let inputNome = document.getElementsByName("nome")[0];
    let nome = inputNome.value;
    let inputDescricao = document.getElementsByName("descricao")[0];
    let descricao = inputDescricao.value;
    let inputCidade = document.getElementsByName("cidade")[0];
    let cidade = inputCidade.value;
    let inputPais = document.getElementsByName("pais")[0];
    let pais = inputPais.value;

    if (id == "") {
        cadastrar(id, nome, descricao, cidade, pais);
    } else {
        alterar(id, nome, descricao, cidade, pais);
    }
    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id, nome, descricao, cidade, pais) {
    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                nome: nome, 
                descricao: descricao,
                cidade: cidade, 
                pais: pais
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(turismo => inserirTurismo(turismo))
        .catch(error => console.log(error));
}

function alterar(id, nome, descricao, cidade, pais) {
    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                nome: nome, 
                descricao: descricao,
                cidade: cidade, 
                pais: pais
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(turismo => alterarTurismo(turismo))
        .catch(error => console.log(error));
}