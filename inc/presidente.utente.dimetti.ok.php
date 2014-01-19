<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaApp([APP_SOCI, APP_PRESIDENTE]);

controllaParametri(array('id'), 'presidente.utenti&errGen');

$v = $_GET['id'];
$v = Volontario::id($v);

proteggiDatiSensibili($v, [APP_SOCI , APP_PRESIDENTE]);

foreach ( $conf['dimissioni'] as $numero => $dimissioni ) {
    if ( $numero == $_POST['motivo']) { 
        $motivo =  $dimissioni;
    } 
}

$m = new Email('dimissionevolontario', 'Dimissione Volontario: ' . $v->nomeCompleto());
$m->da = $me;
$m->a = $v->volontario();
$m->_NOME       = $v->volontario()->nome;
$m-> _MOTIVO = $motivo;
$m-> _INFO = $_POST['info'];
$m->invia();
 
$d = new Dimissione();
$d->volontario = $v->id;

$a = Appartenenza::filtra([['volontario', $v]]);

foreach ( $a as $_a){
    if($_a->attuale()){
        $d->appartenenza = $_a;
        $d->comitato     = $_a->comitato;
        $d->motivo       = $_POST['motivo'];
        $d->info         = $_POST['info'];
        $d->tConferma    = time();
        $d->pConferma    = $me;
        $x = Appartenenza::id($_a);
        $x->fine  = time();
        if(isset($_GET['ordinario'])){
            $x->stato = MEMBRO_ORDINARIO_DIMESSO;
        }else{
            $x->stato = MEMBRO_DIMESSO;
            $f = Persona::id($v);
            $f->stato = PERSONA;
            $f->admin = null;
        }
    }
}

if(!isset($_GET['ordinario'])){

    $i = Delegato::filtra([['volontario',$v]]);
    $e = Estensione::filtra([['volontario', $v], ['stato', EST_OK]]);

    foreach ($i as $_i){
        $b->fine = time();   
    }

    foreach ($e as $_e){
        $est->termina();
    }
        
}                   

redirect('presidente.utenti&dim');   
?>