<?php
session_start();
// autoloader gerado pelo composer
require_once '_app/Facebook/autoload.php';
$fb = new \Facebook\Facebook([
  'app_id' => '279319172867327',
  'app_secret' => 'afc3214f0e940b45211737617abd1289',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);
      

$helper = $fb->getRedirectLoginHelper();
//var_dump($helper);
$permissions = ['email']; // Optional permissions

try {
	if(isset($_SESSION['face_access_token'])){
		$accessToken = $_SESSION['face_access_token'];
	}else{
		$accessToken = $helper->getAccessToken();
	}
	
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}
        if (! isset($accessToken)) {
	$url_login = 'https://wcarros.com/fbconfig.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
        ?><script language= "JavaScript">
        location.href="<?=$loginUrl;?>" 
        </script> <?
        }else{
	$url_login = 'https://wcarros.com/fbconfig.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
	//Usuário ja autenticado
	if(isset($_SESSION['face_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	}//Usuário não está autenticado
	else{
		$_SESSION['face_access_token'] = (string) $accessToken;
		$oAuth2Client = $fb->getOAuth2Client();
		$_SESSION['face_access_token'] = (string) $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);	
	}
	
	try {
		// Returns a `Facebook\FacebookResponse` object
		$response = $fb->get('/me?fields=picture,name,email');
                
		$user = $response->getGraphNode()->asArray();
		//var_dump($user);
                 $_SESSION['nome_face']=$user['name'];
                 $_SESSION['id_face']= $user['id'];
                //////////////////////verificar se usuario exist//////////
                 if($_SERVER['SERVER_NAME']=="localhost"){
                 $mysql= new mysqli('localhost','root','', 'wcarros');
                 }else{
                 $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');
                 }
                  $sql ="SELECT id FROM membros WHERE  idfacebook ='".$user['id']."'	ORDER BY id DESC "; 
	             $query = $mysql->query($sql);
                     $totalRows_propostas = $query->num_rows;
                     if($totalRows_propostas =='0'){?>
                             <script language= "JavaScript">
                              location.href="/cadastroface?facebook=criptov=154"  ;                               
                     </script> 
                             <?  }else{ 
                                 //////////////se eu já sou cadastrdo favor faça o login
                                 ?>                     
                    <script language= "JavaScript">

location.href="/login.php?log=<?=trim($_SESSION['id_face']);?>" ;
 exit();
</script>   <?  }
            //////////////////////////////////////////////////////////
                //echo $user['email'];		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
	}
}
?>
  <div class="container text-center">
  <img src="img/logoindex.png" >
      <ul>
      <li class="text-center"><img src="img/loding.gif"><br> Aguarde estamos configurando o site ...</span></li>
      <li class="text-center">Carregando Dados externos </span></li>
      <li class="text-center">Verificações Adicionais de segurança  </span></li>
      </ul>   </div>