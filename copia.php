<? 
// Desabilita erros da libxml e permite que o usuário obtenha informação do erro como necessitar 
libxml_use_internal_errors(TRUE);

$html = new DOMDocument();
$html->loadHTMLFile('http://carros-saopaulo-zc.temusados.com.br/revenda/10-brasil-multimarcas/sao-paulo/20423');

$spans = array();
foreach($html->getElementsByTagName('section') as $span)
{ 
    $spans[] = $span;
}

print $spans[0]->nodeValue;





?>