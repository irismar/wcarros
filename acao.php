<? 
require_once'Connections/repasses.php'; 
require_once('log.php');
require_once 'config/conexao.class.php';
require_once 'config/crud.class.php';
$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco
if($_SERVER['SERVER_NAME']=="localhost"){
$ip='177.17.186.232';
}else{
$ip=get22_client_ip();  
       }  //$ip=get22_client_ip(); 
include "lib/WideImage.php";
/////////////////atualizar///usuario//////////////////inicio////
if ((isset($_GET["horizontal"])) ) { 
   unset($_SESSION['horizontal']);
   unset($_SESSION['grade']);
   $_SESSION['horizontal']="ok";
   header("Location: ". $_SERVER['HTTP_REFERER']."");
   exit();
   }
if ((isset($_GET["grade"])) ) { 
    unset($_SESSION['horizontal']);
    unset($_SESSION['grade']);
    $_SESSION['grade']="ok";
    ob_end_clean();
    header("Location: ". $_SERVER['HTTP_REFERER']."");
    exit();}
/////////////////////////codigo faleconosco////////////////////
//
//
//
if(isset($_GET['proposta'])){    
$nome =  segurancastring($_POST['nome']);
$email =segurancastring( $_POST['email']);
$mensagem = segurancastring($_POST['mensaguem']);
$setor =segurancastring( $_POST['setor']);
//Abrindo Conexao com o banco de dados
$data=date('Y-m-d');
$sql="INSERT INTO faleconosco(nome,email,mensagem,setor,hora,ip,endereco )
VALUES ('".$nome."','".$email."','".$mensagem."','".$setor."','".$hora."','".$ip."','".$_SESSION['endereco1']."')";
$sql= $mysql->query($sql);
if($sql) {
$mensagem =$_POST['nome'] ."Enviou mensagem para administrador com sucesso" ;
@salvaLog($mensagem);
   
		
 ob_end_clean();
	header("Location: faleconosco/sucesso");
	exit(); 
	 }
$mensagem =$_POST['nome'] ."ERRO mensagem para administrador com sucesso" ;

  @salvaLog($mensagem);
  ob_end_clean();
	header("Location: faleconosco/falou");
	exit();

  }
//////////////inserir estrelas//////////////////////////////////
if(isset($_GET['estrelas_id'])){
  $id_membro=segurancastring($_GET['estrelas_id']);
  $estrelas=segurancastring($_POST['fb']);
  $endereco=trim($_SESSION['endereco1']);
  $conexao = Conect::getInstance(); 
  $sql = "INSERT INTO estrelas  (id_membro,estrelas,data,ip,endereco) VALUES (:id_membro,:estrelas,:data,:ip,:endereco)";
    $query =  $conexao->prepare($sql);
    
    $query->bindValue(":id_membro",$id_membro);
    $query->bindValue(":estrelas",$estrelas);
    $query->bindValue(":data",$hora);
    $query->bindValue(":ip",$ip);
    $query->bindValue(":endereco",$endereco);
    $query->execute();
  ob_end_clean();
  header("Location: ". $_SERVER['HTTP_REFERER']."");
   exit();  
}  
//////////////inserir estrala fim //////////////////////////////  
//insesrir mensagem para a loja///////////////////
///////////////  origem do script menu baixo ///////////////////
if(isset($_GET['comentario_id'])){
	$conexao = Conect::getInstance(); 
  $id_membro=segurancastring($_GET['comentario_id']);
  $comentario=trim($_POST['comentario']);
  $endereco=trim($_SESSION['endereco1']);
  
 echo  $sql = "INSERT INTO comentario_empresa  (id_membro,mensagem,data,ip,endereco) VALUES (:id_membro,:mensagem,:data,:ip,:endereco)";
    $query =  $conexao->prepare($sql);
    $query->bindValue(":id_membro",$id_membro);
    $query->bindValue(":mensagem",$comentario);
    $query->bindValue(":data",$hora);
    $query->bindValue(":ip",$ip);
    $query->bindValue(":endereco",$endereco);
    $query->execute();	
   
 
  header("Location: ". $_SERVER['HTTP_REFERER']."");
   exit();  
}
// inserir mendagem para a loja fim //////////////

