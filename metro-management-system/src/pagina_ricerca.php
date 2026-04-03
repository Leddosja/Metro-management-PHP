<!DOCTYPE html>
<html>
    <head>
        <title>Pagina successiva</title>
        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background-color: #F4F4F4;
                background-image: url('sfondoRicerca.png');
                background-size: cover;
                background-position: center;
                padding: 20px;
            }

            .titolo-spostato {
                position: absolute;
                top: 10px;
                right: 50px;
                font-size: 50px;
            }

            .back-bottone {
                position: absolute;
                top: 35px;
                left: 80px;
                width: 50px;
                height: 50px;
                background-color: transparent;
                border: none;
            }

            .visualizza-mieiviaggi-button {
                top: 16cm;
                position: absolute;
                width: 10cm;
                margin-top: 20px;
                padding: 10px;
                background-color: #b3e3f5;
                color: #FFFFFF;
                border: none;
                border-radius: 5px;
                font-size: 23px;
                cursor: pointer;
                font-weight: bold;
            }

            .visualizza-mieiviaggi-button:hover {
                background-color: #b39af6;
            }

            .login-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: #FFFFFF;
                padding: 40px;
                border-radius: 30px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin-right: 14.5cm;
            }

            .second-login-container {
                position: absolute;
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: #FFFFFF;
                padding: 40px;
                border-radius: 30px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin-left: 15.5cm;
                width: 300px;
                height: 400px;
            }

            .risultati-query {
                width: 95%;
                height: 250px;
                overflow-y: scroll;
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                align-items: center;
            }

            .titolo-stazione {
                text-align: center;
            }

            .opzioni-stazione {
                margin: 0 auto;
                width: 10cm;
            }

            .opzione-stazione {
                padding: 5px;
            }

            .evidenziatura {
                color: mediumpurple;
                font-weight: bold;
            }

            .cerca-viaggio-button {
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

            .cerca-viaggio-button:hover {
                background-color: #b39af6;
            }

            .prenota-viaggio-button {
                width: 7cm;
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

            .prenota-viaggio-button:hover {
                background-color: #b39af6;
            }

        </style>
    </head>
    <body>
        <div class="login-container">

            <?php
                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                    echo "<h1 class='titolo-spostato'; style='text-align: left;'>Benvenuto, " . htmlspecialchars($username) . "!</h1>";
                }
            ?>

            <a href="login.php" class="back-bottone"></a>
            <h2 class="titolo-stazione">Seleziona una stazione di partenza:</h2>
            <form method="POST">
                <select name="stazionePartenza" class="opzioni-stazione" style="font-size: 16px;">
                    <option value="" selected></option>
                    <?php
                    // STAZIONI NELLA COMBOBOX
                    $conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

                    $query = "SELECT Stazione.nomeStazione FROM mydb.Stazione";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['nomeStazione'] . '" class="opzione-stazione"><b>' . $row['nomeStazione'] . '</b></option>';
                    }
                    mysqli_data_seek($result, 0);
                    ?>
                </select>
                <div>
                    <h2 class="titolo-stazione">Seleziona una stazione di arrivo:</h2>
                    <select name="stazioneArrivo" class="opzioni-stazione" style="font-size: 16px;">
                        <option value="" selected></option>
                        <?php
                        mysqli_data_seek($result, 0); // Riposiziona il puntatore del risultato

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['nomeStazione'] . '" class="opzione-stazione"><b>' . $row['nomeStazione'] . '</b></option>';
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <button type="submit" name="cercaViaggio" class="cerca-viaggio-button">Cerca viaggio</button>
            </form>

            <a href="prenotazioni.php" class="visualizza-mieiviaggi-button" style="text-decoration: none; text-align: center;">I miei viaggi</a>
        </div>

        <div class="second-login-container">
            <form method="POST">
                <h2 class="titolo-stazione">Lista della linea:</h2>
                <div class="risultati-query">
                    <?php
                        if (isset($_POST['cercaViaggio'])) {
                            $conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

                            $partenza = $_POST['stazionePartenza'];
                            $arrivo = $_POST['stazioneArrivo'];

                            $queryCheckPartenza = "SELECT Stazione.Viaggio_idViaggio FROM Stazione WHERE nomeStazione = '$partenza';";
                            $resultPartenza = mysqli_query($conn, $queryCheckPartenza);
                            $Partenza = mysqli_fetch_assoc($resultPartenza)['Viaggio_idViaggio'];

                            $queryCheckArrivo = "SELECT Stazione.Viaggio_idViaggio FROM Stazione WHERE nomeStazione = '$arrivo';";
                            $resultArrivo = mysqli_query($conn, $queryCheckArrivo);
                            $Arrivo = mysqli_fetch_assoc($resultArrivo)['Viaggio_idViaggio'];

                            if ($Partenza == $Arrivo) {
                                $query = "SELECT Stazione.nomeStazione FROM Stazione WHERE Viaggio_idViaggio = '$Partenza' ORDER BY idStazione ASC;";
                                $result = mysqli_query($conn, $query);

                                echo "<ul>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($partenza == $row['nomeStazione'] || $arrivo == $row['nomeStazione']) {
                                        echo '<li class="evidenziatura">' . $row['nomeStazione'] . '</li>';
                                    }
                                    else {
                                        echo '<li>' . $row['nomeStazione'] . '</li>';
                                    }
                                }
                                echo "</ul>";
                            } else {
                                echo "Stazioni appartenenti a linee differenti";
                            }
                            mysqli_close($conn);
                        }
                        if (isset($_POST['prenotaViaggio'])) {
                            $conn = mysqli_connect('localhost', 'root', 'root', 'mydb');

                            $partenza = $_POST['stazionePartenza'];
                            $arrivo = $_POST['stazioneArrivo'];

                            $queryCheckPartenza = "SELECT Viaggio_idViaggio FROM Stazione WHERE nomeStazione = '$partenza';";
                            $resultPartenza = mysqli_query($conn, $queryCheckPartenza);

                            $Partenza = mysqli_fetch_assoc($resultPartenza)['Viaggio_idViaggio'];
                            echo $Partenza;

                            $queryCheckArrivo = "SELECT Viaggio_idViaggio FROM Stazione WHERE nomeStazione = '$arrivo';";
                            $resultArrivo = mysqli_query($conn, $queryCheckArrivo);

                            $Arrivo = mysqli_fetch_assoc($resultArrivo)['Viaggio_idViaggio'];
                            echo $Arrivo;

                            //Codice prenotazione generato casualmente
                            $idPrenotazione = mt_rand();

                            //Matricola utente
                            $username = $_GET['username'];
                            $querymatricola = "SELECT Utente.matricolaUtente FROM Utente WHERE nome = '$username';";
                            $resultmatricola = mysqli_query($conn, $querymatricola);
                            $matricola = mysqli_fetch_assoc($resultmatricola)['matricolaUtente'];

                            //Id treno del viaggio
                            $queryidTreno = "SELECT Treno_idTreno FROM Viaggio WHERE idViaggio = '$Partenza';";
                            $resultidTreno = mysqli_query($conn, $queryidTreno);
                            $idTreno = mysqli_fetch_assoc($resultidTreno)['Treno_idTreno'];

                            //Inserimento della prenotazione nel database
                            $insertQuery = "INSERT INTO mydb.Prenotazione(idPrenotazione, Utente_matricolaUtente, Viaggio_idViaggio, Viaggio_Treno_idTreno) VALUES ('$idPrenotazione', '$matricola', '$matricola', '$matricola');";
                            $insertResult = $conn->query($insertQuery);
                            mysqli_close($conn);
                        }
                    ?>
                </div>
                    <button type="submit" name="prenotaViaggio" value="prenotato" class="prenota-viaggio-button">Prenota viaggio</button>
            </form>
        </div>
    </body>
</html>