<? if( isset($_GET["facebook"]) ){
$url_user=NormalizaURL($_SESSION['nome_face']);
$url_user= strtolower($url_user);
echo trim($_SESSION['endereco1']);
echo  utf8_encode(trim($_SESSION['cidade']));
echo $estado=(trim($_SESSION['estado']));
$estado = str_replace("%C3%A9", "e",   $modulo);
$url_estado=NormalizaURL($_SESSION['estado']);
$url_cidade=NormalizaURL($_SESSION['cidade']);
?><?


    $conexao = Conect::getInstance(); 
    $sql = "INSERT INTO membros (data, nome, endereco,url_cidade,url_estado,estado,cidade,lat,log,idfacebook,namefacebok,url) VALUES (:data,:nome,:endereco,:url_cidade,:url_estado,:estado,:cidade,:lat,:log,:idfacebook,:namefacebok,:url)";
    $query =  $conexao->prepare($sql);
    $query->bindValue(":nome",$_SESSION['nome_face']);
    $query->bindValue(":data",$hora);
    $query->bindValue(":endereco",$_SESSION['endereco1']);
    $query->bindValue(":url_estado",$url_estado);
    $query->bindValue(":url_cidade",$url_cidade);
    $query->bindValue(":estado",$_SESSION['estado']);
    $query->bindValue(":cidade",$_SESSION['cidade']);
    $query->bindValue(":lat",$_SESSION['lat']);
    $query->bindValue(":log",$_SESSION['log']);
    $query->bindValue(":idfacebook",$_SESSION['id_face']);
    $query->bindValue(":namefacebok",$_SESSION['nome_face']);
    $query->bindValue(":url",$url_user);
    $query->execute();
    $mensagem ="Usuario acessou a pagina com sucesso" .$_SESSION['endereco1'];
    salvaLog($mensagem);
         $_SESSION['acesso']="ok";
   
 //echo $sql= "INSERT INTO membros (data, nome, endereco,log, lat,cidade,estado,idfacebook,namefacebok,url)
 //VALUES ('".$hora."','".trim($_SESSION['nome_face'])."','".trim($_SESSION['endereco1'])."','".trim($_SESSION['log'])."','".trim($_SESSION['lat'])."','". utf8_encode(trim($_SESSION['cidade']))."','".$estado."','".$_SESSION['id_face']."','".$_SESSION['nome_face']."','".trim($url_user)."')";



     $_SESSION['goo']=$_SESSION['id_face'];
 ?>
  <script language= "JavaScript">

location.href="/login.php?log=<?=trim($_SESSION['id_face']);?>" ;
 exit();
</script> 


<? }

	
	 
		

 

  

 

