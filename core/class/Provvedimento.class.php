<?php

class Provvedimento extends Entita {
        
    protected static
        $_t  = 'provvedimenti',
        $_dt = null;
    
    public function volontario() {
        return Volontario::id($this->volontario);
    }
    
    public function appartenenza() {
        return Appartenenza::id($this->appartenenza);
    }
    
    public function comitato() {
        return $this->appartenenza()->comitato();
    } 
}