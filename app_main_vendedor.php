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

echo  $sql2  = "SELECT * FROM propostas WHERE  remetene='" .trim($_GET['remetene'])."' or Destinatario='" .trim($_GET['remetene'])."' AND id_estoque ='" .trim($_GET['id']). "'	 ORDER BY id  DESC  LIMIT 999"; 

$query2 = $mysql->query($sql2);
$totalRows_propostas = $query2->num_rows;
if ( $totalRows_propostas != 0) { ?> <?php 
//////importado de conection para evitar impotar muitas linhas
    while ($query_cont= $query2->fetch_assoc()) {             

                        if(  @$query_cont['resposta']=='0') { 

                           ////codigo para exibir a pergunta///

                        ?>  

                         

<div class="col-md-12 col-sm-12 col-xs-12    ">
<div class="desktop">
<div class="col-md-1 col-xs-1 col-sm-1">
<br><br>
<img class="img22" src="/galeriadefotos/peq/<?php if (isset($query_cont['foto'])){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>"> 

         </div> </div>

   <div class="col-md-10 col-sm-10 col-xs-10 ">

                       

        <ol class="breadcrumb1 fundo_perfil"><div class="text-left">

                                  

       <li><a href="#" style="color:#387DC2; font-size:14px"><?php echo filtro(  $query_cont['mensagem']); ?></a><br>

  

 

  

  <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>



  

  <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?><p>

          

      

      

      

    

      

     </li>              </div> 

                             

 

  <li ><p>

      &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-plus-o fa-1x" aria-hidden="true"><?php echo data22( $query_cont['data']); ?></i>  <i class="fa fa-trash fa-1x azul4" aria-hidden="true"><a class="azul4" href="acao.php?deletar_eudestinatario=<?php echo trim($query_cont['id'] ); ?>&&id_estoque=<?php echo trim($query_cont['id_estoque'] ); ?>&&id_membro=<?php echo trim($query_cont['id_membro'] ); ?>">Excluir converça</a></i></p>

  </li>

                          </ol>
<hr>
                        </div></div>

       

                      

                       <?php }else{

/////exibir conteudo resposta////////////////////////////



?><div class="col-md-12 col-sm-12 ">



    <div class="col-md-11 col-sm-11">

                       

                          <ol class="breadcrumb2 fundo_perfil"><div class="text-right">

  <li ><i class="fa fa-user fa-1x" aria-hidden="true"><?php echo  @$query_cont['remetene']; ?></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-phone fa-1x" aria-hidden="true"><?php echo  @$query_cont['email']; ?></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-plus-o fa-1x" aria-hidden="true"><?php echo data22( $query_cont['data']); ?></i>

      <i class="fa fa-trash fa-1x azul2" aria-hidden="true"><a href="acao.php?deletar_eudestinatario=<?php echo trim($query_cont['id'] ); ?>&&id_estoque=<?php echo trim($query_cont['id_estoque'] ); ?>&&id_membro=<?php echo trim($query_cont['id_membro'] ); ?>">Excluir converça</a></i>

      </li>                                   

  <li><a href="#" style="color:#387DC2; font-size:14px"><?php echo filtro(  $query_cont['mensagem']); ?></a>

  

 

  

  <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>



  

  <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?><p>

          

      

      

      

    

      

     </li>              </div> 

                             



                          </ol></div><div class="desktop"><div class="col-md-1 col-xs-1 col-sm-1">

<img class="img22" src="/galeriadefotos/peq/<?php if (isset($query_cont['foto'])){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>"> 

         </div> </div>



</div><?







///////////////////////////////////////////////////////////                           

                           

                           

                           

                           

                       }

                       

                       

                       

    } } else{?> 

                              

                           <? sleep(2); }  ?> 



                                



		  









                                



		 