//insesrir mensagem para a loja///////////////////
///////////////  origem do script menu baixo ///////////////////
if(isset($_GET['excluir_cometario_loja'])){

$deletar = $pdo->prepare("DELETE FROM tabela WHERE id=:id");
$id =segurancastring($_GET['excluir_cometario_loja']);
$deletar->bindValue(":id", $id);


  ob_end_clean();
 
  header("Location: ". $_SERVER['HTTP_REFERER']."");
   exit();  
}
// inserir mendagem para a loja fim //////////////
//
////////////////////////fim codigo faleconosco///////////////
/////////////////atualizar///usuario//////////////////inicio////
if ((isset($_GET["editar_user"])) ) { 
 if(trim($_SESSION['segure'])==trim($_POST['segure'])){ 	
require('admin/includes/tng/tNG.inc.php'); 
if (IsLoggedIn()) {
$sTmpFolder = "galeriadefotos/";
	$foto = $_FILES['imagem'];
	if($_FILES['imagem']['size'] > 0)
	{

		$numero =md5(microtime()); 
		$imagem =$numero. ".jpg";
		
		move_uploaded_file($foto["tmp_name"], $sTmpFolder . $numero . ".jpg");
		//grd
		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 350, 263, true);
		copy($sTmpFolder . "thumbnails/" . $numero . "_350x263.jpg", $sTmpFolder . "grd/" . $numero .".jpg");
		@unlink($sTmpFolder . "thumbnails/" . $numero . "_350x263.jpg");
				
		//peq
		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 120, 90, true);
		copy($sTmpFolder . "thumbnails/" . $numero . "_120x90.jpg", $sTmpFolder . "peq/" . $numero .".jpg");
		@unlink($sTmpFolder . "thumbnails/" . $numero . "_120x90.jpg");
		tNG_showDynamicThumbnail($sTmpFolder, $sTmpFolder, $numero . ".jpg", 60, 60, true);
		copy($sTmpFolder . "thumbnails/" . $numero . "_120x90.jpg", $sTmpFolder . "mini/" . $numero .".jpg");
		@unlink($sTmpFolder . "thumbnails/" . $numero . "_120x90.jpg");
		
		@unlink($sTmpFolder . $numero . ".jpg");
		
  $image = WideImage::load('galeriadefotos/grd/'.$numero.'.jpg');
         //$image = WideImage::load($nova_imagem);
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
                
            

		  }  
	
	
		if ($_POST['senha'] <> "") {
			$senha = segurancastring($_POST['senha']);
		} else {
			$senha =$_SESSION['senha'];
		}
if($_FILES['imagem']['size'] > 0)
	{
	$mysql->query("UPDATE membros SET   watapps='".$_POST['watapps']."',fixo='".$_POST['fixo']."', email='".$_POST['email']."',  senha='".$senha."' ,foto='".$imagem."' WHERE id='".$_SESSION["id"]."'");
      	$mysql->query("UPDATE estoque SET  foto_membro='".$imagem."', watapps='".$_POST['watapps']."' ,cidade='".$_POST['cidade']."', estado='".$_POST['estado']."' WHERE id_membro='".$_SESSION["id"]."'");
          	   $mensagem =$_SESSION["usuario"]. "Atualizou eus dados com sucesso";
		       salvaLog($mensagem);
			   $direção='/'.$_POST['url'];
			   header("Location:$direção");
	exit();
 } else{
  $mysql->query("UPDATE membros SET watapps='".$_POST['watapps']."',fixo='".$_POST['fixo']."', email='".$_POST['email']."', senha='".senha."'  WHERE id='".$_SESSION["id"]."'");
      	   $mysql->query("UPDATE estoque SET watapps='".$_POST['watapps']."', tell='".$_POST['fixo']."' WHERE id_membro='".$_SESSION["id"]."'");
          	   $mensagem =$_SESSION["usuario"]. "Atualizou eus dados com sucesso";
		       salvaLog($mensagem);
			   $direção='/'.$_POST['url'];
			   header("Location:$direção");
	exit();
	
}


  
  
  
  	


  
  } else {
    $mensagem =$nome_usuario. "Ocorreu um erro ao temtar atualizar dados ";
		
	
	$erro = 1;
	}}else{"Nogento";} }

