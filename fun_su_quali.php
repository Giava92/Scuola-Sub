<?php

function suquali($cosa, $quale) {
    echo "<p>Sui dati con quali caratteristiche vuoi modificare il valore " . $quale . "?</p>";
    switch ($cosa) {
        case 'AttrezzatureScuola':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Codice attrezzatura:</label>
                    <input type = "text" name = "codatt"/>
                    </div>
                    <div>
                    <label>Tipo:</label>
                    <input type = "text" name = "tipo"/>
                    </div>
                    <div>
                    <label>Prezzo noleggio:</label>
                    <input type = "text" name = "prezzonoleggio"/>
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok"/>
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Brevetti':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Brevetto:</label>
                    <input type = "text" name = "brevetto">
                    </div>
                    <div>
                    <label>Nome:</label>
                    <input type = "text" name = "nome">
                    </div>
                    <div>
                    <label>Massima profondita':</label>
                    <input type = "text" name = "maxprofondita">
                    </div>
                    <div>
                    <label>Sub:</label>
                    <input type = "text" name = "sub">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Corsi':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Codice corso:</label>
                    <input type = "text" name = "codcorso">
                    </div>
                    <div>
                    <label>Nome:</label>
                    <input type = "text" name = "nome">
                    </div>
                    <div>
                    <label>Esame:</label>
                    <input type = "text" name = "esame">
                    </div>
                    <div>
                    <label>Costo:</label>
                    <input type = "text" name = "costo">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Eventi':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Id evento:</label>
                    <input type = "text" name = "idevento">
                    </div>
                    <div>
                    <label>Nome:</label>
                    <input type = "text" name = "nome">
                    </div>
                    <div>
                    <label>Data:</label>
                    <input type = "text" name = "data">
                    </div>
                    <div>
                    <label>Luogo:</label>
                    <input type = "text" name = "luogo">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'EventiSoci':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Evento:</label>
                    <input type = "text" name = "evento">
                    </div>
                    <div>
                    <label>Socio:</label>
                    <input type = "text" name = "socio">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Immersioni':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Codice immersione:</label>
                    <input type = "text" name = "codimm">
                    </div>
                    <div>
                    <label>Data:</label> 
                    <input type = "text" name = "data">
                    </div>
                    <div>
                    <label>Ora:</label>
                    <input type = "text" name = "ora">
                    </div>
                    <div>
                    <label>Citta':</label>
                    <input type = "text" name = "citta">
                    </div>
                    <div>
                    <label>Luogo:</label>
                    <input type = "text" name = "luogo">
                    </div>
                    <div>
                    <label>Tipo:</label>
                    <input type = "text" name = "tipo">
                    </div>
                    <div>
                    <label>Inizio immersione:</label>
                    <input type = "text" name = "inizioimm">
                    </div>
                    <div>
                    <label>Costo:</label>
                    <input type = "text" name = "costo">
                    </div>
                    <div>
                    <label>Profondita' max:</label>
                    <input type = "text" name = "profonditamax">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'ImmersioniSub':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Immersione:</label>
                    <input type = "text" name = "immersione">
                    </div>
                    <div>
                    <label>Sub:</label>
                    <input type = "text" name = "sub">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Lezioni':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Id lezione:</label>
                    <input type = "text" name = "idlez">
                    </div>
                    <div>
                    <label>Data:</label>
                    <input type = "text" name = "data">
                    </div>
                    <div>
                    <label>Ora:</label>
                    <input type = "text" name = "ora">
                    </div>
                    <div>
                    <label>Luogo:</label>
                    <input type = "text" name = "luogo">
                    </div>
                    <div>
                    <label>Corso:</label>
                    <input type = "text" name = "corso">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Noleggi':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Sub:</label>
                    <input type = "text" name = "sub">
                    </div>
                    <div>
                    <label>Attrezzatura:</label>
                    <input type = "text" name = "att">
                    </div>
                    <div>
                    <label>Data:</label>
                    <input type = "text" name = "data">
                    </div>
                    <div>
                    <label>Prezzo finale:</label>
                    <input type = "text" name = "prezzofinale">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Persone':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Id persona:</label>
                    <input type = "text" name = "idpersona">
                    </div>
                    <div>
                    <label>Nome:</label>
                    <input type = "text" name = "nome">
                    </div>
                    <div>
                    <label>Cognome:</label>
                    <input type = "text" name = "cognome">
                    </div>
                    <div>
                    <label>Data di nascita:</label>
                    <input type = "text" name = "datanascita">
                    </div>
                    <div>
                    <label>Email:</label>
                    <input type = "text" name = "email">
                    </div>
                    <div>
                    <label>Telefono:</label>
                    <input type = "text" name = "telefono">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'PersoneCorsi':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Persona:</label>
                    <input type = "text" name = "persona">
                    </div>
                    <div>
                    <label>Corso:</label>
                    <input type = "text" name = "corso">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'PersoneEventi':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Evento:</label>
                    <input type = "text" name = "evento">
                    </div>
                    <div>
                    <label>Persona:</label>
                    <input type = "text" name = "persona">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Riunioni':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Codice Riunione:</label>
                    <input type = "text" name = "codriunione">
                    </div>
                    <div>
                    <label>Data:</label>
                    <input type = "text" name = "data">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Soci':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Id socio:</label>
                    <input type = "text" name = "idsocio">
                    </div>
                    <div>
                    <label>Data iscrizione:</label>
                    <input type = "text" name = "dataiscrizione">
                    </div>
                    <div>
                    <label>Quota:</label>
                    <input type = "text" name = "quota">
                    </div>
                    <div>
                    <label>Sconto attrezzature:</label>
                    <input type = "text" name = "scontoatt">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'SociRiunioni':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Socio:</label>
                    <input type = "text" name = "socio">
                    </div>
                    <div>
                    <label>Riunione:</label>
                    <input type = "text" name = "riunione">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Sub':
            echo<<<END
                    <form class="fc" action = "ver_modifica.php" method = "post">
                    <div>
                    <label>Id sub:</label>
                    <input type = "text" name = "idsub">
                    </div>
                    <div>
                    <label>Totale immersioni:</label>
                    <input type = "text" name = "totimmersioni">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
    }
}

?>
