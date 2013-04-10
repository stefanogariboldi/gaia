<?php

/*
 * ©2013 Croce Rossa Italiana
 */

class Appartenenzagruppo extends Entita {
        protected static
            $_t  = 'gruppiPersonali',
            $_dt = null;

        public function appartenenza() {
        return new Appartenenza($this->appartenenza);
    }
    
        public function volontario() {
            return new Volontario($this->volontario);
        }
        
        /* Sono ancora appartenente al gruppo di lavoro ? */
        public function attuale() {
            /* Vero se la fine è dopo, o non c'è fine! */
            return ( ( $this->fine > time() ) || ( !$this->fine ) );
        }
}