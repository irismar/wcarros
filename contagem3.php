<? $html2 = file_get_html($item['A3']);
//descobrir o numero de anuncios para execurar a paginacao 
//todo site tem uma divi diferente  
//capturar titulo nome marca modelo esse dado será usado para buscar discriçao
foreach($html2->find('.boxInfoVehicle') as $e) { 
 echo $modelo= $item['mod
 elo'] = trim($e->find('.makemodel-opinion', 0)->innertext); 
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
$preco= str_replace("R$", "", $preco );
$preco= str_replace(".", "", $preco );
$preco= str_replace(",", "", $preco );



 
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
