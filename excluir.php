<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php
    $host = 'localhost';
    $dataBase = 'progweb_crudphp';
    $userName = 'root';
    $passWord = 'wllyssestavares@1995';

    $pdo = new PDO("mysql:host=$host; dbname=$dataBase", "$userName", "$passWord");
    $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['cpf_pessoa'])) {
        $cpf_pessoa = (int) $_GET['cpf_pessoa'];
        $pdo->exec("DELETE FROM tab_pessoas WHERE cpf = $cpf_pessoa");
        // echo "
        //     <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        //         <strong>Usuário deletado com sucesso!</strong>
        //         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        //     </div>
        // ";
        header("location: /basico/atividade_crud/index.php");
    }
 ?>