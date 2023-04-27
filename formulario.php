<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Formulario de Registro</title>
</head>
<body>
    <div class="group">
        <form method="POST" action="" class="form">
            <h2 id="heading"><em>Formulario de Registro</em></h2>
            <div class="field">
            <label for="name">Nombre <span><em>(requerido)</em></span></label>
                
            <input type="text" name="nombre" class="form-input" required/>
            </div>

            <div class="field">
            <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
                
            <input type="text" name="apellido" class="form-input" required/>
            </div>


            <div class="field">
            <label for="email">Email <span><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-input" />
            </div>

            <div class="btn">
            <input class="form-btn" name="submit" type="submit" value="Suscribirse" />
            </div>

    <?php

    if($_POST){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cursosql";

        //Crea conexión
        $conn = new mysqli($servername, $username, $password, $dbname);
        //Comprueba la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuarios (nombre, apellido, email)
        VALUES ('$nombre', '$apellido', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // Redirect user to thank you page
            header('Location: thankyou.html');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //Cierra la conexión para no consumir recursos innecesarios
        $conn->close();

        }

    ?>

        </form>
    </div>
    
</body>
</html>