/////////////////atualizar usuario fim //////////////////////

 if (isset( $_GET['vendido'])){
$vendido= alphaID($_GET['vendido'],true);
$quem= alphaID($_GET['membro'],true);
$data = date('Y-m-d');
$sql2 = "SELECT  * FROM  estoque	WHERE  id_estoque='".$vendido."' LIMIT 1 ";
$query2 = $mysql->query($sql2);
  
    while($row_vendido= $query2->fetch_assoc()) { 
	 $dias=calculardiasvenda($row_vendido['data'],$data);
	 $sql= "INSERT INTO vendido (nome_membro,id_membro,id_estoque,modelo,marca,data_anuncio,data_venda,dias,acessos,endereco,foto,preco)
	 VALUES ('".$row_vendido['nome_membro']."','".$row_vendido['id_membro']."','".$row_vendido['id_estoque']."','".$row_vendido['modelotexto']."','".$row_vendido[     'marcatexto']."','".$row_vendido['data_cadastro']."','".$data."','".$dias."','".$row_vendido['acessos']."','".$row_vendido[     'endereco']."','".$row_vendido['foto_carro']."','".$row_vendido['preco']."')";
       $sql=$mysql->query($sql);
	   
	}
$mysql->query("DELETE FROM estoque WHERE  id_estoque='".$vendido."' ");
$mysql->query("DELETE FROM propostas WHERE id = ".$vendido."' ");
$mysql->query("DELETE FROM poi_example WHERE id_estoque = ".$vendido."' ");

$sql2 = "SELECT  * FROM  fotos	WHERE  id_estoque = ".$vendido."";
  $query2 = $mysql->query($sql2);
  
    while($row_fotos= $query2->fetch_assoc()) { 
	
 $image = WideImage::load('galeriadefotos/grd/'.$row_fotos['imagem']);
// Redimensiona a imagem
$image = $image->resize(200, 100 );
// Salva a imagem em um arquivo (novo ou não)
$image->saveToFile('galeriadefotos/vendidos/'.$row_fotos['imagem']);
	
$sTmpFolder="galeriadefotos/";
	unlink("galeriadefotos/grd/".$row_fotos['imagem']);
	unlink("galeriadefotos/peq/".$row_fotos['imagem']);
	unlink("galeriadefotos/mini/".$row_fotos['imagem']);
	}
$mysql->query("DELETE FROM fotos WHERE  id_estoque='".$vendido."' ");
   //echo$sql=   $mysql->query=( "UPDATE estoque SET  vendido=SIM  WHERE id_estoque = ".$vendido." ");
	 //echo   $mysql->query=( "UPDATE estoque SET datavenda='".$data."'  WHERE id_estoque ='".$vendido."' ");
	 //  echo $mysql->query=("UPDATE membros SET carros=carros-1, carros_vendido=carros_vendido +1 WHERE id = '".$quem."'");
$mysql->query("UPDATE membros SET carros_vendido=carros_vendido + 1,carros=carros - 1  WHERE id = ".$quem."");
$mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "Vendeu o carro "."&nbsp;". $vendido."&nbsp;" ;
     salvaLog($mensagem);
	
ob_end_clean();
	header("Location: ". $_SERVER['HTTP_REFERER']."");
	exit();
	 } 


