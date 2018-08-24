<? 
require_once'Connections/repasses.php'; 
require_once('log.php');
require_once 'config/conexao.class.php';
require_once 'config/crud.class.php';
$con = new conexao(); // instancia classe de conxao

$con->connect(); // abre conexao com o banco 

include "lib/WideImage.php"; 

require_once('admin/includes/tng/tNG.inc.php'); 



$_SESSION['plano'] ='1';

	$data = date('Y-m-d');

if (!IsLoggedIn()) {

	ob_end_clean();

	header("Location: index.php");

	exit();

 }

 if (IsLoggedIn()) {

 $sql= "SELECT * FROM membros  	WHERE url='". $_SESSION["url"]."'   LIMIT 1";

 $dados = $mysql->query($sql);

 // Executa a consulta

 while($row_membro = $dados->fetch_assoc()) {

 $id= $row_membro['id'];

 $nome_usuario= $row_membro['nome'];

 $totalmemsagems= $row_membro['alertamanesagem'];

 $totalvisita= $row_membro['alvit'];

 $cidade= trim($row_membro['cidade']);

 $estado= trim($row_membro['estado']);

 $email= $row_membro['email'];

 $endereco= $row_membro['endereco'];

 $foto_carro= $row_membro['foto'];

 $carros= $row_membro['carros'];

 $data_cadastro= $row_membro['data'];

 $telefone= $row_membro['watapps'];
 $fixo= $row_membro['fixo'];

 $lat=$row_membro['lat']; 

 $lon=$row_membro['log'];

 $url=$row_membro['url'];  
 $idfacebook=$row_membro['idfacebook'];  

   }}
 unset($_SESSION['cadastro']);

 $_SESSION["msg"] = "";

 unset($_SESSION['id_fipe']);

 $editFormAction = $_SERVER['PHP_SELF'];







