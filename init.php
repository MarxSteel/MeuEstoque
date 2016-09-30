<?php

// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost:8889');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'estoque');

function dbcon()
{
    @mysql_connect("localhost:8889", "root", "root") or die(mysql_error());
    @mysql_select_db("estoque") or die(mysql_error());
}
$host = "localhost:8889";
$user = "root";
$pass = "root";
$banco = "estoque";
$versao = "3.3.5";

//AQUI EU DECLARO A FUNÇÃO DE CHAMAR PORCENTAGEM
// Y É X% DE Z
function porcentagem_nnx ($parcial, $porcentagem ) {
 return ($parcial / $porcentagem) * 100;
}


// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

$Titulo = "Henry Controle de Estoque";
// MENSAGENS DE PROTOCOLO
 //ERRO AO CRIAR SOCKET
 $M000 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          NÃO FOI POSSÍVEL CRIAR SOCKET</div>';
 // ERRO AO ENVIAR EMPREGADOR
 $M001 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível Empregador, o relógio não está na rede ou não responde.</div>';
  // ERRO AO ENVIAR INFORMAÇÃO AO DISPOSITIVO
  $M002 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível enviar, o relógio não está na rede ou não responde.</div>';

  //ERRO AO ENVIAR DATA E HORA
  $M003 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível Data/ Hora, o relógio não está na rede ou não responde.</div>';

 //ERRO AO ENVIAR DATA E HORA
  $M004 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível Data/ Hora, o relógio não está na rede ou não responde.</div>';

  $M005 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível cadastrar o equipamento.</div>';

  //ERRO AO CONECTAR COM O EQUIPAMENTO
  $M006 = ' <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-alert"></i> Atenção!</h4>
          Não foi possível comunicar com o equipamento.</div>';


require_once 'functions.php';
