<!DOCTYPE html>
<html>
<head>
    <title>Le mie prenotazioni</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #F4F4F4;
            background-image: url('sfondoPrenotazioni.png');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 100px auto;
            max-width: 800px;
        }

        .titolo-prenotazioni {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .prenotazioni-lista {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .prenotazioni-lista li {
            margin-bottom: 10px;
        }

        .cerca-prenotazioni-button {
            width: 10cm;
            margin-top: 20px;
            padding: 10px;
            background-color: #b3e3f5;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
        }

        .cerca-prenotazioni-button:hover {
            background-color: #b39af6;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2 class="titolo-prenotazioni">Le mie prenotazioni</h2>
    <?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $query = "SELECT * FROM Prenotazione INNER JOIN Utente ON Prenotazione.Utente_matricolaUtente = Utente.matricolaUtente WHERE Utente.nome = '$username'";

        if (isset($_GET['visualizzaPrenotazioni'])) {
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<ul class="prenotazioni-lista">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>Prenotazione ID: ' . $row['idPrenotazione'] . '</li>';
                    echo '<li>Matricola Utente: ' . $row['Utente_matricolaUtente'] . '</li>';
                    echo '<li>ID Viaggio: ' . $row['Viaggio_idViaggio'] . '</li>';
                    echo '<li>ID Treno: ' . $row['Viaggio_Treno_idTreno'] . '</li>';
                    echo '<li>ID Stazione Partenza: ' . $row['idStazionePartenza'] . '</li>';
                    echo '<li>ID Stazione Arrivo: ' . $row['idStazioneArrivo'] . '</li>';
                    echo '<br>';
                }
                echo '</ul>';
            } else {
                echo 'Nessuna prenotazione trovata.';
            }
        }
    }

    mysqli_close($conn);
    ?>
    <form action="prenotazioni.php" method="get">
        <button type="submit" name="visualizzaPrenotazioni" class="cerca-prenotazioni-button">Visualizza prenotazioni</button>
    </form>
</div>
</body>
</html>
