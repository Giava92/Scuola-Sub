<?php

function ver_mod($cosa, $quale, $quanto) {
    require_once ("con_db.php");
    $conn = connect();
    switch ($cosa) {
        case 'AttrezzatureScuola':
            if (!isset($_POST['codatt']) && !isset($_POST['tipo']) && !isset($_POST['prezzonoleggio']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $codatt = $_POST['codatt'];
                $tipo = $_POST['tipo'];
                $prezzonoleggio = $_POST['prezzonoleggio'];
                $_SESSION['codatt'] = $codatt;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['prezzonoleggio'] = $prezzonoleggio;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($codatt)
                    $where .= " AND  codatt =\"" . $codatt . "\"";
                if ($tipo)
                    $where .= " AND  tipo =\"" . $tipo . "\"";
                if ($prezzonoleggio)
                    $where .= " AND  prezzonoleggio =\"" . $prezzonoleggio . "\"";

                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Codatt", "Tipo", "Prezzonoleggio"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Brevetti':
            if (!isset($_POST['brevetto']) && !isset($_POST['nome']) && !isset($_POST['maxprofondita']) && !isset($_POST['sub']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $brevetto = $_POST['brevetto'];
                $nome = $_POST['nome'];
                $maxprofondita = $_POST['maxprofondita'];
                $sub = $_POST['sub'];
                $_SESSION['brevetto'] = $brevetto;
                $_SESSION['nome'] = $nome;
                $_SESSION['maxprofondita'] = $maxprofondita;
                $_SESSION['sub'] = $sub;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Brevetto", "Nome", "Maxprofondita'", "Sub"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Corsi':
            if (!isset($_POST['codcorso']) && !isset($_POST['nome']) && !isset($_POST['esame']) && !isset($_POST['costo']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $codcorso = $_POST['codcorso'];
                $nome = $_POST['nome'];
                $esame = $_POST['esame'];
                $costo = $_POST['costo'];
                $_SESSION['codcorso'] = $codcorso;
                $_SESSION['nome'] = $nome;
                $_SESSION['esame'] = $esame;
                $_SESSION['costo'] = $costo;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Codcorso", "Nome", "Esame", "Costo"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Eventi':
            if (!isset($_POST['idevento']) && !isset($_POST['nome']) && !isset($_POST['data']) && !isset($_POST['luogo']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $idevento = $_POST['idevento'];
                $nome = $_POST['nome'];
                $data = $_POST['data'];
                $luogo = $_POST['luogo'];
                $_SESSION['idevento'] = $idevento;
                $_SESSION['nome'] = $nome;
                $_SESSION['data'] = $data;
                $_SESSION['luogo'] = $luogo;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Idevento", "Nome", "Data", "Luogo"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'EventiSoci':
            if (!isset($_POST['evento']) && !isset($_POST['socio']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $evento = $_POST['evento'];
                $socio = $_POST['socio'];
                $_SESSION['evento'] = $evento;
                $_SESSION['socio'] = $socio;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($evento)
                    $where .= " AND  evento =\"" . $evento . "\"";
                if ($socio)
                    $where .= " AND  socio =\"" . $socio . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Evento", "Socio"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Immersioni':
            if (!isset($_POST['codimm']) && !isset($_POST['data']) && !isset($_POST['ora']) && !isset($_POST['citta']) && !isset($_POST['luogo']) && !isset($_POST['tipo']) && !isset($_POST['inizioimm']) && !isset($_POST['costo']) && !isset($_POST['profonditamax']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $codimm = $_POST['codimm'];
                $data = $_POST['data'];
                $ora = $_POST['ora'];
                $citta = $_POST['citta'];
                $luogo = $_POST['luogo'];
                $tipo = $_POST['tipo'];
                $inizioimm = $_POST['inizioimm'];
                $costo = $_POST['costo'];
                $profonditamax = $_POST['profonditamax'];
                $_SESSION['codimm'] = $codimm;
                $_SESSION['data'] = $data;
                $_SESSION['ora'] = $ora;
                $_SESSION['citta'] = $citta;
                $_SESSION['luogo'] = $luogo;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['inizioimm'] = $inizioimm;
                $_SESSION['costo'] = $costo;
                $_SESSION['profonditamax'] = $profonditamax;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Codimm", "Data", "Ora", "Citta'", "Luogo", "Tipo", "Inizioimm", "Costo", "Profondita' max"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'ImmersioniSub':
            if (!isset($_POST['immersione']) && !isset($_POST['sub']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $immersione = $_POST['immersione'];
                $sub = $_POST['sub'];
                $_SESSION['immersione'] = $immersione;
                $_SESSION['sub'] = $sub;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($immersione)
                    $where .= " AND  immersione =\"" . $immersione . "\"";
                if ($sub)
                    $where .= " AND  sub =\"" . $sub . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Immersione", "Sub"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Lezioni':
            if (!isset($_POST['idlez']) && !isset($_POST['data']) && !isset($_POST['ora']) && !isset($_POST['luogo']) && !isset($_POST['corso']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $idlez = $_POST['idlez'];
                $data = $_POST['data'];
                $ora = $_POST['ora'];
                $luogo = $_POST['luogo'];
                $corso = $_POST['corso'];
                $_SESSION['idlez'] = $idlez;
                $_SESSION['data'] = $data;
                $_SESSION['ora'] = $ora;
                $_SESSION['luogo'] = $luogo;
                $_SESSION['corso'] = $corso;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Idlez", "Data", "Ora", "Luogo", "Corso"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Noleggi':
            if (!isset($_POST['sub']) && !isset($_POST['att']) && !isset($_POST['data']) && !isset($_POST['prezzofinale']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $sub = $_POST['sub'];
                $att = $_POST['att'];
                $data = $_POST['data'];
                $prezzofinale = $_POST['prezzofinale'];
                $_SESSION['sub'] = $sub;
                $_SESSION['att'] = $att;
                $_SESSION['data'] = $data;
                $_SESSION['prezzofinale'] = $prezzofinale;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Sub", "Att", "Data", "Prezzofinale"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Persone':
            if (!isset($_POST['idpersona']) && !isset($_POST['nome']) && !isset($_POST['cognome']) && !isset($_POST['datanascita']) && !isset($_POST['email']) && !isset($_POST['telefono']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $idpersona = $_POST['idpersona'];
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $datanascita = $_POST['datanascita'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $_SESSION['idpersona'] = $idpersona;
                $_SESSION['nome'] = $nome;
                $_SESSION['cognome'] = $cognome;
                $_SESSION['datanascita'] = $datanascita;
                $_SESSION['email'] = $email;
                $_SESSION['telefono'] = $telefono;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Idpersona", "Nome", "Cognome", "Datanascita", "Email", "Telefono"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'PersoneCorsi':
            if (!isset($_POST['persona']) && !isset($_POST['corso']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $persona = $_POST['persona'];
                $corso = $_POST['corso'];
                $_SESSION['persona'] = $persona;
                $_SESSION['corso'] = $corso;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($persona)
                    $where .= " AND  persona =\"" . $persona . "\"";
                if ($corso)
                    $where .= " AND  corso =\"" . $corso . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Persona", "Corso"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'PersoneEventi':
            if (!isset($_POST['evento']) && !isset($_POST['persona']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $evento = $_POST['evento'];
                $persona = $_POST['persona'];
                $_SESSION['evento'] = $evento;
                $_SESSION['persona'] = $persona;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($evento)
                    $where .= " AND  evento =\"" . $evento . "\"";
                if ($persona)
                    $where .= " AND  persona =\"" . $persona . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Evento", "Persona"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Riunioni':
            if (!isset($_POST['codriunione']) && !isset($_POST['data']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $codriunione = $_POST['codriunione'];
                $data = $_POST['data'];
                $_SESSION['codriunione'] = $codriunione;
                $_SESSION['data'] = $data;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($codriunione)
                    $where .= " AND  codriunione =\"" . $codriunione . "\"";
                if ($data)
                    $where .= " AND  data =\"" . $data . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Codriunione", "Data"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Soci':
            if (!isset($_POST['idsocio']) && !isset($_POST['dataiscrizione']) && !isset($_POST['quota']) && !isset($_POST['scontoatt']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $idsocio = $_POST['idsocio'];
                $dataiscrizione = $_POST['dataiscrizione'];
                $quota = $_POST['quota'];
                $scontoatt = $_POST['scontoatt'];
                $_SESSION['idsocio'] = $idsocio;
                $_SESSION['dataiscrizione'] = $dataiscrizione;
                $_SESSION['quota'] = $quota;
                $_SESSION['scontoatt'] = $scontoatt;

                $query = "SELECT DISTINCT * FROM $cosa";
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

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Idscio", "Dataiscrizione", "Quota", "Scontoatt"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'SociRiunioni':
            if (!isset($_POST['socio']) && !isset($_POST['riunione']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $socio = $_POST['socio'];
                $riunione = $_POST['riunione'];
                $_SESSION['socio'] = $socio;
                $_SESSION['riunione'] = $riunione;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($socio)
                    $where .= " AND  socio =\"" . $socio . "\"";
                if ($riunione)
                    $where .= " AND  riunione =\"" . $riunione . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Socio", "Riunione"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
        case 'Sub':
            if (!isset($_POST['idsub']) && !isset($_POST['totimmersioni']))
                echo "<p>Non hai scelto su quali valori applicare le modifiche. <a href=\"sceglimodifica.php\">Riprova</a>.</p>";
            else {
                $idsub = $_POST['idsub'];
                $totimmersioni = $_POST['totimmersioni'];
                $_SESSION['idsub'] = $idsub;
                $_SESSION['totimmersioni'] = $totimmersioni;

                $query = "SELECT DISTINCT * FROM $cosa";
                $where = " WHERE TRUE";
                if ($idsub)
                    $where .= " AND  idsub =\"" . $idsub . "\"";
                if ($totimmersioni)
                    $where .= " AND  totimmersioni =\"" . $totimmersioni . "\"";
                $query = $query . $where;

                $result = mysql_query($query, $conn) or die("Query fallita. " . mysql_error($conn));
                $num_row = mysql_num_rows($result);
                if (empty($num_row))
                    echo "<p>Nessun campo con queste caratteristiche e' presente nella tabella selezionata</p>
                    <p>Prova a scegliere di nuovo i dati da modificare  <a href=\"sceglimodifica.php\">qui</a>.</p>";
                else {
                    require_once ("fun_tabelle.php");
                    echo "<p>I dati che si vogliono modificare sono:</p>";
                    table_start(array("Idsub", "Totimmersioni"));
                    while ($row = mysql_fetch_row($result))
                        table_row($row);
                    table_end();
                    echo "<p>Il nuovo valore sara':</p>" .
                    $quale . "=" . $quanto .
                    "<p>Per completare la modifica e vedere la tabella aggiornata clicca <a href=\"comp_modifica.php\">qui</a>.</p>
            <p>Torna <a href=\"sceglimodifica.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
                }
            }
            break;
    }
}

?>
