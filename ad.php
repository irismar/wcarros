<? 
require_once('Connections/repasses.php'); 
require_once('log.php'); 
?>
<?php require_once('admin/includes/tng/tNG.inc.php'); 


$_SESSION['plano'] ='1';
	$data = date('Y-m-d');


unset($_SESSION['cadastro']);
$_SESSION["msg"] = "";




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
  	 
 $sql= "INSERT INTO membros (data, nome, endereco,log, lat,cidade,estado,watapps,tell)
 VALUES ('".$hora."','".$_POST['nome']."','".trim($_POST['endereco'])."','".trim($_POST['log'])."','".trim($_POST['lat'])."','".trim($_POST['cidade'])."','".trim($_POST['estado'])."','".$_POST['watapps']."','".$_POST['tell']."')";
$sql= $mysql->query($sql);  

 echo   $sql2 = "SELECT id FROM membros WHERE  nome ='". $_POST['nome']."' ORDER BY id DESC";
	$estoque = $mysql->query($sql2);
	$row_estoque= $estoque ->fetch_assoc();
	echo $id= $row_estoque['id'];
	

echo $sql2= "INSERT INTO estoque (endereco,id_membro,nome_membro, data, data_cadastro, categoria,marcatexto,modelotexto,  ano, ano2, cor, preco, condicoes, km, cidade,estado, portas, combustivel, transmissao, descricao,lat,lon ,watapps,tell,avisado)
  VALUES ('".trim($_POST['endereco'])."',
					   '".$id."',
					   '".$_POST['nome']."',
					   '".$hora."',
					   '".$hora."',				   
                       '3',
					   '".$_POST['marca']."',
					   '".$_POST['modelo']."',
					   '".$_POST['ano1']."',
					   '".$_POST['ano2']."',
                       '".$_POST['cor']."',
                       '".$_POST['preco'] ."',
					   '".$_POST['condicoes']."',
					   '".$_POST['km']."',
					   '".trim($_POST['cidade'])."',
					   '".trim($_POST['estado'])."',
					   '".$_POST['portas']."',
					   '".$_POST['combustivel']."',
					   '".$_POST['transmissao']."',
                                           '".$_POST['descricao']."',
					  
					   '".$_POST['lat']."',
					   '".$_POST['log']."',
					   '".$_POST['watapps']."',
					   '".$_POST['tell']."','Sim' )";
   $sql2= $mysql->query($sql2); 		
	
     $sql2 = "SELECT nome_membro,id_estoque FROM estoque WHERE  nome_membro ='".$_POST['nome']."' ORDER BY id_estoque DESC";
	$estoque = $mysql->query($sql2);
	$row_estoque= $estoque ->fetch_assoc();
	echo $id_estoque= intval($row_estoque['id_estoque']);
	$nome_membros= $row_estoque['nome_membro'];
    
	
  $km=$_POST['km']; 
  $preco= $_POST['preco'];
  	 
  
	
                
	
	$up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  nome='". $_POST['nome']."'");


	
	foreach ($_POST as $campo => $valor) {
		if ($valor == 'Sim') {
			$check = explode("acessorios_",$campo);
			
			$sql= "INSERT INTO acessorios_carros (id_acessorios, id_estoque) VALUES (".$check[1].",".$id_estoque.")";
			
			 $sql= $mysql->query($sql); 
			
			
			
		}
	}

	#Indice de identificacao da ordem de tratamento do arquivos no servidor
$i = 0;
 
#Analisa cada arquivo
foreach ($_FILES["arquivos"]["error"] as $key => $error) {
   
    # Definir o diretório onde salvar os arquivos.
    $destino = "galeriadefotos/" . $_FILES["uploads"]["name"][$i];
   
    #Move o arquivo para o diretório de destino
    move_uploaded_file( $_FILES["uploads"]["name"][$i], $destino );
 
    #Próximo arquivo a ser analisado
    $i++;
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
		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 220, 190, true);
		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "peq/" . $numero .".jpg");
		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");
		@unlink($sTmpFolder . $numero . ".jpg");
		
		//micro
		
		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 120, 90, true);
		copy($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg", $sTmpFolder . "mini/" . $numero .".jpg");
		@unlink($sTmpFolder . "thumbnails/" . $numero . "_220x190.jpg");
		@unlink($sTmpFolder . $numero . ".jpg");
		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
		 $sql= $mysql->query($sql); 
		
		 $sql = "INSERT INTO poi_example (id_estoque,name,endereco,lat,lon,carromodelo,preco,foto)
		VALUES ('".$id_estoque."','".$_POST['nome']."','".$_POST['endereco']."','".$_POST['lat']."','".$_POST['log']."','".$_POST['modelo']."','".$_POST['preco']."','".$imagem."')";
		$sql= $mysql->query($sql); 
	
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$_POST['nome']. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

	}
	
		
		
		}   
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
		
		
		$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
		 $sql= $mysql->query($sql);
         $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$row_estoque['id_estoque'].'&nbsp;'. "com sucesso" ;
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

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
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

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
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		
	if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

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
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		
	if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

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
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
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
		$adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");
        
		 $mensagem =$nome_usuario. "Adicionou " .'&nbsp;' .$imagem.'&nbsp;'."para carro" .$id_estoque.'&nbsp;'. "com sucesso" ;
		
	if (salvaLog($mensagem)) {

	echo "O LOG foi salvo com sucesso!";

	} else {

	echo "NAo foi possivel salvar o LOG!";

	}
	}   

  $_SESSION["msg"] = 2;
  $insertGoTo = "/".$row_estoque['id_estoque'];
  $mensagem =$_POST['nome']. "Adicionou " .'&nbsp;' ." carro" .$row_estoque['id_estoque'].'&nbsp;'. " fotos com sucesso " ;
		
	salvaLog($mensagem);
	
  header("Location:  /".intval($row_estoque['id_estoque'])."");
	 exit();

}







