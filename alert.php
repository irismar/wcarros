<? 

@session_start(); 

if($_SERVER['SERVER_NAME']=="localhost"){

$mysql= new mysqli('localhost','root','', 'wcarros');

}else{

    $mysql= new mysqli('mysql524.umbler.com','wcarros','irisMAR100', 'wcarros');

}

$sql2  = " SELECT id FROM propostas WHERE  id_membro='" .trim($_GET['id']). "'AND alerta='1'  "; 

$query2 = $mysql->query($sql2);

$nmesagens=$query2->num_rows;

    if($query2->num_rows!=0){

    ?><nav id="mensagens">

    

    <div class="alert alert-success" role="alert" id="mensagens">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

    <span aria-hidden="true">&times;</span>

    </button><strong><a href="/webapp?notifica=0"></strong> Você tem  <samp><?=$nmesagens; ?>  Novas    </samp>Mensagem</a>

    </div></nav><?} 



  

 

    