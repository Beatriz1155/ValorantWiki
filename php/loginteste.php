<?php
if (file_exists("EmailPassword.txt"))
{
    $informacao = file_get_contents("EmailPassword.txt");
    $informacao_array = explode("\n", $informacao);
    
    $registros = array();
    $registros[] = array('email' => $informacao_array[0], 'password' => $informacao_array[1]);

    $Email = $_GET['email'];
    $Pass = $_GET['password'];

    foreach($registros as $registro)
    {
        if($registro['email'] == $Email && $registro['password'] == $Pass)
        {
            echo 'Entraste na tua conta.';
            break;

        }
        else
        {
            echo 'N Entraste na tua conta.';
            break;
        }
       
    }
}
?>