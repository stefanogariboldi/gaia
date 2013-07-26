<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaApp([APP_SOCI , APP_PRESIDENTE]);

?>

<div class="row-fluid">
    <div class="span3">
        <?php menuVolontario(); ?>
    </div>
    <div class="span9">
        <div class="row-fluid">
            <div class="span12">
                <h3>Ufficio Soci</h3>
            </div>
        </div>
                    
        <div class="row-fluid">
            <div class="span3">
                
            </div>
            
            <div class="span6 allinea-centro">
                <img src="https://upload.wikimedia.org/wikipedia/it/thumb/4/4a/Emblema_CRI.svg/75px-Emblema_CRI.svg.png" />
            </div>

            <div class="span3">
                <table class="table table-striped table-condensed">
                
                    <tr><td>Num. Volontari</td><td><?php echo $me->numVolontariDiCompetenza(); ?></td></tr>
                    
                </table>
            </div>
        </div>
        <hr />
        
        <div class="span12">
            <div class="span6">
                <div class="btn-group btn-group-vertical span12">
                    <a href="?p=presidente.utenti" class="btn btn-primary btn-block">
                        <i class="icon-list"></i>
                        Elenchi volontari
                    </a>
                    <a href="?p=us.elettorato" class="btn btn-danger btn-block">
                        <i class="icon-list"></i>
                        Elenchi elettorato
                    </a>
                    <a href="?p=us.utente.nuovo" class="btn btn-block btn-success">
                        <i class="icon-plus"></i>
                        Aggiungi volontario
                    </a>
                </div>
            </div>
            <div class="span6">
                <div class="btn-group btn-group-vertical span12">
                  <!--<a href="?p=us.quoteNo" class="btn btn-block">
                        <i class="icon-certificate"></i>
                        Gestione quote associative
                    </a>
                     <a href="?p=us.quote.ricerca" class="btn btn-block">
                        <i class="icon-search"></i>
                        Ricerca quota associativa
                    </a>-->
                    <a href="?p=presidente.appartenenzepending" class="btn btn-block btn-success">
                        <i class="icon-group"></i>
                        Appartenenze in attesa
                    </a>
                    <a href="?p=presidente.titoli" class="btn btn-block btn-success">
                        <i class="icon-star"></i>
                        Titoli in attesa
                    </a>
                </div>
            </div>
        </div>
   </div>
</div>
