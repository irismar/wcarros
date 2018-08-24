<samp itemscope itemtype="http://schema.org/Car">
 <samp itemprop="name" style="color: #FFF; display: none;">wcarros</samp>
     <?php
  $sql = "SELECT  * FROM  fotos	WHERE  id_estoque='".trim($row_estoque['id_estoque'])."'  ";
   $membros = $mysql->query($sql);
   
 /////
 //

/* Por cada resultado, preparar a saída
 */
$imagesHtml = '';

$indicatorDotsHtml ='';

$i = 0;
if($membros->num_rows=='0'){
   
    $filename ="galeriadefotos/grd/semimagem.jpg";
    
    // classe "active" apenas no primeiro elemento
    $active = $i==0 ? 'active' : '';

    // criar HTML para a imagem
    $imagesHtml.= '
    <div class=" img-responsive item '.$active.'">
        <img  itemprop="image" src="'.$filename.'" alt="'.$filename.'" />
    </div>';
     
    // criar HTML para o indicador da imagem
    $indicatorDotsHtml.= '
    <li data-target="#wcarros" data-slide-to="'.$i.'" class="'.$active.'"></li>';

    $i++;  
    
}else{
while($row = mysqli_fetch_array( $membros)) {
if (( $row['imagem'] <> '') and ((file_exists("galeriadefotos/grd/".$row['imagem'])))) { 

    $filename ="https://wcarros.com/galeriadefotos/grd/".$row['imagem']; } else {$filename ="https://wcarros.com/galeriadefotos/grd/semimagem.jpg"; } 

    
    
    
    // classe "active" apenas no primeiro elemento
    $active = $i==0 ? 'active' : '';

    // criar HTML para a imagem
    $imagesHtml.= '
<div class=" img-responsive item '.$active.'">


        <img  itemprop="image" src="'.$filename.'" alt="'.$filename.'" />
    </div>
   
    '
    ;

    // criar HTML para o indicador da imagem
    $indicatorDotsHtml.= '
    <li data-target="'.'#wcarros'.$row_estoque['id_estoque'].'"" data-slide-to="'.$i.'" class="'.$active.'" data-ride="'.'#wcarros'.$row_estoque['id_estoque'].'""   data-interval="false"></li>';

    $i++;
}}


/* Preparar a saída para o navegador
 */
if (!empty($imagesHtml)) {

    /* Verificar se precisamos de navegação
     */
    $navHtml = '';

    if ($i> -1) {

        $indicatorsHtml = '
        <ol class="carousel-indicators">
            '.$indicatorDotsHtml.'
        </ol>';

        $navHtml = '
        <a class="left carousel-control" href="'.'#wcarros'.$row_estoque['id_estoque'].'"" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left azul" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="'.'#wcarros'.$row_estoque['id_estoque'].'"" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right azul" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>';
    }

    /* Enviar saída para o navegador
     */
    echo '
    <div id="'.'wcarros'.$row_estoque['id_estoque'].'"" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        '.$indicatorsHtml.'

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            '.$imagesHtml.'
        </div>

        <!-- Left and right controls -->
        '.$navHtml.'
    </div>'; ?> <?
} ?>

  </div>
</samp>
