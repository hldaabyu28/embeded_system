<!DOCTYPE html>

<html
  lang="en">
  
<head>
  <meta charset="utf-8" /><meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Vokasi IoT</title>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
              <span class="app-brand-text demo menu-text fw-bold ms-2">Vokasi IoT</span>
          </div>
          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <li class="menu-item">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
              </a>
            </li>
            <li class="menu-item">
              <a href="device.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Device">Device</div>
               
              </a>
            </li>
            <li class="menu-item">
              <a href="user.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="User">User</div>
              </a>
            </li>
          </ul>
          </form>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/7.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/7.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"></span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="login.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

         

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                
                <!-- Total Revenue -->
                 <!-- Expense Overview -->
                 <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card h-100">
                  <div class="card-header">
                  <ul class="nav nav-pills" role="tablist">
                                        
                  </ul>
                </div>
                <div class="card-body px-20">
                <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div class="d-flex p-4 pt-4">
                <div class="card-title mb-0">
                <h5 class="m-0 me-2">Grafik Jarak</h5>
                <canvas id="grafikData"></canvas>
                <?php
                include('koneksi.php');
                                              
                                              $query = "SELECT nama_alat, nilai FROM tampung_data_device";
                                              $result = $koneksi->query($query);
                                              
                                              $data = array();
                                              foreach ($result as $row) {
                                                  $data[] = $row;
                                              }
                                              
                                              $koneksi->close();
                                              
                                              // Mengonversi data ke format JSON
                                              $jsonData = json_encode($data);
                                              ?>
                                              
                                              <script>
                                                  var data = <?php echo $jsonData; ?>;
                                              
                                                  var labels = data.map(function(e) {
                                                      return e.nama_alat;
                                                  });
                                                  var nilai = data.map(function(e) {
                                                      return e.nilai;
                                                  });
                                              
                                                  var ctx = document.getElementById('grafikData').getContext('2d');
                                                  var myChart = new Chart(ctx, {
                                                      type: 'line', // Ganti jenis grafik sesuai kebutuhan (bar, line, pie, dll.)
                                                      data: {
                                                          labels: labels,
                                                          datasets: [{
                                                              label: 'Nilai',
                                                              data: nilai,
                                                              backgroundColor: 'rgba(0, 123, 255, 0.5)',
                                                              borderColor: 'rgba(0, 123, 255, 1)',
                                                              borderWidth: 2
                                                          }]
                                                      },
                                                      options: {
                                                          scales: {
                                                              y: {
                                                                  beginAtZero: true
                                                              }
                                                          }
                                                      }
                                                  });
                                                  
                                              </script>
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-10">
                        <div class="card-body">
                          <h5 class="card-header m-0 me-2 pb-3">Kelembaban</h5>
                          <!DOCTYPE html>
                        <html lang="en">
                        <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <meta http-equiv="refresh" content="5"> <!-- Page refresh every 5 seconds -->
                          <title>Gauge Chart Sensor Kelembaban</title>
                          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        </head>
                        <body>
                          <?php
                            include 'koneksi.php';
                            $sql = "SELECT nilai FROM tampung_data_device WHERE nama_alat='sensor_jarak1' ORDER BY id DESC LIMIT 1";$result = $koneksi->query($sql);
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
                              ['Kelembaban', <?php echo $nilai; ?>]
                            ]);
                            var options = {
                              width: 800, height: 190,
                              redFrom: 90, redTo: 100,
                              yellowFrom:75, yellowTo: 90,
                              minorTicks: 5
                            };
                            var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
                            chart.draw(data, options);
                            }
                            </script>
                            <div id="chart_div" style="width: 400px; height: 120px;" class="text-center fw-medium pt-3 mb-2"></div>
                          </body>
                          </html>
                        </div> 
                        </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-10">
                        <div class="card-body">
                          <h5 class="card-header m-0 me-2 pb-4">Suhu</h5>
                          <!DOCTYPE html>
                        <html lang="en">
                        <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1.0">
                          <meta http-equiv="refresh" content="5"> <!-- Page refresh every 5 seconds -->
                          <title>Gauge Chart Sensor Suhu</title>
                          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        </head>
                        <body>
                          <?php
                            include 'koneksi.php';
                            $sql = "SELECT nilai FROM tampung_data_device WHERE nama_alat='sensor_jarak1' ORDER BY id DESC LIMIT 1";$result = $koneksi->query($sql);
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
                              ['Kelembaban', <?php echo $nilai; ?>]
                            ]);
                            var options = {
                              width: 800, height: 190,
                              redFrom: 90, redTo: 100,
                              yellowFrom:75, yellowTo: 90,
                              minorTicks: 5
                            };
                            var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
                            chart.draw(data, options);
                            }
                            </script>
                            <div id="chart_div" style="width: 400px; height: 120px;" class="text-center fw-medium pt-3 mb-2"></div>
                          </body>
                          </html>
                        </div> 
                        </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
            <div class="content-backdrop fade"></div>
          </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    

    
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
