<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Lista de Tarefas</title>
</head>

<body>

    <?php include_once("header.html"); ?>
        
    <div class="container">
        <a class="btn green" href="add.php">Nova Tarefa</a>
        <table id="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 55%;">Descrição</th>
                    <th>Prioridade</th>
                    <th>Concluída</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
    </div>

    <script src="ajax.js"></script>
    <script>
        window.onload = function() {
            read();
        }
    </script>

</body>

</html>