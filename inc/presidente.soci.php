<?php

/*
 * ©2013 Croce Rossa Italiana
 */
paginaApp([APP_SOCI , APP_PRESIDENTE]);


menuElenchiVolontari(
    "Elenco Soci",                // Nome elenco
    "?p=admin.utenti.excel&soci",    // Link scarica elenco
    false                               // Link email elenco
);
?>
  
<div class="row-fluid">
   <div class="span12">

       <table class="table table-striped table-bordered table-condensed" id="tabellaUtenti">

            <thead>
                <th>Cognome</th>
                <th>Nome</th>
                <th>Nascita</th>
                <th>C. Fiscale</th>
                <th>Residenza</th>
                <th>Cellulare</th>
                <th>Data Ingresso</th>
                <th>Azioni</th>
            </thead>

        <?php
        $elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $t = $comitato->membriAttuali(MEMBRO_VOLONTARIO);
                ?>

            <tr class="success">
                <td colspan="8" class="grassetto">
                    <?php echo $comitato->nomeCompleto(); ?>
                    <span class="label label-warning">
                        <?php echo count($t); ?>
                    </span>
                    <a class="btn btn-small pull-right" 
                       href="?p=presidente.utenti.excel&comitato=<?php echo $comitato->id; ?>&soci"
                       data-attendere="Generazione...">
                            <i class="icon-download"></i> scarica come foglio excel
                    </a>
                </td>
            </tr>
            <?php
            foreach ( $t as $_v ) {
            ?>
                <tr>
                    <td><?php echo $_v->cognome; ?></td>
                    <td><?php echo $_v->nome; ?></td>
                    <td>
                        <?php echo date('d/m/Y', $_v->dataNascita); ?>, 
                        <?php echo $_v->comuneNascita; ?>
                        <span class="muted">
                            <?php echo $_v->provinciaNascita; ?>
                        </span>
                    </td>
                    <td><?php echo $_v->codiceFiscale; ?></td>
                    <td>
                        <span class="muted">
                            <?php echo $_v->CAPResidenza; ?>
                        </span>
                        <?php echo $_v->comuneResidenza; ?>,
                        <?php echo $_v->provinciaResidenza; ?>
                    </td>
                    
                    <td>
                        <span class="muted">+39</span>
                            <?php echo $_v->cellulare; ?>
                    </td>
                    <td>
                        <?php echo $_v->ingresso()->format("d/m/Y"); ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-small" href="?p=presidente.utente.visualizza&id=<?php echo $_v->id; ?>" title="Dettagli">
                                <i class="icon-eye-open"></i> Dettagli
                            </a>
                            <a class="btn btn-small btn-success" href="?p=utente.mail.nuova&id=<?php echo $_v->id; ?>" title="Invia Mail">
                                <i class="icon-envelope"></i>
                            </a>
                        </div>
                   </td>
                </tr>
                
               
       
        <?php }
        }
        ?>

        
        </table>

    </div>
    
</div>