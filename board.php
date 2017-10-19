<?php
require 'db.php';
session_start();
if (empty($_SESSION['user'])) {
    header('Location: index.php');
}
if (isset($_POST['device1'])) {
    $currentState = $pdo->query('SELECT state FROM devices WHERE number = 1 ORDER BY number')->fetchColumn(0);

    $newState = ($currentState == "OFF") ? "ON" : 'OFF';
    $pdo->query("UPDATE devices SET state = '{$newState}' WHERE number = 1");
}

if (isset($_POST['device2'])) {
    $currentState = $pdo->query('SELECT state FROM devices WHERE number = 2 ORDER BY number')->fetchColumn(0);

    $newState = ($currentState == "OFF") ? "ON" : 'OFF';
    $pdo->query("UPDATE devices SET state = '{$newState}' WHERE number = 2");
}

$res = $pdo->query('SELECT number, state FROM devices ORDER BY number')->fetchAll();
$button1 = $res[0];
$button2 = $res[1];

$button1Class = ($button1["state"] == "OFF") ? 'btn-success' : 'btn-danger';

$button2Class = ($button2["state"] == "OFF") ? 'btn-success' : 'btn-danger';

$temperatures = $pdo->query("SELECT * FROM temperatures ORDER BY id DESC LIMIT 20")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru"
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <title>Smart Home</title>
        <!-- Bootstrap -->
        <link  href="css/bootstrap.css" rel="stylesheet">
        <link  href="style.css?g" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
        <script src="https://code.highcharts.com/highcharts.js"></script>        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span12 "><h1>Smart Home </h1>

                </div>
                <div id="container" class="graphic span12">

                </div>

            </div>
            <div class="row"><form method="POST"> <div class=" span4">
                        <button type="submit" name="device1" class="btn <?php echo $button1Class; ?>"> Устройство 1</button>
                    </div>
                    <div class=" span4 offset4">
                        <button type="submit" name="device2" class="btn <?php echo $button2Class; ?>"> Устройство 2</button>
                    </div> </form>
            </div>
        </div>
        <script>
            var temperatures = <?php echo json_encode($temperatures); ?>;
            $(document).ready(function () {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });

                Highcharts.chart('container', {
                    chart: {
                        type: 'spline',
                        animation: Highcharts.svg, // don't animate in old IE
                        marginRight: 10,
                    },
                    title: {
                        text: 'Temperature'
                    },
                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150
                    },
                    yAxis: {
                        title: {
                            text: 'Value'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                                    Highcharts.numberFormat(this.y, 2);
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    exporting: {
                        enabled: false
                    },
                    series: [{
                            name: 'Random data',
                            data: (function () {
                                // generate an array of random data
                                var data = [], i;


                                for (i = 0; i < temperatures.length; i++) {
                                    var temp = temperatures[i];
                                    console.log(temp);
                                    data.push({
                                        x: new Date(temp.create_date).getTime(),
                                        y: temp.value
                                    });
                                }
                                return data;
                            }())
                        }]
                });
            });
        </script>
        
    </body>
</html>