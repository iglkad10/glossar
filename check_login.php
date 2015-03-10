<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST['Login'])) {
            $email = $_POST['email'];
            $password = $_POST['passwort'];
            $id="";
            
            $encrypt_password = md5($password);

            require_once ('config.php');

            $mysqli = new mysqli(SERVER, USER, PASSWORD, DBNAME);

            if ($mysqli->connect_errno) {
                echo "Keine Verbindung! Error: " . $mysqli->connect_errno;
                exit();
            }

            $query = "SELECT * FROM kunden
                        WHERE email = '$email'
                        AND passwort = '$encrypt_password'";

            $result = $mysqli->query($query);

            if ($result->num_rows != 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                }

                setcookie('my_user', $email, time() + 3600);
                setcookie('my_id', $id, time() + 3600);
                header('Location:welcome.php');
            } else {
                header('Location:index.php?fail=1');
            }
        } else {
            header('Location:index.php');
        }
        ?>
    </body>
</html>