?>
<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
 
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/estilo.css" rel="stylesheet" type="text/css">
<? include("meta.php"); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/simpleAutoComplete.js"></script>

<script src="Scripts/funcoes.js" type="text/javascript"></script>
<script src="Scripts/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
	    $('#estado_autocomplete').simpleAutoComplete('autocompletecarros.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',	
		attrCallBack: 'rel',
		identifier: 'estado'
	    },estadoCallback);

	    $('#cidade_autocomplete').simpleAutoComplete('ajax_query.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',
		identifier: 'cidade',
		extraParamFromInput: '#id_estado'
	    },cidadeCallback);
        });
		
		
	
	function estadoCallback( par )
	{
	    $("#id_estado").val( par[0] );
	    $("#uf1").val( par[1] );
	    $("#cidade_autocomplete").removeAttr("disabled");
		$("#cidade_autocomplete, #uf2, #id_cidade").val("");
	}

	function cidadeCallback( par )
	{
	    $("#id_cidade").val( par[0] );
	    $("#uf2").val( par[1] );
	}
	
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>


  <form action="" method="POST" enctype="multipart/form-data" name="add" id="add" onSubmit="return AdicionarCarros();">
    
	

       <div id="caixa_cadastro"> 
      <h1>nome&nbsp; da sua Empresa ou seu nome </h1><span id="cb_nome">
      <input name="nome" required  type="text" class="input" id="nome" value="<?php echo @$_POST['nome']; ?>" size="20" maxlength="100"placeholder="Nome exibido no anúncio"/>
    
      </div>
    
         <div id="caixa_cadastro"> 
        <h1>Cidade</h1>
        <span id="cb_endereco"> <input name="cidade" id="cidade"   type="text" class="input" id="endereco" value=" <?php echo @trim($cidade); ?>" size="42" maxlength="100" /> 
        </span> </div>
		 <div id="caixa_cadastro"> 
        <h1>Estado</h1>
        <span id="cb_endereco"> <input name="estado" id="estado"   type="text" class="input" id="estado" value=" <?php echo @trim($estado); ?>" size="42" maxlength="100" /> 
        </span> </div>
        <input type="hidden" value="<?php echo @trim($_GET['lat']); ?>" id="lat" name="lat"   />
       
        <input type="hidden"  value="<?php echo @trim($_GET['long']); ?>"id="log" name="log"  />
       
      <div id="caixa_cadastro"> 
        <h2>endereco</h2>
        <span id="cb_endereco"> <input name="endereco" id="endereco"  required name="endereco" type="text" class="input" id="endereco" value=" <?php echo @$rua."&nbsp;&nbsp;".@$cidade."&nbsp;&nbsp;".@$estado."&nbsp;&nbsp;". @$pais."&nbsp;&nbsp;".  @$cep; ?>" size="82" maxlength="100" /> 
        </span> </div>
      <div id="caixa_estoque1"> 
        <div id="caixa_cadastro"> 
         
          <span id="cb_telefone"> 
           <h1></h1><img src="img/icone-whatsapp.png" width="30" height="30">
           <input name="watapps" required  type="number"  class="input" id="watapps" value="<? echo @utf8_encode($_POST['watapps']); ?>" size="10" maxlength="20" placeholder="DD-número"/>
          </span> </div>
        <div id="caixa_cadastro"> 
          <h1></h1>
          <span id="cb_telefone"> <input name="tell" type="number"  class="input" id="tell" value="<? echo @utf8_encode($_POST['tell']); ?>" size="10" maxlength="20" placeholder="DD-número"/> 
          </span> </div> 
        
	
	<div id="caixa_cadastro"> 
      <h2>Escolha a Marca :</h2>
      <input type="text" id="estado_autocomplete" name="marca" autocomplete="off"  />
    </div>
    <input type="hidden" name="id_estado" id="id_estado" />
    <div id="caixa_cadastro"> 
      <h2>Escolha o Modelo:</h2>
      <input type="text" id="cidade_autocomplete" name="modelo" autocomplete="off" disabled />
    </div>
    <div id="caixa_cadastro"> 
      <h1> ANO do Modelo *</h1>
      <select name="ano1" id="ate" >
        <? 
	  
	  
	  $x = 1990; while($x <= date('Y')) { ?>
        <option value="<? echo $x; ?>"><? echo $x; ?></option>
        <? $x++; } ?>
      </select>
    </div>
    <div id="caixa_cadastro"> 
      <h1>ANO do Modelo *</h1>
      <select name="ano2" id="ate" >
        <? $x = 1990; while($x <= date('Y')) { ?>
        <option value="<? echo $x; ?>"><? echo $x; ?></option>
        <? $x++; } ?>
      </select>
    </div>
    <div id="caixa_cadastro"> 
      <h1>COR&nbsp;*</h1>
      <span id="cb_telefone"> 
      <input name="cor" type="text" class="input" id="cor" value="<?php echo @$_POST['cor']; ?>" size="15" maxlength="30"/>
      </span> </div>
    <div id="caixa_cadastro"> 
      <h1>PRE&Ccedil;O&nbsp;*</h1>
      <span id="preco"> 
      <input name="preco"type="text" class="input"  value="<?
