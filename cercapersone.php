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
                $pag = "cercapersone.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="sezioneamm.php"> Sezione amministratore</a> >>
            <a href="sceglipersone.php"> Ricerca persone</a> >> Completamento ricerca
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
;
            if (empty($_SESSION['username']))
                $username = "";
            else
                $username = $_SESSION['username'];
            if ($username != "Admin" && $username != "admin") {
                $_SESSION['pag'] = $pag;
                /* non effettuato login come amministratore: accesso non autorizzato ! */
                echo "<p>Impossibile accedere.</p>"
                . "<p>Prima effettuare il <a href=\"autenticazione_login.php\">login</a> come amministratore.</p>";
            } elseif (empty($_POST["cognome"]) && empty($_POST["nome"]) && empty($_POST["person"])) {
                echo "<p>Impossibile completare l'operazione.</p>"
                . "<p>I campi non sono stati selezionati o non sono validi.</p>"
                . "<p><a href=\"sceglipersone.php\">Riprova</a>.</p>";
            } else {
                $cognome = $_POST["cognome"];
                $nome = $_POST["nome"];

                if (isset($_POST["person"])) {
                    $esocio = in_array('socio', $_POST["person"]);
                    $esub = in_array('sub', $_POST["person"]);
                } else {
                    $esocio = 0;
                    $esub = 0;
                }

                require_once ("con_db.php");
                $conn = connect();

                $query = "SELECT DISTINCT p.* FROM (Persone p";
                /* da aggiungere in JOIN se si vuole che la persona sia 
                  un socio */
                $join = " ";
                if ($esocio) {
                    $join .= "JOIN Soci so ON p.idpersona = so.idsocio)";
                    if ($esub)
                        $join.= " JOIN (Persone p1 JOIN Sub su ON p1.idpersona = su.idsub) ON so.idsocio=su.idsub";
                }
                else if ($esub)
                    $join.= " JOIN Sub su ON p.idpersona = su.idsub)";
                else
                    $join .= ")";
                /* clausola WHERE */
                $where = " WHERE TRUE";
                /* verifica se c'e` un vincolo sul cognome ed eventualmente
                  lo aggiunge al WHERE */
                if ($cognome)
                    $where .= " AND  p.cognome =\"" . $cognome . "\"";
                switch ($nome) {
                    case 'A-H':
                        $where .= " AND (p.nome REGEXP \"^[A-H].*\")";
                        break;
                    case 'I-Z':
                        $where .= " AND (p.nome REGEXP \"^[I-Z].*\")";
                        break;
                    /* se ($nome= ---) non inserisce niente nel where! */
                }
                /* completa la query */
                $query = $query . $join . $where;
                /* come al solito conviene stamparla ... */
                /* echo "<br><b>Query</b>: $query</br>"; */
                /* e la esegue */
                $persone = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($persone);
                if (empty($num_row))
                    echo "<p>Nessuna persona con queste caratteristiche e' presente nel database</p>";
                else {
                    require_once ("fun_tabelle.php");

                    table_start(array("Idpersona", "Nome", "Cognome", "Datanascita",
                        "email", "telefono"));
                    while ($row = mysql_fetch_row($persone))
                        table_row($row);
                    table_end();
                };
                echo "<p>Torna <a href=\"sceglipersone.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
