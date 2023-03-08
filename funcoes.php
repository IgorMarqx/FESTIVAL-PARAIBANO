<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/responsivo.css">
    <title>Ficha de inscrição</title>
</head>

<body>
    <div class="header">
        <img src="./assets/imgs/company-yellow.jpg" alt="" srcset="">
        <h1>FEPAC</h1>
    </div>
    <?php
    function validacoes()
    {
        $erro = false;
        $success = "Formulário enviado com sucesso!";

        include('./conexao.php');
        // Inputs primarios
        $coro = $_POST['coro'];
        $orgao = $_POST['orgao_pertence'];
        $endereco = $_POST['endereco_coro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        // Inputs primarios

        // Maestro
        $maestro = $_POST['maestro'];
        $telefone_maestro = $_POST['fone_maestro'];
        $email = $_POST['email_maestro'];
        // Maestro

        // Coordenador
        $coordenador = $_POST['coordenador'];
        $telefone_coordenador = $_POST['fone_coord'];
        $email_coord = $_POST['email_coord'];
        // Coordenador

        // txt
        $coro_txt = $_POST['coro_txt'];
        $maestro_txt = $_POST['maestro_txt'];
        // txt

        // Primarios
        if (empty($coro)) {
            $erro = "Preencha o campo Coro!";
        } else if (empty($orgao)) {
            $erro = "Preencha o campo Orgão!";
        } else if (empty($endereco)) {
            $erro = "Preencha o campo Endereço!";
        } else if (empty($cidade)) {
            $erro = "Preencha o campo Cidade!";
        } else if (empty($estado)) {
            $erro = "Preencha o campo Estado!";
        } else if (empty($pais)) {
            $erro = "Preencha o campo Pais!";
        }
        // Primarios

        // Maestro
        else if (empty($maestro)) {
            $erro = "Preencha o campo maestro!";
        } else if (empty($telefone_maestro)) {
            $erro = "Preencha o campo telefone do maestro!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "Campo e-mail do Maestro vazio, ou de forma inváldia!";
        }
        // Maestro

        // Coordenador
        else if (empty($coordenador)) {
            $erro = "Preencha o campo Coordenador!";
        } else if (empty($telefone_coordenador)) {
            $erro = "Preencha o campo telefone do Coordenador!";
        } else if (!filter_var($email_coord, FILTER_VALIDATE_EMAIL)) {
            $erro = "Campo e-mail do Coordenador vazio, ou de forma inváldia!";
        } else if (empty($coro_txt)) {
            $erro = "Campo e-mail do Historico de coro vazio!";
        } else if (empty($maestro_txt)) {
            $erro = "Campo e-mail do Historico de maestro vazio!";
        } else {
            $db->query("INSERT INTO inscricao (coro, orgao_pertence, endereco_coro, cidade, estado, pais, maestro, telefone, email, coordenador, telefone_coordenador, email_coordenador, historico_coro, historico_maestro) VALUES ('$coro', '$orgao', '$endereco', '$cidade', '$estado', '$pais', '$maestro', '$telefone_maestro', '$email', '$coordenador', '$telefone_coordenador', '$email_coord', '$coro_txt', '$maestro_txt')") or die($db->error);
            if ($success) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
            <?php endif;
            unset($_POST);
        }
        // Coordenador

        if ($erro) :     ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
    <?php endif;
        return;
    }

// function errors($erro)
// {
// }