echo @ $_POST['preco'];
?>" size="10" maxlength="10"/>
      Ex. 19.000,00</span></div>
    
    <div id="caixa_cadastro"> 
      <h1>PORTAS</h1>
      <span id="cb_telefone2"> 
      <input name="portas" type="number"  class="input" id="portas" value="<?php echo @$_POST['4']; ?>" size="5" maxlength="1" />
      </span></div>
    <div id="caixa_cadastro"> 
      <h1>CONDICÃO</h1>
      <label> 
      <select name="condicoes" id="condicoes" >
        <option value="0">escolha uma Opção</option>
        <option value="Novo">Novo</option>
        <option value="Usado" selected="selected">Usado</option>
        <option value="Financiado">Financiado</option>
      </select>
      </label>
    </div>
    <div id="caixa_cadastro"> 
      <h1>KM&nbsp;*</h1>
      <span id="cb_email4"> 
      <input name="km" type="text" class="input" id="km" value="<?php echo @$_POST['km']; ?>" size="10" maxlength="10"/>
      Ex. 80.000</span></div>
    <div id="caixa_cadastro"> 
      <h1>COMBUSTVEL*</h1>
      <label> 
      <select name="combustivel" id="combustivel" >
        <option>escolha uma op&ccedil;&atilde;o</option>
        <option value="Gasolina">Gasolina</option>
        <option value="Alcool">Alcool</option>
        <option value="Diesel">Diesel</option>
        <option value="Flex" selected="selected">Flex</option>
        <option value="GNV">GNV</option>
      </select>
      </label>
    </div>
    <div id="caixa_cadastro"> 
      <h1>TRANSMISS&Atilde;O</h1>
      <select name="transmissao" id="transmissao">
        <option value="Manual" selected="selected">Manual</option>
        <option value="Semi-Automatica">Semi-Automatico</option>
        <option value="Automatico">Automatico</option>
      </select>
    </div>
	 <div id="caixa_cadastro"> 
      <h1><img src="images/youtube.png">Video</h1>poste um video no yutube e cole o endereço do video aqui o video fará parte do seu anuncio  
      <span id="cb_telefone2"> 
      <input name="video" type="text"  class="input" id="video" placeholder=" algo como https://www.youtube.com/watch?v=YHRhpSD1UpI" value="<?php echo @$_POST['video']; ?>" size="99" maxlength="900" />
      </span></div>
    <div id="caixa_cadastro"> 
      <h1>FOTOS*</h1>
      <label> 
     
      <input name="arquivos[]" type=file multiple /></label>
      </div><div id="caixa_cadastro">
    <h1> DESCRIÇÃO</h1>
    <span> 
    <textarea name="descricao" cols="50" rows="4" wrap="physical" class="input" id="descricao" value="<?php echo $_POST['descricao']; ?>"></textarea>
   <h1> <?
    $sql2 = "SELECT * FROM acessorios ORDER BY acessorios ASC";
 $query2 = $mysql->query($sql2);

    while($row_acessorios= $query2->fetch_assoc()){ ?>
    
     <div id="caixa_cadastro">

     <p>
    <input name="acessorios_<?php echo $row_acessorios['id']; ?>" style="border:3px;" type="checkbox" id="acessorios_<?php echo $row_acessorios['id']; ?>" value="Sim" />
    <?php echo ($row_acessorios['acessorios']); ?></p>
    	 </div><? } ?>
    

    <input name="btnAction" type="submit" class="botao2" id="btnAction" onClick="EW_submitForm(this.form);" value="CADASTRAR" />
    <input type="hidden" name="MM_insert" value="add" />
    <input name="id_membro" type="hidden" id="id_membro" value="<? echo $_SESSION['id']; ?>" />
  </form>
</div></div></div>
</body>
</html>
