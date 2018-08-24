<?php
 ob_start();
@session_start(); 

if(!isset( $_COOKIE['segure']) or $_COOKIE['segure']='' ){ 

setcookie('segure', session_id(), (time() + (360 * 24 * 3600)));
   }
  
require_once'Connections/repasses.php';
require_once 'config/conexao.class.php';
require_once "links.php";  
require_once "meta_index.php";
if($_SERVER['REQUEST_URI']=="/sair"){ 

  include_once"sair.php"; exit(); 
}
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?
 if(!isset($_SESSION['verificado'] ) or  ($_SESSION['verificado']='')) { 



  
  
   $ip=get22_client_ip();  
   
  include_once'localizar.php'; 
  
 
      } else {include 'url.php';} 