/////////////////////////////excluir carro ////////////////
/////////////////atualizar usuario fim //////////////////////

 if (isset( $_GET['excluir'])){
 $vendido= alphaID($_GET['excluir'],true);
 $quem= alphaID($_GET['membro'],true);
$data = date('Y-m-d');

$mysql->query("DELETE FROM estoque WHERE  id_estoque='".$vendido."' ");
$mysql->query("DELETE FROM propostas WHERE id = ".$vendido."' ");
$mysql->query("DELETE FROM poi_example WHERE id_estoque = ".$vendido."' ");

$sql2 = "SELECT  * FROM  fotos  WHERE  id_estoque = ".$vendido."";
  $query2 = $mysql->query($sql2);
  
    while($row_fotos= $query2->fetch_assoc()) { 
  

  
$sTmpFolder="galeriadefotos/";
  unlink("galeriadefotos/grd/".$row_fotos['imagem']);
  unlink("galeriadefotos/peq/".$row_fotos['imagem']);
  unlink("galeriadefotos/mini/".$row_fotos['imagem']);
  }
$mysql->query("DELETE FROM fotos WHERE  id_estoque='".$vendido."' ");
   //echo$sql=   $mysql->query=( "UPDATE estoque SET  vendido=SIM  WHERE id_estoque = ".$vendido." ");
   //echo   $mysql->query=( "UPDATE estoque SET datavenda='".$data."'  WHERE id_estoque ='".$vendido."' ");
   //  echo $mysql->query=("UPDATE membros SET carros=carros-1, carros_vendido=carros_vendido +1 WHERE id = '".$quem."'");
$mysql->query("UPDATE membros SET carros=carros - 1  WHERE id = ".$quem."");
$mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "exclui  carro "."&nbsp;". $vendido."&nbsp;" ;
     salvaLog($mensagem);
  
ob_end_clean();
  header("Location: ". $_SERVER['HTTP_REFERER']."");
  exit();
   } 

//////////////////////////////////////////////////////////   
    if (isset(  $_GET['deletar_euremetente'])){ 
 		 $delet= alphaID($_GET['deletar_euremetente'],true);
		$mysql->query("DELETE FROM propostas WHERE id = ".$delet." AND remetene='".$_SESSION['usuario']."' ");
     
    $mysql->query( "UPDATE membros SET alertamanesagem=0  WHERE id = ".$_SESSION['id']."");
    $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
    @salvaLog($mensagem);
    ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."");
		exit();}
       if (isset(  $_GET['deletar_gerente'])){ 
 		 $delet= trim($_GET['deletar_euremetente']);
		$mysql->query("DELETE FROM propostas WHERE id = ".$delet."  ");
     
    $mysql->query( "UPDATE membros SET alertamanesagem=0  WHERE id = ".$_SESSION['id']."");
    $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
    @salvaLog($mensagem);
    ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."");
		exit();}            
		 
   if (isset(  $_GET['deletar_eudestinatario'])){ 

      $delet= trim($_GET['deletar_eudestinatario']);
      $id_estoque= trim($_GET['id_estoque']);
      $mysql->query("DELETE FROM propostas WHERE id='$delet'   ");
       
       $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
       @salvaLog($mensagem);
       ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."#".$id_estoque."");
	   
     }
      if (isset(  $_GET['deletar_tudo'])){ 

      $delet= trim($_GET['deletar_eudestinatario']);
      $id_estoque= trim($_GET['id_estoque']);
      $mysql->query("DELETE FROM propostas WHERE id='$delet'   ");
      $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
      @salvaLog($mensagem);
      ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."#".$id_estoque."");
     
     }
    if (isset(  $_GET['deletar_contato'])){ 
      echo  $delet= trim($_GET['deletar_contato']);
      echo  $id_estoque= trim($_GET['id_estoque']);
      echo  $mysql->query("DELETE FROM propostas WHERE cod_seguranca='$delet' AND id_estoque='$id_estoque'   ");
       
       $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
       @salvaLog($mensagem);
       ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."#app");
	   }        
	   
	if (isset(  $_GET['DTM'])){ 
      $delet= alphaID($_GET['DTM'],true);
      $mysql->query("DELETE FROM propostas WHERE id_estoque = ".$delet." AND Destinatario='".$_SESSION['usuario']."' OR   remetene='".$_SESSION['usuario']."' ");
      $mysql->query( "UPDATE membros SET alertamanesagem=0  WHERE id = ".$_SESSION['id']."");
      $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou todas as suas mensagens"."&nbsp;".'<br>'. "se voc� apagou acidentalmente envie um e-mail para suporte@carrobomebarato.com com o codigo".  "&nbsp;". $delet;
      @salvaLog($mensagem);
      ob_end_clean();
	  header("Location: ". $_SERVER['HTTP_REFERER']."");
	    exit();}

  if (isset(  $_GET['deletartudo'])){ 
     $delet= alphaID($_GET['deletartudo'],true);
     $mysql->query("DELETE FROM acessos WHERE id_estoque = ".$delet." ");
     $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "deletou mensagem"."&nbsp;".  $delet;
     @salvaLog($mensagem);ob_end_clean();header("Location: ". $_SERVER['HTTP_REFERER']."");exit();
 } 
				
