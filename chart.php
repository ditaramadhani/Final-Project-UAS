<?php
  $conn = mysqli_connect("localhost","root","","epemira");
  $data = mysqli_query($conn, "SELECT id_calon as calon,count(*) as 'jumlah pemilih' FROM `tb_vote` GROUP BY id_calon");
  $count = 0;
  while($row = mysqli_fetch_assoc($data)){
    $data_chart['nama'][$count] = "Calon ".$row['calon'];
    $data_chart['jumlah'][$count] = $row['jumlah pemilih'];
    $count++;
  }
  echo "<pre>";
  print_r($data_chart);
  echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="chart">
      <canvas id="chart_harga" style="min-height: auto; height: 70vh; max-height: auto; max-width: auto;"></canvas>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" integrity="sha512-CAv0l04Voko2LIdaPmkvGjH3jLsH+pmTXKFoyh5TIimAME93KjejeP9j7wSeSRXqXForv73KUZGJMn8/P98Ifg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(function () {
        var areaChartData = {
          labels  : <?= json_encode($data_chart['nama']) ?>,
          datasets: [
            {
              data: <?= json_encode($data_chart['jumlah']) ?>,
              backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#f56924', '#f56124', '#f51324', '#f32312', '#f56374', '#f56424', '#f51552'],
            }
          ]
        }
        var barChartCanvas = $('#chart_harga').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'pie',
          data: barChartData,
          options: barChartOptions
        })
      });
    </script>
  </body>
</html>
