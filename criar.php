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
    <title>Adicionar Pessoa</title>
</head>

<body>

    <?php
    $host = 'localhost';
    $dataBase = 'progweb_crudphp';
    $userName = 'root';
    $passWord = 'wllyssestavares@1995';

    $pdo = new PDO("mysql:host=$host; dbname=$dataBase", "$userName", "$passWord");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['nome'])) {
        $sql = $pdo->prepare("INSERT INTO `tab_pessoas` VALUES (?, ?, ?)");
        $sql->execute(array($_POST['nome'], $_POST['cpf'], $_POST['email']));

        header("location: /basico/atividade_crud/index.php");
    }
    ?>

    <div class="container">
        <div class="formBox mt-5">
            <div class="formBoxHeader mb-3">
                <h3>Preencha os dados abaixo</h3>
            </div>
            <div class="formBoxBody">
                <form method="POST">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-file-signature"></i>
                        </span>
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Nome" name="nome" id="inputNome" required>
                            <label for="inputNome">Nome</label>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="CPF" name="cpf" id="inputCpf" required>
                            <label for="inputCpf">CPF</label>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <div class="form-floating">
                            <input type="email" class="form-control" placeholder="E-mail" name="email" id="inputEmail" required>
                            <label for="inputEmail">E-mail</label>
                        </div>
                    </div>

                    <div class="buttons mt-3">
                        <a href="/basico/atividade_crud/index.php">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </a>
                        <button type="reset" class="btn btn-outline-danger">Limpar dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>