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
                $pag = "scegliimmersioni.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="cercaadvance.php"> Ricerca avanzata</a> >> Ricerca immersioni
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
    } else {
        echo<<<END
    <form class="fc" action = "cercaimmersioni.php" method = "post">
    <fieldset>
    <div>
        <label>Codice immersione:</label>
        <input type = "text" name = "codimm"/>
    </div>
    <div>
    <label>Data:</label>
    <input type = "text" name = "data"/>
    </div>    
    <div>
    <label>Ora:</label>
    <input type = "text" name = "ora"/>
    </div>
    <div>
    <label>Citta':</label>
    <input type = "text" name = "citta"/>
    </div>
    <div>
    <label>Luogo:</label>
    <input type = "radio" name = "luogo" value = "mare"/> Mare
    <input type = "radio" name = "luogo" value = "lago"/> Lago
    </div>
    <div>
    <label>Tipo:</label>
    <input type = "radio" name = "tipo" value = "diurna"/> Diurna
    <input type = "radio" name = "tipo" value = "notturna"/> Notturna
    </div>
    <div>
    <label>Inizio immersione:</label>
    <input type = "text" name = "inizioimm"/>
    </div>
    <div>
    <label>Costo in euro:</label>
    <select name = "costo">
    <option>---</option>
    <option>1.00-15.00</option>
    <option>15.01-30.00</option>
    </select>
    </div>
    <div>
    <label>Profondita' massima:</label>
    <select name = "profonditamax">
    <option>---</option>
    <option>1-20</option>
    <option>21-50</option>
    </select>
    </div>
    <div>    
    <input type = "checkbox" name = "numsub" value = "si"/> Voglio sapere quanti sub hanno fatto quell'immersione
    </div>
    <div id="pulsanti">
    <input type = "submit" value = "Ok"/>
    <input type = "reset" value = "Azzera dati"/>
    </div>
    </fieldset>
    </form>
END;
        echo "<p>Se vuoi vedere un esempio di quello che puoi fare clicca <a href=\"esempio.php\">qui</a>.</p>
            <p>Torna alla <a href=\"index.php\">home</a>.</p>";
    }
    ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
