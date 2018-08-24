<?

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

}

 $sql2  = "SELECT * FROM propostas WHERE id_estoque ='" .trim($_GET['id']). "' AND id_membro='" .trim($_GET['id_membro'])."' 	 ORDER BY remetene  ASC  LIMIT 999"; 

$query2 = $mysql->query($sql2);
  if ($query2->num_rows != 0) { 

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

function data22($data,$formato=24){

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

/////importado de conection para evitar impotar muitas linhas

   while ($query_cont= $query2->fetch_assoc()) {  

      ?> <?             $mysql->query( "UPDATE propostas SET lido=1  WHERE   id=".$query_cont['id']." ");

                        $mysql->query( "UPDATE propostas SET alerta=0  WHERE     id =".$query_cont['id']." ");

                        if(  @$query_cont['resposta']=='0') { 

                           ////codigo para exibir a pergunta///

                        ?>  

                         

<div class="col-md-12 col-sm-12   ">

      

    <div class="col-md-11 col-sm-11 col-xs-12  ">

                       

        <ol class="breadcrumb"><div class="text-right">

                                  

       <li> <i class="fa fa-whatsapp fa-1x azul" aria-hidden="true"></i><a href="#" style="color:#387DC2; font-size:12px"><?php echo filtro(  $query_cont['email']); ?></a>
           <i class="fa fa-user fa-1x azul" aria-hidden="true"><a href="#" style="color:#555; font-size:11px"><?php echo filtro(  $query_cont['remetene']); ?></a></i><br> <i class="fa fa-comment fa-1x azul4" ></i><a href="#" style="color:#387DC2; font-size:12px"><?php echo filtro(  $query_cont['mensagem']); ?></a>

  

   

       

         
<? if(isset($query_cont['id_remetente']) && ($query_cont['id_remetente']!='')){ ?>

 <a href="webapp?segure=<?php echo $query_cont['cod_seguranca']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&destinatario=<?php echo  $query_cont['remetene']; ?>&&remetene=<?php echo  $query_cont['Destinatario']; ?>&&id_remetente=<?php echo  $query_cont['id_remetente']; ?>">Responder</a>            
<? }else{?> 
 <a href="webapp?segure=<?php echo  $query_cont['cod_seguranca']; ?>&&id_membro=<?php echo  $query_cont['id_membro']; ?>&&id=<?php echo  $query_cont['id_estoque']; ?>&&destinatario=<?php echo  $query_cont['remetene']; ?>">Responder</a>
<? } ?> 
       

  <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>



  

  <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?>

          

      

      

      

    

      

     </li>              

                             

            <li ></li>

  <li ><p>

      &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-plus-o fa-1x" aria-hidden="true"><?php echo data22( $query_cont['data']); ?></i> 

 </p></li>
</div> 
                          </ol></div>
<div class="desktop">
<div class="col-sm-1 col-md-1 col-xs-1">

       <a href="#">



<img class="img22" src="/galeriadefotos/peq/<?php if ($query_cont['foto']!=''){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>">
</div> </div>
</div>
<?php } else{
?><div class="col-md-12 col-sm-12 "><div class="desktop">
<div class="col-sm-1 col-md-1 col-xs-1">
<a href="#">
<img class="img22" src="/galeriadefotos/peq/<?php if ($query_cont['foto']!=''){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>">
     </div>  </div> 

    <div class="col-md-11 col-sm-11 col-xs-12">

                       

                          <ol class="breadcrumb"><div class="text-left">
                                   

  <li><a href="#" style="color:#555; font-size:12px"><?php echo filtro(  $query_cont['mensagem']); ?></a>

  

 

  

  <? if($query_cont['lido']=='0'){ ?>

      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>



  

  <? }else{?> 

  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>



      <? } ?><p>

          

      

      

      

    

      

     </li>              </div> 

                             



                          </ol></div>  


</div><?







///////////////////////////////////////////////////////////                           

                           

                           

                           

                           

                       }

                       

                       

                       

    } } else{?> 

                              

                           <? sleep(2); }  ?> 



                                



		  









                                



		 