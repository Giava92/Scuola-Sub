<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Noleggi-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $_SESSION['pag']="noleggi.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >> Noleggi
        </div>

        <div id="nav">
            <ul>
                <li><a tabindex="1" href="index.php" class="blocco"><span xml:lang="en">Home</span></a></li>
                <li><a tabindex="2" href="corsi.php" class="blocco">Corsi</a></li>
                <li id="active">Noleggi</li>
                <li><a tabindex="3" href="eventi.php" class="blocco">Eventi</a></li>
                <li><a tabindex="4" href="immersioni.php" class="blocco">Immersioni</a></li>
                <li><a tabindex="5" href="riunioni.php" class="blocco">Riunioni</a></li>
                <li><a tabindex="6" href="cercaadvance.php" class="blocco">Ricerca avanzata</a></li>
                <li><a tabindex="7" href="sezioneamm.php" class="blocco">Sezione amministratore</a></li>
            </ul>
        </div>

        <div id="content">
            <h1>NOLEGGI</h1>
            <p> Questa e' la sezione relativa alle attrezzature di cui dispone la scuola e che mette a disposizione 
                per il noleggio.</p>
            <?php
            require_once ("con_db.php");
            $conn = connect();
            $query = "SELECT DISTINCT tipo FROM AttrezzatureScuola";
            $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
            echo "<ul>";
            while ($row = mysql_fetch_row($result))
                echo "<li>$row[0]</li>";
            ?>
            <p>Al momento le attrezzature disponibili sono:</p>
                
            <?php
            require_once ("con_db.php");
            $conn = connect();
            $query = "SELECT a.tipo, COUNT(*) AS Quanti, a.prezzonoleggio "
                    . "FROM AttrezzatureScuola a LEFT JOIN Noleggi n ON a.codatt = n.att "
                    . "WHERE n.att IS NULL GROUP BY a.tipo, a.prezzonoleggio";
            $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
            require_once ("fun_tabelle.php");
            table_start(array("Tipo", "Quanti", "Prezzo noleggio"));
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
