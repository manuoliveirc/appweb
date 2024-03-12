<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, desctipo FROM tipos ORDER BY desctipo ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Cadastar comentário</p>
        </div>
        <form action="addComent.php" method="post">
            <div class="form-group">
                <label for="descricao">Comentário: </label>
                <input type="text" class="form-control" name="descricao" id="descricao" required minlength="5" placeholder="Digite seu comentário">
            </div>
            <div class="form-group">
                <label for="selectTipo">Selecione o tipo de refeição</label>
                <select class="form-control" name="selectTipo" id="selectTipo" required>

                  <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['desctipo'] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
              </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>
    </div>
    <div class="container">
        <div class="card-footer">
            <p>Todos os direitos reservados a &copy;Copyright</p>
        </div>
    </div>
</body>
</html>