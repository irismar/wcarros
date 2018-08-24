 	<?php
           @session_start(); 
           require_once 'Connections/repasses.php';
           // require_once('fbconfig.php'); 

		require "meta.php";

		 require_once('log.php'); 

		  require_once('links.php'); 

 


if(isset($_GET["seja_bem_vindo"])){ 
    require "mapa_cadastro.html";
    exit();
    ?>

 <script language= "JavaScript">

location.href="mapa_cadastro.html";
exit();
</script> <?
 


  exit(); }
  
  if(isset($_GET["atualiza_endereco"])){ 
      
        require "mapa_novoendereco.html";
    exit();?>
 <script language= "JavaScript">

location.href="mapa_novoendereco.html";

</script> <?
 

  include("rodape.php"); 

  exit(); }

  

  if(isset($_GET["card"])){ 

 include("lx.php");

 

  exit(); }
    if(isset($_GET["cad"])){ 

 include("lx.php");
   }
 if( isset($_GET["facebook"]) ){
      ///codigo para forçar endereco esse codigo será usado se o usuario vin de um link do facebook//
  
if(!isset($_SESSION['cidade']) AND  !isset($_SESSION['estado']) ){
 if (!isset($_GET['ip']) AND (!isset($_GET['long']))  ){ ////se for home e nÃ£o nem get ip nem long buscar latitude ouerro ?>
<body onLoad="getPosition()">
<script> 
function getPosition(){
 // Verifica se o browser do usuario tem suporte a geolocation
 if ( navigator.geolocation ){
 navigator.geolocation.getCurrentPosition( 
 // sucesso! 
 function( posicao ){
 console.log( posicao.coords.latitude, posicao.coords.longitude );
window.location='?facebook&&lat=' +posicao.coords.latitude+'&&long='+posicao.coords.longitude+'&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;
exit(); },
    // erro :(
    function ( erro ){
    var erroDescricao ='Ops, ';
    switch( erro.code ) {
    case erro.PERMISSION_DENIED:
    erroDescricao +='usuÃ¡rio nÃ£o autorizou a Geolocation.';
    
window.location='?facebook&&ip=onload&&var=notautorize&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;

    exit();


        break;

        case erro.POSITION_UNAVAILABLE:

          erroDescricao +='localizaÃ§Ã£o indisponÃ­vel.';
          
window.location='?facebook&&ip=onload&&var=indisponivel&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;

    exit();


        break;

        case erro.TIMEOUT:

          erroDescricao +='tempo expirado.';
          
window.location='?facebook&&ip=onload&&var=time&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;

    exit();


        break;

        case erro.UNKNOWN_ERROR:

         erroDescricao +='nÃ£o sei o que foi, mas deu erro!';
         
window.location='?facebook&&ip=onload&&var=indefinido&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;

    exit();


        break;

      }

      console.log( erroDescricao )

    }

   );

  }
  else{
    window.location='?facebook&&ip=onload&&var=nosuporte&&resolucaoW='+screen.width+'&&resolucaoH='+screen.height;

    exit(); 
      
  }

}

 
$( document ).ready( function(){

  getPosition();

} );

</script>

<? 
       
}else{

    if (isset($_GET['ip'])) { ///////////abre if get ip/////
   if($_SERVER['SERVER_NAME']=="localhost"){
$ip='177.17.186.232';
}else{
$ip=get22_client_ip();  
       }  //$ip=get22_client_ip();  
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
 


    $_SESSION['lat']=number_format(trim($query['lat']), 6, '.', ' ');

    $_SESSION['log']=number_format(trim($query['lon']), 6, '.', ' ');
    setcookie("lat",$_SESSION['lat'],time()+3600*24*30*12*6);
    setcookie("log",$_SESSION['log'],time()+3600*24*30*12*6); 
} else { echo "seu localização foi encontrada ";}
}

if (isset($_GET['long'])){

 ///////////abre if get ip/////

     $_SESSION['lat']=number_format(trim($_GET['lat']), 6, '.', ' ');

     $_SESSION['log']=number_format(trim($_GET['long']), 6, '.', ' ');
          setcookie("lat",$_SESSION['lat'],time()+3600*24*30*12*6);
          setcookie("log",$_SESSION['log'],time()+3600*24*30*12*6); 

}
 @$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$_SESSION['lat'].",".$_SESSION['log']."&sensor=true?key=AIzaSyBrUxPCMJ9d_ki8jMz12Wh6xcTg_FHVK5k";
      $data = @file_get_contents($url);
    $jsondata = json_decode($data,true);
    if(is_array($jsondata) && $jsondata['status'] == "OK")
    {
     // street
foreach ($jsondata["results"] as $result) {
    foreach ($result["address_components"] as $address) {
        if (in_array("route", $address["types"])) {
         $rua = trim($address["long_name"]);
         
        }

    }

}
// city
foreach ($jsondata["results"] as $result) {
    foreach ($result["address_components"] as $address) {
        if (in_array("locality", $address["types"])) {
        $cidade = trim($address["long_name"]);
         $_SESSION['cidade']= $cidade;
        }
    }
}
// country
foreach ($jsondata["results"] as $result) {
    foreach ($result["address_components"] as $address) {
        if (in_array("administrative_area_level_1", $address["types"])) {
      $estado= $address["long_name"];
      $estado = trim(str_replace("State of", " ",   $estado));

      $_SESSION['estado']= $estado ;

              }

    }

}



foreach ($jsondata["results"] as $result) {

    foreach ($result["address_components"] as $address) {

        if (in_array("country", $address["types"])) {

        $_SESSION['pais']=$pais= trim($address["long_name"]);

        }

    }

}


foreach ($jsondata["results"] as $result) {

    foreach ($result["address_components"] as $address) {

        if (in_array("postal_code", $address["types"])) {

         $_SESSION['cep']=$cep=trim( $address["long_name"]);

        


        }

    }

}
@$_SESSION['endereco1']= @$rua.'&nbsp;&nbsp;'.@$cidade.'&nbsp;&nbsp;'.@$estado.'&nbsp;&nbsp;'.@$pais.'&nbsp;&nbsp;'.@$cep;
 }}}else{
     ////////////adicionar foto do facebbok salvar no arquivo facebook///////
$url_user=NormalizaURL($_SESSION['nome_face']);		
      $url_foto=trim($_SESSION['foto_face']);
       $numero =md5(microtime()); 
       $imagem =$numero. ".jpg";
       $imagem_face =$numero;
       
       if( !@copy( $url_foto, 'galeriadefotos/novo/'.$imagem ) ) {
    $errors= error_get_last();
     "COPY ERROR: ".$errors['type'];
     "<br />\n".$errors['message'];
   
}
     if( !@copy( $url_foto, 'galeriadefotos/peq/'.$imagem ) ) {
    $errors= error_get_last();
     "COPY ERROR: ".$errors['type'];
     "<br />\n".$errors['message'];
   
}
     if( !@copy( $url_foto, 'galeriadefotos/gra/'.$imagem ) ) {
    $errors= error_get_last();
     "COPY ERROR: ".$errors['type'];
     "<br />\n".$errors['message'];
   
}
if(isset($_GET['log'])){
    
    $visitante='1';
} else { 
    $visitante='0';
}
 echo $sql= "INSERT INTO membros (data, nome, endereco,log, lat,cidade,estado, email,foto,idfacebook,namefacebok,url,usuario)

 VALUES ('".$hora."','".trim($_SESSION['nome_face'])."','".trim($_SESSION['endereco1'])."','".trim($_SESSION['log'])."','".trim($_SESSION['lat'])."','".trim($_SESSION['cidade'])."','".trim($_SESSION['estado'])."','".$_SESSION['email_face']."','".trim($imagem)."','".$_SESSION['id_face']."','".$_SESSION['nome_face']."','".trim($url_user)."', '".$visitante."')";

$sql=$mysql->query($sql);
 if($sql){
 
  include "lib/WideImage.php";
    $image = WideImage::load('galeriadefotos/novo/'.$imagem_face.'.jpg');
     // Redimensiona a imagem
    $image = $image->resize(569, 329,  'inside','any');
     // Salva a imagem em um arquivo (novo ou não)
    $image->saveToFile('galeriadefotos/grd/'.$imagem_face.'.jpg'); 
         // Redimensiona a imagem
    


    $image = WideImage::load('galeriadefotos/novo/'.$imagem_face.'.jpg');
     // Redimensiona a imagem
    $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
    $image->saveToFile('galeriadefotos/peq/'.$numero.'.jpg'); 



     $image = WideImage::load('galeriadefotos/novo/'.$imagem_face.'.jpg');
     // Redimensiona a imagem
     $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
     $image->saveToFile('galeriadefotos/mini/'.$numero.'.jpg'); 

     $_SESSION['goo']=$_SESSION['id_face'];

	
		 


if(isset($_GET['log'])&& ($_GET['log']='comentario')){ ?>
  <script language= "JavaScript">

location.href="/login.php?log=<?=trim($_SESSION['id_face']);?>" ;

</script> 
  exit();
<? }else{?> 
     <script language= "JavaScript">

location.href="/login.php?acesso=<?=trim($_SESSION['id_face']);?>";

</script> 
    <? }
 exit(); 
 }

	
	 
		

 

  

   } }

 

 

 if(isset($_GET["cad"])) {

 $_SESSION['endereco']=$_GET["cad"];

 include("lx.php");  }

 

 if(isset($_GET["novo_endereco"])) {

 $_SESSION['endereco']=$_GET["novo_endereco"];

 include("lx.php"); 
 }



    



