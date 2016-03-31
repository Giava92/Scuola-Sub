<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="stile.css" type="text/css" media="screen"/>
        <title>Registrazione-SCUOLA SUB TIZIO&CAIO</title>
    </head>
    <body>
        <div id="header">
            <img src="sub.png" id="headImg"/>
            <h1>SCUOLA SUB TIZIO&CAIO</h1>
            <div id="headerutility">
                <?php
                session_start();
                $_SESSION['pag'] = "registrazione.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in:<a href="autenticazione_registra.php"> Registrazione</a> >> Convalida registrazione
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
            if (!isset($_POST['email']) && !isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['conferma']))
                echo "<p>Impossibile completare la registrazione.</p>"
                . "<p>Prima inserisci i dati per la <a href=\"autenticazione_registra.php\">registrazione</a>.</p>";
            else {
                require_once ("fun_registrazione.php");
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $conferma = $_POST['conferma'];

                if ($password == "") {
                    echo "Errore! Password non valida. Prova a rieffettuare la <a href=\"autenticazione_registra.php\">registrazione</a> 
                inserendo una password diversa.";
                } elseif ($password != $conferma) {
                    echo "Errore! Password e Conferma sono diverse. Prova a rieffettuare la <a href=\"autenticazione_registra.php\">registrazione</a> 
                assicurandoti che password e conferma siano uguali.";
                } elseif (ver_email($email)) {
                    echo"Errore! Email non valida. Prova a rieffettuare la <a href=\"autenticazione_registra.php\">registrazione</a> 
                inserendo un'email valida.";
                } elseif (get_email($email)) {
                    echo "Errore! Email gia' in uso. Prova a rieffettuare la <a href=\"autenticazione_registra.php\">registrazione</a> 
                utilizzando un'altra email.";
                } elseif (get_username($username)) {
                    echo "Errore! Username gia' in uso. Prova a rieffettuare la <a href=\"autenticazione_registra.php\">registrazione</a> 
                utilizzando un'altro username";
                } else {
                    new_user($email, $username, $password);
                    echo "Registrazione effettuata con successo! Ora puoi effettuare il <a href=\"autenticazione_login.php\">login</a>";
                };
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
