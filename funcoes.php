    <?php


    function validacoes()
    {
        require './conexao.php';
        $_SESSION['msg'] = false;
        $_SESSION['success'] = false;
        if (isset($_POST['confirmar'])) {

            $coro = $_POST['coro'];
            $orgao_pertence = $_POST['orgao_pertence'];
            $endereco_coro = $_POST['endereco_coro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
            $maestro = $_POST['maestro'];
            $fone_maestro = $_POST['fone_maestro'];
            $email_maestro = $_POST['email_maestro'];
            $coordenador = $_POST['coordenador'];
            $fone_coord = $_POST['fone_coord'];
            $email_coord = $_POST['email_coord'];
            $coro_txt = $_POST['coro_txt'];
            $maestro_txt = $_POST['maestro_txt'];

            // Primarios
            if (empty($coro)) {
                $_SESSION['msg'] = "Preencha o campo coro";
            } else if (empty($orgao_pertence)) {
                $_SESSION['msg'] = "Preencha o campo Orgão";
            } else if (empty($endereco_coro)) {
                $_SESSION['msg'] = "Preencha o campo Endereço";
            } else if (empty($cidade)) {
                $_SESSION['msg'] = "Preencha o campo Cidade";
            } else if (empty($estado)) {
                $_SESSION['msg'] = "Preencha o campo Estado";
            } else if (empty($pais)) {
                $_SESSION['msg'] = "Preencha o campo Pais";
            }
            // Primarios

            // Maestro
            else if (empty($maestro)) {
                $_SESSION['msg'] = "Preencha o campo Maestro";
            } else if (empty($fone_maestro)) {
                $_SESSION['msg'] = "Preencha o campo Telefone do Maestro";
            } else if (!filter_var($email_maestro, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['msg'] = "Preencha o campo Email do Maestro";
            }
            // Maestro

            // Coordenador
            else if (empty($coordenador)) {
                $_SESSION['msg'] = "Preencha o campo Coordenador";
            } else if (empty($fone_coord)) {
                $_SESSION['msg'] = "Preencha o campo Telefone do Coordenador";
            } else if (!filter_var($email_coord, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['msg'] = "Preencha o campo Email do Coordenador";
            }
            // Coordenador

            else if (empty($coro_txt)) {
                $_SESSION['msg'] = "Preencha o campo Historico do coro";
            } else if (empty($maestro_txt)) {
                $_SESSION['msg'] = "Preencha o campo Historico do maestro";
            } else {
                $db->query("INSERT INTO inscricao (coro, orgao_pertence, endereco_coro, cidade, estado, pais, maestro, telefone, email, coordenador, telefone_coordenador, email_coordenador, historico_coro, historico_maestro) VALUES ('$coro', '$orgao_pertence', '$endereco_coro', '$cidade', '$estado', '$pais', '$maestro', '$fone_maestro', '$email_maestro', '$coordenador', '$fone_coord', '$email_coord', '$coro_txt', '$maestro_txt')") or die($db->error);
                echo '<script>';
                echo 'window.location.href = "cadastrado.php";';
                echo '</script>';

              
            }
        }
    }
    // include('./conexao.php');
    // $erro = false;

    // // Inputs primarios
    // $coro = $_POST['coro'];
    // $orgao = $_POST['orgao_pertence'];
    // $endereco = $_POST['endereco_coro'];
    // $cidade = $_POST['cidade'];
    // $estado = $_POST['estado'];
    // $pais = $_POST['pais'];
    // // Inputs primarios

    // // Maestro
    // $maestro = $_POST['maestro'];
    // $telefone_maestro = $_POST['fone_maestro'];
    // $email = $_POST['email_maestro'];
    // // Maestro

    // // Coordenador
    // $coordenador = $_POST['coordenador'];
    // $telefone_coordenador = $_POST['fone_coord'];
    // $email_coord = $_POST['email_coord'];
    // // Coordenador

    // // txt
    // $coro_txt = $_POST['coro_txt'];
    // $maestro_txt = $_POST['maestro_txt'];
    // // txt

    // // Primarios
    // if (empty($coro)) {
    //     $erro = "Preencha o campo Coro!";
    // } else if (empty($orgao)) {
    //     $erro = "Preencha o campo Orgão!";
    // } else if (empty($endereco)) {
    //     $erro = "Preencha o campo Endereço!";
    // } else if (empty($cidade)) {
    //     $erro = "Preencha o campo Cidade!";
    // } else if (empty($estado)) {
    //     $erro = "Preencha o campo Estado!";
    // } else if (empty($pais)) {
    //     $erro = "Preencha o campo Pais!";
    // }
    // // Primarios

    // // Maestro
    // else if (empty($maestro)) {
    //     $erro = "Preencha o campo maestro!";
    // } else if (empty($telefone_maestro)) {
    //     $erro = "Preencha o campo telefone do maestro!";
    // } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $erro = "Campo e-mail do Maestro vazio, ou de forma inváldia!";
    // }
    // // Maestro

    // // Coordenador
    // else if (empty($coordenador)) {
    //     $erro = "Preencha o campo Coordenador!";
    // } else if (empty($telefone_coordenador)) {
    //     $erro = "Preencha o campo telefone do Coordenador!";
    // } else if (!filter_var($email_coord, FILTER_VALIDATE_EMAIL)) {
    //     $erro = "Campo e-mail do Coordenador vazio, ou de forma inváldia!";
    // } else if (empty($coro_txt)) {
    //     $erro = "Campo e-mail do Historico de coro vazio!";
    // } else if (empty($maestro_txt)) {
    //     $erro = "Campo e-mail do Historico de maestro vazio!";
    // } else {

    //     unset($_POST);
    //     header('Location: cadastrado.php');    
    // }
    // Coordenador

    //     if ($erro) :     

    //         <div class="alert alert-danger" role="alert">
    //             <?php //echo $erro; 
    //         </div> -->
    // <?php //endif;
    //     return;
    // }

    // function errors($erro)
    // {
    // }
    ?>