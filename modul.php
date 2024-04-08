<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5"> <!-- Page refresh every 5 seconds -->
    <title>Gauge Chart Sensor Jarak 1</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>




<body>


<?php


include 'koneksi.php';




$sql = "SELECT nilai FROM tampung_data_device WHERE nama_alat='sensor_jarak1' ORDER BY id DESC LIMIT 1";
$result = $koneksi->query($sql);


$nilai = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nilai = $row['nilai'];
}


$koneksi->close();


?>


<script type="text/javascript">
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Sensor Jarak 1', <?php echo $nilai; ?>]
        ]);


        var options = {
            width: 800, height: 240,
            redFrom: 90, redTo: 100,
            yellowFrom:75, yellowTo: 90,
            minorTicks: 5
        };


        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));


        chart.draw(data, options);
    }
</script>


<div id="chart_div" style="width: 400px; height: 120px;"></div>


</body>
</html>
