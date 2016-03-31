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
                $pag = "esempio.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="cercaadvance.php"> Ricerca avanzata</a> >><a href="scegliimmersioni.php"> Ricerca immersioni</a> >> Esempio
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
            </ul>
        </div>

        <div id="content">
        <?php
        if (empty($_SESSION['username'])) {
        $_SESSION['pag'] = $pag;
        /* non passato per il login: accesso non autorizzato ! */
        echo "<p>Impossibile accedere.</p>"
                . "<p>Prima effettuare il <a href=\"autenticazione_login.php\">login</a>.</p>";
    } else {
        echo "<p>In questo esempio sono state cercate le immersioni con una profondita' massima non superiore ai
            20 metri, fatte in mare, diurne e con un prezzo non superiore ai 15 euro.</p>";
        echo<<<END
        <form class="fc" action = "cercaimmersioni.php" method = "post">
    <fieldset>
    <div>
        <label>Codice immersione:</label>
        <input type = "text" name = "codimm" readonly/>
    </div>
    <div>
    <label>Data:</label>
    <input type = "text" name = "data" readonly/>
    </div>    
    <div>
    <label>Ora:</label>
    <input type = "text" name = "ora" readonly/>
    </div>
    <div>
    <label>Citta':</label>
    <input type = "text" name = "citta" readonly/>
    </div>
    <div>
    <label>Luogo:</label>
    <input type = "radio" name = "luogo" value = "mare" checked disabled/> Mare
    <input type = "radio" name = "luogo" value = "lago" disabled/> Lago
    </div>
    <div>
    <label>Tipo:</label>
    <input type = "radio" name = "tipo" value = "diurna" checked disabled/> Diurna
    <input type = "radio" name = "tipo" value = "notturna" disabled/> Notturna
    </div>
    <div>
    <label>Inizio immersione:</label>
    <input type = "text" name = "inizioimm" readonly/>
    </div>
    <div>
    <label>Costo in euro:</label>
    <select name = "costo" disabled>
    <option>1.00-15.00</option>
    </select>
    </div>
    <div>
    <label>Profondita' massima:</label>
    <select name = "profonditamax" disabled>
    <option>1-20</option>
    </select>
    </div>
    <div>    
    <input type = "checkbox" name = "numsub" value = "si" disabled/> Voglio sapere quanti sub hanno fatto quell'immersione
    </div>
    <div id="pulsanti">
    <input type = "submit" value = "Ok" disabled/>
    <input type = "reset" value = "Azzera dati" disabled/>
    </div>
    </fieldset>
    </form>
END;
        require_once ("con_db.php");
        $conn = connect();
        $query = "SELECT * FROM Immersioni i WHERE i.profonditamax<=20 AND i.luogo='Mare' AND i.tipo='Diurna' AND i.costo<=15.00";
        $result = mysql_query($query, $conn) or die("Query fallita" . mysql_error($conn));
        require_once ("fun_tabelle.php");
        table_start(array("Codice immersione", "Data", "Ora", "Citta'", "Luogo", "Tipo", "Inizio immersione", "Costo", "Profondita' massima"));
        while ($row = mysql_fetch_row($result))
            table_row($row);
        table_end();
        echo "</p><p>Torna <a href=\"scegliimmersioni.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"home.php\">home</a>.";
    }
        ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>