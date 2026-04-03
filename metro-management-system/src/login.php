<!DOCTYPE html>
<html>
<head>
    <title>Metropolitana di Roma - Login</title>
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

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .login-form {
            width: 100%;
            max-width: 300px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 93%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #56be9a;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .login-form button[type="submit"]:hover {
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
        <div class="login-container">
            <h2>Metropolitana di Roma</h2>
            <form class="login-form" action="process_login.php" method="post">
                <input type="text" name="codiceFiscale" placeholder="Codice fiscale" required>
                <input type="text" name="username" placeholder="Username" required>
                <button type="submit">Accedi</button>
            </form>
            <div class="footer">
                Non hai un account? <a href="registrazione.php">Registrati qui</a>
            </div>
        </div>
    </body>
</html>