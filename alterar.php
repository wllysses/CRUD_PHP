<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php
    $host = 'localhost';
    $dataBase = 'progweb_crudphp';
    $userName = 'root';
    $passWord = 'wllyssestavares@1995';

    $pdo = new PDO("mysql:host=$host; dbname=$dataBase", "$userName", "$passWord");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['cpf_pessoa'])) {
        $cpf_pessoa = (int) $_GET['cpf_pessoa'];
        $sql = $pdo->prepare("SELECT * FROM tab_pessoas WHERE cpf = $cpf_pessoa");
        $sql->execute();
        $pessoas = $sql->fetchAll();

        foreach ($pessoas as $pessoa) {
            echo "<div class='container mt-5'>";
            echo "<form method='POST'>";
            echo "<h2>Atualizar dados</h2>";
            echo "<div class='form-floating mt-3'>";
            echo "<input type='text' placeholder='Nome' id='inputNome' class='form-control' name='nome' value='" . $pessoa['nome'] . "'>";
            echo "<label for='inputNome' class='form-label'>Nome</label>";
            echo "</div>";
            echo "<div class='form-floating mt-3'>";
            echo "<input type='text' placeholder='CPF' id='inputCpf' class='form-control' name='cpf' value='" . $pessoa['cpf'] . "'>";
            echo "<label for='inputCpf' class='form-label'>CPF</label>";
            echo "</div>";
            echo "<div class='form-floating mt-3'>";
            echo "<input type='email' placeholder='E-mail' id='inputEmail' class='form-control' name='email' value='" . $pessoa['email'] . "'>";
            echo "<label for='inputEmail' class='form-label'>E-mail</label>";
            echo "</div>";
            echo "<div class='buttons mt-3'>";
            echo "<input type='submit' class='btn btn-primary' value='Atualizar'>";
            echo "<input type='reset' class='btn btn-danger ms-1' value='Limpar Dados'>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
    }

    if (isset($_POST['nome'])) {
        $sql = $pdo->prepare("UPDATE tab_pessoas SET nome = ?, cpf = ?, email = ? WHERE cpf = $cpf_pessoa");
        $sql->execute(array($_POST['nome'], $_POST['cpf'], $_POST['email']));
        echo "
            <div class='container'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Usuário atualizado com sucesso!</strong>
                </div>
                <a href='index.php' class='btn btn-secondary'>Voltar</a>
            </div>

        ";
    }
?>