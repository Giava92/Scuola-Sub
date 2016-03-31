<?php

function comp_canc($cosa) {
    $conn = connect();
    switch ($cosa) {
        case 'AttrezzatureScuola':
            if (!isset($_SESSION['codatt']) && !isset($_SESSION['tipo']) && !isset($_SESSION['prezzonoleggio']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $codatt = $_SESSION['codatt'];
                $tipo = $_SESSION['tipo'];
                $prezzonoleggio = $_SESSION['prezzonoleggio'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($codatt)
                    $where .= " AND  codatt =\"" . $codatt . "\"";
                if ($tipo)
                    $where .= " AND  tipo =\"" . $tipo . "\"";
                if ($prezzonoleggio)
                    $where .= " AND  prezzonoleggio =\"" . $prezzonoleggio . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codatt", "Tipo", "Prezzonoleggio"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
            }
            break;
        case 'Brevetti':
            if (!isset($_SESSION['brevetto']) && !isset($_SESSION['nome']) && !isset($_SESSION['maxprofondita']) && !isset($_SESSION['sub']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $brevetto = $_SESSION['brevetto'];
                $nome = $_SESSION['nome'];
                $maxprofondita = $_SESSION['maxprofondita'];
                $sub = $_SESSION['sub'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($brevetto)
                    $where .= " AND  brevetto =\"" . $brevetto . "\"";
                if ($nome)
                    $where .= " AND  nome =\"" . $nome . "\"";
                if ($maxprofondita)
                    $where .= " AND  maxprofondita =\"" . $maxprofondita . "\"";
                if ($sub)
                    $where .= " AND sub=\"" . $sub . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Brevetto", "Nome", "Maxprofondita'", "Sub"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case'Corsi':
            if (!isset($_SESSION['codcorso']) && !isset($_SESSION['nome']) && !isset($_SESSION['esame']) && !isset($_SESSION['costo']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $codcorso = $_SESSION['codcorso'];
                $nome = $_SESSION['nome'];
                $esame = $_SESSION['esame'];
                $costo = $_SESSION['costo'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($codcorso)
                    $where .= " AND  codcorso =\"" . $codcorso . "\"";
                if ($nome)
                    $where .= " AND  nome =\"" . $nome . "\"";
                if ($esame)
                    $where .= " AND  esame =\"" . $esame . "\"";
                if ($costo)
                    $where .= " AND costo =\"" . $costo . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codcorso", "Nome", "Esame", "Costo"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case'Eventi':
            if (!isset($_SESSION['idevento']) && !isset($_SESSION['nome']) && !isset($_SESSION['data']) && !isset($_SESSION['luogo']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $idevento = $_SESSION['idevento'];
                $nome = $_SESSION['nome'];
                $data = $_SESSION['data'];
                $luogo = $_SESSION['luogo'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($idevento)
                    $where .= " AND  idevento =\"" . $idevento . "\"";
                if ($nome)
                    $where .= " AND  nome =\"" . $nome . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";
                if ($luogo)
                    $where .= " AND luogo =\"" . $luogo . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idevento", "Nome", "Data", "Luogo"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'EventiSoci':
            if (!isset($_SESSION['evento']) && !isset($_SESSION['socio']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $evento = $_SESSION['evento'];
                $socio = $_SESSION['socio'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($evento)
                    $where .= " AND  evento =\"" . $evento . "\"";
                if ($socio)
                    $where .= " AND  socio =\"" . $socio . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Evento", "Socio"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Immersioni':
            if (!isset($_SESSION['codimm']) && !isset($_SESSION['data']) && !isset($_SESSION['ora']) && !isset($_SESSION['citta']) && !isset($_SESSION['luogo']) && !isset($_SESSION['tipo']) && !isset($_SESSION['inizioimm']) && !isset($_SESSION['costo']) && !isset($_SESSION['profonditamax']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
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
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($codimm)
                    $where .= " AND  codimm =\"" . $codimm . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";
                if ($ora)
                    $where .= " AND  ora =\"" . $ora . "\"";
                if ($citta)
                    $where .= " AND citta =\"" . $citta . "\"";
                if ($luogo)
                    $where .= " AND luogo =\"" . $luogo . "\"";
                if ($tipo)
                    $where .= " AND tipo =\"" . $tipo . "\"";
                if ($inizioimm)
                    $where .= " AND inizioimm =\"" . $inizioimm . "\"";
                if ($costo)
                    $where .= " AND costo =\"" . $costo . "\"";
                if ($profonditamax)
                    $where .= " AND profonditamax =\"" . $profonditamax . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codimm", "Data", "Ora", "Citta'", "Luogo", "Tipo", "Inizioimm", "Costo", "Profondita' max"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'ImmersioniSub':
            if (!isset($_SESSION['immersione']) && !isset($_SESSION['sub']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $immersione = $_SESSION['immersione'];
                $sub = $_SESSION['sub'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($immersione)
                    $where .= " AND  immersione =\"" . $immersione . "\"";
                if ($sub)
                    $where .= " AND  sub =\"" . $sub . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Immersione", "Sub"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Lezioni':
            if (!isset($_SESSION['idlez']) && !isset($_SESSION['data']) && !isset($_SESSION['ora']) && !isset($_SESSION['luogo']) && !isset($_SESSION['corso']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $idlez = $_SESSION['idlez'];
                $data = $_SESSION['data'];
                $ora = $_SESSION['ora'];
                $luogo = $_SESSION['luogo'];
                $corso = $_SESSION['corso'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($idlez)
                    $where .= " AND  idlez =\"" . $idlez . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";
                if ($ora)
                    $where .= " AND  ora =\"" . $ora . "\"";
                if ($luogo)
                    $where .= " AND  luogo =\"" . $luogo . "\"";
                if ($corso)
                    $where .= " AND  corso =\"" . $corso . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idlez", "Data", "Ora", "Luogo", "Corso"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Noleggi':
            if (!isset($_SESSION['sub']) && !isset($_SESSION['att']) && !isset($_SESSION['data']) && !isset($_SESSION['prezzofinale']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $sub = $_SESSION['sub'];
                $att = $_SESSION['att'];
                $data = $_SESSION['data'];
                $prezzofinale = $_SESSION['prezzofinale'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($sub)
                    $where .= " AND  sub =\"" . $sub . "\"";
                if ($att)
                    $where .= " AND  att =\"" . $att . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";
                if ($prezzofinale)
                    $where .= " AND  prezzofinale =\"" . $prezzofinale . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Sub", "Att", "Data", "Prezzofinale"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Persone':
            if (!isset($_SESSION['idpersona']) && !isset($_SESSION['nome']) && !isset($_SESSION['cognome']) && !isset($_SESSION['datanascita']) && !isset($_SESSION['email']) && !isset($_SESSION['telefono']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $idpersona = $_SESSION['idpersona'];
                $nome = $_SESSION['nome'];
                $cognome = $_SESSION['cognome'];
                $datanascita = $_SESSION['datanascita'];
                $email = $_SESSION['email'];
                $telefono = $_SESSION['telefono'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($idpersona)
                    $where .= " AND  idpersona =\"" . $idpersona . "\"";
                if ($nome)
                    $where .= " AND  nome =\"" . $nome . "\"";
                if ($cognome)
                    $where .= " AND  cognome =\"" . $cognome . "\"";
                if ($datanascita)
                    $where .= " AND  datanascita =\"" . $datanascita . "\"";
                if ($email)
                    $where .= " AND  email =\"" . $email . "\"";
                if ($telefono)
                    $where .= " AND telefono =\"" . $telefono . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idpersona", "Nome", "Cognome", "Datanascita", "Email", "Telefono"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'PersoneCorsi':
            if (!isset($_SESSION['persona']) && !isset($_SESSION['corso']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $persona = $_SESSION['persona'];
                $corso = $_SESSION['corso'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($persona)
                    $where .= " AND  persona =\"" . $persona . "\"";
                if ($corso)
                    $where .= " AND  corso =\"" . $corso . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Persona", "Corso"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'PersoneEventi':
            if (!isset($_SESSION['evento']) && !isset($_SESSION['persona']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $evento = $_SESSION['evento'];
                $persona = $_SESSION['persona'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($evento)
                    $where .= " AND  evento =\"" . $evento . "\"";
                if ($persona)
                    $where .= " AND  persona =\"" . $persona . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Evento", "Persona"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Riunioni':
            if (!isset($_SESSION['codriunione']) && !isset($_SESSION['data']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $codriunione = $_SESSION['codriunione'];
                $data = $_SESSION['data'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($codriunione)
                    $where .= " AND  codriunione =\"" . $codriunione . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Codriunione", "Data"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Soci':
            if (!isset($_SESSION['idsocio']) && !isset($_SESSION['dataiscrizione']) && !isset($_SESSION['quota']) && !isset($_SESSION['scontoatt']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $idsocio = $_SESSION['idsocio'];
                $dataiscrizione = $_SESSION['dataiscrizione'];
                $quota = $_SESSION['quota'];
                $scontoatt = $_SESSION['scontoatt'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($idsocio)
                    $where .= " AND  idsocio =\"" . $idsocio . "\"";
                if ($dataiscrizione)
                    $where .= " AND  dataiscrizione =\"" . $dataiscrizione . "\"";
                if ($quota)
                    $where .= " AND  quota =\"" . $quota . "\"";
                if ($scontoatt)
                    $where .= " AND  scontoatt =\"" . $scontoatt . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idsocio", "Dataiscrizione", "Quota", "Scontoatt"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'SociRiunioni':
            if (!isset($_SESSION['socio']) && !isset($_SESSION['riunione']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $socio = $_SESSION['socio'];
                $riunione = $_SESSION['riunione'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($socio)
                    $where .= " AND  socio =\"" . $socio . "\"";
                if ($riunione)
                    $where .= " AND  riunione =\"" . $riunione . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Socio", "Riunione"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
        case 'Sub':
            if (!isset($_SESSION['idsub']) && !isset($_SESSION['totimmersioni']))
                echo "<p>Non hai scelto i valori per la cancellazione. <a href=\"sceglicancella.php\">Riprova</a>.</p>";
            else {
                $idsub = $_SESSION['idsub'];
                $totimmersioni = $_SESSION['totimmersioni'];
                $query = "DELETE FROM $cosa";
                $where = " WHERE TRUE";
                if ($idsub)
                    $where .= " AND  idsub =\"" . $idsub . "\"";
                if ($totimmersioni)
                    $where .= " AND  totimmersioni =\"" . $totimmersioni . "\"";

                $query = $query . $where;
                $result = mysql_query($query, $conn) or die("<p>Query fallita. " . mysql_error($conn) .
                                "</p><p>Prova a rieffettuare l'<a href=\"sceglicancella.php\">operazione</a>.</p>");

                $query1 = "SELECT * FROM $cosa";
                $result1 = mysql_query($query1, $conn) or die("Query fallita. " . mysql_error($conn));
                require_once ("fun_tabelle.php");

                table_start(array("Idsub", "Totimmersioni"));
                while ($row = mysql_fetch_row($result1))
                    table_row($row);
                table_end();
                break;
            }
    }
}

?>
