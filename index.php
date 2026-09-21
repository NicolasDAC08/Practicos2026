<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'header.php';
    ?>
    <main>
        <section>
            <form action="procesar.php" method="POST">
                <div class="campo">
                    <label for="username">Nombre:</label>
                    <input type="text" name="username" id="username" placeholder="nombre">
                </div>
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="email">
                </div>
                <div class="campo">
                    <label for="mensaje">Mensaje:</label>
                    <input type="text" name="mensaje" id="mensaje" placeholder="mensaje">
                </div>
                <button type="submit">enviar</button>
            </form>
        </section>
    </main>
    <?php
    require_once 'footer.php';
    ?>
</body>
</html>