if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add")) {

  

	$sTmpFolder = "galeriadefotos/";

	$foto = $_FILES['imagem'];

	$foto2 = $_FILES['imagem2'];

	$foto3 = $_FILES['imagem3'];

	$foto4 = $_FILES['imagem4'];

	$foto5 = $_FILES['imagem5'];

	$foto6 = $_FILES['imagem6'];

	$foto7 = $_FILES['imagem7'];

    @$link = $_POST['modelo'];

    $ex = explode('/', $link);

    $id_modelo = $ex[count($ex)-2];

    $modelo = $ex[count($ex)-1]; 

    $link1 =trim( $_POST['marca']);

    $ex1 = explode('/', $link1);

    $id_marca = $ex1[count($ex1)-2];

    $marca = $ex1[count($ex1)-1]; 

    $km=$_POST['km']; 

    $preco= $_POST['preco'];

    $preco = str_replace("." , "" , $preco ); // Primeiro tira os pontos

    $preco = str_replace("," , "" , $preco); 



    // Depois tira a vírgula    id_membro,foto_membro,nome_membro, data, data_cadastro, categoria,marcatexto,modelotexto,  ano, ano2, cor, preco, condicoes, km, cidade,estado, portas, combustivel, transmissao, descricao,lat,lon ,watapps,tell,email,video,idfacebook,url,fipe,url_foto '".$id."', '".$foto_carro."',  '". $nome_usuario."', '".$hora."', '".$data_cadastro."',  '3',		   '".$_POST['marca']."',		   '".$_POST['modelo']."',            '".$_POST['ano']."',			   '".$_POST['ano']."',          '".$_POST['cor']."',            '".$preco."',		   '".$_POST['condicoes']."',					   '".$_POST['km']."',					   '".trim($cidade)."',					   '".trim($estado)."',					   '".$_POST['porta']."',					   '".$_POST['combustivel']."',					   '".$_POST['transmissao']."',             '".$_POST['descricao']."',	   '".$_SESSION['plano']."',			   '".trim($lat)."',		  '".trim($lon)."',	  '".$_SESSION['watapps']."',					   '".$_SESSION['fixo']."',					   '".$email."',			           '".trim($_POST['video'])."',						'".@trim($_SESSION['id_face'])."',						'".$url_user."', '".$fipe."', '".$url_foto."'
    $fipe= $_POST['fipe'];	 
    $url_foto=trim($_POST['url_foto']);
    $url_user=NormalizaURL($_POST['url']);	
  $sql= "INSERT INTO estoque ( data, data_cadastro,id_membro,nome_membro,foto_membro,categoria,marcatexto,modelotexto,cor,ano,ano2,preco,entrada,condicoes,km,portas,combustivel,transmissao,descricao,cidade,estado,lat,lon,email,watapps,taxa,endereco,video,tell,url,idfacebook) VALUES ( '".$hora."','".$data_cadastro."','".$_SESSION["id"]."','".$nome_usuario."','".$foto_carro."','".$_POST['tipo']."','".$_POST['marca']."','".$_POST['modelo']."','".$_POST['cor']."','".$_POST['ano']."','".$_POST['ano']."','".$preco."','".$_POST['entrada']."','".$_POST['condicoes']."','".$_POST['km']."','".$_POST['portas']."','".$_POST['combustivel']."','".$_POST['transmissao']."','".$_POST['descricao']."','".$cidade."','".$estado."', '".trim($lat)."', '".trim($lon)."', '".@trim($_SESSION['email'])."', '".$telefone."','".$_POST['taxa']."','".trim($endereco)."','".$_POST['video']."','".$fixo."','".$url."','".$idfacebook."')"; 
   $sql= $mysql->query($sql); 	
   var_dump( $sql );
  if ($sql) {
			
			} else { 	echo "deu erro"; 
    $mensagem="Erro ao adicionar carro ao estoque";
if (salvaLog($mensagem)) {
	echo "O LOG foi salvo com sucesso! 169";
	} else {
	echo "NAo foi possivel salvar o LOG! 173";
	}	
 }
	
  $sql2 = "SELECT nome_membro,id_estoque,url,carros  FROM estoque WHERE  nome_membro ='". $_SESSION["usuario"]."' ORDER BY id_estoque DESC";

	$estoque = $mysql->query($sql2);

	$row_estoque= $estoque ->fetch_assoc();

	$id_estoque=$row_estoque['id_estoque'];

	$url= $row_estoque['url'];

	

	   $carro_atual= $carros_total +1 ;

	

  $km=$_POST['km']; 



  	 

  

	

                

	

	$up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  url='".$url."'");

	$up=$mysql->query ( "UPDATE estoque SET carros ='".$carro_atual."' WHERE  url='".$url."'");

	$up=$mysql->query ( "UPDATE membros SET carros_total = carros_total + 1 WHERE  url='".$url."'");





	

	foreach ($_POST as $campo => $valor) {

		if ($valor == 'Sim') {

			$check = explode("acessorios_",$campo);

			

			$sql= "INSERT INTO acessorios_carros (id_acessorios, id_estoque) VALUES (".$check[1].",".$id_estoque.")";

			

			 $sql= $mysql->query($sql); 

			

			

			

		}

	}

    if(!empty($_POST['url_foto'])){

       $url_foto=trim($_POST['url_foto']);

       $numero =md5(microtime()); 

       $imagem =$numero. ".jpg";

       if( !@copy( $url_foto, 'galeriadefotos/grd/'.$imagem ) ) {

    $errors= error_get_last();

     "COPY ERROR: ".$errors['type'];

     "<br />\n".$errors['message'];

} else {

         $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql); 

         $sql = "INSERT INTO poi_example (id_estoque,name,endereco,lat,lon,carromodelo,preco,foto)

		VALUES ('".$id_estoque."','".$nome_usuario."','".$endereco."','".$lat."','".$lon."','".$_POST['modelo']."','".$preco."','".$image."')";

		$sql= $mysql->query($sql); 

	

		 $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        

		  $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

		if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso! 169";



	} else {



	echo "NAo foi possivel salvar o LOG! 173";



	}	

}

   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
           // Redimensiona a imagem
   $image = $image->resize(569, 329,  'outside');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/grd/'.$numero.'.jpg');
  


   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/mini/'.$numero.'.jpg'); 

		

		

	

	}

	

	if($_FILES['imagem']['size'] > 0)

	{



		$numero =md5(microtime()); 

		$imagem =$numero. ".jpg";

		

		move_uploaded_file($foto["tmp_name"], $sTmpFolder . $numero . ".jpg");

        //grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

		//peq

		

   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/mini/'.$numero.'.jpg'); 

		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql); 

		

		 $sql = "INSERT INTO poi_example (id_estoque,name,endereco,lat,lon,carromodelo,preco,foto)

		VALUES ('".$id_estoque."','".$nome_usuario."','".$endereco."','".$lat."','".$lon."','".$_POST['modelo']."','".$preco."','".$imagem."')";

		$sql= $mysql->query($sql); 

	

		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        

		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

        salvaLog($mensagem);}

	

		

		



	if($_FILES['imagem2']['size'] > 0)

	{



		$numero =md5(microtime()); 

		$imagem = $numero . ".jpg";

		

		move_uploaded_file($foto2["tmp_name"], $sTmpFolder . $numero . ".jpg");



		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		

		@unlink($sTmpFolder . $numero . ".jpg");

	$image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
           // Redimensiona a imagem
   $image = $image->resize(569, 329,  'outside');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/grd/'.$numero.'.jpg');
  


   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('galeriadefotos/mini/'.$numero.'.jpg'); 


		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

         $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

	

        

		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

		if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso! 270";



	} else {



	echo "NAo foi possivel salvar o LOG! 274";



	}

	

	}   



	if($_FILES['imagem3']['size'] > 0)

	{

		$numero =md5(microtime()); 

		$imagem = $numero . ".jpg";

		move_uploaded_file($foto3["tmp_name"], $sTmpFolder . $numero . ".jpg");

		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		

		@unlink($sTmpFolder . $numero . ".jpg");

		

		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

          $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

		  

		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

		if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso! 305";



	} else {



	echo "NAo foi possivel salvar o LOG!309";



	}

	

	}   





	if($_FILES['imagem4']['size'] > 0)

	{



		$numero =md5(microtime());  

		$imagem = $numero . ".jpg";

		

		move_uploaded_file($foto4["tmp_name"], $sTmpFolder . $numero . ".jpg");



		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		

		@unlink($sTmpFolder . $numero . ".jpg");

		

		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

         $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

		

		

	if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso!344";



	} else {



	echo "NAo foi possivel salvar o LOG!348";



	}

	}   

	



	if($_FILES['imagem5']['size'] > 0)

	{



		$numero =md5(microtime());  

		$imagem = $numero . ".jpg";

		

		move_uploaded_file($foto5["tmp_name"], $sTmpFolder . $numero . ".jpg");



		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		

		@unlink($sTmpFolder . $numero . ".jpg");

		

		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

         $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

		  

		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

		

	if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso!383";



	} else {



	echo "NAo foi possivel salvar o LOG!387";



	}

	}   

	



	if($_FILES['imagem6']['size'] > 0)

	{



		$numero =trim($foto6. $marca.  $modelo);

		$imagem = $numero . ".jpg";

		

		move_uploaded_file($foto6["tmp_name"], $sTmpFolder . $numero . ".jpg");



		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		@unlink($sTmpFolder . $numero . ".jpg");

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

          $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

	  

		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;

		

	if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso!";



	} else {



	echo "NAo foi possivel salvar o LOG!";



	}

	}   





	if($_FILES['imagem7']['size'] > 0)

	{



		$numero =md5(microtime());  

		$imagem = $numero . ".jpg";

		

		move_uploaded_file($foto7["tmp_name"], $sTmpFolder . $numero . ".jpg");



		//grd

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 640, 480, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg", $sTmpFolder . "grd/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_640x480.jpg");

				

		//peq

		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);

		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");

		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");

		

		@unlink($sTmpFolder . $numero . ".jpg");

		

		

		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

		 $sql= $mysql->query($sql);

          $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;

		

		

	if (salvaLog($mensagem)) {



	echo "O LOG foi salvo com sucesso!";



	} else {



	echo "NAo foi possivel salvar o LOG!";



	}

	}   



  $_SESSION["msg"] = 2;

  $insertGoTo = "/".$row_estoque['id_estoque'];

  $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' ." carro" .$row_estoque['id_estoque'].'&nbsp;'. " fotos com sucesso " ;

 salvaLog($mensagem);

	   unset($_SESSION['id_fipe']);

			   ob_end_clean();

			  

			  ?>

 <script language= "JavaScript">

