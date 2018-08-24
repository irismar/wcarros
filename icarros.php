
 <form action="?robor=novo" name="add" id="add" enctype="multipart/form-data" method="POST" "><br>
  <span>url base</span>
 <input name="url_base"  type="text" class="input" id="senha" size="120" maxlength="200" /><br>
 <span>url Consulta</span>
 <input name="url1"   type="text" class="input" id="senha" size="120" maxlength="200" /><br>
 <input name="gps"   type="text" class="input" id="senha" size="120" maxlength="200" /> <br>
 <input name="buscar" type="submit" class="botao" id="btnAction"  value="buscar" /> 

</form>

<?php

include '../config/conexao.class.php';
require_once'../Connections/repasses.php';
require_once"../lib/WideImage.php";
$conexao = Conect::getInstance();
function removeAcentos2($string) {
  $string= trim($string);
  
    $string = preg_replace("/&#237;/", "i", $string);
    $string = preg_replace("/&#243;/", "o", $string);
    $string = preg_replace("/[áàâãä]/", "a", $string);
    $string = preg_replace("/[ÁÀÂÃÄ]/", "a", $string);
    $string = preg_replace("/[éèê]/", "e", $string);
    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
    $string = preg_replace("/[íì]/", "i", $string);
    $string = preg_replace("/[ÍÌ]/", "I", $string);
    $string = preg_replace("/[óòôõö]/", "o", $string);
    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
    $string = preg_replace("/[úùü]/", "u", $string);
    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);
    $string = preg_replace("/strong/", "", $string);
    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
    $string = preg_replace("/ /", "", $string);

  
    return $string;
}
function Corrigir_letras_estranhas2($string) {
  $string= trim($string);
  
    $string = preg_replace("/&#237;/", "í", $string);
    $string = preg_replace("/&#243;/", "ó", $string);
    $string = preg_replace("/&#227;/", "ã", $string);
    
    

  
    return $string;
}
function tirarAcentos2($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç|ç)/","/[][><}{)(:;,!?*%~^`&#@]/","/ /"),explode(" ","a A e E i I o O u U n N c "),$string);
}
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
if(isset($_GET['robor'])){   
 $url_base=$_POST['url_base'];
 $url1=trim($_POST['url1']);
 $gps=trim($_POST['gps']);
   $cord = explode(',', $gps);
echo  $lat=number_format(trim( $cord[0]), 6, '.', ' ');
echo  $log=number_format(trim( $cord[1]), 6, '.', ' ');


// example of how to use basic selector to retrieve HTML contents


// $url_base=$_POST['url_base'];
  $url0= $url_base;
$html0 = file_get_html($url_base);

//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//nesse sistema oa div é b-categories-filter_count f-categories-filter_count
foreach($html0->find('clearfix lista_anuncios') as $e) { 
echo  $estoque_total= $item['estoque'] = trim($e->find('h4', 0)->plaintext);
$estoque_total= str_replace("carros encontrados", "",$estoque_total); 
 
 }

 $url_P= $url_base;
// $gps=trim($_POST['gps']);
//   $cord = explode(',', $gps);
//echo  $lat=number_format(trim( $cord[0]), 6, '.', ' ');
//echo  $log=number_format(trim( $cord[1]), 6, '.', ' ');
 echo '<br>';
// get DOM from URL or file

/

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////identificar usuario apenas para inserir usuario antes de imprimir 
$registros="36";
echo 'total de paginas'.$paginas = ceil($estoque_total / $registros);echo '<br>';

//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar

$i ='1';
while( $i < $paginas ){
 // comeco do codigo faco nova requisacao de url  

 echo $i;

  echo '<br>';
 


 echo $url1=$url_base."&o=1&p=".$i;
// $gps=trim($_POST['gps']);
//   $cord = explode(',', $gps);
//echo  $lat=number_format(trim( $cord[0]), 6, '.', ' ');
//echo  $log=number_format(trim( $cord[1]), 6, '.', ' ');
 echo '<br>';
// get DOM from URL or file
 $html_ur1 = file_get_html($url1);

//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//nesse sistema oa div é b-categories-filter_count f-categories-filter_count
foreach( $html_ur1->find('#boxResultadoA ') as $e) { 

  ///////////////link1 carro 1 em Resultado A
$estoque1=$item['A1'] = trim($e->find('a', 0)->href); echo '<br>';
$estoque2=$item['A2'] = trim($e->find('a', 1)->href); echo '<br>';
$estoque3=$item['A3'] = trim($e->find('a', 3)->href); echo '<br>';
$estoque4=$item['A4'] = trim($e->find('a', 4)->href); echo '<br>';

 //////////////////////busca em cada anuncio//////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$html2 = file_get_html($estoque1);
//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//capturar titulo nome marca modelo esse dado será usado para buscar discriçao
foreach($html2->find('.boxInfoVehicle') as $e) { 
 echo $modelo= $item['modelo'] = trim($e->find('.makemodel-opinion', 0)->innertext); 
 echo '<br>';
 echo $versao= $item['versao'] = trim($e->find('.versionyear-of', 0)->innertext);
 echo '<br>';
 /////consultar estoque a url busca os detalhes do estoque///
  //echo  $estoque=  $e->innertext;
  ////////forcar exibir o  
///carousel-inner
}
//////buscar detalhes como km,cor,outros...../////////////////////
//////////////////////////////////////////////////////////////////
foreach($html2->find('.vehicle-details__main-info') as $e) { 
 echo $ano= $item['ano'] = trim($e->find('span', 0)->innertext);echo '<br>';
 echo $km= $item['km'] = trim($e->find('span', 1)->innertext);echo '<br>';
 
 echo $combustivel= $item['combustivel'] = trim($e->find('span', 3)->innertext); echo '<br>';
 
//echo  $e->innertext;
}
/////////////////////////////////////////////////////////////
//////////////////codigo pegar preço/////////////////////////
foreach($html2->find('.proposal-b') as $e) { 
 $item['preco'] = trim($e->find('span', 0)->innertext);

echo  $preco= str_replace("/[/ strong - R$ , .]/", "", $item['preco'] );
$preco= str_replace("/[R$ , . ]/", "", $preco );



 
}
//////////////////fimcodigo pegar preço/////////////////////
////////////////////inrerir BD estoque////////////////////////////
$sql = 'SELECT * FROM membros WHERE url=:url LIMIT 1';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $url_final);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo  $total = count( $clientes );

 if($total !='0' ){


foreach($clientes as $membro):
 


  endforeach;  
   } 
$sql = 'INSERT INTO estoque (data, data_cadastro, id_membro,nome_membro,foto_membro,marcatexto,modelotexto,preco,km,combustivel,lat,lon,endereco,cidade,estado,watapps,url)
VALUES(:data, :data_cadastro,:id_membro,:nome_membro,:foto_membro,:marcatexto,:modelotexto,:preco,:km,:combustivel,:lat,:lon,:endereco,:cidade,:estado,:watapps,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':data_cadastro', $membro->data);
            $stm->bindValue(':id_membro', $membro->id);
            $stm->bindValue(':nome_membro', $membro->nome);
            $stm->bindValue(':foto_membro', $membro->foto);
            $stm->bindValue(':marcatexto',  $modelo);
            $stm->bindValue(':modelotexto',  $modelo. $versao);
            $stm->bindValue(':preco', $preco);
          
            $stm->bindValue(':km', $km);
          
            $stm->bindValue(':combustivel', $combustivel);
            $stm->bindValue(':lat', $membro->lat);
            $stm->bindValue(':lon', $membro->log);
            $stm->bindValue(':endereco', $membro->endereco);
            $stm->bindValue(':cidade', $membro->cidade);
            $stm->bindValue(':estado', $membro->estado);
            $stm->bindValue(':watapps', $membro->watapps);
            $stm->bindValue(':url', $membro->url );
            
            $retorno = $stm->execute();
 
            if ($retorno){

       

            echo  ' ok escreveu tudo ';  
            }
            else{
                   "Erro  linha 149 ao execurat o script";
            }




//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
  foreach($html2->find('.carousel-inner') as $e) { 
 /////consultar estoque a url busca os detalhes do estoque///
  $fotos=  $e->innertext;
  $url_foto = explode('src="',$fotos);
  ///////pegar foto por foto até 10 fotos////////
  //////////foto1//////////////////
 if(isset($url_foto[1])){
  $url_linpa = explode('?s=',$url_foto[1]);
   $fotourl=trim($url_linpa[0]);
/////////////////////primeira foto atualizar /////////////estoque 

 $sql = 'SELECT * FROM estoque WHERE url=:url  ORDER BY id_estoque DESC';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $membro->url);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo "total de estoque cadastrado". $total = count( $clientes );

echo $sql2 = "SELECT nome_membro,id_estoque,url,carros  FROM estoque WHERE  url='".$membro->url."' ORDER BY id_estoque DESC";

  $estoque = $mysql->query($sql2);

  $row_estoque= $estoque ->fetch_assoc();

  echo 'id_estoque'.'<br>'. $id_estoque=$row_estoque['id_estoque'];

 echo  $url= $row_estoque['url'];

  

     $carro_atual=$row_estoque['carros'] +1 ;

  

  


  $up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE estoque SET carros ='".$carro_atual."' WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE membros SET carros_total = carros_total + 1 WHERE  url='".$url_final."'");



  //////////////////////inserrir imagens/////////////////////
$numero =md5(microtime()); 
$imagem =$numero. ".jpg";
$sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
 $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        
$sql= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 

   //////////////////fim codigo///////////////////////////////


  ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
  
}
  //////////foto2/////////////////
if(isset($url_foto[2])){
  $url_linpa = explode('?s=',$url_foto[2]);

   $fotourl=trim($url_linpa[0]);
$numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
   $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 


 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
  ///////////////
 //////////foto3/////////////////
if(isset($url_foto[3])){
  $url_linpa = explode('?s=',$url_foto[3]);
    $fotourl=trim($url_linpa[0]);
    $numero =md5(microtime()); 
$imagem =$numero. ".jpg";
  $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
   $sql2= $mysql->query($sql);  
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto4/////////////////
if(isset($url_foto[4])){
  $url_linpa = explode('?s=',$url_foto[4]);
    $fotourl=trim($url_linpa[0]);
  $numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
   $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto5/////////////////
if(isset($url_foto[5])){
  $url_linpa = explode('?s=',$url_foto[5]);
    $fotourl=trim($url_linpa[0]);
 $numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[6])){
  $url_linpa = explode('?s=',$url_foto[6]);
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[7])){
  $url_linpa = explode('?s=',$url_foto[7]);
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 ///////////////////foto2/////////////////
////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

}/// fim carrosel 


//////////////////////////////////////adicionar nova consulta//////////////////////////////
 //////////////////////busca em cada anuncio//////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$html2 = file_get_html($estoque2);
//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//capturar titulo nome marca modelo esse dado será usado para buscar discriçao
foreach($html2->find('.boxInfoVehicle') as $e) { 
 echo $modelo= $item['modelo'] = trim($e->find('.makemodel-opinion', 0)->innertext); 
 echo '<br>';
 echo $versao= $item['versao'] = trim($e->find('.versionyear-of', 0)->innertext);
 echo '<br>';
 /////consultar estoque a url busca os detalhes do estoque///
  //echo  $estoque=  $e->innertext;
  ////////forcar exibir o  
///carousel-inner
}
//////buscar detalhes como km,cor,outros...../////////////////////
//////////////////////////////////////////////////////////////////
foreach($html2->find('.vehicle-details__main-info') as $e) { 
 echo $ano= $item['ano'] = trim($e->find('span', 0)->innertext);echo '<br>';
 echo $km= $item['km'] = trim($e->find('span', 1)->innertext);echo '<br>';
 
 echo $combustivel= $item['combustivel'] = trim($e->find('span', 3)->innertext); echo '<br>';
 
//echo  $e->innertext;
}
/////////////////////////////////////////////////////////////
//////////////////codigo pegar preço/////////////////////////
foreach($html2->find('.proposal-b') as $e) { 
 $item['preco'] = trim($e->find('span', 0)->innertext);

echo  $preco= str_replace("/[/ strong - R$ , .]/", "", $item['preco'] );
 
}
//////////////////fimcodigo pegar preço/////////////////////
////////////////////inrerir BD estoque////////////////////////////
$sql = 'SELECT * FROM membros WHERE url=:url LIMIT 1';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $url_final);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo  $total = count( $clientes );

 if($total !='0' ){


foreach($clientes as $membro):
 


  endforeach;  
   } 
$sql = 'INSERT INTO estoque (data, data_cadastro, id_membro,nome_membro,foto_membro,marcatexto,modelotexto,preco,km,combustivel,lat,lon,endereco,cidade,estado,watapps,url)
VALUES(:data, :data_cadastro,:id_membro,:nome_membro,:foto_membro,:marcatexto,:modelotexto,:preco,:km,:combustivel,:lat,:lon,:endereco,:cidade,:estado,:watapps,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':data_cadastro', $membro->data);
            $stm->bindValue(':id_membro', $membro->id);
            $stm->bindValue(':nome_membro', $membro->nome);
            $stm->bindValue(':foto_membro', $membro->foto);
            $stm->bindValue(':marcatexto',  $modelo);
            $stm->bindValue(':modelotexto',  $modelo. $versao);
            $stm->bindValue(':preco', $preco);
          
            $stm->bindValue(':km', $km);
          
            $stm->bindValue(':combustivel', $combustivel);
            $stm->bindValue(':lat', $membro->lat);
            $stm->bindValue(':lon', $membro->log);
            $stm->bindValue(':endereco', $membro->endereco);
            $stm->bindValue(':cidade', $membro->cidade);
            $stm->bindValue(':estado', $membro->estado);
            $stm->bindValue(':watapps', $membro->watapps);
            $stm->bindValue(':url', $membro->url );
            
            $retorno = $stm->execute();
 
            if ($retorno){

       

            echo  ' ok escreveu tudo ';  
            }
            else{
                   "Erro  linha 149 ao execurat o script";
            }




//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
  foreach($html2->find('.carousel-inner') as $e) { 
 /////consultar estoque a url busca os detalhes do estoque///
  $fotos=  $e->innertext;
  $url_foto = explode('src="',$fotos);
  ///////pegar foto por foto até 10 fotos////////
  //////////foto1//////////////////
 if(isset($url_foto[1])){
  $url_linpa = explode('?s=',$url_foto[1]);
   $fotourl=trim($url_linpa[0]);
/////////////////////primeira foto atualizar /////////////estoque 

 $sql = 'SELECT * FROM estoque WHERE url=:url  ORDER BY id_estoque DESC';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $membro->url);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo "total de estoque cadastrado". $total = count( $clientes );

echo $sql2 = "SELECT nome_membro,id_estoque,url,carros  FROM estoque WHERE  url='".$membro->url."' ORDER BY id_estoque DESC";

  $estoque = $mysql->query($sql2);

  $row_estoque= $estoque ->fetch_assoc();

  echo 'id_estoque'.'<br>'. $id_estoque=$row_estoque['id_estoque'];

 echo  $url= $row_estoque['url'];
  $carro_atual=$row_estoque['carros'] +1 ;

  $up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE estoque SET carros ='".$carro_atual."' WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE membros SET carros_total = carros_total + 1 WHERE  url='".$url_final."'");

  //////////////////////inserrir imagens/////////////////////
$numero =md5(microtime()); 
$imagem =$numero. ".jpg";
echo $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
echo $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        
$sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 

   //////////////////fim codigo///////////////////////////////


  ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
  
}
  //////////foto2/////////////////
if(isset($url_foto[2])){
  $url_linpa = explode('?s=',$url_foto[2]);

   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 


 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
  ///////////////
 //////////foto3/////////////////
if(isset($url_foto[3])){
  $url_linpa = explode('?s=',$url_foto[3]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto4/////////////////
if(isset($url_foto[4])){
  $url_linpa = explode('?s=',$url_foto[4]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto5/////////////////
if(isset($url_foto[5])){
  $url_linpa = explode('?s=',$url_foto[5]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[6])){
  $url_linpa = explode('?s=',$url_foto[6]);
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[7])){
  $url_linpa = explode('?s=',$url_foto[7]);
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 ///////////////////foto2/////////////////
////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

}/// fim carrosel 
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////






//////////////////////////////////////adicionar nova consulta//////////////////////////////
 //////////////////////busca em cada anuncio//////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$html2 = file_get_html($estoque3);
//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//capturar titulo nome marca modelo esse dado será usado para buscar discriçao
foreach($html2->find('.boxInfoVehicle') as $e) { 
 echo $modelo= $item['modelo'] = trim($e->find('.makemodel-opinion', 0)->innertext); 
 echo '<br>';
 echo $versao= $item['versao'] = trim($e->find('.versionyear-of', 0)->innertext);
 echo '<br>';
 /////consultar estoque a url busca os detalhes do estoque///
  //echo  $estoque=  $e->innertext;
  ////////forcar exibir o  
///carousel-inner
}
//////buscar detalhes como km,cor,outros...../////////////////////
//////////////////////////////////////////////////////////////////
foreach($html2->find('.vehicle-details__main-info') as $e) { 
 echo $ano= $item['ano'] = trim($e->find('span', 0)->innertext);echo '<br>';
 echo $km= $item['km'] = trim($e->find('span', 1)->innertext);echo '<br>';
 
 echo $combustivel= $item['combustivel'] = trim($e->find('span', 3)->innertext); echo '<br>';
 
//echo  $e->innertext;
}
/////////////////////////////////////////////////////////////
//////////////////codigo pegar preço/////////////////////////
foreach($html2->find('.proposal-b') as $e) { 
 $item['preco'] = trim($e->find('span', 0)->innertext);

echo  $preco= str_replace("/[/ strong - R$ , .]/", "", $item['preco'] );
 
}
//////////////////fimcodigo pegar preço/////////////////////
////////////////////inrerir BD estoque////////////////////////////
$sql = 'SELECT * FROM membros WHERE url=:url LIMIT 1';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $url_final);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo  $total = count( $clientes );

 if($total !='0' ){


foreach($clientes as $membro):
 


  endforeach;  
   } 
$sql = 'INSERT INTO estoque (data, data_cadastro, id_membro,nome_membro,foto_membro,marcatexto,modelotexto,preco,km,combustivel,lat,lon,endereco,cidade,estado,watapps,url)
VALUES(:data, :data_cadastro,:id_membro,:nome_membro,:foto_membro,:marcatexto,:modelotexto,:preco,:km,:combustivel,:lat,:lon,:endereco,:cidade,:estado,:watapps,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':data_cadastro', $membro->data);
            $stm->bindValue(':id_membro', $membro->id);
            $stm->bindValue(':nome_membro', $membro->nome);
            $stm->bindValue(':foto_membro', $membro->foto);
            $stm->bindValue(':marcatexto',  $modelo);
            $stm->bindValue(':modelotexto',  $modelo. $versao);
            $stm->bindValue(':preco', $preco);
          
            $stm->bindValue(':km', $km);
          
            $stm->bindValue(':combustivel', $combustivel);
            $stm->bindValue(':lat', $membro->lat);
            $stm->bindValue(':lon', $membro->log);
            $stm->bindValue(':endereco', $membro->endereco);
            $stm->bindValue(':cidade', $membro->cidade);
            $stm->bindValue(':estado', $membro->estado);
            $stm->bindValue(':watapps', $membro->watapps);
            $stm->bindValue(':url', $membro->url );
            
            $retorno = $stm->execute();
 
            if ($retorno){

       

            echo  ' ok escreveu tudo ';  
            }
            else{
                   "Erro  linha 149 ao execurat o script";
            }




//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
  foreach($html2->find('.carousel-inner') as $e) { 
 /////consultar estoque a url busca os detalhes do estoque///
  $fotos=  $e->innertext;
  $url_foto = explode('src="',$fotos);
  ///////pegar foto por foto até 10 fotos////////
  //////////foto1//////////////////
 if(isset($url_foto[1])){
  $url_linpa = explode('?s=',$url_foto[1]);
   $fotourl=trim($url_linpa[0]);
/////////////////////primeira foto atualizar /////////////estoque 

 $sql = 'SELECT * FROM estoque WHERE url=:url  ORDER BY id_estoque DESC';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $membro->url);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo "total de estoque cadastrado". $total = count( $clientes );

echo $sql2 = "SELECT nome_membro,id_estoque,url,carros  FROM estoque WHERE  url='".$membro->url."' ORDER BY id_estoque DESC";

  $estoque = $mysql->query($sql2);

  $row_estoque= $estoque ->fetch_assoc();

  echo 'id_estoque'.'<br>'. $id_estoque=$row_estoque['id_estoque'];

 echo  $url= $row_estoque['url'];

  

     $carro_atual=$row_estoque['carros'] +1 ;

  

  


  $up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE estoque SET carros ='".$carro_atual."' WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE membros SET carros_total = carros_total + 1 WHERE  url='".$url_final."'");



  //////////////////////inserrir imagens/////////////////////
$numero =md5(microtime()); 
$imagem =$numero. ".jpg";
echo $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
echo $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        
$sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 

   //////////////////fim codigo///////////////////////////////


  ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
  
}
  //////////foto2/////////////////
if(isset($url_foto[2])){
  $url_linpa = explode('?s=',$url_foto[2]);
  $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 


 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
  ///////////////
 //////////foto3/////////////////
if(isset($url_foto[3])){
  $url_linpa = explode('?s=',$url_foto[3]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
   $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto4/////////////////
if(isset($url_foto[4])){
  $url_linpa = explode('?s=',$url_foto[4]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto5/////////////////
if(isset($url_foto[5])){
  $url_linpa = explode('?s=',$url_foto[5]);
    $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[6])){
  $url_linpa = explode('?s=',$url_foto[6]);
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[7])){
  $url_linpa = explode('?s=',$url_foto[7]);
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 ///////////////////foto2/////////////////
////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

}/// fim carrosel 

//////////////////////////////////////adicionar nova consulta//////////////////////////////
 //////////////////////busca em cada anuncio//////////////////
///////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
$html2 = file_get_html($estoque4);
//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//capturar titulo nome marca modelo esse dado será usado para buscar discriçao
foreach($html2->find('.boxInfoVehicle') as $e) { 
 echo $modelo= $item['modelo'] = trim($e->find('.makemodel-opinion', 0)->innertext); 
 echo '<br>';
 echo $versao= $item['versao'] = trim($e->find('.versionyear-of', 0)->innertext);
 echo '<br>';
 /////consultar estoque a url busca os detalhes do estoque///
  //echo  $estoque=  $e->innertext;
  ////////forcar exibir o  
///carousel-inner
}
//////buscar detalhes como km,cor,outros...../////////////////////
//////////////////////////////////////////////////////////////////
foreach($html2->find('.vehicle-details__main-info') as $e) { 
 echo $ano= $item['ano'] = trim($e->find('span', 0)->innertext);echo '<br>';
 echo $km= $item['km'] = trim($e->find('span', 1)->innertext);echo '<br>';
 
 echo $combustivel= $item['combustivel'] = trim($e->find('span', 3)->innertext); echo '<br>';
 
//echo  $e->innertext;
}
/////////////////////////////////////////////////////////////
//////////////////codigo pegar preço/////////////////////////
foreach($html2->find('.proposal-b') as $e) { 
 $item['preco'] = trim($e->find('span', 0)->innertext);

echo  $preco= str_replace("/[/ strong - R$ , .]/", "", $item['preco'] );
 
}
//////////////////fimcodigo pegar preço/////////////////////
////////////////////inrerir BD estoque////////////////////////////
$sql = 'SELECT * FROM membros WHERE url=:url LIMIT 1';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $url_final);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo  $total = count( $clientes );

 if($total !='0' ){


foreach($clientes as $membro):
 


  endforeach;  
   } 
$sql = 'INSERT INTO estoque (data, data_cadastro, id_membro,nome_membro,foto_membro,marcatexto,modelotexto,preco,km,combustivel,lat,lon,endereco,cidade,estado,watapps,url)
VALUES(:data, :data_cadastro,:id_membro,:nome_membro,:foto_membro,:marcatexto,:modelotexto,:preco,:km,:combustivel,:lat,:lon,:endereco,:cidade,:estado,:watapps,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':data_cadastro', $membro->data);
            $stm->bindValue(':id_membro', $membro->id);
            $stm->bindValue(':nome_membro', $membro->nome);
            $stm->bindValue(':foto_membro', $membro->foto);
            $stm->bindValue(':marcatexto',  $modelo);
            $stm->bindValue(':modelotexto',  $modelo. $versao);
            $stm->bindValue(':preco', $preco);
          
            $stm->bindValue(':km', $km);
          
            $stm->bindValue(':combustivel', $combustivel);
            $stm->bindValue(':lat', $membro->lat);
            $stm->bindValue(':lon', $membro->log);
            $stm->bindValue(':endereco', $membro->endereco);
            $stm->bindValue(':cidade', $membro->cidade);
            $stm->bindValue(':estado', $membro->estado);
            $stm->bindValue(':watapps', $membro->watapps);
            $stm->bindValue(':url', $membro->url );
            
            $retorno = $stm->execute();
 
            if ($retorno){

       

            echo  ' ok escreveu tudo ';  
            }
            else{
                   "Erro  linha 149 ao execurat o script";
            }




//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
  foreach($html2->find('.carousel-inner') as $e) { 
 /////consultar estoque a url busca os detalhes do estoque///
  $fotos=  $e->innertext;
  $url_foto = explode('src="',$fotos);
  ///////pegar foto por foto até 10 fotos////////
  //////////foto1//////////////////
 if(isset($url_foto[1])){
  $url_linpa = explode('?s=',$url_foto[1]);
   $fotourl=trim($url_linpa[0]);
/////////////////////primeira foto atualizar /////////////estoque 

 $sql = 'SELECT * FROM estoque WHERE url=:url  ORDER BY id_estoque DESC';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $membro->url);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo "total de estoque cadastrado". $total = count( $clientes );

echo $sql2 = "SELECT nome_membro,id_estoque,url,carros  FROM estoque WHERE  url='".$membro->url."' ORDER BY id_estoque DESC";

  $estoque = $mysql->query($sql2);

  $row_estoque= $estoque ->fetch_assoc();

  echo 'id_estoque'.'<br>'. $id_estoque=$row_estoque['id_estoque'];

 echo  $url= $row_estoque['url'];

  

     $carro_atual=$row_estoque['carros'] +1 ;

  

  


  $up=$mysql->query ( "UPDATE membros SET carros = carros + 1 WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE estoque SET carros ='".$carro_atual."' WHERE  url='".$url_final."'");

  $up=$mysql->query ( "UPDATE membros SET carros_total = carros_total + 1 WHERE  url='".$url_final."'");



  //////////////////////inserrir imagens/////////////////////
$numero =md5(microtime()); 
$imagem =$numero. ".jpg";
echo $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
echo $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        
$sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 

   //////////////////fim codigo///////////////////////////////


  ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
  
}
  //////////foto2/////////////////
if(isset($url_foto[2])){
  $url_linpa = explode('?s=',$url_foto[2]);
  $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 


 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
  ///////////////
 //////////foto3/////////////////
if(isset($url_foto[3])){
  $url_linpa = explode('?s=',$url_foto[3]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto4/////////////////
if(isset($url_foto[4])){
  $url_linpa = explode('?s=',$url_foto[4]);
   $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto5/////////////////
if(isset($url_foto[5])){
  $url_linpa = explode('?s=',$url_foto[5]);
    $fotourl=trim($url_linpa[0]);
   $numero =md5(microtime()); 
   $imagem =$numero. ".jpg";
    $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')"; 
    $sql2= $mysql->query($sql); 
$nova_imagem ="../galeriadefotos/grd/".$imagem;
$ch = curl_init( $fotourl);
 $fp = fopen($nova_imagem, 'wb');
 curl_setopt($ch, CURLOPT_FILE, $fp);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_exec($ch);
 curl_close($ch);
 fclose($fp);
 $image = WideImage::load($nova_imagem);
           // Redimensiona a imagem
   $image = $image->resize(569, 329,   'outside','any');
          // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/grd/'.$numero.'.jpg');
   

   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(320, 300,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/med/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
     // Redimensiona a imagem
   $image = $image->resize(120, 100,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/peq/'.$numero.'.jpg'); 



   $image = WideImage::load($nova_imagem);
    // Redimensiona a imagem
   $image = $image->resize(60, 60,  'outside','any');
     // Salva a imagem em um arquivo (novo ou não)
   $image->saveToFile('../galeriadefotos/mini/'.$numero.'.jpg'); 
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[6])){
  $url_linpa = explode('?s=',$url_foto[6]);
 ?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 //////////foto2/////////////////
if(isset($url_foto[7])){
  $url_linpa = explode('?s=',$url_foto[7]);
?><img height="150px" src="<?=$url_linpa[0];?>"/>
  <?
}
 ///////////////////foto2/////////////////
////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

}/// fim carrosel 






//////////////////////////////////////////////////////////////////////////////////////////
echo '<br>'.'<br>';

}    $i++; 
//////////////////////////////////////////////////
//////////////////////////////////////////////////
//////////////////////////////////////////////////
//////////////////////////////fim proximas3///////////////////////////////////////////////////////////////
   } }


 
//https://www.webmotors.com.br/comprar/ford/fiesta/1-6-mpi-class-hatch-8v-flex-4p-manual/4-portas/2007-2008/23825885?idcmpint=t1:c17:m07:webmotors:clique_card_resultado_busca::anuncio-normal-pos-0&utm_medium=calhau&utm_campaign=clique_card_resultado_busca&utm_content=anuncio-normal-pos-0



 
///https://www.webmotors.com.br/comprar/fiat/mobi/1-0-evo-flex-like-manual/0-portas/2016-2017/23832645?idcmpint=t1:c17:m07:webmotors:clique_card_resultado_busca::anuncio-normal-pos-1&utm_medium=calhau&utm_campaign=clique_card_resultado_busca&utm_content=anuncio-normal-pos-1
   


?>
