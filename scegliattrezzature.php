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
                $pag="scegliattrezzature.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="cercaadvance.php"> Ricerca avanzata</a> >> Ricerca attrezzature
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
            $_SESSION['pag']=$pag;
            /* non passato per il login: accesso non autorizzato ! */
            echo "<p>Impossibile accedere.</p>"
                . "<p>Prima effettuare il <a href=\"autenticazione_login.php\">login</a>.</p>";
        } else {
            echo<<<END
                <form class="fc" action = "cercaattrezzature.php" method = "post">
                <fieldset>
                <div>
                <label>Tipo:</label>
                <select name = "tipo">
                <option>---</option>
                <option>GAV</option>
                <option>Erogatore</option>
                <option>Bombola</option>
                <option>Muta</option>
                <option>Mutino</option>
                <option>Maschera</option>
                <option>Pinne</option>
                </select>
                </div>
                <div>
                <input type = "checkbox" name = "stat" value = "disp" /> E' disponibile
                </div>
                <div id="pulsanti">
                <input type = "submit" value = "Ok"/>
                </div>
                </fieldset>
                </form>
END;
            echo "<p>Torna alla <a href=\"index.php\">home</a>.</p>";
        }
        ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>

