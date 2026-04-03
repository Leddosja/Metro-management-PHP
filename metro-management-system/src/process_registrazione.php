<!DOCTYPE>
<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

if ($conn != null) {
    echo "Connessione avvenuta <br> <br>";

    if (isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['codice_fiscale']) && isset($_POST['eta']) && isset($_POST['professione'])) {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $codice_fiscale = $_POST['codice_fiscale'];
        $eta = $_POST['eta'];
        $professione = $_POST['professione'];

        // Esegui la query per verificare se il codice fiscale esiste già nel database
        $checkQuery = "SELECT * FROM mydb.Utente WHERE codiceFiscale = '$codice_fiscale'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            echo "Codice fiscale già presente nel database";
        } else {
            // Aggiungi i dati dell'utente al database
            $matricola = mt_rand();
            $insertQuery = "INSERT INTO mydb.Utente (matricolaUtente, nome, cognome, codiceFiscale, eta, professione) VALUES ('$matricola', '$nome', '$cognome', '$codice_fiscale', '$eta', '$professione')";
            $insertResult = $conn->query($insertQuery);

            if ($insertResult) {
                header("Location: pagina_ricerca.php?username=" . urlencode($nome));
                exit();
            } else {
                echo "Errore durante l'inserimento dei dati nel database";
            }
        }
    }
    $conn->close();
} else {
    echo "Errore connessione";
}
?>