location.href="<?="/".trim($row_estoque['id_estoque'])?>";

</script>

<?  

	exit();

 }

?>

<div class="container">

<? if(isset($_GET['marca_post']) && !isset($_GET['id_ano'])){ 

    $_SESSION['codigo_marca']=$_GET['codigo_marca'];

    

    ?>

    

  <form action="?" method="GET" enctype="multipart/form-data" name="add" id="add" >

     <div class="wrapper2"></div>

 <div class="col-md-12 ">
 <input type="text"  itemprop="query-input"  name="txtnome"  onKeyUp="getDados()" aria-describedby="basic-addon3" class=" buscar form-control" id="txtnome" placeholder=" Pesquisar " >

<div id="Resultado"></div> </div>
</div>
     <div class="col-md-2 "><img src=" /images/<?=trim($_GET['marca_post'].".png");?>" class="img-responsive" ><h3><?=$_GET['marca_post'];?></h3> </div>

     <div class="col-md-10 "> <input type="text" class="form-control" id="busca" placeholder="Informe o Título do Livro">

     
     </div></div>

     

  

   

    <div class="col-md-12 " style="Min-height:150px;"></div>

  

   <?

   include'rodape.php';

   

}    

    

    

 if(!isset($_GET['marca']) && !isset($_GET['id_ano']) && !isset($_GET['codigo_marca'])){ ?>

 <html>

<head>

	<title>Wcarros anuncio em 3 cliks cadastro de anuncio em apenas 40 segundos </title>

	

	<link rel="stylesheet" type="text/css" href="/pag/css/jquery-ui.min.css?<?=time();?>">

</head>

<body><div id="wrapper2"></div>

	<div class='container'>

		 <div class="jumbotron" >

                         <p class="text-center">Insira no Campo Abaixo o Modelo de carro moto ou caminhão</p>

            <p><a href="#">Ex: para anuncia um celta digite celta e será exibida uma lista com todos as versões </a></p>



            <a href="#">Clik sobre o modelo e versão excolhido na proxima tela você inseri fotos preço e outros detalhes  </a>

        </div>

		

		<div class="row">

			<div class="form-group col-md-12 ">

 <div class="col-md-12 ">
 <input type="text"  itemprop="query-input"  name="txtnome"  onKeyUp="getDados()" aria-describedby="basic-addon3" class=" buscar form-control" id="txtnome" placeholder=" Pesquisar " >

<div id="Resultado"></div> </div>
			    <input type="text" class="form-control" id="busca" placeholder="exemplo gol celta, palio"><br></br>

			    <a href=""><p>

			    	<br></br>

			    </p>

			    <p class="cinza_claro_11px">

			    	Esta Consulta usa API api.wcarros  e reque uma conexão  de internet estavel  </p></a>

			</div>

			</div>

 

		

 

		

		

	</div>

<script src="/pag/js/jquery.js"></script>

	<script type="text/javascript" src="/pag/js/jquery-ui.min.js"></script>

	<script type="text/javascript">

		

		$(function() {



    // Atribui evento e função para limpeza dos campos

    $('#busca').on('input', limpaCampos);



    // Dispara o Autocomplete a partir do segundo caracter

    $( "#busca" ).autocomplete({

	    minLength: 2,

	    source: function( request, response ) {

	        $.ajax({

	            url: "pag/consulta.php",

	            dataType: "json",

	            data: {

	            	acao: 'autocomplete',

	                parametro: $('#busca').val()

	            },

	            success: function(data) {

	               response(data);

	            }

	        });

	    },

	    focus: function( event, ui ) {

	        $("#busca").val( ui.item.titulo );

	        carregarDados();

	        return false;

	    },

	    select: function( event, ui ) {

	        $("#busca").val( ui.item.titulo );

	        return false;

	    }

    })

    .autocomplete( "instance" )._renderItem = function( ul, item ) {

      return $( "<li>" )

        .append( "<a href=/adicionar?id_ano="+ item.codigo_modelo +">" + item.marca + "  " + item.modelo + "   </a><br>" )

        .appendTo( ul );

    };



    // Função para carregar os dados da consulta nos respectivos campos

    function carregarDados(){

    	var busca = $('#busca').val();



    	if(busca != "" && busca.length >= 2){

    		$.ajax({

	            url: "pag/consulta.php",

	            dataType: "json",	

	            data: {

	            	acao: 'consulta',

	                parametro: $('#busca').val()

	            },

	            success: function( data ) {

	               $('#codigo_barra').val(data[0].codigo_barra);

	               $('#titulo_livro').val(data[0].titulo);

	               $('#categoria').val(data[0].categoria);

	               $('#valor_compra').val(data[0].valor_compra);

	               $('#valor_venda').val(data[0].valor_venda);

	               $('#data_cadastro').val(data[0].data_cadastro);

	               $('#status').val(data[0].status);

	            }

	        });

    	}

    }



    // Função para limpar os campos caso a busca esteja vazia

    function limpaCampos(){

       var busca = $('#busca').val();



       if(busca == ""){

	   $('#codigo_barra').val('');

           $('#titulo_livro').val('')

           $('#categoria').val('');

           $('#valor_compra').val('');

           $('#valor_venda').val('');

           $('#data_cadastro').val('');

           $('#status').val('')

       }

    }

});

	</script>

</body>

</html>

 <? exit();  include'rodape.php';

   

} if(isset($_GET['id_ano'])){ 

       

      

     

       ?>

       <div id="wrapper2"></div>

	

      <form action="adicionar.php" method="POST" enctype="multipart/form-data" name="add" id="add" onSubmit="return AdicionarCarros();">

<?   $sql = "SELECT * FROM fp_modelo  where codigo_modelo='".trim($_GET['id_ano'])."'  limit 1";

	$r = $mysql->query($sql);

	if ( $r )

	{ ?>

	   

<ul >

           <?  while( $l =$r->fetch_assoc())

	    { ?>

      <div class="jumbotron">

          <li>    <a href="#" class="azul4"> <?  echo $l['marca']. " ". $l['modelo'];?></li> 

   



    <?   $sql = "SELECT DISTINCT valor ,ano,marca,modelo,tipo  FROM fp_ano  where codigo_modelo='".trim($_GET['id_ano'])."'  limit 100";

	$r = $mysql->query($sql);

	if ( $r )

	{ ?>

	   

<ul >Valor segundo tabela FIPE

           <?  while( $l_ano =$r->fetch_assoc()){
if($l_ano['ano']!="3200") { 

            ?>
  
     <li role="presentation"  class="active cinza_10px"><a href=""> Ano  <?=$l_ano['ano'] ?> Valor tabela Fipes R$ <?=number_format($l_ano['valor'],2,',','.')?> <span class="badge"></span></a></li>

    <?     } $tipo=$l_ano['tipo'];  ?> 
 
    <? } ?> </ul> este valor é um referência nacional de preços pratique preço justo <? } 

	 





if(strpos($l['modelo'],"4p") !== false)

     {

     $portas='4';

     }

  

if(strpos($l['modelo'],"2p") !== false)

     {

     $portas='2';

     }

if(strpos($l['modelo'],"5p") !== false)

     {

     $portas='5';

     }

if(strpos($l['modelo'],"3p") !== false)

     {

     $portas='3';

     }

if(	@$portas == false) {

 $portas='';	

}



	 if(	@$portas == false) {

 $portas='';	

}  else{  ?> 

    <li>  <? echo 'Número de Portas:'." ".$portas ."  "?></li>

<? } if(strpos($l['modelo'],"Aut") !== false)

     { ?>

    <li>   <a href="#"><? echo 'Transmissão:'." " .'Automatica' ?></a></li>

    <?  } ?></ul>  

	

    <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

      <h1>COR&nbsp;*</h1>

      <span id="cb_telefone"> 

      <input name="cor" type="text" class="form-control" id="cor" value="<?php echo @$_POST['cor']; ?>" size="15" maxlength="30"/>

      </span> </div>

      <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

      <h1>PRE&Ccedil;O&nbsp;* Ex. 19000 não use pontos ou virgulas</h1>

      <span id="preco"> 

      <input name="preco"type="text"  class="form-control"  value="<?

echo @ $_POST['preco'];

?>" size="10" maxlength="10"/>

      </span></div>

   <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

      <h1>Ano fabricação* Ex. 2007</h1>

      <span id="ano"> 

      <input name="ano"type="text" class="form-control"  value="<?

echo @ $_POST['ano'];

?>"/>

     </span></div>

       <div class="col-md-5 col-xs-12 col-sm-5 col-md-offset-2"> 


      <h1>Valor Entrada *opicional</h1>

      <select name="entrada" class="form-control"  id="transmissao" placeholder=" Se não sabe sem problemas pode deixar em  Branco" >

        <option value="0.0" selected="selected">0%</option>

        <option value="0.1">10%</option>

        <option value="0.2">20%</option>

        <option value="0.3">30%</option>

        <option value="0.4">40%</option>

        <option value="0.5">50%</option>

        </select>

        </div>

        <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

        <h1>taxa de juro  Ex. 1,75 ao mes  </h1>

        <span id="preco"> 

        <input name="taxa"  type="text"  class="form-control" placeholder=" Se não sabe sem problemas pode deixar em  Branco"  value="<?php echo @$_GET['taxa']; ?>" size="10" maxlength="10"/>

       </span></div>

        <div class="col-md-5 col-xs-12 col-sm-5 col-md-offset-2"> 

      <h1>PORTAS</h1>

      <? if(!empty($portas)){ ?>

      <input name="portas"  type="text"  class="form-control" placeholder=" Se não sabe sem problemas pode deixar em  Branco"  value="<?php echo @$portas; ?>" size="10" maxlength="10"/>

      <?} else{ ?>

      <span id="cb_telefone2"> 

       <select class="form-control" name="portas" id="ate" >

        <option value="2">2</option>

        <option value="3">2</option>

        <option value="4">4</option>      

      </select>

      <? }?>

    </div>

    <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 
      <h1>CONDIÇÃO</h1>

      <label> 

      <select class="form-control" name="condicoes" id="condicoes" >

        <option value="0">escolha uma Opção</option>

        <option value="Novo">Novo</option>

        <option value="Usado" selected="selected">Usado</option>

        <option value="Financiado">Financiado</option>

      </select>

      </label>

    </div>
    <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 
    <h1>KM  Ex. 80.000</h1>

      <span id="cb_email4"> 

      <input name="km" type="text" class="form-control" id="km" value="<?php echo @$_POST['km']; ?>" size="10" maxlength="10"/>

     </span></div>

    <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

      <h1>COMBUSTVEL*</h1>

      <? if(strpos($l['combustivel'],"Flex") !== false)

     { ?>

         <input name="combustivel" type="text" class="form-control" id="km" value="FLEX" size="10" maxlength="10"/>

         

     <? }elseif(strpos($l['combustivel'],"Gasolina") !== false)

     { ?>

         <input name="combustivel" type="text" class="form-control" id="km" value="Gasolina" size="10" maxlength="10"/>

     

     <? 

      }elseif(strpos($l['combustivel'],"Diesel") !== false)

     { ?>

         <input name="combustivel" type="text" class="form-control" id="km" value="Diesel" size="10" maxlength="10"/>

     

     <? }

     else{ ?>

      <label> 

      <select class="form-control" name="combustivel" id="combustivel" >

        <option>escolha uma opção</option>

        <option value="Gasolina">Gasolina</option>

        <option value="Alcool">Alcool</option>

        <option value="Diesel">Diesel</option>

        <option value="Flex" selected="selected">Flex</option>

        <option value="GNV">GNV</option>

      </select>

      </label>

           <? } ?>

    </div>

   <div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

         <h1>TRANSMISSÃO</h1>

       <? if(strpos($l['modelo'],"Aut") !== false)

     { ?>

      <input name="transmissao" type="text" class="form-control" id="km" value="<?php echo 'Automatico'?>" size="10" maxlength="10"/>

    <?  } else{ ?>

     

      <select class="form-control" name="transmissao" id="transmissao">

        <option value="Manual" selected="selected">Manual</option>

        <option value="Semi-Automatica">Semi-Automatico</option>

        <option value="Automatico">Automatico</option>

    </select> <? } ?>

    </div>

	<div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2"> 

      <h1><img src="img/yutube.png" width="30">Poste um video no yutube e cole o endereço o video fará parte do seu anuncio  

      <span id="cb_telefone2"> 

      <input name="video" type="text"  class="input" id="video" placeholder=" algo como https://www.youtube.com/watch?v=YHRhpSD1UpI" value="<?php echo @$_POST['video']; ?>" size="99" maxlength="900" />

      </span></div>

      

      

    <div class="container">





    

    <div class="col-md-8 col-xs-12 col-sm-8 col-md-offset-2"> <img src="img/sites-responsivos-dispositivos.png" > 

      <h1>Foto Capa do anúncio </h1>

      <label> insira uma foto de boa qualidade e com imagem bem clara do carro

      <input name="imagem" type="file" id="imagem" size="25" />

      </label>

    </div> 

    <div class="col-md-8 col-xs-12 col-sm-8 col-md-offset-2"> 
      <h1><img src="img/mstile-150x150.png" width="45" height="48">Cole Url da Foto *se você tem anuncio em outro lugar ex Facebook ,blog,site  

      <span id="cb_telefone2"> 

      <input name="url_foto" type="text"  class="input" id="url_foto" placeholder=" www.endereco.com/foto" value="<?php echo @$_POST['url_foto']; ?>" size="99" maxlength="900" />

      </span></div>

     

       </div><div class="col-md-7 col-xs-12 col-sm-7 col-md-offset-2">  

    <div class="col-md-12">

      <h1>FOTOS LATERAL *</h1>

      <label> 

      <input name="imagem2" type="file" id="imagem2" size="25" />

      </label>

    </div>

    <div class="col-md-12">

      <h1>FOTOS TRASEIRA *</h1>

      <label> 

      <input name="imagem3" type="file" id="imagem3" size="25" />

      </label>

    </div>

    <div class="col-md-12">

      <h1>FOTOS INTERIOR *</h1>

      <label> 

      <input name="imagem4" type="file" id="imagem4" size="25" />

      </label>

    </div>

    <div class="col-md-12">

      <h1>FOTOS PAINEL *</h1>

      <input name="imagem5" type="file" id="imagem5" size="25" /></label>

      </div>

     <div class="col-md-12">

      <h1><strong>OUTRAS FOTOS</h1>

      <input name="imagem6" type="file" id="imagem6" size="25" /></label>

      </div>

    <div class="col-md-12">

      <h1>OUTRAS FOTOS</h1>

      <input name="imagem7" type="file" id="imagem7" size="25" /></label>

      </div>

     <div class="col-md-12">

      <h1>OUTRAS FOTOS</h1>

      <input name="imagem8" type="file" id="imagem8" size="25" /></label>

      </div> <div class="col-md-12">

    <h1> DESCRIÇÃO</h1>

    <span> 

    <textarea name="descricao" cols="50" rows="4" wrap="physical" class="input" id="descricao" value="<?php echo $_POST['descricao']; ?>"></textarea>

    <?

    $sql2 = "SELECT * FROM acessorios ORDER BY acessorios ASC";

 $query2 = $mysql->query($sql2);



    while($row_acessorios= $query2->fetch_assoc()){ ?>

    

      <div class="col-md-12">



    

    <input name="acessorios_<?php echo $row_acessorios['id']; ?>" style="border:3px;" type="checkbox" id="acessorios_<?php echo trim($row_acessorios['id']); ?>" value="Sim" />

    <?php echo  utf8_encode($row_acessorios['acessorios']); ?>

    	 </div><? } ?>

    </div> 



    <input name="btnAction" type="submit" class="botao" id="btnAction" onClick="EW_submitForm(this.form);" value="CADASTRAR" />

    <input type="hidden" name="MM_insert" value="add" />

    <input type="hidden" name="url" value="<? echo $url;?>" />

    <input type="hidden" name="modelo" value="<? echo $l['modelo'];?>" /> </li> 

    <input type="hidden" name="marca" value="<? echo $l['marca'];?>" />

    <input type="hidden" name="tipo" value="<? echo trim($tipo); ?>" />
<? echo $l_ano['tipo'];?>
    <input type="hidden" name="fipe" value="<? echo $l['valor'];?>" />

    <input name="id_membro" type="hidden" id="id_membro" value="<? echo $_SESSION['id']; ?>" />

  </form><? }  } } ?>

</div></div></div>

</body>

</html>