if(isset($_GET["novo"]) ) {
 $conexao =Conect::getInstance();

 
$sTmpFolder = "galeriadefotos/";
  $foto = $_FILES['imagem'];
  if($_FILES['imagem']['size'] > 0)
  {
 require_once('admin/includes/tng/tNG.inc.php'); 
 require_once"lib/WideImage.php";

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

  $url_user=NormalizaURL($_POST['nome']);	
  $url_cidade=NormalizaURL($_POST['cidade']);
  $url_estado=NormalizaURL($_POST['estado']); 
  $nome =segurancastring(trim($_POST['nome']));
  $senha =segurancastring(trim($_POST['senha'])); 	
  $senha=ltrim($senha);
  $senha = str_replace(" ","", $senha);

echo $sql = 'INSERT INTO membros (data, nome, endereco,log, lat,cidade,estado,url_cidade,url_estado,watapps,claro,oi,tim,vivo,fixo, email, senha,foto,idfacebook,namefacebok,url)
  VALUES(:data, :nome, :endereco,:log, :lat,:cidade,:estado,:url_cidade,:url_estado,:watapps,:claro,:oi,:tim,:vivo,:fixo, :email, :senha,:foto,:idfacebook,:namefacebok,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':endereco', $_POST['endereco']);
            $stm->bindValue(':log', $_POST['log']);
            $stm->bindValue(':lat', $_POST['lat']);
            $stm->bindValue(':cidade',$_POST['cidade']);
            $stm->bindValue(':estado',$_POST['estado']);
            $stm->bindValue(':url_cidade',$url_cidade);
            $stm->bindValue(':url_estado',$url_estado);
            $stm->bindValue(':watapps', $_POST['watapps']);
            $stm->bindValue(':claro', $_POST['claro']);
            $stm->bindValue(':oi', $_POST['oi']);
            $stm->bindValue(':tim',$_POST['tim']);
            $stm->bindValue(':vivo', $_POST['vivo']);
            $stm->bindValue(':fixo', $_POST['fixo']);
            $stm->bindValue(':email', $_POST['email']);
            $stm->bindValue(':senha', $senha);
            $stm->bindValue(':foto', $imagem);
            $stm->bindValue(':idfacebook', $_SESSION['id_facebook']);
            $stm->bindValue(':namefacebok', $_SESSION['name_facebook']);
            $stm->bindValue(':url', $url_user);
            
            $retorno = $stm->execute();
 
            if ($retorno){
            echo  ' ok escreveu tudo ';  
            }
            else{
             
            }
  
	echo $sql2 = "SELECT id FROM  membros 	WHERE  url='".trim($url_user)."' LIMIT 1 ";

  $query2 = $mysql->query($sql2);

 echo   $query2->num_rows;

  if ($query2->num_rows == '1') { 

    while($row_estoque1 = $query2->fetch_assoc()) { 

	echo 'nome da session'.  $_SESSION['goo']=$row_estoque1['id'];

	header("Location: /login.php?goo");
	exit();			

			  ?>

 

  <script language= "JavaScript">
window.location.href = "login.php?goo";
exit();

</script> 

<?  

	 exit(); 

 

}}}

  ?>




<? include("meta.php"); ?>


<div class="col-md-12 col-xs-12 col-sm-12 col-md-offset-2"> 
      <form action="<? URL::getBase();?>cadastro?novo" name="add" id="add" enctype="multipart/form-data" method="POST" onsubmit="return ValidaCadastro();">
      <div id="wrapper2"></div><div class="container">
      <div class="col-sm-12 col-xs-12 col-md-8  "> 

      <h1>nome&nbsp; da sua Empresa ou seu nome </h1><span id="cb_nome">
<p class="azul4">Este será ser perfil comercial ex: sua loja é autobom seu perfil comercial será wcarros.com/autobom</p>
          <input name="nome" required  type="text" autofocus class="input" id="nome" value="<?php echo @$_POST['nome']; ?>" size="20" maxlength="100" onchange="javascript:Carreganome('verificar_user.php',this.value);" placeholder="Digite seu nome ou de sua empresa"/>
      <div id="caregarnome"> </div>

      </div>

      <div class="col-sm-12 col-xs-12 col-md-8  "> 

      <h1>email&nbsp;*  * informe seu email *</h1>
<p class="azul4">Use um email verdadeiro não enviamos codigos de confirmação para seu email.</p>
      

	  <input name="email"   type="text" class="input"  required id="email" value="<? echo trim (@$_POST['email']); ?>" size="40" maxlength="100" onchange="javascript:carregaremail('verificar_email.php',this.value);" placeholder="Digite seu email"/>

    
          <div id="caregaremail"></div>

       </div>

      

        <input type="hidden" value="<?php echo @trim($_GET['lat']); ?>" id="lat" name="lat"   />

       

        <input type="hidden"  value="<?php echo @trim($_GET['long']); ?>"id="log" name="log"  />

       

     <div class="col-sm-12 col-xs-12 col-md-8  "> 

        <h1>endereco</h1>

        <span id="cb_endereco"> <input name="endereco" id="endereco"  required name="endereco" type="text" class="input" id="endereco" value=" <?php echo @$rua."&nbsp;&nbsp;".@$cidade."&nbsp;&nbsp;".@$estado."&nbsp;&nbsp;". @$pais."&nbsp;&nbsp;".  @$cep; ?>" size="82" maxlength="100" /> 

        </span> </div>

      
       <div class="col-sm-12 col-xs-12 col-md-8  "> 
         

          <span id="cb_telefone"> 

          <img src="/img/icone-whatsapp10.png" ></span>

           <input name="watapps"   type="number"  class="input" id="watapps" value="<? echo @utf8_encode($_POST['watapps']); ?>" size="10" maxlength="20" placeholder="DD-número"/>

           </div>

        <div class="col-sm-12 col-xs-12 col-md-8  "> 

          <span id="cb_telefone"> <img src="/img/claro-logo-510.png"> <input name="claro" type="number"  class="input" id="telefone" value="<? echo @utf8_encode($_POST['claro']); ?>" size="10" maxlength="20" placeholder="DD-número"/> 
</span>
          </div>

        <div class="col-sm-12 col-xs-12 col-md-8  ">  

          <h1></h1>

          <span id="cb_telefone"><img src="/img/icone_oi10.png" > </span> <input name="oi"  type="number"  class="input" id="telefone" value="<? echo @utf8_encode($_POST['oi']); ?>" size="10" maxlength="20" placeholder="DD-número"/>

          </div>

		         <div class="col-sm-12 col-xs-12 col-md-8  "> 

          <h1></h1>

          <span id="cb_telefone"><img src="/img/icone_tim10.png" >          </span> <input name="tim"  type="number"  class="input" id="telefone" value="<? echo @utf8_encode($_POST['tim']); ?>" size="10" maxlength="20" placeholder="DD-número"/>

          </span> </div>

          <div class="col-sm-12 col-xs-12 col-md-8  "> 

         

          <span id="cb_telefone"><img src="/img/17-mascoteVIVO10.png" > <input name="vivo" type="number"  class="input" id="telefone" value="<? echo @utf8_encode($_POST['vivo']); ?>" size="10" maxlength="20" placeholder="DD-número"/>

          </span> </div>

		     <div class="col-sm-12 col-xs-12 col-md-8  "> 
          <h1></h1>

          <span id="cb_telefone"><img src="/img/icon-tel10.png"> <input name="fixo"  type="number"  class="input" id="telefone" value="<? echo @utf8_encode($_POST['fixo']); ?>" size="10" maxlength="20" placeholder="DD-número"/>

          </span> </div>

      

        <div class="col-sm-12 col-xs-12 col-md-8  "> 
          <h1>senha&nbsp;*</h1>

          <span id="cb_senha"> <input name="senha"  required name="senha" type="password" class="input" id="senha" size="20" maxlength="200" /> 

          </span> </div>

         <div class="col-sm-12 col-xs-12 col-md-8  "> 
          <h1>COMFIRMA&nbsp;*</h1>

          <span id="cb_senha2"> <input name="confirmar"  required name="confirmar"  type="password" class="input" id="confirmar" size="20" maxlength="200" />(Digite 

          a senha novamente) </span> </div>

      

       <div class="col-sm-12 col-xs-12 col-md-6  "> 

	  <? if (isset($_SESSION['id_facebook'])){ ?>

	  <img src="https://graph.facebook.com/<?php echo $_SESSION['id_facebook']; ?>/picture" > <? }else{ ?>

                   <label>  Sua Foto ou Logotipo de Sua Empresa * </label>

				    <input name="imagem" type="file" id="imagem" size="55" />

					<? } ?>

      </div>
        <div class="col-sm-12 col-xs-12 col-md-8  "> 

        <h1>Cidade</h1>

        <span id="cb_endereco"> <input name="cidade" id="cidade"   type="text" class="input" id="endereco" value=" <?php echo @$cidade; ?>" size="42" maxlength="100" /> 

        </span> </div>

      <div class="col-sm-12 col-xs-12 col-md-8  "> 
        <h1>Estado</h1>

        <span id="cb_endereco"> <input name="estado" id="estado"   type="text" class="input" id="estado" value=" <?php echo @$estado; ?>" size="42" maxlength="100" /> 

        </span> </div>

      <br>

       <div class="col-sm-12 col-xs-12 col-md-6  "> 


        <p>&nbsp; </p>  <input type="hidden" name="MM_insert" value="add" />
         <input type="hidden" name="seguranca" value="<?=$_SESSION['segure'];?>" />

        <p> 

          <input name="btnAction" type="submit" class="botao" id="btnAction" onclick="EW_submitForm(this.form);" value="CADASTRAR" />

        </p>

     </div>

     </div>

    </form>

  </div> </div>

</div></head> 



<div id="warper"> 

  <? include("rodape.php"); ?>

</div></div>

</div> 

</body>

</html>










































