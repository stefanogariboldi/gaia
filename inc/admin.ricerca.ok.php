<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaAdmin();
controllaParametri(array('input'), 'admin.ricerca.cf&err');
$u = Utente::by('codiceFiscale', $_POST['input']);
if(!$u){
	$u = Utente::by('id', $_POST['input']);
}
redirect('presidente.utente.visualizza&id='.$u);
?>
