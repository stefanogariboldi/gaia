<?php

/*
 * ©2013 Croce Rossa Italiana
 */


/**
 * Carica il contenuto dell'iteratore in un array
 */
function carica( &$iteratore ) {
	return iterator_to_array($iteratore);
}