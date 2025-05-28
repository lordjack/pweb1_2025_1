<?php
include "./db.class.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<?php

$db = new db('usuario');
$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {

    //Sempre preserva os dados do POST para exibição
    $data = (object) $_POST; //converte o vetor para objeto

    //função trim remove espaços em branco do inicio e fim da string, 
    if (empty(trim($_POST['nome']))) {
        $errors[] = "<li>O nome é obrigatorio</li>";
    }

    if (empty(trim($_POST['email']))) {
        $errors[] = "<li>O email é obrigatorio</li>";
    }

    if (empty(trim($_POST['cpf']))) {
        $errors[] = "<li>O cpf é obrigatorio</li>";
    }

    if (empty(trim($_POST['telefone']))) {
        $errors[] = "<li>O telefone é obrigatorio</li>";
    }

    if (empty($errors)) {
        try {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Registro criado com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Registro atualizado com sucesso!";
            }
            echo "<script>
                    setTimeout(
                        ()=> window.location.href = 'UsuarioList.php', 1500
                    )
                </script>";
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }

}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

//serve para depurar o codigo, ver o que tem dentro da variavel
//var_dump($data, $_GET['id']);
//para a execução do codigo na linha onde foi colocada
//exit;
?>

<body>
    <div class="container mt-5">
        <div class="row">

            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <strong>Erro ao salvar</strong>
                    <ul class="mb-0">
                        <?php foreach ($errors as $error) { ?>
                            <?= $error ?>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php if (!empty($success)) { ?>
                <div class="alert alert-success">
                    <strong>
                        <?= $success ?>
                    </strong>
                </div>
            <?php } ?>

            <h3>Formulário Usuário</h3>
            <!-- http://localhost/pweb1_2025_1/php/site/admin/UsuarioForm.php -->
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" value="<?php echo $data->nome ?? '' ?>" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $data->email ?? '' ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">CPF</label>
                        <input type="text" name="cpf" value="<?= $data->cpf ?? '' ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Telefone</label>
                        <input type="text" name="telefone" value="<?= $data->telefone ?? '' ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <button type="submit" class="btn btn-primary">
                            <?= !empty($_GET['id']) ? "Editar" : "Salvar" ?>
                        </button>
                        <a href="./UsuarioList.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>