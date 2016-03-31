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
                $pag = "comp_modifica.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >>
            <a href="sceglimodifica.php"> Scelta modifica</a> >> Valori modifica
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
        /* non passato per il login: accesso non autorizzato ! */
        echo "<p>Impossibile accedere.</p><p>Prima scegli cosa modificare <a href=\"sceglimodifica.php\">qui</a>.</p>";
    } else if (empty($_SESSION['tipo_mod'])) {
        echo "<p>Non hai scelto cosa modificare.</p><p><a href=\"sceglimodifica.php\">Riprova</a>.</p>";
    } else if (empty($_SESSION['tipo_dat'])) {
        echo "<p>Non hai scelto che tipo di dato modificare.</p><p><a href=\"sceglimodifica.php\">Riprova</a>.</p>";
    } else if (empty($_SESSION['new_v'])) {
        echo "<p>Non hai scelto il nuovo valore per aggiornare i dati.</p><p><a href=\"sceglimodifica.php\">Riprova</a>.</p>";
    } else {            
            require_once ("con_db.php");
            require_once ("fun_comp_modifica.php");
            comp_mod($_SESSION['tipo_mod'], $_SESSION['tipo_dat'], $_SESSION['new_v']);
            echo "</p><p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
        }
        ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
