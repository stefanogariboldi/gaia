<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaAdmin();

$t = $_GET['id'];
$f = new Persona($t);
$f->admin = time();

redirect('admin.admin&new');