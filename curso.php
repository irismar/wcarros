<?php
include_once('simple_html_dom.php');


// 1. Write a function with parameter "$element"
function my_callback($element) {
  
    if ($element->tag=='h2')
        $element->outertext = 'a';
}


// 2. create HTML Dom
$html = file_get_html('http://www.sagaseminovos.com.br/seminovos/ofertas.html');


// 3. Register the callback function with it's function name
$html->set_callback('my_callback');


// 4. Callback function will be invoked while dumping
echo $html;
?>