<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once 'header.php';
    ?>
    <main>
        <section>
            <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $mensaje = $_POST["mensaje"];

                echo "<h2>los datos recibidos</h2>";
                echo "<p>nombre: $username</p>";
                echo "<p>email: $email</p>";
                echo "<p>mensaje: $mensaje</p>";
                echo "<p><a href='index.php'>volver al formulario</a></p>";
                } else {
                echo "<p>acceso denegado pa</p>";
                echo "<p><a href='index.php'>volver al formulario</a></p>";
                }
            ?>
        </section>
    </main>
    <?php
    require_once 'footer.php';
    ?>
</body>
</html>


