<?php

if($_SERVER['SERVER_NAME']=="localhost"){
  define('HOST', 'localhost');   
  define('DBNAME', 'wcarros');   
  define('CHARSET', 'utf8');   
  define('USER', 'root');   
  define('PASSWORD', '');   
}else{

   
  define('HOST', 'mysql524.umbler.com');   
  define('DBNAME', 'wcarros');   
  define('CHARSET', 'utf8');   
  define('USER', 'wcarros');   
  define('PASSWORD', 'irisMAR100');   
 }
  class Conect {  
 
   /*   
   * Atributo estático para instância do PDO   
   */   
   private static $pdo;  
 
   /*   
   * Escondendo o construtor da classe   
   */   
   private function __construct() {   
    //   
   }  
 
   /*   
   * Método estático para retornar uma conexão válida   
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão   
   */   
   public static function getInstance() {   
    if (!isset(self::$pdo)) {   
     try {   
      @$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => 'TRUE');   
      self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
     } catch (PDOException $e) {   
      print "Erro: " . $e->getMessage();   
     }   
    }   
    return self::$pdo;   
   }   
  }
function removeAcentos($string) {
	$string= trim($string);
	
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
    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
    $string = preg_replace("/ /", "", $string);

	
    return $string;
}
if (isset($_GET["txtnome"])) {
   $busca =trim(removeAcentos($_GET["txtnome"]));
	 
		 

                             

 $conexao = Conect::getInstance();
 $busca='%'.$busca.'%';
  $sql = "SELECT * FROM fp_modelo WHERE modelo LIKE :buscar";
 $stm = $conexao->prepare($sql);
 $stm->bindParam(':buscar', $busca);
 $stm->execute();
 $clientes = $stm->fetchAll(PDO::FETCH_ASSOC);
  $total = count( $clientes );
 if($total > '0' ){ ?> 
  <div class="list-group">  
 
 <?php   foreach($clientes as $adicionar):  ?>


     
  

     <div class="list-group-item"><ul>
  <p>
   
<a href="adicionar?id_ano=<?=$adicionar["codigo_modelo"]; ?>"> <?php echo $adicionar["marca"]; ?>  <?php echo $adicionar["modelo"]; ?>		</a>
	
  
 </p>  		
		
 </ul>
</div>




 <?php 


   endforeach;           ?>  </div>   <?php                      }  }


