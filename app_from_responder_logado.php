<?

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','irisMAR100', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

}

// Dados de acesso ao servidor MySQL

function salvaLog($mensagem) {

  $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante

  $hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)

  @$navegador=$_SESSION['navegador'];

  @$endereco=$_SESSION['endereco1'];

  @$cidade=$_SESSION['cidade'];

  @$estado=$_SESSION['estado'];

  @$id=@$_SESSION['id'];

  @$nome=@$_SESSION['usuario'];

  



  

  if($_SERVER['SERVER_NAME']=="localhost" or $_SERVER['SERVER_NAME']=="192.168.15.7"){

$conect= new mysqli('localhost','root','', 'wcarros');

}else{

    $conect= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

       }



  

// Caso algo tenha dado errado, exibe uma mensagem de erro

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());



$sql="INSERT INTO log (data,ip,  mensagem,endereco,id_usuario,nome,maquina) VALUES 

( '".$hora."','".$ip."','". $mensagem."','".$endereco."','".$id."','".$nome."','".$navegador."')"  ;

$sql=$conect->query($sql); 

if ($sql) {

return true;

} else {

return false;

}

}

//////importado de conection para evitar impotar muitas linhas

function filtro($mensagem)

{

if ($mensagem) {

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

}

$sql = "SELECT * FROM filtro_palavras";

$query = $mysql->query($sql);

while ($mostra = $query->fetch_assoc()) {

$mensagem= str_replace($mostra['MsgErrada'], $mostra['MsgCorreta'], $mensagem);

}

}

return $mensagem;

}

function data22($data,$formato=12){

    $hora = $formato == 12 ? "h" : "H";

    $am_pm = (date("H",strtotime($data)) < 12) ? " AM" : " PM";

    $am_pm = $formato == 24 ? "" : $am_pm;

    if(date('d/m/Y', strtotime($data)) == date('d/m/Y')){

        return "Hoje às ".date("$hora:i",strtotime($data)).$am_pm;

    }

    else if(date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d")-1){

        return "Ontem às ".date("$hora:i",strtotime($data)).$am_pm;

    }

    else if(date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d")+1){

        return "Amanha às ".date("$hora:i",strtotime($data)).$am_pm;

    }

    else{ 

        return date("d/m/Y",strtotime($data))." "."  ás  ".date("$hora:i",strtotime($data)).$am_pm;

    }

}

?>

<style>

    input[type="text"], input[type="number"] {

    background: #FFF;

    color: #666;

    display: block;

    float: left;

    font: 15px 'Open Sans',Arial;

    padding: 16px;

    width: 70%;

    

}

input {

   

    border: rgba(218, 216, 216, 0.68) solid 1px;}

input[type="submit"] {

    background: #4CAF50;

    color: #FFF;

    cursor: pointer;

    display: block;

    font-weight: bold;

    font: 14px 'Open Sans',Arial;

    padding: 16px;

    -webkit-transition: background .2s ease-in;

    -moz-transition: background .2s ease-in;

    -ms-transition: background .2s ease-in;

    -o-transition: background .2s ease-in;

    transition: background .2s ease-in;

    -webkit-appearance:none; border-radius: 0;

}

.img22 {



width :60px;

height :60px;

margin : auto;

border-radius: 50%;

float: left;

}   
@media screen and (min-width:0px) and (max-width:889px){.desktop{display:none;}
.autocomplet{width:98% !important;margin-top:1%;}
.caixa{margin-top:15%;}
}
@media screen and (min-width:889px){.caixa{margin-top:0%;}
.mobile{display:none;}
}
</style>

<form action="?destinatario=<?php echo $_GET['destinatario']; ?>&&id=<?php echo $_GET['id']; ?>&&id_membro=<?php echo $_GET['id_membro']; ?>&&segure=<?php echo $_GET['segure']; ?>&&remetente=<?=$_GET['remetente']?>&&id_remetente=<?=$_GET['id_remetente']?>&&telefone=<?=$_GET['telefone']?>&&foto=<?=$_GET['foto']?>&&preco=<?=$_GET['preco']?>&&marca=<?php echo $_GET['marca']; ?>&&modelo=<?php echo $_GET['modelo']; ?>&&endereco1=<?=$_GET['endereco1']?>&&idfacebook<?= $_GET['idfacebook']?>" method="post" >
    <div class="desktop">
    <? if(isset($_GET['idfacebook'])&&($_GET['idfacebook']!='')or  (isset($_POST['idface'])) ){ 
       if(isset($_GET['idfacebook'])&&($_GET['idfacebook']!='')){ $idface=$_GET['idfacebook'];}else{$idface=$_POST['idface'];}
        
        ?>
      
<img class="img22"  src="https://graph.facebook.com/<?=$idface?>/picture">  
    <? } else{ ?> 
<img class="img22" src="galeriadefotos/peq/<?=$_GET['foto']?>">        
        <? } ?>
</div>
<input type="text" name="memsagem"placeholder="Escreva uma mensagem ao vendedor aguarde alguns segundos pela resposta." >
<input type="hidden" name="idface" value="<?= $_GET['idfacebook']?>" >
<input type="submit" id="enviar" value="enviar" name="Enviar">
    </form>

<? if(isset($_GET['destinatario']) && ( isset($_POST['memsagem'])&& ($_POST['memsagem']!='')) ) { 
     $sql="INSERT INTO propostas (remetene,Destinatario,mensagem,id_estoque,email,data,foto,endereco,cod_seguranca,alerta,
                                    id_membro,marca,modelo,preco,id_facebook,resposta,id_remetente)
  VALUES ('".$_GET['remetente']."', '".@$_GET['destinatario']."','".$_POST['memsagem']."','".$_GET['id']."','".$_GET['telefone']."','".date('Y-m-d H:i:s')."','".@$_GET["foto"]."','".@$_GET['endereco1']."','".$_GET['segure']."','+1','".trim($_GET['id_membro'])."','".@trim($_GET['marca'])."','".@trim($_GET['modelo'])."','".@trim($_GET['preco'])."','".@trim($_POST['idface'])."','0','".$_GET['id_remetente']."')";

    $sql= $mysql->query($sql); 

    if($sql) {


    if(isset($_SESSION["mens_id_estoque"]))    {

    unset($_SESSION["mens_id_estoque"] );

    } 

    $_SESSION["mens_id_estoque"] =$_GET['id'];

    $_SESSION["msm"]="Memsagem Enviada Com Sucesso ";

    $mensagem ="Usuario "."&nbsp;".@$_GET['remetente']." mandou uma memsagem para usuario"."&nbsp;".$_GET['destinatario'] ."&nbsp;"." com sucesso" ;

    $mysql->query("UPDATE membros SET alertamanesagem=alertamanesagem + 1  WHERE id = ".$_GET['id_membro']."");

    salvaLog($mensagem);

        }else{

    $_SESSION["mens_id_estoque"] =$_GET['id'];

    $_SESSION["msm"]="Erro ao enviar mensagem  ";

    $mensagem ="Usuario "."&nbsp;".$_GET['remetente']." Erro ao enviar mensagens" ;

    

    salvaLog($mensagem);

    }}

 ?>