<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Nova Tarefa</title>
</head>

<body>

    <?php require_once("header.html"); ?>

    <div class="container">
        <form method="POST" action="ajax.php" id="form">
                <input type="text" id="descricao" name="descricao" placeholder="Descrição da tarefa" 
                    maxlength="50" onblur="this.value=this.value.trim();" required />
                <select id="prioridade" name="prioridade" required>
                    <option value="">Prioridade da tarefa</option>
                    <option>BAIXA</option>
                    <option>MÉDIA</option>
                    <option>ALTA</option>
                </select>
                <select id="concluida" name="concluida" required>
                    <option value="">Tarefa concluída?</option>
                    <option>SIM</option>
                    <option>NÃO</option>
                </select>
                <button type="submit" class="btn blue" onclick="add();">Adicionar</button>
        </form>        
    </div>

    <script src="ajax.js"></script>

</body>

</html>