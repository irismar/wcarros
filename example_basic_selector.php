
 <form action="?robo=novo" name="add" id="add" enctype="multipart/form-data" method="POST" "><br>
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

// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
if(isset($_GET['robo'])){   
 $url_base=$_POST['url_base'];
 $url1=trim($_POST['url1']);
 $gps=trim($_POST['gps']);
   $cord = explode(',', $gps);
echo  $lat=number_format(trim( $cord[0]), 6, '.', ' ');
echo  $log=number_format(trim( $cord[1]), 6, '.', ' ');

// get DOM from URL or file
$html1 = file_get_html($url1);

// find all link
foreach($html1->find('.empresa') as $e) { 
     $item['estoque'] = trim($e->find('.atualizada', 0)->plaintext);
     $e->innertext;
      $estoque = explode('estoque:',  $item['estoque']);
 $estoque_total=$estoque[1];
 
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
$n_anucios= $estoque_total/"20";
$registros="20";
echo 'total de paginas'.$paginas = ceil($estoque_total / $registros);
 }

//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
$mensagem="teste para paginacao automatica";
$i = 1;
while( $i <= $paginas ){
 // comeco do codigo faco nova requisacao de url  

 echo  $url=  $url1."/?p=".$i  ;

$html = file_get_html($url);
  // faco o docido rodar por tantas paginas tiverem o anuncio 
  

if($i < '2' )  { 
 // fin
// se for a egunda consulta nao adicinoar os dados novamente do memnro 
// onter url nome usuario find all div tags with id=gbar
foreach($html->find('.items') as $e) { 
 $item['modelo'] = trim($e->find('figure', 0)->plaintext);
 $fotoperfil= $e->innertext;
 $arquivo = explode('=', $fotoperfil);
 $marca=$arquivo[1];
 $arquivo2 = explode('"', $marca);
 echo $fotoperfil_comercial=$arquivo2[1]; 

 }  


 // onter url nome usuario find all div tags with id=gbar
foreach($html->find('.interna-titulo') as $e) { 
  $item['nome'] = trim($e->find('strong', 0)->plaintext);
  $nome = str_replace("<br>", "",  $item['nome']);
   $nome=strtolower($nome);
  $nom=utf8_decode($nome);
  // onter url nome usuario find all div tags with id=gbar
 }


foreach($html->find('.empresa') as $e) { 
  $hat= $item['endereco'] = trim($e->find('.revenda_telefones', 0)->plaintext); 
 echo $what=trim($hat);
  $contato= $item['endereco'] = trim($e->find('address', 0)->plaintext);
 $arquivo = explode(':',  $contato);
 
 $rua= str_replace("Bairro", "", $arquivo[1]);
 $bairro= str_replace("Cidade", "", $arquivo[2]);
 $cidade= str_replace("Telefone", "", $arquivo[3]);
 $telefone= str_replace("(", "", $arquivo[4]);
 $telefone= str_replace(")", "", $telefone);
 $telefone= str_replace("Telefones", "", $telefone); 
 $telefone= str_replace("contato", "", $telefone); 
 $telefone= str_replace("para", "", $telefone); 
 
 $uf = explode('-', $cidade);
 $estado=$uf[1];
 if($estado=='CE') {$estado="Ceará";}
 if($estado=='SP') {$estado="São Paulo";}
 if($estado=='MA') {$estado="Maranhão";}
 if($estado=='GO') {$estado="Goiania";}
 if($estado=='PA') {$estado="Pará";}
 if($estado=='PI') {$estado="Piaui";}
 if($estado=='BA') {$estado="Bahia";}
 if($estado=='AM') {$estado="Manaus";}
 if($estado=='MG') {$estado="Minas Gerais";}
$cidade= str_replace("-", "", $arquivo[3]);



 $fixo= str_replace("Telefones para contato", "", $arquivo[4]);
 // buscar o nome do contato celular vendedor
 // find all div tags with id=gbar
 $whatapp=$arquivo[5];
 $what = explode('Revenda', $whatapp);
 $whatapps=$what[0];
 // o contato de watapp de empresa pode ser uma lista de vendedores 
   } 


 
   
 
 
$nome2 = str_replace("<strong>", "", $nome);
echo $nome_final = str_replace("</strong>", "", $nome2);
     $url=NormalizaURL($nome);
     $url2 = str_replace("strong", "", $url);
     $url_final = str_replace("/", "", $url2);
     $url_final = str_replace("-", "", $url2);
$url_final = strtolower($url_final);
// o adiciono a url para fazar a foto se exibida  
echo '<br>';
 echo $foto=$url_base.$fotoperfil_comercial;
 // o contato de watapp de empresa pode ser uma lista de vendedores e 
 

$pos = strpos( $fotoperfil_comercial, '.jpg' );

// exemplo de uso:

if ($pos === false) {
  $foto='https://wcarros.com/galeriadefotos/grd/semimagem.jpg';
  // nesse caso a url veio de um site sem fotos de perfil 
   echo 'Não encontrado';
} else {
   echo 'Encontrado';
}

  // verivicar se é uma foto ou um link quebrado sem imagem 
 $endereco=$rua." ".$bairro." ".$cidade;



  $sql = 'SELECT * FROM membros WHERE url=:url LIMIT 1';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':url', $url_final);
  $stm->execute();
  $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 echo  $total = count( $clientes );

 if($total =="0" ){
// consultar se usuario ja nao é cadastrado  

 $numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
 $nova_imagem ="../galeriadefotos/grd/".$imagem;
 $ch = curl_init($foto);
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



echo "usuario ainda nao cadastrado";
$sql = 'INSERT INTO membros (data, nome,lat,log, endereco,cidade,estado,watapps,fixo,senha,foto,url)
VALUES(:data, :nome,:lat,:log, :endereco,:cidade,:estado,:watapps,:fixo, :senha,:foto,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':nome', $nome_final);
            $stm->bindValue(':lat',$lat);
            $stm->bindValue(':log',$log);
            $stm->bindValue(':endereco',$endereco);
            $stm->bindValue(':cidade', $cidade);
            $stm->bindValue(':estado', $estado);
            $stm->bindValue(':watapps', $whatapps);
            $stm->bindValue(':fixo', $telefone);
            $stm->bindValue(':senha', "0800");
            $stm->bindValue(':foto',  $imagem);
            $stm->bindValue(':url', $url_final );
            
            $retorno = $stm->execute();
 
            if ($retorno){

       

            echo  ' ok escreveu tudo ';  
            }
            else{
                   "Erro  linha 149 ao execurat o script";
            }





   } else   { 

foreach($clientes as $cliente):
 


  endforeach;  
   } 



    }  






foreach($html->find('ul.veiculo-header-marca-titulo') as $e) { 
	echo     $item['modelo'] = trim($e->find('h2 a', 0)->href);
    $e->innertext;
// abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar



 $url=trim($url_base.$item['modelo']);


// get DOM from URL or file
$html = file_get_html($url);

// abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode 

// find all div tags with id=gbar
foreach($html->find('.infoComplementar .detalhes') as $e) { 
   $item['modelo'] = trim($e->find('span', 0)->plaintext);
  $detalhes= $e->innertext ;
  

$arquivo = explode('<br /> ', $detalhes);
$marca=strtolower($arquivo[0]);
$marca= str_replace("marca:", "", $marca);
$marca= str_replace("<strong>", "", $marca);
$marca= str_replace("</strong>", "", $marca);
$marca= str_replace("<div>", "", $marca);
$marca= str_replace("</span>", "", $marca);
$marca= str_replace("<span>", "", $marca);
$marca= trim($marca);
$versao=trim($arquivo[2]);
$versao= str_replace("Versão:", "", $versao);                               
$modelo=strtolower($arquivo[1]." ".$versao );

$modelo= str_replace("modelo:", "", $modelo);
$modelo= str_replace("<span>", "", $modelo);
$modelo= str_replace("</span>", "", $modelo);
$modelo= str_replace("<strong>", "", $modelo);
$modelo= str_replace("</strong>", "", $modelo);
$modelo= trim($modelo);

$cor=$arquivo[3];
echo $cor= str_replace("Cor:", "", $cor);
$combustivel=$arquivo[4];
echo $combustivel= str_replace("Combustível:", "", $combustivel);
$ano=$arquivo[5];
echo "ano". $ano= str_replace("Ano:", "", $ano);
$portas=$arquivo[6];
echo $portas= str_replace("Portas:", "", $ano);
   }
   //valor do carro class valor  
foreach($html->find('.infoComplementar') as $e) { 
 echo   $item['valor'] = trim($e->find('.valor', 0)->plaintext);
 $preco=$item['valor'];
 $preco= str_replace("R$" ,"",$preco);
 $preco= str_replace(".","",$preco);
 $preco= str_replace(",","",$preco);
 $preco = substr(" $preco", 0, -2) . '';

 //valor do carro class valor  
       }


 foreach($html->find('.infoComplementar .detalhes2') as $e) { 
   $item['valor'] = trim($e->find('li', 0)->plaintext);
   $detalhes= $e->plaintext ;
 $arquivo = explode('<li>', $detalhes);

  $km=$arquivo[1];
 $km= str_replace("Km" ,"",$km);
 $km= str_replace(".","",$km);
 echo"km". $km= str_replace(",","",$km);
 $descricao=  str_replace("<li> ","",$arquivo[1]);
 $descricao=  str_replace("</li> ","",$descricao);
 $descricao=  str_replace("<li> ","",$descricao);
 $descricao=  str_replace("</ul> ","",$descricao);
echo  $descricao=  str_replace("<ul> ","",$detalhes);



 //valor do carro class valor  
       }      
 //pegar fotos  carro
foreach($html->find('.fotos figure') as $e) { 
 $item['foto'] = trim($e->find('code', 0)->plaintext);
 $foto_principal= trim($item['foto']);
 //valor do carro class valor 
//  inserir uma class detro da imagem para forcar style="font-size:9px;" 
 $foto_p = str_replace('border="0"','id="img_blog"',  $foto_principal);
 $foto_po = trim( $foto_p);
 //remover dados para expor endereco
 $arquivo = explode('=', $foto_principal);

 $foto=$arquivo[3];
 $foto = str_replace('"','', $foto);
  $foto_carro = str_replace('alt','', $foto);
 }



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


$sql = 'INSERT INTO estoque (data, data_cadastro, id_membro,nome_membro,foto_membro,marcatexto,modelotexto,preco,portas,km,descricao,combustivel,lat,lon,endereco,cidade,estado,watapps,url)
VALUES(:data, :data_cadastro,:id_membro,:nome_membro,:foto_membro,:marcatexto,:modelotexto,:preco,:portas,:km,:descricao,:combustivel,:lat,:lon,:endereco,:cidade,:estado,:watapps,:url)';
$stm = $conexao->prepare($sql);
            $stm->bindValue(':data', $hora);
            $stm->bindValue(':data_cadastro', $membro->data);
            $stm->bindValue(':id_membro', $membro->id);
            $stm->bindValue(':nome_membro', $membro->nome);
            $stm->bindValue(':foto_membro', $membro->foto);
            $stm->bindValue(':marcatexto',  $marca);
            $stm->bindValue(':modelotexto', $modelo);
            $stm->bindValue(':preco', $preco);
            $stm->bindValue(':portas', $portas);
            $stm->bindValue(':km', $km);
            $stm->bindValue(':descricao', $descricao);
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

  foreach($html->find('.miniCarros') as $e) { 

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





  $item['minifito'] = trim($e->find('img', 0)->innertext);
  $miniat=$item['minifito'];
  $miniaturas= $e->innertext;
  if(!isset($miniaturas)) { echo "sem foto"; }

$arquivo = explode('href=',$miniaturas);
if(isset($arquivo [1])){  

 //provessa imageme 1;
 
  $img1=str_replace('"','',$arquivo [1]);
  $img1=str_replace('rel=prettyPhoto>','',$img1);

 $exp1 = explode('<',$img1);

 
echo $fotourl=$url_base.$exp1[0];
$numero =md5(microtime()); 
$imagem =$numero. ".jpg";
echo $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";
echo $adimagem=$mysql->query ("UPDATE estoque SET foto_carro='".$imagem."' WHERE id_estoque='".$id_estoque."'");

        
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
 
//rel=prettyPhoto codigo que ficou apos o href; 
 ?><img height="150px" src="<?= $fotourl;?>"/>
 <img height="150px" src="<?= $url_base.'galeriadefotos/grd/'.$imagem?>"/> <?
   
  
}
 
if(isset($arquivo [2])){  

 //provessa imageme 1;
 
  $img2=str_replace('"','',$arquivo [2]);
  $img2=str_replace('rel=prettyPhoto>','',$img2);

 $exp1 = explode('<',$img2);

 
 $fotourl=$url_base.$exp1[0];
$numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

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
 
//rel=prettyPhoto codigo que ficou apos o href;
}if(isset($arquivo [3])){  
 //provessa imageme 1;
 
  $img3=str_replace('"','',$arquivo [3]);
  $img3=str_replace('rel=prettyPhoto>','',$img3);

 $exp1 = explode('<',$img3);
 "fotosomemteurl".$exp1[0];

 $fotourl=$url_base.$exp1[0];
$numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

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
 
//rel=prettyPhoto codigo que ficou apos o href;
}
if(isset($arquivo [4])){  
 //provessa imageme 1;
 
  $img4=str_replace('"','',$arquivo [4]);
  $img4=str_replace('rel=prettyPhoto>','',$img4);

 $exp1 = explode('<',$img1);
  "fotosomemteurl".$exp1[0];

 $fotourl=$url_base.$exp1[0];
$numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

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
 
//rel=prettyPhoto codigo que ficou apos o href;
}
if(isset($arquivo [5])){  
 //provessa imageme 1;
 
  $img5=str_replace('"','',$arquivo [5]);
  $img5=str_replace('rel=prettyPhoto>','',$img5);

 $exp1 = explode('<',$img5);
 "fotosomemteurl".$exp1[0];

 $fotourl=$url_base.$exp1[0];
$numero =md5(microtime()); 
 $imagem =$numero. ".jpg";
   $sql = "INSERT INTO fotos (id_estoque,imagem) VALUES ('".$id_estoque."','".$imagem."')";

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


//rel=prettyPhoto codigo que ficou apos o href;
}
if(isset($arquivo [6])){  
 //provessa imageme 1;
 
  $img1=str_replace('"','',$arquivo [1]);
  $img1=str_replace('rel=prettyPhoto>','',$img1);

 $exp1 = explode('<',$img1);
 echo "fotosomemteurl".$exp1[0];

//rel=prettyPhoto codigo que ficou apos o href;
}


} //FIM DO RORECT;



// abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode // abro a consulta para buscar detalhes do carro class infocomplementar
//divido tudo com explode 

   
   } 
   echo $i . ' - ' .$mensagem . '<br />' ;
  $i++;

    }// fiim da contagem 

   
   
     $html->plaintext;
$html->clear();
unset($html);

 }
?>
