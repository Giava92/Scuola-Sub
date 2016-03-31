<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Login-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
        </div>

        <div id="breadcrumb">
            Ti trovi in: Autenticazione
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
            session_start();
            if (!empty($_SESSION['username']))
                echo<<<END
            <p>Hai gia' effettuato il login.</p>
            <p>Prima disconnettiti effettuando il <a href="logout.php">Logout</a>.
END;
            else
                echo<<<END
        <form class="fc" id="autent" method="post" action="autenticazione.php">
                <fieldset>
            <div>
            <label>Username:</label>
            <input type="text" name="username" />
            </div>
            <div>
            <label>Password:</label>
            <input type="password" name="password" maxlength="9"/>
            </div>
            <div id="pulsanti">
            <input id="accedi" type="submit" value="Accedi"/>
            </div>
                </fieldset>
        </form>
        <p>Non hai un accont? <a href="autenticazione_registra.php">Registrati</a>.</p>
END;
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>

