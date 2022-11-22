function add() {

    var xhr = new XMLHttpRequest();
    var url = "ajax.php";
    
    var form = document.getElementById('form');

    form.onsubmit = function(e) {
        e.preventDefault();
    }

    var descricao = document.getElementById('descricao').value;
    var prioridade = document.getElementById('prioridade').value;
    var concluida = document.getElementById('concluida').value;
    var params = 'descricao=' + descricao + '&prioridade=' + prioridade + '&concluida=' + concluida + '&q=' +'add';
    
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.status == 200) {
            var json = JSON.parse(this.responseText);
            var tabela = document.getElementById("tabela");
            if(json > 0) {
                window.location.href = "index.php";
            }
            else {
                alert('Erro ao adicionar tarefa');
            }
        }
    }
    xhr.send(params);


}

function read() {

    var xhr = new XMLHttpRequest();
    var url = "ajax.php";

    var params = 'q=read';
    xhr.open('POST', url, true);

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.status == 200) {
            var tarefas = JSON.parse(this.responseText);
            var tabela = document.getElementById("tabela");
            if(tarefas != null) {
                tarefas.forEach(function(tarefa, index) {                    
                    tabela.innerHTML +=
                        `<tr class='${tarefa['concluida'] === 'SIM' ? 'done' : ''}'>`+
                            `<td>${tarefa['id']}</td>`+
                            `<td>${tarefa['descricao']}</td>`+
                            `<td>${tarefa['prioridade']}</td>`+
                            `<td>${tarefa['concluida']}</td>`+
                            `<td colspan="2">`+
                                `<a class="btn-sm blue" onclick="edit(${tarefa['id']});">Editar</a>`+
                                `<a class="btn-sm red" onclick="deleteTask(${tarefa['id']});">Excluir</a>`+
                            `</td>`+
                        `</tr>`;
                });
            }
        }            
    }

    xhr.send(params);

}

function editTask() {
    
    var xhr = new XMLHttpRequest();
    var url = "ajax.php";
    
    var form = document.getElementById('form');

    form.onsubmit = function(e) {
        e.preventDefault();
    }

    var id = document.getElementById('id').value;
    var descricao = document.getElementById('descricao').value;
    var prioridade = document.getElementById('prioridade').value;
    var concluida = document.getElementById('concluida').value;
    var params = 'id=' + id + '&descricao=' + descricao + '&prioridade=' + prioridade + '&concluida=' + concluida + '&q=' +'edit';
    
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.status == 200) {
            var json = JSON.parse(this.responseText);
            if(json === true) {
                window.location.href = "index.php";
            }
            else {
                alert('Erro ao editar tarefa');
            }
        }
    }
    xhr.send(params);

}

function deleteTask(id) {
    
    var confirm = window.confirm('Deletar tarefa?');

    if(confirm) {
        var xhr = new XMLHttpRequest();
        var url = "ajax.php";
    
        var params = 'id=' + id + '&q=' +'del';
        
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if(this.status == 200) {
                var json = JSON.parse(this.responseText);
                if(json > 0) {
                    window.location.href = "index.php";
                }
                else {
                    alert('Erro ao deletar tarefa');
                }
            }
        }
        xhr.send(params);
    }

}

function edit(id) {
    window.location.href = "edit.php?id=" + id;
}

function getTask(id) {

    var xhr = new XMLHttpRequest();
    var url = "ajax.php";
    
    var params = 'id=' + id + '&q=' +'get';
    
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.status == 200) {
            var json = JSON.parse(this.responseText);
            if(json == null) {
                window.location.href = "index.php";
            }
            else {
                document.getElementById("descricao").value = json["descricao"];
                document.getElementById("prioridade").value = json["prioridade"];
                document.getElementById("concluida").value = json["concluida"];
            }
        }
    }
    xhr.send(params);

}