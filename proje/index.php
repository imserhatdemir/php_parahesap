<?php 
require_once 'header.php';
require_once 'sidebar.php'

?>




<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  
  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Günlük Cari Rapor </h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">



              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> <?php 
                    $sql=$db->qSQL("SELECT SUM(products_price) as sales_total FROM sales INNER JOIN products ON products.products_id=sales.products_id WHERE DAY(sales_date)=DAY(CURDATE())");
                    $sales_total=$sql->fetch(PDO::FETCH_ASSOC);
                    echo number_format($sales_total=$sales_total['sales_total']);
                    ?> ₺/$</h3>

                    <p>Toplam Satış</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->


              <!-- ./col -->
          
              <!-- ./col -->

               <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3>  <?php 
                      $sql=$db->qSQL("SELECT SUM(operation_price) as revenue FROM operation  WHERE operation.operation_type='Gider' AND DAY(operation_date)=DAY(CURDATE()) ");
                       $revenue=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($revenue=$revenue['revenue']);
                      ?> ₺/$</h3>

                    <p>Toplam Gider</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->

                  <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner">
                    <h3>  <?php 
                      $sql=$db->qSQL("
                        SELECT SUM(
                        CASE WHEN operation_type='Gelir' THEN operation_price ELSE 0 END
                        )-SUM(
                        CASE WHEN operation_type='Gider' THEN operation_price ELSE 0 END
                        ) as safe FROM operation WHERE DAY(operation_date)=DAY(CURDATE()) 
                        ");
                       $rows=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($rows['safe']);
                      ?> ₺/$</h3>

                    <p>Kasa</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->




            </div>
          </div>
          <!-- /.box-body -->
       <!--  <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Genel Cari Rapor </h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">



              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> <?php 
                    $sql=$db->qSQL("SELECT SUM(products_price) as sales_total FROM sales INNER JOIN products ON products.products_id=sales.products_id");
                    $sales_total=$sql->fetch(PDO::FETCH_ASSOC);
                    echo number_format($sales_total=$sales_total['sales_total']);
                    ?> ₺/$</h3>

                    <p>Toplam Satış</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->


           
              <!-- ./col -->

               <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3>  <?php 
                      $sql=$db->qSQL("SELECT SUM(operation_price) as revenue FROM operation  WHERE operation.operation_type='Gider' ");
                       $revenue=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($revenue=$revenue['revenue']);
                      ?> ₺/$</h3>

                    <p>Toplam Gider</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->

                  <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner">
                    <h3>  <?php 
                      $sql=$db->qSQL("
                        SELECT SUM(
                        CASE WHEN operation_type='Gelir' THEN operation_price ELSE 0 END
                        )-SUM(
                        CASE WHEN operation_type='Gider' THEN operation_price ELSE 0 END
                        ) as safe FROM operation
                        ");
                       $rows=$sql->fetch(PDO::FETCH_ASSOC);
                       echo number_format($rows['safe']);
                      ?> ₺/$</h3>

                    <p>Kasa</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->




            </div>
          </div>
          <!-- /.box-body -->
       <!--  <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    <?php 
$db= new PDO("mysql:host=localhost;dbname=yeni;charset=utf8;","root","");
$qquery = $db->query("select*from operation ");


?>

<html>
<center>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
         <?php 
            foreach ($qquery as $row){
                echo "['".$row["operation_description"]."',".$row["operation_price"]."],";
            }
            
            
            ?>
        ]);

        // Set chart options
        var options = {'title':'Harcama Oranları',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
  </center>
</html>
  </div>
  <!-- /.content-wrapper -->
  

  <?php require_once 'footer.php'; ?>