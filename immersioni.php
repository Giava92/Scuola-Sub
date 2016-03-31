<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Immersioni-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $_SESSION['pag']="immersioni.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >> Immersioni
        </div>

        <div id="nav">
            <ul>
                <li><a tabindex="1" href="index.php" class="blocco"><span xml:lang="en">Home</span></a></li>
                <li><a tabindex="2" href="corsi.php" class="blocco">Corsi</a></li>
                <li><a tabindex="3" href="noleggi.php" class="blocco">Noleggi</a></li>
                <li><a tabindex="4" href="eventi.php" class="blocco">Eventi</a></li>
                <li id="active">Immersioni</li>
                <li><a tabindex="5" href="riunioni.php" class="blocco">Riunioni</a></li>
                <li><a tabindex="6" href="cercaadvance.php" class="blocco">Ricerca avanzata</a></li>
                <li><a tabindex="7" href="sezioneamm.php" class="blocco">Sezione amministratore</a></li>
            </ul>
        </div>

        <div id="content">
            <h1>IMMERSIONI</h1>
            <p>In questa sezione sono riportate le date, i luoghi e le informazioni riguardanti le immersioni con la nostra scuola:</p>
            <?php
            require_once ("con_db.php");
            $conn = connect();
            $query = "SELECT * FROM Immersioni";
            $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
            require_once ("fun_tabelle.php");
            table_start(array("Codice immersione", "Data", "Ora", "Citta'", "Luogo", "Tipo",
                "Inizio immersione", "Costo", "Profondita' massima"));
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
