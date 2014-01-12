<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaApp([APP_SOCI, APP_PRESIDENTE]);

controllaParametri(array('id','motivo','info'), 'presidente.utenti&errGen');

$v = Volontario::id($_GET['id']);
$motivo = $conf['dimissioni'][$_POST['motivo']];

$v->dimettiVolontario($_POST['motivo'],$_POST['info'],$me);
               
redirect('presidente.utenti&dim');   
?>