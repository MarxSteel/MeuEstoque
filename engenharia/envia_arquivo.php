<html>

<head>

<title>Envia arquivo e descompacta online</title>

</head>

<body>

<?php

$nome_temporario=$_FILES["Arquivo"]["tmp_name"]; // Variável $nome_temporario recebe o arquivo vindo do formulário

$nome_real=$_FILES["Arquivo"]["name"]; // Variável $nome_real recebe o arquivo vindo do formulário
$novonome = md5($nome_real);

copy($nome_temporario,"firmware/" . $novonome . ".zip"); // Copiando a variável $nome_temporario para a variável $nome_real

echo "$nome_real"; // Mostrando o nome do arquivo

echo "<br>"; // Pulando uma linha


?>

</body>

</html>