<?php

  if($_SERVER['SERVER_NAME']=="localhost"){
$mysql= new mysqli('localhost','root','', 'wcarros');
}else{
    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
}
function removeAcentos($string) {
    $string= trim($string);
    
    $string = preg_replace("/[áàâãä]/", "a", $string);
    $string = preg_replace("/[ÁÀÂÃÄ]/", "a", $string);
    $string = preg_replace("/[éèê]/", "e", $string);
    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
    $string = preg_replace("/[íì]/", "i", $string);
    $string = preg_replace("/[ÍÌ]/", "I", $string);
    $string = preg_replace("/[óòôõö]/", "o", $string);
    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
    $string = preg_replace("/[úùü]/", "u", $string);
    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);
    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
    $string = preg_replace("/ /", "", $string);

    
    return $string;
}
if (isset($_GET["txtnome"])) { ?>
<div class="col-md-12 col-sm-12">
    <? $busca =trim(removeAcentos($_GET["txtnome"]));
	
   $busca = str_replace(" " , "-" ,$busca );
  $sql = "SELECT  *  FROM  fp_ano	WHERE modelo_pesquisa  LIKE '%".trim( $busca)."%'   AND codigo_marca='".$_SESSION['codigo_marca']."' order by modelo DESC LIMIT 125 ";
          $query = $mysql->query($sql);
    
   
        
             while($ano = $query->fetch_assoc()) { 
               

                 ?>

    
        
      
   <?
    $ano["valor"] = str_replace("," , "." , $ano["valor"] ); // Primeiro tira os pontos
    //$ano["valor"] = str_replace("," , "" , $ano["valor"]); // Depois tira a vírgula    
    $ano["valor"]=number_format($ano["valor"], 2, ',', '.'); 
    //$valorFipe			= str_replace('R$','',$valorFipe);
    //$valorFipe			= str_replace('.','',$valorFipe);
    //$valorFipe			= trim(str_replace(',','.',$valorFipe));
        ?>
     <div class="col-sm-12 col-md-12">
    <div class="col-sm-1 col-md-1"></div><div class="col-sm-8 col-md-8"><a href="/adicionar?id_ano=<?=trim($ano["id_ano"]);?>&&modelo=<?=trim($ano["modelo"]);?>"><i class="fa fa-car fa-1x"></i><?=$ano["marca"];?> <?=$ano["modelo"];?><i class="fa fa-calendar fa-1x"></i>    <?=$ano["ano"];?> &nbsp; <i class="fa fa-tint fa-1x"> </i>  <?=$ano["combustivel"];?>&nbsp; <i class="fa fa-money fa-1x"></i>    <?=$ano["valor"];?> </a> 
    </div></div>
                         <?
		 
	

    }?> <? } ?>
	
        </div>
               
                       
	
		
				 
	 
       

