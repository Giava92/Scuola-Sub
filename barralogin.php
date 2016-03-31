<?php

function barralog() {
    if (empty($_SESSION['username'])) {
        echo<<<END
        <form action = "autenticazione.php" method = "post">
            <label>Username:</label>
            <input type="text" name="username" />
            <label>Password:</label><input type="password" name="password" maxlength="9" />
            <input id="accedi" type="submit" value="Accedi"/>
        </form>
        <p>Non hai un account? <a href="autenticazione_registra.php">Registrati</a></p>
END;
    } else {
        $username = $_SESSION['username'];
        echo<<<END
    <p id="connesso">Sei connesso come <strong>$username</strong></p>
    <input type="button" value="Logout" name="logout" onClick="location.href='logout.php'"/>
    <p><a href="area_riservata.php">Area riservata</a></p>
END;
    }
}

?>
