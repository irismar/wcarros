 <? @session_start(); ?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/ie.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    <?
if($_SERVER['SERVER_NAME']=="localhost"){
$mysql= new mysqli('localhost','root','', 'wcarros');
}else{
    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
}

 echo $sql2  = " SELECT * FROM propostas WHERE  Destinatario='" .trim($_SESSION["usuario"]). "' AND respondido='1'   ORDER BY data  DESC  LIMIT 999"; 
 $query2 = $mysql->query($sql2);

 

  if ( $query2->num_rows != 0){
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
 

   while ($query_cont= $query2->fetch_assoc()) { ?>

<div class="col-md-1"><img class="img22" src="/galeriadefotos/novo/<?php if ($query_cont['foto']!=''){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>">

    </div>

<div class="col-md-11 col-sm-11">
                          
   <ol class="breadcrumb ">
       <div class="text-left">
           <li ><i class="fa fa-user fa-1x" aria-hidden="true">
<a href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&destinatario=<?php echo $query_cont['destinatario']; ?>"><?=$query_cont['remetene']; ?></a></i></li>

<li><i class="fa fa-calendar fa-1x" aria-hidden="true">
<a class="azul" href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&destinatario=<?php echo $query_cont['Destinatario']; ?>&&modelo=<?php echo $query_cont['modelo']; ?>&&marca=<?php echo $query_cont['marca']; ?>" ><?= data22($query_cont['data']); ?>
</a> </i></li>
<li><i class="fa fa-map-marker fa-1x" aria-hidden="true">
<a class="azul" href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&destinatario=<?php echo $query_cont['Destinatario']; ?>" ><?= $query_cont['endereco']; ?>
</a> </i></li>  

<li><i class="fa fa-car fa-1x" aria-hidden="true">
<a class="azul" href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&destinatario=<?php echo $query_cont['Destinatario']; ?>" ><?= $query_cont['marca'] ."".$query_cont['modelo']." ".$query_cont['preco']  ; ?>
</a> </i></li>   
    <? if( $query_cont['alerta']=="1"){ ?>
           <a href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&estinatario=<?php echo $query_cont['Destinatario']; ?>">
            <i class="fa  fa-comments fa-2x azul2" aria-hidden="true"></i>
<span class="label label-success">Nova Mensagem </span></a>       
   
    <? } ?>
  
    <li ><i class="fa fa-trash fa-1x azul" aria-hidden="true" ><a href="acao.php?deletar_contato=<?php echo  $query_cont['cod_seguranca']; ?>&&id_estoque=<?php echo  $query_cont['id_estoque']; ?>">Excluir converça</a>
    </i></li>
          </div> 
                          </ol></div>
       
                         
                         
                              
                              <?php } 				


    


     } else { ?>
            <div class="jumbotron">
     <a href="#">  Você não tem novas Mensagens</a>
            </div>
        
  <?  } ?>