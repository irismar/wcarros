<?
if($_SERVER['SERVER_NAME']=="www.wcarros.com.ti"){
$mysql= new mysqli('localhost','root','', 'wcarros');
}else{
    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
}
  
//////////////////////////////////////////////////////////////////
 $sql2  = "SELECT * FROM propostas WHERE cod_seguranca ='" .trim($_GET['segure']). "' AND id_membro='" .trim($_GET['id_membro'])."'  AND id_estoque='" .trim($_GET['id'])."' 	 ORDER BY id  DESC  LIMIT 999"; 
  $query2 = $mysql->query($sql2);
 @$totalRows_propostas = $query2->num_rows;
  if ( $totalRows_propostas != 0) { 
//////importado de conection para evitar impotar muitas linhas
function filtro($mensagem){
if ($mensagem) {
if($_SERVER['SERVER_NAME']=="www.wcarros.com.ti"){
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
   while ($query_cont= $query2->fetch_assoc()) {  
      ?> <?  if(  $query_cont['resposta']=='0') { 
                        ////codigo para exibir a pergunta///  ?>  
                         
<div class="col-md-12 ">
     <div class="col-sm-1 col-md-1 col-xs-1">
       <a href="#">

 <img class="img22" src="/galeriadefotos/novo/<?php if ($query_cont['foto']!=''){  echo  @$query_cont['foto']; } else { echo "avatar.jpg"; }?>">
   
 </a> 

     
     </div>  
    
     <div class="col-md-8 col-sm-8 text-left ">
                                                 <ol class="breadcrumb2 fundo_perfil"><div class="text-left ">
                                                 
  <li><a href="#" style="color:#387DC2; font-size:12px"><?php echo filtro(  $query_cont['mensagem']); ?></a>
  
 
  
  <? if($query_cont['lido']=="0"){ ?>
      <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>

  
  <? }else{?> 
  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>

      <? } ?><p>
          
      
      
     
    
      
     </li>              </div> 
                             
                              <li ><a href="#" style="color:#555; font-size:10px">
 <?php echo data22( $query_cont['data']); ?></a>
  </li></i></li>
                          </ol></div></div>
                            
                      <?php }else{
/////exibir conteudo resposta////////////////////////////

?><div class="col-md-12 ">
  <div class="col-md-7 col-sm-7 col-md-offset-3  ">
  <ol class="breadcrumb1"><div class="text-right">
  <li><a href="#" style="color:#555; font-size:14px"><?php echo filtro(  $query_cont['mensagem']); ?></a>
  <? if($query_cont['lido']==0){ ?>
  <i class="fa fa-check" aria-hidden="true" style="color:#555;"></i><i class="fa fa-check" aria-hidden="true" style="color:#555;"></i>
  <? }else{?> 
  <i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i><i class="fa fa-check" aria-hidden="true" style="color:#5cb85c;"></i>
  <? } ?><a href="#" style="color:#555; font-size:10px">
 <?php echo data22( $query_cont['data']); ?></a>
  </li>  </div>                          
  </ol><hr></div> <div class="col-sm-2 col-md-2 col-xs-2">
       <a href="#">
 <img  class="img22" src="galeriadefotos/novo/<? if(isset($query_cont['foto'])&&($query_cont['foto']!='')){ echo $query_cont['foto'];}else{ echo  "avatar.jpg"; }?>"  ></a> 
    
     </div> 
</div><?
  }            
    } } else{     } 


     ?> 

                                

	