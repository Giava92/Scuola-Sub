<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Ricerca avanzata-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                $pag = "cercaattrezzature.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="cercaadvance.php"> Ricerca avanzata</a> >>
            <a href="scegliattrezzature.php.php"> Ricerca attrezzature</a> >> Completamento ricerca
        </div>

        <div id="nav">
            <ul>
                <li><a tabindex="1" href="index.php" class="blocco"><span xml:lang="en">Home</span></a></li>
                <li><a tabindex="2" href="corsi.php" class="blocco">Corsi</a></li>
                <li><a tabindex="3" href="noleggi.php" class="blocco">Noleggi</a></li>
                <li><a tabindex="4" href="eventi.php" class="blocco">Eventi</a></li>
                <li><a tabindex="5" href="immersioni.php" class="blocco">Immersioni</a></li>
                <li><a tabindex="6" href="riunioni.php" class="blocco">Riunioni</a></li>
                <li><a tabindex="7" href="cercaadvance.php" class="blocco">Ricerca avanzata</a></li>
                <li><a tabindex="8" href="sezioneamm.php" class="blocco">Sezione amministratore</a></li>
            </ul>
        </div>

        <div id="content">
            <?php
            if (empty($_SESSION['username'])) {
                $_SESSION['pag'] = $pag;
                /* non passato per il login: accesso non autorizzato ! */
                echo "<p>Impossibile accedere.</p>"
                . "<p>Prima effettuare il <a href=\"autenticazione_login.php\">login</a>.</p>";
            } elseif (empty($_POST["tipo"])) {
                echo "<p>Impossibile completare l'operazione.</p>"
                . "<p>I campi non sono validi o non sono stati selezionati.</p>"
                        . "<p><a href=\"scegliattrezzature.php\">Riprova</a>.</p>";
            } else {
                $tipo = $_POST["tipo"];

                if (isset($_POST["stat"])) {
                    $edisp = $_POST["stat"];
                } else {
                    $edisp = 0;
                }

                require_once ("con_db.php");
                $conn = connect();

                $query = "SELECT a.* FROM (AttrezzatureScuola a";
                /* da aggiungere in JOIN se si vuole che l'a persona sia 
                  un socio'attrezzaturia sia disponibile */
                $join = " ";
                if ($edisp) {
                    $join .= "LEFT JOIN Noleggi n ON a.codatt = n.att)";
                    $where = "WHERE n.att IS NULL";
                } else {
                    $join .= ")";
                    $where = " WHERE TRUE";
                }
                /* verifica se c'e` un vincolo sul tipo ed eventualmente
                  lo aggiunge al WHERE */
                if ($tipo!= "---")
                $where .= " AND a.tipo =\"" . $tipo . "\"";

                $query = $query . $join . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessuna attrezzatura con queste caratteristiche e' presente nel database</p>";
                else {
                    require_once ("fun_tabelle.php");

                    table_start(array("Codice attrezzatura", "Tipo", "Prezzo neleggio"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                };
                echo "<p>Torna <a href=\"scegliattrezzature.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