if(isset($_GET['memsagem']) && ( isset($_POST['memsagem'])&& ($_POST['memsagem']!='')) ) { 
    if(isset($_SESSION["foto"])&& $_SESSION["foto"]!=''){
    $foto=trim($_SESSION["foto"]);}else{ $foto=trim("avatar.jpg");}

if(@$_SESSION["usuario"]&& ($_SESSION["usuario"]!='')){
    $user=$_SESSION["usuario"];
}else{
    $user=$_POST['nome'];
}//////verificar se é a primeira mensagem do usuario para este anuncio /////// 
if(IsLoggedIn()){
  $sql2 ="SELECT id,cod_seguranca,id_estoque FROM propostas WHERE  id_membro='". $_SESSION['id']. "' AND  id_estoque='".$_GET['id']."'";
   
}else{
 $sql2 ="SELECT id,cod_seguranca,id_estoque FROM propostas WHERE  cod_seguranca='". $_SESSION['segure']. "' AND  id_estoque='".$_GET['id']."'";
}
  $query2 = $mysql->query($sql2);

$totalRows_acessos =$query2->num_rows; 
 if( $totalRows_acessos !=0){
  /////nada adiciona ///////

    $conexao = Conect::getInstance(); 
    $sql = "INSERT INTO propostas (Destinatario,remetene,mensagem,id_estoque,email,data,foto,endereco,cod_seguranca,alerta,id_membro,marca,modelo,preco,id_facebook,id_remetente) VALUES (:Destinatario,:remetene,:mensagem,:id_estoque,:email,:data,:foto,:endereco,:cod_seguranca,:alerta,:id_membro,:marca,:modelo,:preco,:id_facebook,:id_remetente)";
    $query =  $conexao->prepare($sql);
    $query->bindValue(":Destinatario",$_GET['memsagem']);
    $query->bindValue(":remetene",$user);
    $query->bindValue(":mensagem",utf8_encode($_POST['memsagem']));
    $query->bindValue(":id_estoque",$_GET['id']);
    $query->bindValue(":email",$_POST['email']);
    $query->bindValue(":data",$hora);
    $query->bindValue(":foto",trim($foto));
    $query->bindValue(":endereco",utf8_encode($_GET['endereco1']));
    $query->bindValue(":cod_seguranca",$_SESSION['segure']);
    $query->bindValue(":alerta","1");
    $query->bindValue(":id_membro",$_GET['id_membro']);
    $query->bindValue(":marca",$_GET['marca']);
    $query->bindValue(":modelo",$_GET['modelo']);
    $query->bindValue(":preco",$_GET['preco']);
    $query->bindValue(":id_facebook",@$_SESSION['id_face']);
    $query->bindValue(":id_remetente",@$_GET['id_remetente']);
    $query->execute();
    $_SESSION["mens_id_estoque"] =$_GET['id'];
    $_SESSION["msm"]="Memsagem Enviada Com Sucesso ";
    $mensagem ="Usuario "."&nbsp;".@$_POST['nome']." mandou uma memsagem para usuario"."&nbsp;".$_GET['memsagem'] ."&nbsp;"." com sucesso" ;
    $mysql->query("UPDATE membros SET alertamanesagem=alertamanesagem + 1  WHERE id = ".$_GET['id_membro']."");
    salvaLog($mensagem);
    $_SESSION['nome_visita']=$_GET['memsagem'];
    $_SESSION['telefone_visita']=$_POST['email'];
  
   $urlanteior=$_SERVER['HTTP_REFERER'];
   $retorno=$urlanteior.'#'.trim($_GET['id']);  ?>
   <script language= "JavaScript">
   location.href="<?=$retorno;?>";
   </script> <? exit();
    }else{
    $sql = "INSERT INTO propostas (Destinatario,remetene,mensagem,id_estoque,email,data,foto,endereco,cod_seguranca,alerta,id_membro,marca,modelo,preco,id_facebook,respondido,id_remetente) VALUES (:Destinatario,:remetene,:mensagem,:id_estoque,:email,:data,:foto,:endereco,:cod_seguranca,:alerta,:id_membro,:marca,:modelo,:preco,:id_facebook,:respondido,:id_remetente)";
    $conexao = Conect::getInstance(); 
    $query =  $conexao->prepare($sql);
    $query->bindValue(":Destinatario",$_GET['memsagem']);
    $query->bindValue(":remetene",$user);
    $query->bindValue(":mensagem",$_POST['memsagem']);
    $query->bindValue(":id_estoque",$_GET['id']);
    $query->bindValue(":email",$_POST['email']);
    $query->bindValue(":data",$hora);
    $query->bindValue(":foto",trim($foto));
    $query->bindValue(":endereco",utf8_encode($_GET['endereco1']));
    $query->bindValue(":cod_seguranca",$_SESSION['segure']);
    $query->bindValue(":alerta","1");
    $query->bindValue(":id_membro",$_GET['id_membro']);
    $query->bindValue(":marca",$_GET['marca']);
    $query->bindValue(":modelo",$_GET['modelo']);
    $query->bindValue(":preco",$_GET['preco']);
    $query->bindValue(":id_facebook",@$_SESSION['id_face']);
    $query->bindValue(":respondido",'1');
    $query->bindValue(":id_remetente",@$_GET['id_remetente']);
   
    $query->execute(); 
    $_SESSION["mens_id_estoque"] =$_GET['id'];
    $_SESSION["msm"]="Memsagem Enviada Com Sucesso ";
    $mensagem ="Usuario "."&nbsp;".@$_POST['nome']." mandou uma memsagem para usuario"."&nbsp;".$_GET['memsagem'] ."&nbsp;"." com sucesso" ;
    $mysql->query("UPDATE membros SET alertamanesagem=alertamanesagem + 1  WHERE id = ".$_GET['id_membro']."");
    salvaLog($mensagem);
    $_SESSION['nome_visita']=$_GET['memsagem'];
    $_SESSION['telefone_visita']=$_POST['email'];
    $urlanteior=trim($_GET['id']);
    $retorno=$urlanteior.'#'.trim($_GET['id']);  ?>
    <script language= "JavaScript">
    location.href="<?=$retorno;?>";
    </script> <? exit();}
    }
    if (isset($_GET['responder'])) {   
   $sql="INSERT INTO propostas ( 	

Destinatario,remetene,mensagem,id_estoque,email,data,foto,resposta,cod_seguranca) VALUES 
('".$_GET['responder']."', '".$_POST['nome']."','".$_POST['memsagem']."','".$_GET['id_estoque']."','".$_POST['email']."','".$hora."','".$_GET['foto']."','".$_GET['resposta']."','".$_POST['cod_seguranca']."')";
  $sql= $mysql->query($sql); 
  if( $sql){
         $_SESSION["mens_id_estoque"] =  $_GET['resposta'];
          	
   $_SESSION["msm"]="Memsagem Enviada Com Sucesso ";
  $mensagem ="Usuario "."&nbsp;".$_POST['nome']." mandou uma memsagem para usuario"."&nbsp;".$_GET['responder'] ."&nbsp;"." com sucesso" ;

    $mysql->query ("UPDATE membros SET alertamanesagem=alertamanesagem + 1  WHERE id = ".$_GET['id_membro']."");
 
   $mysql->query("UPDATE propostas SET respondido= 1  WHERE id = ".$_GET['resposta']."");

	salvaLog($mensagem);
	

 ob_end_clean();
	header("Location: ". $_SERVER['HTTP_REFERER']."");
	exit();

}//si n�o for logado atualiza aqui fim	
     ob_end_clean();
	header("Location: ". $_SERVER['HTTP_REFERER']."");
	exit();
     
     }
