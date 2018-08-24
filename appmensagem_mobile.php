  <?

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

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

$sql2  = "SELECT * FROM propostas WHERE cod_seguranca ='" .trim($_GET['segure']). "' AND id_membro='" .trim($_GET['id_membro'])."'  AND id_estoque='" .trim($_GET['id'])."' 	 ORDER BY id  DESC  LIMIT 999"; 

  $query2 = $mysql->query($sql2);



 @$totalRows_propostas = $query2->num_rows;



  if ( $totalRows_propostas != 0) { ?>

  <?php while ($query_cont= $query2->fetch_assoc()) {  

      ?> <?             $mysql->query( "UPDATE propostas SET lido=1  WHERE   id=".$query_cont['id']." ");

                        $mysql->query( "UPDATE propostas SET alerta=0  WHERE     id =".$query_cont['id']." ");

                        if(  @$query_cont['resposta']=='0') { 

                           ////codigo para exibir a pergunta///

                        ?>  

                         

<div class="col-md-12 ">

   

    </div><div class="col-md-8 col-md-offset-3">

                       

                          <ol class="breadcrumb"><div class="text-right">

  <li >

                                       

 <a href="#" style="color:#387DC2; font-size:12px"><?php echo filtro(  $query_cont['mensagem']); ?></a>

  

 &nbsp;&nbsp;&nbsp;<a href="#" style="color:#87898b; font-size:10px"><?php echo data22( $query_cont['data']); ?></a>

  

  <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>



  

  <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?><p> </li>       </div> 

                             



                          </ol></div>
<div class="desktop">
 <div class="col-md-1">

   <img class="img22" src="/galeriadefotos/novo/<?php if ($query_cont['foto']!=''){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>">

                        </div> </div>

<?php }else{

/////exibir conteudo resposta////////////////////////////

?><div class="col-md-12 fundo_perfil ">

    <div class="col-md-8">

 <ol class="breadcrumb "><div class="text-left">

 <li><a href="#" style="color:#555; font-size:12px"><?php echo filtro(  $query_cont['mensagem']); ?></a>

 <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>

   <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?><p>

     </li>    </div> </ol></div>

</div><?  }                       

    } } else{ ?> 

                               <div class="jumbotron">

   <li>  <a href="#">  Você não tem novas Mensagens</a></li> 

 </div> <? }  ?> 



                                



		 