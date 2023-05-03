<?php
if (isset($_GET['email']) && isset($_GET['password'])) {
    $Email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
    $Pass = $_GET['password'];

    if ($Email === false) {
        echo 'Email inválido.';
        exit;
    }

    if (file_exists("EmailPassword.txt")) {
        try {
            $informacao = file_get_contents("EmailPassword.txt");
            $informacao_array = explode("\n", $informacao);

            $credenciais_validas = false;
            foreach ($informacao_array as $linha) {
                $registros = explode(":", $linha);
                if (count($registros) == 2 && $registros[0] == $Email && $registros[1] == $Pass) {
                    $credenciais_validas = true;
                    break;
                }
            }

            if ($credenciais_validas) {
                echo 'Entraste na tua conta.';
            } else {
                echo 'Credenciais inválidas.';
            }
        } catch (Exception $e) {
            echo 'Não foi possível ler o arquivo.';
        }
    } else {
        echo 'O arquivo não existe.';
    }
}

?>