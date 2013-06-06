<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaApp(APP_CO);

$t = $_GET['t'];
$v = $_GET['v'];
    
if (isset($_GET['monta'])) {
    $c = new Coturno();
    $c->volontario = $v;
    $v = Volontario::by('id', $v);
    $c->appartenenza = $v->unComitato();
    $c->turno = $t;
    $c->pMonta = $me;
    $c->monta();
    
redirect('co.attivita&monta');  
}

if (isset($_GET['smonta'])) {
    $c = Coturno::filtra([['volontario', $v],['turno',$t]]);
    $c = new Coturno($c[0]);
    $c->volontario = $v;
    $c->pSmonta = $me;
    $c->smonta();
    
redirect('co.attivita&smonta');  
}
?>