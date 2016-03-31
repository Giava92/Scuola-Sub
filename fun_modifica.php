<?php

function modifica($cosa) {
    switch ($cosa) {
        case 'AttrezzatureScuola':
            echo<<<END
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>codatt</option>
                    <option>tipo</option>
                    <option>prezzonoleggio</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
                    </div>
                    <div id="pulsanti">
                    <input type = "submit" value = "Ok" />
                    </div>
                    </fieldset>
                    </form>
END;
            break;
        case 'Brevetti':
            echo<<<END
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>brevetto</option>
                    <option>nome</option>
                    <option>maxprofondita</option>
                    <option>sub</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>codcorso</option>
                    <option>nome</option>
                    <option>esame</option>
                    <option>costo</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>idevento</option>
                    <option>nome</option>
                    <option>data</option>
                    <option>luogo</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>evento</option>
                    <option>socio</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>codimm</option>
                    <option>data</option>
                    <option>ora</option>
                    <option>citta</option>
                    <option>luogo</option>
                    <option>tipo</option>
                    <option>inizioimm</option>
                    <option>costo</option>
                    <option>profonditamax</option>                    
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>immersione</option>
                    <option>sub</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>idlez</option>
                    <option>data</option>
                    <option>ora</option>
                    <option>luogo</option>
                    <option>corso</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>sub</option>
                    <option>att</option>
                    <option>data</option>
                    <option>prezzofinale</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>idpersona</option>
                    <option>nome</option>
                    <option>cognome</option>
                    <option>datanascita</option>
                    <option>email</option>
                    <option>telefono</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>persona</option>
                    <option>corso</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>evento</option>
                    <option>persona</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>codriunione</option>
                    <option>data</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>idsocio</option>
                    <option>dataiscrizione</option>
                    <option>quota</option>
                    <option>scontoatt</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>socio</option>
                    <option>riunione</option>
                    </select>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v"></p>
                    <p><input type = "submit" value = "Ok" /></p>
                    </form></fieldset>
END;
            break;
        case 'Sub':
            echo<<<END
                    <form class="fc" action = "su_quali.php" method = "post">
                    <fieldset>
                    <div>
                    <label>Scegli quale campo vuoi modificare:</label>
                    <select name = "tipo_dat">
                    <option>idsub</option>
                    <option>totimmersioni</option>
                    </select>
                    </div>
                    <div>
                    <label>Quale sara' il nuovo valore?</label>
                    <input type = "text" name = "new_v">
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
