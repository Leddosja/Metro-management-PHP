<!DOCTYPE html>
<html>
<head>
    <title>Metropolitana di Roma - Registrazione</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #F4F4F4;
            background-image: url('sfondoLogin.png');
            background-size: cover;
            background-position: center;
        }

        .register-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .register-form {
            width: 100%;
            max-width: 300px;
        }

        .register-form input[type="text"],
        .register-form input[type="password"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .register-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #56be9a;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .register-form button[type="submit"]:hover {
            background-color: #ec7678;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #999999;
        }

        .footer a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="register-container">
    <h2>Metropolitana di Roma - Registrazione</h2>
    <form class="register-form" action="process_registrazione.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cognome" placeholder="Cognome" required>
        <input type="text" name="codice_fiscale" placeholder="Codice fiscale" required>
        <input type="text" name="eta" placeholder="Età" required>
        <input type="text" name="professione" placeholder="Professione" required>
        <button type="submit">Registrati</button>
    </form>
    <div class="footer">
        Hai già un account? <a href="login.php">Accedi qui</a>
    </div>
</div>
</body>
</html>
