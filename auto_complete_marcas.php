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
if (isset($_GET["txtnome"])) {
  echo  $busca =trim(removeAcentos($_GET["txtnome"]));
	
	  $sql = "SELECT   marca ,codigo_marca FROM  fp_marca	WHERE marca  LIKE '%".trim( $busca)."%'AND tipo=1   order by marca ASC LIMIT 125 ";
  $query = $mysql->query($sql);
    
   
        
             while($linha = $query->fetch_assoc()) { 
               

                 ?>
<div class="col-sm-12 col-md-12">
   
    <div class="col-sm-8 col-md-8"> <a href="/adicionar?marca_post=<?=$linha["marca"];?>&&codigo_marca=<?=$linha["codigo_marca"];?>"> <?=$linha["marca"];?></a>  </div>  
     
                       
  </div>                        <?
		 
	

                             } } 
	
		
				 
	 
       

