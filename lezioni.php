<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Lezioni-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $pag = "lezioni.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="corsi.php"> Corsi</a> >> Lezioni
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
            <h1>LEZIONI</h1>
            <?php
            if (!isset($_POST['codcorso']))
                $codcorso = 0;
            else
                $codcorso = $_POST['codcorso'];
            require_once ("con_db.php");
            $conn = connect();
            $quanti = 1;
            if ($codcorso != 0) {
                $query = "SELECT * FROM Corsi WHERE codcorso = " . $codcorso;
                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $quanti = mysql_num_rows($result);
            }
            if ($quanti == 0)
                echo "<p>Non esiste nessun corso con l'id scelto.</p><p>Prova a scegliere un altro <a href=\"corsi.php\">id</a>.</p>";
            else {
                if ($codcorso != 0)
                    $query1 = "SELECT * FROM Lezioni WHERE corso = " . $codcorso;
                else
                    $query1 = "SELECT * FROM Lezioni";
                $result1 = mysql_query($query1, $conn) or die("Query fallita" . mysql_error($conn));
                $quanti1 = mysql_num_rows($result1);
                if ($quanti1 == 0)
                    echo "<p>Non ci sono lezioni per questo corso.</p><p>Prova a scegliere un altro <a href=\"corsi.php\">id</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    table_start(array("Id lezione", "Data", "Ora", "Luogo", "Corso"));
                    while ($row = mysql_fetch_row($result1))
                        table_row($row);
                    table_end();
                    echo "<p>Torna <a href=\"corsi.php\">indietro</a>.</p>
                    <p>Torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            ?>

        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>

