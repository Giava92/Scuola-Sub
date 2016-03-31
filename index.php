<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Home-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $_SESSION['pag']=0;
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: Home
        </div>

        <div id="nav">
            <ul>
                <li id="active"><span xml:lang="en">Home</span></li>
                <li><a tabindex="1" href="corsi.php" class="blocco">Corsi</a></li>
                <li><a tabindex="2" href="noleggi.php" class="blocco">Noleggi</a></li>
                <li><a tabindex="3" href="eventi.php" class="blocco">Eventi</a></li>
                <li><a tabindex="4" href="immersioni.php" class="blocco">Immersioni</a></li>
                <li><a tabindex="5" href="riunioni.php" class="blocco">Riunioni</a></li>
                <li><a tabindex="6" href="cercaadvance.php" class="blocco">Ricerca avanzata</a></li>
                <li><a tabindex="7" href="sezioneamm.php" class="blocco">Sezione amministratore</a></li>
            </ul>
        </div>

        <div id="content">
            <p>Questo sito gestisce le informazioni riguardanti la scuola sub Tizio&Caio.</p>
            <p>Se ti piace la subacquea e vuoi venire a divertirti insieme a noi allora questo e' il sito giusto per te.</p>
            <p>Ti offriamo la possibilita' di partecipare ai nostri corsi, di venire a fare delle immersioni con noi, 
                di noleggiare le nostre attrezzature e di conoscere tante altre persone con la tua stessa passione.</p>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
