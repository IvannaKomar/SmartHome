<?php
require 'db.php';
session_start();
if (empty($_SESSION['user'])) {
    header('Location: index.php');
}
$res = $pdo->query('SELECT number, state FROM devices ORDER BY number')->fetchAll();
$button1 = $res[0];
$button2 = $res[1];



if ($button1["state"] == "OFF") {
    $button1Class = 'btn-success';
} else {
    $button1Class = 'btn-danger';
}
if ($button2["state"] == "OFF") {
    $button2Class = 'btn-success';
} else {
    $button2Class = 'btn-danger';
}


/*
  1) Дописать иф в определение классов кнопок. Если OFF то зеленая иначе красная
  2) Когда нажимают на кнопку устройства - получить текущий статус, и инвертировать его и обновить запись UPDATE devices SET state = 'ON' WHERE number = 1
 */

if (isset($_POST['device1'])) {
    $currentState = $pdo->query('SELECT state FROM devices WHERE number = 1 ORDER BY number')->fetchColumn(0);
    var_dump($res);
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <title>Smart Home</title>
        <!-- Bootstrap -->
        <link  href="css/bootstrap.css" rel="stylesheet">
        <link  href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span12 "><h1>SmartHome </h1>

                </div>
                <div class="graphic span12">

                </div>

            </div>
            <div class="row"><form method="POST"> <div class=" span4">
                        <button type="submit" name="device1" class="btn <?php echo $button1Class; ?>"> <h5 class="text-warning">Устройство 1</h5></button>
                    </div>
                    <div class=" span4 offset4">
                        <button type="submit" name="device2" class="btn <?php echo $button2Class; ?>"> <h5 class="text-warning">Устройство 2</h5></button>
                    </div> </form>
            </div>
        </div>
    </body>
</html>