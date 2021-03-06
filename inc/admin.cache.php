<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaAdmin();

if ( !$cache ) {
    die('Gaia non sta usando la cache.');
}

$server = $cache->info();

?>

<?php if (isset($_GET['flush'])) { ?>
<div class='alert alert-block alert-success'>
    <h4>Cache flushata con successo &mdash; <?php echo date('d-m-Y H:i:s'); ?></h4>
    <p>Le performance di Gaia potrebbero subire rallentamenti per le prossime ore
        fino alla ricostruzione della cache.</p>
    </div>
    <?php } ?>

    <div class="row-fluid">

        <div class="span4">
            <h2><i class="icon-cloud muted"></i> Cache server</h2>

            <p>Statistiche di funzionamento del server di cache.</p>

            <p>Le richieste GET ricevute sono il numero di interrogazioni risparmiate
                al database.</p>

                <a href="?p=admin.cache.flush" class="btn btn-large btn-danger">
                    <i class="icon-warning-sign"></i>
                    Resetta la cache (flush)
                </a>

                <hr />

                <div class='alert alert-info'>
                    Query fatte al database dall'ultimo flush della cache:
                    <strong><?php echo (int) $cache->get( $conf['db_hash'] . '__nq' ); ?></strong>
                </div>

            </div>


            <div class="span8">

                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Nome parametro</th>
                        <th>Valore attuale</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Indirizzo server</td>
                            <td>Porta <?= $server['tcp_port']; ?> (versione Redis <?= $server['redis_version']; ?>)<td>
                        </tr>
                        <tr>
                            <td>Attività (uptime)</td>
                            <td><?= round( $server['uptime_in_seconds'] / 3600, 2 ); ?> ore<td>
                            </tr>
                        <tr>
                            <td>Spazio usato</td>
                            <td><?= $server['used_memory_human']; ?><td>
                        </tr>
                        <tr>
                            <td>Ultimo salvataggio su disco</td>
                            <td><?= date('d-m-Y H:i:s', $server['rdb_last_save_time']); ?><td>
                        </tr>
                        <tr>
                            <td>Connessioni ricevute</td>
                            <td><?= $server['total_connections_received']; ?><td>
                            </tr>     
                        <tr>
                            <td>DB0</td>
                            <td><?= $server['db0']; ?><td>
                        </tr>     
                        <tr>
                            <td>Comandi ricevuti</td>
                            <td><?= $server['total_commands_processed']; ?> (<strong><?= $server['keyspace_hits']; ?> servite</strong>, <?= $server['keyspace_misses']; ?> chiavi non erano in memoria)<td>
                        </tr>
                        <tr>
                            <td><strong>Ricerche in cache</strong><br />
                                Contiene filtri, elenchi e by.</td>
                                <td>
                                    <?php $entita = ['Appartenenza', 'Comitato', 'Provinciale', 'Regionale', 'Nazionale', 'Volontario', 'Delegato', 'Autorizzazione', 'Partecipazione', 'Turno', 'Attivita']; ?>
                                    <table class='table table-condensed table-striped'>
                                        <?php foreach ( $entita as $singola ) {
                                            $qq = $singola::_numQueryCache(); ?>
                                            <tr>
                                                <td><?= $singola; ?></td>
                                                <td><?= $qq; ?></td>
                                            </tr>
                                            <?php } ?>

                                            </table>


                                            <td>
                        </tr>
                        <tr>
                            <td>Ricerche evitate</td>
                            <td><?php echo (int) ( $cache->get( $conf['db_hash'] . '__re' ) ); ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
