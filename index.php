<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&amp;display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8ff11ff9ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <title>CRUD em PHP</title>
  </head>

  <body>

    <div class="header bg-primary p-3">
      <header>
        <h1 class="text-light fw-bold">CRUD em PHP</h1>
      </header>
    </div>

    <div class="container">
      <div class="mt-5 d-flex align-items-center justify-content-between">
        <h2>Lista de pessoas cadastradas</h2>
        <a class="btn btn-primary" href="/basico/atividade_crud/criar.php" role="button">Adicionar</a>
      </div>
      
    <?php
      $host = 'localhost';
      $dataBase = 'progweb_crudphp';
      $userName = 'root';
      $passWord = 'wllyssestavares@1995';

      $pdo = new PDO("mysql:host=$host; dbname=$dataBase", "$userName", "$passWord");
      $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $sql = $pdo->prepare("SELECT * FROM `tab_pessoas`");
      $sql->execute();
      $pessoas = $sql->fetchAll();
        
      echo "<div class='table-responsive mt-3'>";
      echo "<table class= 'table table-hover'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>CPF</th>";
      echo "<th>E-mail</th>";
      echo "<th class='text-center'>Ações</th>";
      echo "</tr>";
      echo "</thead>";

      echo "<tbody>";

      foreach($pessoas as $pessoa) {
        echo "<tr>";
        echo "<td>" . $pessoa['nome'] . "</td>";
        echo "<td>" . $pessoa['cpf'] . "</td>";
        echo "<td>" . $pessoa['email'] . "</td>";
        echo '<td class="text-center">
                <a href="alterar.php?cpf_pessoa='. $pessoa['cpf'] . '">
                  <button class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                </a>
                <a href="excluir.php?cpf_pessoa=' . $pessoa['cpf'] . '">
                  <button class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </a>
              </td>';
        echo "</tr>";
      }

      echo "</tbody>";
      echo "</div>";
    ?>
    </div>
  </body>
</html>