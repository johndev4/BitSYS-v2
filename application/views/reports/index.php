<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $page_title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Reports</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- Small cardes (Stat card) -->
    <div class="row">

      <div class="col-md-12 col-xs-12">
        <form class="form-inline" action="<?php echo base_url('reports/') ?>" method="POST">
          <div class="form-group">
            <label for="date">Year</label>
            <select class="form-control" name="select_year" id="select_year">
              <?php foreach ($report_years as $key => $value) : ?>
                <option value="<?php echo $value ?>" <?php if ($value == $selected_year) {
                                                        echo 'selected="selected"';
                                                      } ?>>
                  <?php echo $value; ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>

      <br /> <br />


      <div class="col-md-12 col-xs-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sales Graph</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="height:250px"></canvas> <!-- Canvas -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Total Paid Orders - Report Data</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatables" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Month - Year</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($results as $k => $v) : ?>
                  <tr>
                    <td><?php echo $k; ?></td>
                    <td><?php

                        echo $company_currency . ' ' . $v;
                        //echo $v;

                        ?></td>
                  </tr>
                <?php endforeach ?>

              </tbody>
              <tbody>
                <tr>
                  <th>Total Amount</th>
                  <th>
                    <?php //echo $company_currency . ' ' . array_sum($parking_data); 
                    ?>
                    <?php echo array_sum($results); ?>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#reportNav > a").addClass('active');
  });

  var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;


  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: report_data
      }]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>