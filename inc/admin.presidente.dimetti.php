<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaAdmin();

$t = $_GET['id'];
$t = new Delegato($t);
$t->fine = time();


redirect('admin.presidenti&ok');
