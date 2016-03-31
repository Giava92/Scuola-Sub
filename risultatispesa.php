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
                $pag = "risultatispesa.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >>
            <a href="sceglipersone.php"> Ricerca persone</a> >><a href="spesatotale.php"> Spesa totale</a> >> Risultati spesa
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
            } elseif (empty($_POST['idpersona'])) {
                echo "<p>Impossibile completare l'operazione.</p>"
                . "<p>L'id non e' stato selzionato o non e' valido.</p>"
                . "<p><a href=\"spesatotale.php\">Riprova</a></p>";
            } else {
                $idpersona = $_POST['idpersona'];
                require_once ("con_db.php");
                $conn = connect();
                $query = "SELECT * FROM Persone WHERE idpersona=$idpersona";
                $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
                $ps = mysql_num_rows($result);
                if ($ps != "1")
                    echo "<p>Non ci sono persone con l'id scelto.<p>"
                    . "<p>Prova a reinserire l'<a href=\"spesatotale.php\">id.</p>";
                else {
                    echo "<p>la spesa totale annua per la persona con id=$idpersona e':</p>";
                    $query1 = "SELECT Spesa_totale_annua($idpersona)";
                    $result1 = mysql_query($query1, $conn) or die("Query fallita" . mysql_error($conn));
                    $spesa = mysql_fetch_row($result1);
                    echo "<p>" . $spesa[0] . " euro</p>" .
                    "<p>Divisa in:</p>";
                    $query2 = "CALL spese_div($idpersona)";
                    $result2 = mysql_query($query2, $conn) or die("Query fallita" . mysql_error($conn));
                    require_once ("fun_tabelle.php");
                    table_start(array("Spese corsi", "Spese immersioni", "Spese noleggi", "Spesa socio"));
                    while ($row1 = mysql_fetch_row($result2))
                        table_row($row1);
                    table_end();
                    echo "<p>Torna <a href=\"spesatotale.php\">indietro</a>.</p>"
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
