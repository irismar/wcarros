<?
include "links.php";
include "log.php";
 $_SERVER['HTTP_REFERER'];
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=10" );
if ($pos != false) {
  
  $_SESSION['km']='10';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=50" );
if ($pos != false) {
  
  $_SESSION['km']='50';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=100" );
if ($pos != false) {
  
  $_SESSION['km']='100';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=500" );
if ($pos != false) {
  
  $_SESSION['km']='500';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=1000" );
if ($pos != false) {
  
  $_SESSION['km']='1000';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "r=10000" );
if ($pos != false) {
  
  $_SESSION['km']='10000';
}
$pos = strpos( $_SERVER['HTTP_REFERER'], "?p" );
if ($pos != false) {
  
  $_SESSION['km']='';
}

 @$ex = explode('/', $_SERVER['HTTP_REFERER']);
     @$link1 = $ex[count($ex)-1];
    @$link2 = $ex[count($ex)-2];
     @$link3 = $ex[count($ex)-1];

$modulo =trim(Url::getURL( 0 ));
@$sessin_estado= trim(removeAcentos($_SESSION['estado']));
@$sessin_cidade=trim( removeAcentos($_SESSION['cidade']));
@$lat= number_format($_SESSION['lat'], 6, '.', ' ').'<br>';
@$log=number_format($_SESSION['log'], 6, '.', ' ').'<br>';
if (isset($_GET["txtnome"])) {
   $busca =$_GET["txtnome"];

   $sql2 = "SELECT  id FROM  membros 	WHERE  url='".trim($link1)."' LIMIT 1 ";
        $query2 = $mysql->query($sql2);
  $query2->num_rows;
 if ($query2->num_rows =="1") { 
  while($row_busca= $query2->fetch_assoc()) { 
 $busca_id=$row_busca['id'];

}
  
   $userbusca="WHERE modelotexto LIKE" ."'%".$busca."%'"." or marcatexto LIKE" ."'%".$busca."%'"." AND id_membro="."'".$busca_id."'";
  $sql = "SELECT modelotexto,marcatexto,id,mome_membro,lon,lat,preco FROM estoque $userbusca 
ORDER BY id_estoque ASC
LIMIT 40";
	
	
	}else{ 
	
	
	
	$userbusca="WHERE modelotexto LIKE" ."'%".$busca."%'"." or marcatexto LIKE" ."'%".$busca."%'"." or url LIKE" ."'%".$busca."%' ";
	$sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca  
HAVING distancia < ".$_SESSION['km']."
ORDER BY distancia ASC
LIMIT 40";
	
	
	   
    
     $query = $mysql->query($sql);
    
     if (@$query->num_rows   != 0) {
		include'ver_resultado.php';
		exit();
       
			 }
			}

				 
	////////////////////////////////////////buscar mais longe////se não encontrar no raio////////////////////////////			 
	$userbusca="WHERE modelotexto LIKE" ."'%".$busca."%'"." or marcatexto LIKE" ."'%".$busca."%'"." or url LIKE" ."'%".$busca."%' and exibir='1'";
		//////////////////
 $sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca
HAVING distancia < 10
";
    $query = $mysql->query($sql);
    
	if ($query->num_rows   > 0) {
		 $_SESSION['km']="10";
		include'ver_resultado.php'; exit();
       
			 }
	
	//////////////////////////

	//////////////////
 $sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca 
HAVING distancia < 50
";
$query = $mysql->query($sql);
 $query->num_rows ;
	if ($query->num_rows   > 0) {
		 $_SESSION['km']="50";
		include'ver_resultado.php';
        exit();
			 }
	//////////////////////////
	
	//////////////////
$sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca 
HAVING distancia < 100
";
$query = $mysql->query($sql);

	if ($query->num_rows   > 0) {
		 $_SESSION['km']="100";
		include'ver_resultado.php';
       exit();
			 }
	//////////////////////////
	//////////////////
$sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca 
HAVING distancia < 500
";
$query = $mysql->query($sql);

	if ($query->num_rows   > 0) {
		 $_SESSION['km']="500";
		include'ver_resultado.php';
        exit();
			 }
	////////////////////////////////////////////
$sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca 
HAVING distancia < 1000
";
$query = $mysql->query($sql);

	     if ($query->num_rows   > 0) {
		 $_SESSION['km']="1000";
		 include'ver_resultado.php'; 
         exit();			 }	//////////////////////////	
		 
$sql = "SELECT *,
(6371 * acos(
cos( radians('$lat') )
* cos( radians( lat ) )
* cos( radians( lon ) - radians( '$log') )
+ sin( radians('$lat') )
* sin( radians( lat ) ) 
)
) AS distancia FROM estoque $userbusca 
HAVING distancia < 10000
";
$query = $mysql->query($sql);

	if ($query->num_rows   > 0) {
		 $_SESSION['km']="10000";
		include'ver_resultado.php';
        exit();
			 }					 
				 
        // Se a consulta n�o retornar nenhum valor, exibi mensagem para o usu�rio
     ?> <?   echo "Não foram encontrados registros!";  
    ?></div><? 
}
?>