<?php

function ver_ins($cosa) {
    switch ($cosa) {
        case 'AttrezzatureScuola':
            if (!isset($_POST['codatt']) && !isset($_POST['tipo']) && !isset($_POST['prezzonoleggio']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codatt = $_POST['codatt'];
                $tipo = $_POST['tipo'];
                $prezzonoleggio = $_POST['prezzonoleggio'];
                $_SESSION['codatt'] = $codatt;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['prezzonoleggio'] = $prezzonoleggio;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Codice attrezzatura: $codatt</p>
            <p>Tipo: $tipo</p>
            <p>Prezzo noleggio: $prezzonoleggio</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Brevetti':
            if (!isset($_POST['codatt']) && !isset($_POST['tipo']) && !isset($_POST['prezzonoleggio']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $brevetto = $_POST['brevetto'];
                $nome = $_POST['nome'];
                $maxprofondita = $_POST['maxprofondita'];
                $sub = $_POST['sub'];
                $_SESSION['brevetto'] = $brevetto;
                $_SESSION['nome'] = $nome;
                $_SESSION['maxprofondita'] = $maxprofondita;
                $_SESSION['sub'] = $sub;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Brevetto: $brevetto</p>
            <p>Nome: $nome</p>
            <p>Massima Profondita': $maxprofondita</p>
            <p>Sub: $sub</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Corsi':
            if (!isset($_POST['codcorso']) && !isset($_POST['nome']) && !isset($_POST['esame']) && !isset($_POST['costo']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codcorso = $_POST['codcorso'];
                $nome = $_POST['nome'];
                $esame = $_POST['esame'];
                $costo = $_POST['costo'];
                $_SESSION['codcorso'] = $codcorso;
                $_SESSION['nome'] = $nome;
                $_SESSION['esame'] = $esame;
                $_SESSION['costo'] = $costo;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Codice corso: $codcorso</p>
            <p>Nome: $nome</p>
            <p>Esame: $esame</p>
            <p>Costo: $costo</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Eventi':
            if (!isset($_POST['idevento']) && !isset($_POST['nome']) && !isset($_POST['data']) && !isset($_POST['luogo']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idevento = $_POST['idevento'];
                $nome = $_POST['nome'];
                $data = $_POST['data'];
                $luogo = $_POST['luogo'];
                $_SESSION['idevento'] = $idevento;
                $_SESSION['nome'] = $nome;
                $_SESSION['data'] = $data;
                $_SESSION['luogo'] = $luogo;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Id evento: $idevento</p>
            <p>Nome: $nome</p>
            <p>Data: $data</p>
            <p>Luogo: $luogo</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            </p><p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'EventiSoci':
            if (!isset($_POST['evento']) && !isset($_POST['socio']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $evento = $_POST['evento'];
                $socio = $_POST['socio'];
                $_SESSION['evento'] = $evento;
                $_SESSION['socio'] = $socio;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Evento: $evento</p>
            <p>Socio: $socio</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            </p><p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Immersioni':
            if (!isset($_POST['codimm']) && !isset($_POST['data']) && !isset($_POST['ora']) && !isset($_POST['citta']) && !isset($_POST['luogo']) && !isset($_POST['tipo']) && !isset($_POST['inizioimm']) && !isset($_POST['costo']) && !isset($_POST['profonditamax']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
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
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Codice immersione: $codimm</p>
            <p>Data: $data</p>
            <p>Ora: $ora</p>
            <p>Citta': $citta</p>
            <p>Luogo: $luogo</p>
            <p>Tipo: $tipo</p>
            <p>Inizio immersione: $inizioimm</p>
            Costo: $costo</p>
            Profondita' massima: $profonditamax</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'ImmersioniSub':
            if (!isset($_POST['immersione']) && !isset($_POST['sub']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $immersione = $_POST['immersione'];
                $sub = $_POST['sub'];
                $_SESSION['immersione'] = $immersione;
                $_SESSION['sub'] = $sub;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Immersione: $immersione</p>
            <p>Sub: $sub</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Lezioni':
            if (!isset($_POST['idlez']) && !isset($_POST['data']) && !isset($_POST['ora']) && !isset($_POST['luogo']) && !isset($_POST['corso']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
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
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Id lezione: $idlez</p>
            <p>Data: $data</p>
            <p>Ora: $ora</p>
            <p>Luogo: $luogo</p>
            <p>Corso: $corso</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Noleggi':
            if (!isset($_POST['sub']) && !isset($_POST['att']) && !isset($_POST['data']) && !isset($_POST['prezzofinale']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $sub = $_POST['sub'];
                $att = $_POST['att'];
                $data = $_POST['data'];
                $prezzofinale = $_POST['prezzofinale'];
                $_SESSION['sub'] = $sub;
                $_SESSION['att'] = $att;
                $_SESSION['data'] = $data;
                $_SESSION['prezzofinale'] = $prezzofinale;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Sub: $sub</p>
            <p>Attrezzature: $att</p>
            <p>Data: $data</p>
            <p>Prezzo finale: $prezzofinale</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Persone':
            if (!isset($_POST['idpersona']) && !isset($_POST['nome']) && !isset($_POST['cognome']) && !isset($_POST['datanascita']) && !isset($_POST['email']) && !isset($_POST['telefono']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
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
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Id persona: $idpersona</p>
            <p>Nome: $nome</p>
            <p>Cognome: $cognome</p>
            <p>Data di nascita: $datanascita</p>
            <p>Email: $email</p>
            <p>Telefono: $telefono</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'PersoneCorsi':
            if (!isset($_POST['persona']) && !isset($_POST['corso']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $persona = $_POST['persona'];
                $corso = $_POST['corso'];
                $_SESSION['persona'] = $persona;
                $_SESSION['corso'] = $corso;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Persona: $persona</p>
            <p>Corso: $corso</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'PersoneEventi':
            if (!isset($_POST['evento']) && !isset($_POST['persona']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $evento = $_POST['evento'];
                $persona = $_POST['persona'];
                $_SESSION['evento'] = $evento;
                $_SESSION['persona'] = $persona;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Evento: $evento</p>
            <p>Persona: $persona</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Riunioni':
            if (!isset($_POST['codriunione']) && !isset($_POST['data']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $codriunione = $_POST['codriunione'];
                $data = $_POST['data'];
                $_SESSION['codriunione'] = $codriunione;
                $_SESSION['data'] = $data;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Codice riunione: $codriunione</p>
            <p>Data: $data</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Soci':
            if (!isset($_POST['idsocio']) && !isset($_POST['dataiscrizione']) && !isset($_POST['quota']) && !isset($_POST['scontoatt']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idsocio = $_POST['idsocio'];
                $dataiscrizione = $_POST['dataiscrizione'];
                $quota = $_POST['quota'];
                $scontoatt = $_POST['scontoatt'];
                $_SESSION['idsocio'] = $idsocio;
                $_SESSION['dataiscrizione'] = $dataiscrizione;
                $_SESSION['quota'] = $quota;
                $_SESSION['scontoatt'] = $scontoatt;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Id socio: $idsocio</p>
            <p>Data iscrizione: $dataiscrizione</p>
            <p>Quota: $quota</p>
            <p>Sconto attrezzature: $scontoatt</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'SociRiunioni':
            if (!isset($_POST['socio']) && !isset($_POST['riunione']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $socio = $_POST['socio'];
                $riunione = $_POST['riunione'];
                $_SESSION['socio'] = $socio;
                $_SESSION['riunione'] = $riunione;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Socio: $socio</p>
            <p>Riunione: $riunione</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            break;
        case 'Sub':
            if (!isset($_POST['idsub']) && !isset($_POST['totimmersioni']))
                echo "<p>Non hai scelto i valori da inserire. <a href=\"scegliinserisci.php\">Riprova</a>.</p>";
            else {
                $idsub = $_POST['idsub'];
                $totimmersioni = $_POST['totimmersioni'];
                $_SESSION['idsub'] = $idsub;
                $_SESSION['totimmersioni'] = $totimmersioni;
                echo "<p>I dati che si vogliono inserire sono:</p>
            <p>Id sub: $idsub</p>
            <p>Totale immersioni: $totimmersioni</p>
            <p>Per completare l'inserimento e vedere la tabella aggiornata clicca <a href=\"comp_inserisci.php\">qui</a>.</p>
            <p>Torna <a href=\"scegliinserisci.php\">indietro</a>.</p><p>Oppure torna alla <a href=\"index.php\">home</a>.</p>";
            }
            
            break;
    }
}

?>
