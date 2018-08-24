<?
 
header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">


	<?php
	
/*
Conecta ao banco de dados... essa parte você acha fácil na internet.
*/
        require_once('config/conexao.class.php'); 
          
          $conexao = Conect::getInstance();

 $sql = 'SELECT * FROM membros  ';
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
  
  
 
 foreach($clientes as $cliente):
 
  
echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->url)."</loc> 
   <image:image>
      <image:loc>https://wcarros.com/galeriadefotos/grd/".trim($cliente->foto)."</image:loc>
      <image:geo_location>$cliente->cidade, $cliente->estado</image:geo_location>
    </image:image>     
  </url> ";
 echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->cidade)."</loc> 
  </url> ";
  echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->estado)."</loc> 
  </url> ";


  
 endforeach;
 
 
 
 
 $sql = 'SELECT * FROM estoque  ';
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
  
  
 
 foreach($clientes as $cliente):
 
  
echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->id_estoque)."</loc> 
   <image:image>
      <image:loc>https://wcarros.com/galeriadefotos/grd/".trim($cliente->foto_carro)."</image:loc>
      <image:geo_location>$cliente->cidade, $cliente->estado</image:geo_location>
      <image:title> $cliente->url $cliente->marcatexto $cliente->modelotexto  $cliente->ano  $cliente->preco </image:title>    
    </image:image>     
  </url> ";
 
 echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->modelotexto)."</loc> 
      
  </url> ";
  echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->marcatexto)."</loc> 
      
  </url> ";


  
 endforeach;
 
 $sql = 'SELECT * FROM cidade  ';
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
  
  
 
 foreach($clientes as $cliente):
 
  
echo " 
<url>
    <loc>https://wcarros.com/".trim($cliente->nome)."</loc> 
     
  </url> ";
 
 


  
 endforeach; 


	?>
</urlset>
