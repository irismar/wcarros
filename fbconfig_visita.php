  <div class="container text-center">
  <img src="img/logoindex.png" >
 

 
      <ul>
      <li class="text-center"><img src="img/loding.gif"><br> Aguarde estamos configurando o site ...</span></li>
      
       <li class="text-center">Carregando Dados externos </span></li>
       
          <li class="text-center">Verificações Adicionais de segurança  </span></li>
    
      </ul>   </div>
  <?php 
  if($_SERVER['SERVER_NAME']=="localhost"){
$mysql= new mysqli('localhost','root','', 'wcarros');
}else{
    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
}
  
require_once '_app/Config.php';
 if(isset($_GET['urlderetorno'])){
    
    $_SESSION['urlderetorno']=$_SERVER['REQUEST_URI'];  
 }
 
$Login = $fb->getRedirectLoginHelper();
$permissions = ['email'];
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $Login->getAccessToken();
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    if (isset($_GET['code'])) {
       
        ?><script language= "JavaScript">

        location.href="/fbconfig_visita.php" 

        </script><?php
           }
    try {
        $profile_request = $fb->get('/me?fields=name,picture.width(400){url},cover,link,location,id,email');
        $profile = $profile_request->getGraphNode()->asArray();
        $_SESSION['id_face']=$profile['id'];
        $_SESSION['nome_face']=$profile['name'];
        $_SESSION['cover_face']=$profile['cover']['source'];
        $_SESSION['foto_face']=$profile['picture']['url'];
        $_SESSION['link_face']=$profile['link'];
        $_SESSION['locale_face']=$profile['location'];
       
        $url_id=$profile['id'];
        $_SESSION['id_face']=$profile['id'];
        $_SESSION['email_face']=$profile['email'];
        $_SESSION['facebook_access_token'];
        $sql ="SELECT id FROM membros WHERE  idfacebook ='".$_SESSION['id_face']."'	ORDER BY id DESC "; 
	$query = $mysql->query($sql);
        $totalRows_propostas = $query->num_rows;

  if($totalRows_propostas =='0'){?>
       <script language= "JavaScript">

location.href="/cadastro.php?facebook=batepapo&&log=comentario"  ;

</script> 
 <? 
  exit();
}
 if( $totalRows_propostas =='1'){ ?>
     <script language= "JavaScript">

location.href="/login.php?log=<?=trim($_SESSION['id_face']);?>&&urlretorno=<?=$_SESSION['urlderetorno'];?>" ;

</script> 
    <?php  
  exit();

}
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    $logoff = filter_input(INPUT_GET, 'sair', FILTER_DEFAULT);
    if (isset($logoff) && $logoff == 'true'):
        session_destroy();
        header("Location: ./");
    endif;
     }else {
    $loginUrl = $Login->getLoginUrl('https://wcarros.com/fbconfig_visita.php', $permissions);
   
    ?><script language= "JavaScript">

        location.href="<?=$loginUrl;?>" 

        </script> <?
    
    
} ?>

