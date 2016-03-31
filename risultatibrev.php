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
                $pag = "risultatibrev.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >>
            <a href="sceglipersone.php"> Ricerca persone</a> >><a href="sub_brev.php"> Scelta brevetto</a> >> Risultati brevetto
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
            if (empty($_SESSION['username']))
                $username = "";
            else
                $username = $_SESSION['username'];
            if ($username != "Admin" && $username != "admin") {
                $_SESSION['pag'] = $pag;
                /* non effettuato login come amministratore: accesso non autorizzato ! */
                echo "<p>Impossibile accedere.</p>"
                . "<p>Prima effettuare il <a href=\"autenticazione_login.php\">login</a> come amministratore.</p>";
            } elseif (empty($_POST['nomeb'])) {
                echo "<p>Impossibile completare l'operazione.</p>"
                . "<p>Il nome del brevetto non e' stato selzionato.</p>"
                . "<p><a href=\"sub_brev.php\">Riprova</a></p>";
            } else {
                $nomeb = $_POST['nomeb'];
                require_once ("con_db.php");
                $conn = connect();
                $query = "SELECT * FROM Brevetti WHERE nome='$nomeb'";
                $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
                $br = mysql_num_rows($result);
                if ($br < "1")
                    echo "<p>Non ci sono brevetti con il nome scelto.<p>"
                    . "<p>Prova a reinserire il<a href=\"sub_brev.php\">nome</a>.</p>";
                else {
                    echo "<p>I sub che hanno il brevetto $nomeb sono:</p>";
                    $query1 = "CALL div_brev('$nomeb')";
                    $result1 = mysql_query($query1, $conn) or die("Query fallita" . mysql_error($conn));
                    require_once ("fun_tabelle.php");
                    table_start(array("Sub", "Nome", "Cognome"));
                    while ($row1 = mysql_fetch_row($result1))
                        table_row($row1);
                    table_end();
                    echo "<p>Torna <a href=\"sub_brev.php\">indietro</a>.</p>"
                    . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
