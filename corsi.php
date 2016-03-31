<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Corsi-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $_SESSION['pag'] = "corsi.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >> Corsi
        </div>

        <div id="nav">
            <ul>
                <li><a tabindex="1" href="index.php" class="blocco"><span xml:lang="en">Home</span></a></li>
                <li id="active">Corsi</li>
                <li><a tabindex="2" href="noleggi.php" class="blocco">Noleggi</a></li>
                <li><a tabindex="3" href="eventi.php" class="blocco">Eventi</a></li>
                <li><a tabindex="4" href="immersioni.php" class="blocco">Immersioni</a></li>
                <li><a tabindex="5" href="riunioni.php" class="blocco">Riunioni</a></li>
                <li><a tabindex="6" href="cercaadvance.php" class="blocco">Ricerca avanzata</a></li>
                <li><a tabindex="7" href="sezioneamm.php" class="blocco">Sezione amministratore</a></li>
            </ul>
        </div>

        <div id="content">
            <h1>CORSI</h1>
            <p>Questa e' la sezione relativa ai corsi che la scuola mette a disposizione di tutti 
                quelli che vogliono iniziare o miglirare la loro esperienza subacquea.</p>
            <div id="corsi">
                <dl>
                    <dt>MINISUB</dt>
                    <dd>E' finalizzato esclusivamente ad avvicinare alla subacquea i bambini di eta' inferiore ai 12 anni</dd>
                    <dt>OWD - Open Water Diver</dt>
                    <dd>E' il primo livello ottenibile, al quale il sub apprende le conoscenze basilari sull'equipaggiamento 
                        e sulla teoria della subacquea. Permette di arrivare ad una profondita' di 18m.</dd>
                    <dt>AOWD - Advance Open Water Diver</dt>
                    <dd>E' il secondo livello ottenibile. Permette di arrivare ad una profondita' di 30m e di effettuare immersioni notturne.</dd>
                    <dt>DEEPDIVER</dt>
                    <dd>Permette di arrivare ad una profondita' di 40m.</dd>
                    <dt>NITROX</dt>
                    <dd>Permette di utilizzare nelle immersioni la miscela nitrox al posto di aria normale portando dei vantaggi.</dd>
                    <dt>DIVEMEDIC</dt>
                    <dd>Il corso prepara a prestare soccorso a chi si trova in pericolo di vita.</dd>
                    <dt>DIVEMASTER</dt>
                    <dd>Corso di abilitazione a Guida Subacquea, rappresenta il primo livello professionale nella subacquea, 
                        si acquisisce un brevetto con applicazione professionale.</dd>
                </dl>
            </div>
            <p>Se vuoi vedere il calendario delle lezioni relative ad un corso, inserisci l'id del corso:</p>
            <form class="fc" action = "lezioni.php" method = "post">
                <fieldset>
                    <div>
                        <label>Codice corso:</label>
                        <input type = "text" name = "codcorso"/>
                    </div>
                    <div id="pulsanti">
                        <input type = "submit" value = "Ok"/>
                    </div>
                </fieldset>
            </form>
            <?php
            require_once ("con_db.php");
            $conn = connect();
            $query = "SELECT * FROM Corsi";
            $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
            require_once ("fun_tabelle.php");
            table_start(array("Codice corso", "Nome", "Esame", "Costo"));
            while ($row = mysql_fetch_row($result))
                table_row($row);
            table_end();
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
