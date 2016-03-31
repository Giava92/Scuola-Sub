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
                $pag = "sceglipersone.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >> Ricerca persone
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
                echo<<<END
                <form class="fc" action = "cercapersone.php" method = "post">
                <fieldset>
                <div>
                <label>Cognome:</label>
                <input type = "text" name = "cognome"/>
                </div>
                <div>
                <label>Iniziale del nome:</label>
                <select name = "nome">
                <option>---</option>
                <option>A-H</option>
                <option>I-Z</option>
                </select>
                </div>
                <div>            
                <input type = "checkbox" name = "person[]" value = "sub" /> E' Sub
                <input type = "checkbox" name = "person[]" value = "socio" /> E' Socio
                </div>
                <div id="pulsanti">
                <input type = "submit" value = "Ok" />
                </div>
                </fieldset>
                </form>
                <p>Se vuoi sapere quali sono le persone che frequentano la scuola 
                ma che non sono ne soci ne sub clicca <a href="personenon.php">qui</a>.</p>
                <p>Se invece vuoi sapere qual'e' il totale annuo per le spese riguardanti la scuola di una certa persona, 
                clicca <a href="spesatotale.php">qui</a>.</p>
                <p>Se invece voui sapere qual'e' la profondita' massima a cui puo' arrivare un sub, clicca <a href="cerca_profonditamax.php">qui</a>.</p>
                <p>Se invece vuoi sapere chi sono i sub che possiedono un certo brevetto clicca <a href="sub_brev.php">qui</a>.</p>
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


