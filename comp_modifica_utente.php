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
                $pag = "comp_modifica_utente.php";
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="area_riservata.php"> Area riservata</a> >> <a href="modifica_utente.php"> Modifica dati utente</a> >> Completa modifica dati utente
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
                if ($_SESSION['username'] == "Admin" || $_SESSION['username'] == "admin")
                    $verifica = !isset($_POST['n_email']) && !isset($_POST['n_password']) && !isset($_POST['n_conferma']);
                else
                    $verifica = !isset($_POST['n_email']) && !isset($_POST['n_username']) && !isset($_POST['n_password']) && !isset($_POST['n_conferma']);
                if ($verifica)
                    echo "<p>Impossibile completare la modifica.</p>"
                    . "<p>Prima inserisci i dati per la <a href=\"modifica_utente.php\">modifica</a>.</p>";
                else {
                    require_once ("fun_registrazione.php");
                    $n_email = $_POST['n_email'];
                    if (empty($_POST['n_username']))
                        $n_username = "";
                    else
                        $n_username = $_POST['n_username'];
                    $n_password = $_POST['n_password'];
                    $n_conferma = $_POST['n_conferma'];
                    $errore = false;

                    if ($n_password != $n_conferma) {
                        echo "<p>Errore! Nuova password e Conferma nuova password sono diverse.</p><p>Prova a rieffettuare la <a href=\"modifica_utente.php\">modifica</a> 
                    assicurandoti che password e conferma siano uguali.</p>";
                        $errore = true;
                    }
                    if (!empty($n_email)) {
                        if (ver_email($n_email)) {
                            echo "<p>Errore! Nuova Email non valida.</p><p>Prova a rieffettuare la <a href=\"modifica_utente.php\">modifica</a> 
                        inserendo un'email valida.</p>";
                            if ($errore == false)
                                $errore = true;
                        }
                        if (get_email($n_email)) {
                            echo "<p>Errore! Email gia' in uso.</p><p>Prova a rieffettuare la <a href=\"modifica_utente.php\">modifica</a> 
                utilizzando un'altra email.</p>";
                            if ($errore == false)
                                $errore = true;
                        }
                    }
                    if (!empty($n_username)) {
                        if (get_username($n_username)) {
                            echo "<p>Errore! Username gia' in uso.</p><p>Prova a rieffettuare la <a href=\"modifica_utente.php\">modifica</a> 
                        utilizzando un'altro username</p>";
                            if ($errore == false)
                                $errore = true;
                        }
                    }
                    if (empty($n_email) && empty($n_password) && empty($n_username)) {
                        echo "<p>Errore! Non hai modificato nessun campo.</p><p>Scegli un <a href=\"modifica_utente.php\">modifica</a>.</p>";
                        $errore = true;
                    }
                    if ($errore == false) {
                        mod_user($n_email, $n_username, $n_password);
                        echo "<p>Modifica effettuata con successo!</p><p>Ora effettua di nuovo il <a href=\"autenticazione_login.php\">login</a> per vedere i dati aggiornati.</p>";
                    }
                };
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
