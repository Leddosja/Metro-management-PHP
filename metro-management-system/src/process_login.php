<!DOCTYPE>
<?php

    $conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

    if ($conn != null) {
        echo "Connessione avvenuta <br> <br>";

        if (isset($_POST['codiceFiscale']) && isset($_POST['username'])) {
            $codiceFiscale = $_POST['codiceFiscale'];
            $username = $_POST['username'];

            // Esegui la query per verificare le credenziali
            $sql = "SELECT * FROM mydb.Utente WHERE codiceFiscale = '$codiceFiscale' AND nome = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $encodedUsername = urlencode($username);
                $encodedCodiceFiscale = urlencode($codiceFiscale);
                $redirectUrl = "pagina_ricerca.php?username=$encodedUsername&codiceFiscale=$encodedCodiceFiscale";
                header("Location: $redirectUrl");
                exit();
            } else {
                echo "Credenziali non valide";
            }
        }
        $conn->close();
    }
    else {
        echo "Errore connessione";
    }
?>
