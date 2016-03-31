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
        require("fun_registrazione.php");
        if (empty($_SESSION['pag']))
            $pag = "";
        else
            $pag = $_SESSION['pag'];
        session_destroy();
        if (empty($_POST['username']))
            $username = "";
        else
            $username = $_POST['username'];
        if (empty($_POST['password']))
            $password = "";
        else
            $password = $_POST['password'];
        /* verifica se login e' valido e recupera la password */
        $user = get_username($username);
        $pwd = get_password($username);
        if ($user && (sha1($password) == $pwd)) {
            /* se login e' valido e la password e' corretta ...
              registra i dati nella sessione */
            session_start();
            $_SESSION['username'] = $username;
            if (empty($pag))
                echo "<p>Login avvenuto con successo.</p>"
                . "<p>Torna alla <a href = \"index.php\">home</a></p>";
            else
                echo "<p>Login avvenuto con successo.</p>"
                . "<p>Torna alla <a href=\"$pag\">pagina</a></p>";
        }
        else {
            session_start();
            $_SESSION['pag']=$pag;
            echo<<<END
            <p>I dati inseriti non sono corretti.</p>
            <p>Prova a rieffettuare il <a href="autenticazione_login.php">login</a></p>
END;
        };
        ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>

