<?php 
 $url = $_SERVER["PHP_SELF"];
 if(preg_match("class.Upload.php", "$url"))
 {
 header("Location: ../index.php");
 }

 
 class Upload
 {
 var $tipo;
 var $nome;
 var $tamanho;
 
 function Upload()
 {
 //Criando objeto
 }
 
 function UploadArquivo($arquivo, $pasta, $tipos)
 { 
 if(isset($arquivo))
 {
 $nomeOriginal = $arquivo["name"]; 
 $nomeFinal = md5($nomeOriginal . date("dmYHis"));
 $tipo = strrchr($arquivo["name"],".");
 $tamanho = $arquivo["size"];
 
 for($i=0;$i<=count($tipos);$i++)
 { 
 if($tipos[$i] == $tipo)
 {
 $arquivoPermitido=true;
 }
 }
 
 if($arquivoPermitido==false)
 {
 echo "Extensão de arquivo não permitido!!";
 exit;
 }
 
 if (move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeFinal . $tipo))
 { 
 $this->nome=$pasta . $nomeFinal . $tipo;
 $this->tipo=$tipo;
 $this->tamanho=number_format($arquivo["size"]/1024, 2) . "KB";
 return true; 
 }else{ 
 return false;
 } 
 }
 } 
 }
 ?>