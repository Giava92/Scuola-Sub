<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Sezione amministratore-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                $pag = "sceglimodifica.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >> Scelta modifica
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
            } else {
                $_SESSION['tipo_mod'] = 0;
                $_SESSION['tipo_dat'] = 0;
                $_SESSION['new_v'] = 0;
                echo<<<END
        <form class="fc" method="post" action="modifica.php">
        <fieldset>
        <div>
        <label>Tipo di dato da modificare:</label>
        <select name = "tipo_mod">
        <option>AttrezzatureScuola</option>
        <option>Brevetti</option>
        <option>Corsi</option>
        <option>Eventi</option>
        <option>EventiSoci</option>
        <option>Immersioni</option>
        <option>ImmersioniSub</option>
        <option>Lezioni</option>
        <option>Noleggi</option>
        <option>Persone</option>
        <option>PersoneCorsi</option>
        <option>PersoneEventi</option>
        <option>Riunioni</option>
        <option>Soci</option>
        <option>SociRiunioni</option>
        <option>Sub</option>
        </select>
        </div>
        <div id="pulsanti">
        <input type = "submit" value = "Ok" />
        </div>
        </fieldset>
        </form>
        <p>Torna alla <a href="sezioneamm.php">indietro</a>.</p>
        <p>Torna alla <a href="index.php">home</a>.</p>
END;
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
