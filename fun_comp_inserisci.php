<?php

function comp_ins($cosa) {
    $conn = connect();
    switch ($cosa) {
        case 'AttrezzatureScuola':
            if (!isset($_SESSION['codatt']) && !isset($_SESSION['tipo']) && !isset($_SESSION['prezzonoleggio']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codatt = $_SESSION['codatt'];
                $tipo = $_SESSION['tipo'];
                $prezzonoleggio = $_SESSION['prezzonoleggio'];
                $query = "INSERT into $cosa VALUES 
                ('$codatt', '$tipo', '$prezzonoleggio')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codatt", "Tipo", "Prezzonoleggio"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Brevetti':
            if (!isset($_SESSION['brevetto']) && !isset($_SESSION['nome']) && !isset($_SESSION['maxprofondita']) && !isset($_SESSION['sub']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $brevetto = $_SESSION['brevetto'];
                $nome = $_SESSION['nome'];
                $maxprofondita = $_SESSION['maxprofondita'];
                $sub = $_SESSION['sub'];
                $query = "INSERT into $cosa VALUES 
                ('$brevetto', '$nome', '$maxprofondita', '$sub')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Brevetto", "Nome", "Maxprofondita'", "Sub"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case'Corsi':
            if (!isset($_SESSION['codcorso']) && !isset($_SESSION['nome']) && !isset($_SESSION['esame']) && !isset($_SESSION['costo']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codcorso = $_SESSION['codcorso'];
                $nome = $_SESSION['nome'];
                $esame = $_SESSION['esame'];
                $costo = $_SESSION['costo'];
                $query = "INSERT into $cosa VALUES 
                ('$codcorso', '$nome', '$esame', '$costo')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codcorso", "Nome", "Esame", "Costo"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case'Eventi':
            if (!isset($_SESSION['idevento']) && !isset($_SESSION['nome']) && !isset($_SESSION['data']) && !isset($_SESSION['luogo']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idevento = $_SESSION['idevento'];
                $nome = $_SESSION['nome'];
                $data = $_SESSION['data'];
                $luogo = $_SESSION['luogo'];
                $query = "INSERT into $cosa VALUES 
                ('$idevento', '$nome', '$data', '$luogo')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idevento", "Nome", "Data", "Luogo"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'EventiSoci':
            if (!isset($_SESSION['evento']) && !isset($_SESSION['socio']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $evento = $_SESSION['evento'];
                $socio = $_SESSION['socio'];
                $query = "INSERT into $cosa VALUES 
                ('$evento', '$socio')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Evento", "Socio"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Immersioni':
            if (!isset($_SESSION['codimm']) && !isset($_SESSION['data']) && !isset($_SESSION['ora']) && !isset($_SESSION['citta']) && !isset($_SESSION['luogo']) && !isset($_SESSION['tipo']) && !isset($_SESSION['inizioimm']) && !isset($_SESSION['costo']) && !isset($_SESSION['profonditamax']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codimm = $_SESSION['codimm'];
                $data = $_SESSION['data'];
                $ora = $_SESSION['ora'];
                $citta = $_SESSION['citta'];
                $luogo = $_SESSION['luogo'];
                $tipo = $_SESSION['tipo'];
                $inizioimm = $_SESSION['inizioimm'];
                $costo = $_SESSION['costo'];
                $profonditamax = $_SESSION['profonditamax'];
                $query = "INSERT into $cosa VALUES 
                ('$codimm', '$data', '$ora', '$citta', '$luogo', '$tipo', '$inizioimm', '$costo', '$profonditamax')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codimm", "Data", "Ora", "Citt√†", "Luogo", "Tipo", "Inizioimm", "Costo", "Profondita'†max"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'ImmersioniSub':
            if (!isset($_SESSION['immersione']) && !isset($_SESSION['sub']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $immersione = $_SESSION['immersione'];
                $sub = $_SESSION['sub'];
                $query = "INSERT into $cosa VALUES 
                ('$immersione', '$sub')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Immersione", "Sub"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Lezioni':
            if (!isset($_SESSION['idlez']) && !isset($_SESSION['data']) && !isset($_SESSION['ora']) && !isset($_SESSION['luogo']) && !isset($_SESSION['corso']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idlez = $_SESSION['idlez'];
                $data = $_SESSION['data'];
                $ora = $_SESSION['ora'];
                $luogo = $_SESSION['luogo'];
                $corso = $_SESSION['corso'];
                $query = "INSERT into $cosa VALUES 
                ('$idlez', '$data', '$ora', '$luogo', '$corso')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idlez", "Data", "Ora", "Luogo", "Corso"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Noleggi':
            if (!isset($_SESSION['sub']) && !isset($_SESSION['att']) && !isset($_SESSION['data']) && !isset($_SESSION['prezzofinale']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $sub = $_SESSION['sub'];
                $att = $_SESSION['att'];
                $data = $_SESSION['data'];
                $prezzofinale = $_SESSION['prezzofinale'];
                $query = "INSERT into $cosa VALUES 
                ('$sub', '$att', '$data', '$prezzofinale')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Sub", "Att", "Data", "Prezzofinale"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Persone':
            if (!isset($_SESSION['idpersona']) && !isset($_SESSION['nome']) && !isset($_SESSION['cognome']) && !isset($_SESSION['datanascita']) && !isset($_SESSION['email']) && !isset($_SESSION['telefono']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idpersona = $_SESSION['idpersona'];
                $nome = $_SESSION['nome'];
                $cognome = $_SESSION['cognome'];
                $datanascita = $_SESSION['datanascita'];
                $email = $_SESSION['email'];
                $telefono = $_SESSION['telefono'];
                $query = "INSERT into $cosa VALUES 
                ('$idpersona', '$nome', '$cognome', '$datanascita', '$email', '$telefono')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idpersona", "Nome", "Cognome", "Datanascita", "Email", "Telefono"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'PersoneCorsi':
            if (!isset($_SESSION['persona']) && !isset($_SESSION['corso']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $persona = $_SESSION['persona'];
                $corso = $_SESSION['corso'];
                $query = "INSERT into $cosa VALUES 
                ('$persona', '$corso')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Persona", "Corso"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'PersoneEventi':
            if (!isset($_SESSION['evento']) && !isset($_SESSION['persona']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $evento = $_SESSION['evento'];
                $persona = $_SESSION['persona'];
                $query = "INSERT into $cosa VALUES 
                ('$evento', '$persona')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Evento", "Persona"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Riunioni':
            if (!isset($_SESSION['codriunione']) && !isset($_SESSION['data']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codriunione = $_SESSION['codriunione'];
                $data = $_SESSION['data'];
                $query = "INSERT into $cosa VALUES 
                ('$codriunione', '$data')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codriunione", "Data"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Soci':
            if (!isset($_SESSION['idsocio']) && !isset($_SESSION['dataiscrizione']) && !isset($_SESSION['quota']) && !isset($_SESSION['scontoatt']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idsocio = $_SESSION['idsocio'];
                $dataiscrizione = $_SESSION['dataiscrizione'];
                $quota = $_SESSION['quota'];
                $scontoatt = $_SESSION['scontoatt'];
                $query = "INSERT into $cosa VALUES 
                ('$idsocio', '$dataiscrizione', '$quota', '$scontoatt')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idsocio", "Dataiscrizione", "Quota", "Scontoatt"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'SociRiunioni':
            if (!isset($_SESSION['socio']) && !isset($_SESSION['riunione']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $socio = $_SESSION['socio'];
                $riunione = $_SESSION['riunione'];
                $query = "INSERT into $cosa VALUES 
                ('$socio', '$riunione')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Socio", "Riunione"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Sub':
            if (!isset($_SESSION['idsub']) && !isset($_SESSION['totimmersioni']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idsub = $_SESSION['idsub'];
                $totimmersioni = $_SESSION['totimmersioni'];
                $query = "INSERT into $cosa VALUES 
                ('$idsub', '$totimmersioni')";
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a reinserire i dati <a href=\"scegliinserisci.php\">qui</a>.</p>"
                                . "        </div>

        <div id=\"footer\">
            <strong>&copy; 2014 SCUOLA SUB TIZIO&CAIO</strong> Via e man dal tubo 35020 Padova
        </div>
    </body>
</html>
");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idsub", "Totimmersioni"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                echo "<p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p>"
                . "<p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
    }
}

?>
