<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaApp([APP_SOCI, APP_PRESIDENTE]);

controllaParametri(array('id','motivo','info'), 'presidente.utenti&errGen');

$v = Volontario::id($_GET['id']);

proteggiDatiSensibili($v, [APP_SOCI , APP_PRESIDENTE]);
if (!$v->modificabileDa($me)) {
  redirect('presidente.utenti&nonpuoi');
}

$v->dimettiVolontario($_POST['motivo'], $_POST['info'], $me);
               
redirect('presidente.utenti&dim');   
?>