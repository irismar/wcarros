<?php 
  require'Connections/repasses.php';
  require_once 'config/conexao.class.php';
    $conexao = Conect::getInstance();
 if (isset($_GET['acesso'])){
  
 
 $sql = "SELECT  * FROM  acesso     ORDER BY data DESC";
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_ASSOC);
  $total = count( $clientes );
 if($total > '0' ){ ?> 
  <div class="container">
 
 <?php   foreach($clientes as $row_estoque1):  ?>


<div class="jumbotron">
 <p><i class="fa fa-map fa-1x"></i> <?=$row_estoque1['endereco']. $row_estoque1['estado'] ;?></p>
 <p><i class="fa fa-windows fa-1x"></i> <?=$row_estoque1['maquina'] ;?></p>
 <p><i class="fa fa-calendar fa-1x"></i> <?= data22($row_estoque1['data'] );?></p>
 <p><i class="fa fa-calendar fa-1x"></i> <?=$row_estoque1['ip'] ;?></p>
</div><?   endforeach; 
      }?></div>

    <?  }  

 if (isset($_GET['membros'])){

$sql = "SELECT  * FROM  membros     ORDER BY id DESC  ";
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_ASSOC);
  $total = count( $clientes );
 if($total > '0' ){ ?> 
  
 <div class="col-md-12 fundo_perfil"> <?
  foreach($clientes as $row_estoque1):
     ?>
 <div class="container">  
 <div class="col-md-2 col-sm-2 col-xs-2 fundo_perfil ">
  <img itemprop="image" alt="<?= $row_estoque1['nome_membro']; ?>"  class="img22" src="galeriadefotos/peq/<?=$row_estoque1['foto']?>"  >

  </div>
 <div class="col-md-5"> 
 <p><?=$row_estoque1['nome'] ;?></p>
 <p><i class="fa fa-map-marker fa-1x"></i> <?=$row_estoque1['endereco'] ;?></p>
  <p><i class="fa fa-car fa-1x"></i> <?= trim($row_estoque1['carros'] );?></p>
 <p><i class="fa fa-unlink fa-1x"></i><a href="<?= "/" .trim($row_estoque1['url'] );?>"> <?= "wcarros.com/" .trim($row_estoque1['url'] );?></a></p>
 <p><i class="fa fa-calendar fa-1x"></i>Anuncia desde  <?= FormataData($row_estoque1['data']) ;?></p>
</div></div><hr><br><?
     endforeach;  } ?></div><?    }  

       if (isset($_GET['carros'])){
 $sql = "SELECT  * FROM  estoque     ORDER BY id_estoque DESC  ";
 $stm = $conexao->prepare($sql);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_ASSOC);
  $total = count( $clientes );
 if($total > '0' ){ ?> 
  
  <div class="container"><?
  foreach($clientes as $row_estoque1):
     
     ?>
<div class="jumbotron">
<p> <img itemprop="image" alt="<?= $row_estoque['nome_membro']; ?>"   src="galeriadefotos/peq/<?=$row_estoque1['foto_carro']?>"  ></a> </p>
<p><?=$row_estoque1['marcatexto'] ." ".$row_estoque1['modelotexto'] ;?></p>
<p><a href="#">Excluir esse Anúncio</a></p>
 <p><i class="fa fa-map-marker fa-1x"></i> <?=$row_estoque1['endereco'] ;?></p>
  <p><i class="fa fa-car fa-1x"></i> <?= trim($row_estoque1['url'] );?></p>
 <p><i class="fa fa-unlink fa-1x"></i><a href="/<?=trim($row_estoque1['id_estoque'] );?>"> <?= "wcarros.com/" .trim($row_estoque1['id_estoque'] );?></a></p>
 <p><i class="fa fa-calendar fa-1x"></i>Anuncia postado em   <?= data22($row_estoque1['data']) ;?></p>
</div><?
      endforeach;   }?></div><?  }      

       
?>