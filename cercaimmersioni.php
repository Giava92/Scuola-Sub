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
                $pag = "cercaimmersioni.php";
                session_start();
                require_once ("barralogin.php");
                barralog();
                ?>
            </div>
        </div>

        <div id="breadcrumb">
            Ti trovi in: <a href="index.php"> Home</a> >><a href="cercaadvance.php"> Ricerca avanzata</a> >> Ricerca immersioni
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
            } elseif (empty($_POST["codimm"]) && empty($_POST["data"]) && empty($_POST["ora"]) &&
                    empty($_POST["citta"]) && empty($_POST["luogo"]) && empty($_POST["tipo"]) &&
                    empty($_POST["inizioimm"]) && empty($_POST["costo"]) && empty($_POST["profonditamax"]) && empty($_POST["numsub"])) {
                echo "<p>Impossibile completare l'operazione.</p>"
                . "<p>I campi non sono validi o non sono stati selezionati.</p>"
                . "<p><a href=\"scegliimmersioni.php\">Riprova</a>.</p>";
            } else {
                $codimm = $_POST["codimm"];
                $data = $_POST["data"];
                $ora = $_POST['ora'];
                $citta = $_POST['citta'];
                if (isset($_POST['luogo']))
                    $luogo = $_POST['luogo'];
                else
                    $luogo = 0;
                if (isset($_POST['tipo']))
                    $tipo = $_POST['tipo'];
                else
                    $tipo = 0;
                $inizioimm = $_POST['inizioimm'];
                $costo = $_POST['costo'];
                $profonditamax = $_POST['profonditamax'];
                if (isset($_POST['numsub']))
                    $numsub = $_POST['numsub'];
                else
                    $numsub = 0;
                require_once ("con_db.php");
                $conn = connect();

                $query = "SELECT i.*";
                $from = " FROM (Immersioni i";
                $join = " ";
                if ($numsub) {
                    $query .= ", COUNT(isu.sub) AS quantisub";
                    $join .= "JOIN ImmersioniSub isu ON i.codimm=isu.immersione) GROUP BY i.codimm";
                    $where = " HAVING TRUE";
                } else {
                    $join .= ")";
                    $where = " WHERE TRUE";
                };
                if ($codimm)
                    $where .= " AND  i.codimm =\"" . $codimm . "\"";
                if ($data)
                    $where .= " AND i.data =\"" . $data . "\"";
                if ($ora)
                    $where .= " AND i.ora =\"" . $ora . "\"";
                if ($citta)
                    $where .= " AND i.citta =\"" . $citta . "\"";
                if ($luogo)
                    $where .= " AND i.luogo =\"" . $luogo . "\"";
                if ($tipo)
                    $where .= " AND i.tipo =\"" . $tipo . "\"";
                if ($inizioimm)
                    $where .= " AND i.inizioimm =\"" . $inizioimm . "\"";
                switch ($costo) {
                    case '1.00-15.00':
                        $where .= " AND i.costo <= 15";
                        break;
                    case '15.01-30.00':
                        $where .= " AND i.costo> 15";
                        break;
                }
                switch ($profonditamax) {
                    case '1-20':
                        $where .= " AND i.profonditamax<=20";
                        break;
                    case '21-50':
                        $where .= " AND i.profonditamax>20";
                        break;
                }

                $query = $query . $from . $join . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessuna immersione con queste caratteristiche e' presente nel database.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    if (empty($numsub))
                        table_start(array("Codiceimmersione", "Data", "Ora", "Citta", "Luogo", "Tipo", "Inizioimmersione", "Costo", "Profonditamax"));
                    else
                        table_start(array("Codiceimmersione", "Data", "Ora", "Citta", "Luogo", "Tipo", "Inizioimmersione", "Costo", "Profonditamax", "Numerosub"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Torna <a href=\"scegliimmersioni.php\">indietro</a>.</p>"
                    . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                };
            }
            ?>
        </div>

        <div id="footer">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
