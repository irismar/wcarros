<? 

@session_start(); 

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

}

  $sql2  = " SELECT id_estoque,gostei FROM estoque WHERE  id_estoque='" .trim($_GET['id']). "' "; 

$query2 = $mysql->query($sql2);

$nmesagens=$query2->num_rows;

    if($query2->num_rows!=0){
    	while($row = mysqli_fetch_array( $query2)) {

    	echo 	$row['gostei'];

    ?><? }  } 

