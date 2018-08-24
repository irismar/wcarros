<?
session_start();
if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

} 

function IsLoggedIn()
{
return ((isset($_SESSION["Status"]))&&($_SESSION["Status"] =='repasses'));
}
?>
<style>
    input[type="text"], input[type="number"],input[type="submit"] {
    background: #FFF;
    color: #666;
    display: block;
    float: left;
    font: 15px 'Open Sans',Arial;
    padding: 16px;
    width: 98%;
    margin: 10px;
	  border-radius: 2px;
    }
.col-sm-12{width:100%;float: left;}
.col-sm-11{width:91.66666667%}
.col-sm-10{width:83.33333333%}
.col-sm-9{width:75%}
.col-sm-8{width:66.66666667%}
.col-sm-7{width:58.33333333%}
.col-sm-6{width:50% ;float: left;}
.col-sm-5{width:41.66666667%}
.col-sm-4{width:33.33333333%;float: left;}
.col-sm-3{width:25%}
.col-sm-2{width:16.66666667%; float: left;}
.col-sm-1{width:8.33333333%}

.form-control {
  display: block;
  
  
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 2px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}
.form-control::-moz-placeholder {
  color: #999;
  opacity: 1;
}
.form-control:-ms-input-placeholder {
  color: #999;
}
.form-control::-webkit-input-placeholder {
  color: #999;
}
.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  cursor: not-allowed;
  background-color: #eee;
  opacity: 1;
}
input {
   
    border: rgba(218, 216, 216, 0.68) solid 1px;}
input[type="submit"] {width:100%;background:#d62052;color:#FFF;cursor:pointer;display:block;font:12px 'Open Sans',Arial;padding:16px;-webkit-transition:background .2s ease-in;-moz-transition:background .2s ease-in;-ms-transition:background .2s ease-in;-o-transition:background .2s ease-in;transition:background .2s ease-in; border-radius: 1px;box-shadow: 1px 1px 2px #c5c4c4; text-align:left; }
input[type="submit"]:hover{background:#0081cc;color:#FFF;}
}
.img22 {
width :40px;
height :40px;
margin : auto;
border-radius: 50%;
float: left;
}
h3{ margin-left:  5px;
font-size: 90% ;color: #666666;
width: 100%;

}
.mensagens{
    display: inline-block;
    margin: 0 2px 15px;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    column-break-inside: avoid;
    padding: 0px;
    padding-bottom: 0px;
    background-color: #f5f5f5;
    border: 1px solid #e6e6e6;
    opacity: 1;
    width: 100%;
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
    border-radius: 5px;

}
p{font-size: 12px; color: #9395a6;
}
hr{background:  #444;}
a{text-decoration: none;
     color: #444;
     margin-left: 10px;}
     .pin{display:inline-block;margin:0 2px 15px;-webkit-column-break-inside:avoid;-moz-column-break-inside:avoid;column-break-inside:avoid;padding:0px;padding-bottom:0px;background-color:#fafafa;border:1px solid #e6e6e6;opacity:1;width:100%;-webkit-transition:all .2s ease;-moz-transition:all .2s ease;-o-transition:all .2s ease;transition:all .2s ease;}

.pin img{padding-bottom:1px;margin-bottom:5px;}

.pin p{font:12px/18px Arial, sans-serif;color:#818b9e;margin-left:10px;}
.pin h5{font-size: 90%; color: #818b9e;   margin-left: 10px;}
.pin h4{ color: #675b5e; font-weight: bold; text-decoration: none;}
.pin h3{ font:12px/18px Arial, sans-serif;color:#818b9e;margin-left:10px;}
</style>
</div>
<form action="?postar=<?php echo $_GET['app_memsagem'] ?>&&id=<?php echo $_GET['id']; ?>&&id_membro=<?php echo $_GET['id_membro']; ?>&&foto=<?=$_GET['foto']?>&&segure=<?php echo $_GET['segure']; ?>&&marca=<?php echo $_GET['marca']; ?>&&modelo=<?php echo $_GET['modelo']; ?>&&preco=<?php echo $_GET['preco']; ?>&&endereco=<?=$_GET['endereco']?>&&retorno="urlretorno" method="post" >
 <div class="col-sm-12"><div class="col-sm-9">
 <input type="text" class="form-control" name="memsagem" placeholder=" Escreva uma mensagem ao vendedor " >
 </div> <div class="col-sm-2">
 <input type="submit"  class="form-control" id="enviar" value="enviar" name="enviar">
 </div> </div>  </from>   
 <?if(isset($_POST['enviar'])&&($_POST['enviar']="Enviar")){
//////////////////////////inserir função para remover palavão///////////
function filtro($mensagem)
{
if ($mensagem) {
if($_SERVER['SERVER_NAME']=="localhost") {
$mysql= new mysqli('localhost','root','', 'wcarros');
}elseif( $_SERVER['SERVER_NAME']=="192.168.15.7"){$mysql= new mysqli('localhost','root','', 'wcarros');}
   else{ $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
       }
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$sql = "SELECT * FROM filtro_palavras";
$query = $mysql->query($sql);
while ($mostra = $query->fetch_assoc()) {
$mensagem= str_replace($mostra['MsgErrada'], $mostra['MsgCorreta'], $mensagem);
}
}
return $mensagem;
}
////////////////////////////////////////////////////////////////////////

  $sql= "INSERT INTO propostas (id_estoque,mensagem,cod_seguranca,id_membro,endereco) VALUES ('".$_GET['id']."','".filtro($_POST['memsagem'])."','".$_GET['segure']."','".$_GET['id_membro']."','".$_GET['endereco']."')";
       $sql=$mysql->query($sql);
}
if (IsLoggedIn()){ 
/////////////////////////exibir memsagens///////////////////////
  $sql2  = "SELECT * FROM propostas WHERE id_estoque ='" .trim($_GET['id']). "' AND id_membro='" .trim($_SESSION["id"]). "'  ORDER BY id  DESC  LIMIT 999"; 
}else{
$sql2  = "SELECT * FROM propostas WHERE id_estoque ='" .trim($_GET['id']). "' AND cod_seguranca='" .trim($_GET['segure']). "'  ORDER BY id  DESC  LIMIT 999"; 
}
 $query2= $mysql->query($sql2);
  if ( $query2->num_rows !=0) { 
    ?><link href="/font/css/font-awesome.css"  media='all' rel="stylesheet"><?
      while ($propostas= $query2->fetch_assoc()) {  
      ?><div class="pin"><h3><i class="fa fa-user-circle fa-2x  " aria-hidden="true"></i><i style="margin-bottom:70px;"><?=" ".$propostas['mensagem']?></i> </h3>
      <?if ((IsLoggedIn())&&($_SESSION["id"]==$propostas['id_membro'])){?>
      <p> <a href="?excluir_comentario=$propostas['id']">
      <i class="fa fa-trash fa-1x  " aria-hidden="true"></i>Excluir</a>
      <a href="#"><i class="fa fa-map-marker fa-1x  " aria-hidden="true"></i><?=@$propostas['endereco']?></p></a>


          <? }?>


     </div><?

                 }

    }
?><?
 ?>

