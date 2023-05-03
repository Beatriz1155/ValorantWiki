<?php
$ficheiro = "nomes.txt";
$ficheiro1 = "EmailPassword.txt";
$nomes = file_get_contents($ficheiro);
$nomes_array = explode("\n", $nomes);

$nome_a_verificar = $_POST['username'];
$email = $_POST['email'];
$password = $_POST["password"];

foreach ($nomes_array as $nome)
{
    if($nome == $nome_a_verificar)
    {
        echo "O username já esta em uso.";
        break;
    }else
    {
        $fp = fopen($ficheiro, "a+");
        fwrite($fp, $nome_a_verificar.";\n");
        $fp1 = fopen($ficheiro1, "a+");
        fwrite($fp1, $email."; ".$password.";\n");
        fclose($fp);  
        fclose($fp1);
    }
}
?>