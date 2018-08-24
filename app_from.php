<?

function IsLoggedIn()
{
return (@$_SESSION["Status"] =='repasses');
}
?>
<style>
    input[type="text"], input[type="number"],input[type="submit"] {
    background: #FFF;
    color: #666;
    display: block;
    float: left;
    font: 15px 'Open Sans',Arial;
    padding: 16px;
    width: 96%;
    margin: 10px;
	  border-radius: 2px;
    }
.col-sm-12{width:100%;float: left;}
.col-sm-11{width:91.66666667%}
.col-sm-10{width:83.33333333%}
.col-sm-9{width:75%}
.col-sm-8{width:66.66666667%}
.col-sm-7{width:58.33333333%}
.col-sm-6{width:50% ;float: left;}
.col-sm-5{width:41.66666667%}
.col-sm-4{width:33.33333333%;float: left;}
.col-sm-3{width:25%}
.col-sm-2{width:16.66666667%; float: left;}
.col-sm-1{width:8.33333333%}
@media screen and (min-width:0px) and (max-width:800px){
  .col-sm-2{width:99%; float: left;}
  .col-sm-8{width:99%; float: left;}
}
.form-control {
  display: block;
  
  
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 2px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}
.form-control::-moz-placeholder {
  color: #999;
  opacity: 1;
}
.form-control:-ms-input-placeholder {
  color: #999;
}
.form-control::-webkit-input-placeholder {
  color: #999;
}
.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  cursor: not-allowed;
  background-color: #eee;
  opacity: 1;
}
input {
   
    border: rgba(218, 216, 216, 0.68) solid 1px;}
input[type="submit"] {width:100%;background:#0081cc;color:#FFF;cursor:pointer;display:block;font-weight:bold!important;font:14px 'Open Sans',Arial;padding:16px;-webkit-transition:background .2s ease-in;-moz-transition:background .2s ease-in;-ms-transition:background .2s ease-in;-o-transition:background .2s ease-in;transition:background .2s ease-in; border-radius: 10px;box-shadow: 1px 1px 2px #c5c4c4;}
input[type="submit"]:hover{background:#0081cc;color:#FFF;}
}
.img22 {
width :40px;
height :40px;
margin : auto;
border-radius: 50%;
float: left;
}
</style>
 </div>
<form action="acao.php?memsagem=<?php echo $_GET['app_memsagem'] ?>&&id=<?php echo $_GET['id']; ?>&&id_membro=<?php echo $_GET['id_membro']; ?>&&foto=<?=$_GET['foto']?>&&cod_seguranca=<?php echo $_GET['segure']; ?>&&marca=<?php echo $_GET['marca']; ?>&&modelo=<?php echo $_GET['modelo']; ?>&&preco=<?php echo $_GET['preco']; ?>&&endereco1=<?=$_GET['endereco1']?>&&retorno="urlretorno" method="post" >
 <? if(isset($_GET['telefone'])&& $_GET['telefone']!=''){ ?>
   <input type="hidden"   name="nome" value="<?=$_GET['remetente'];?>"  id="nome" />
   <input type="hidden"  name="email"  value="<?=$_GET['telefone'];?>" id="email" />
   <? }else { ?>
   <input type="text" class="form-control" placeholder="Seu nome"  name="nome" required  id="nome" />
   <input type="number" class="form-control" placeholder="telefone"  name="email" required  id="email" />
<? } ?><p> 
  <div class="col-sm-8">
  <input type="text" class="form-control" name="memsagem" placeholder=" Escreva uma mensagem ao vendedor aguarde alguns segundos pela resposta" >
  </div> <div class="col-sm-2">
  <input type="submit"  class="form-control" id="enviar" value="enviar" name="Enviar">
 </div>  </from>   