///////////////////resposta fim //////////////	 
	 	 if (isset( $_GET['gostei'])){
  $busca=trim($_GET['gostei']);
  $mysql->query("UPDATE estoque SET gostei= gostei+1 WHERE  id_estoque=". $busca."");

 $mensagem=" visitante gostou do carro"."&nbsp;".  $busca."&nbsp;" ;
 @salvaLog($mensagem);
ob_end_clean();

	header("Location: ". $_SERVER['HTTP_REFERER'].'#'.$busca."");
	exit();  } 
   if (isset( $_GET['naogostei'])){
	  $busca=trim($_GET['naogostei']);
$mysql->query("UPDATE estoque SET naogostei= naogostei+1 WHERE  id_estoque=". $busca."");
$mensagem=" visitante nao gostou do carro"."&nbsp;".  $busca."&nbsp;" ;
    @salvaLog($mensagem);
ob_end_clean();
	header("Location: ". $_SERVER['HTTP_REFERER'].'#'.$busca."");
	exit();
  }  
if (isset( $_GET['90dias'])){ 
 $vendido=  alphaID ($_GET['90dias'],true) ; 
  $data = date('Y-m-d');
  

   $mysql->query  ("UPDATE estoque SET data_cadastro='".date('Y-m-d')."',exibir='1'  WHERE id_estoque= '".$vendido."' AND id_membro='".$_SESSION['id']."'");
   $mensagem=" usuario"."&nbsp;". $_SESSION['usuario']."&nbsp;". "renovou divulgação do carro"."&nbsp;". $vendido."&nbsp;"."por mais 90 dias " ;
      @salvaLog($mensagem);
       
	ob_end_clean();
	header("Location: " .$_SERVER['HTTP_REFERER']."#".$vendido."");
	
	  exit();
  }
  if (isset( $_GET['recuperar'])){
    
$data=date('Y-m-d');
$email= segurancastring($_POST['email']);
echo $sql="INSERT INTO esquecir(email,ip,data )VALUES ('".$email."','".$ip."','".date('Y-m-d')."')";
$sql= $mysql->query($sql);
	
if($sql) {
   
 echo $mensagem =$_POST['nome'] ."Enviou mensagem para administrador com sucesso" ;

	@salvaLog($mensagem);
   
	header("Location: /recuperar?sucesso");	

	 }else{
echo $mensagem =$_POST['nome'] ."ERRO mensagem para administrador com sucesso" ;

  @salvaLog($mensagem);

header("Location: /recuperar?erro");
  }
  
      }
  ?>