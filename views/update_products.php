<?php session_start();
    include "../controllers/update_products_function.php"; 
    
    if(isset($_SESSION['name'])&&$_SESSION['usertype']=="admin"){
    ?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>Shoe Glamour PoS</title>
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/xcharts.min.css" rel=" stylesheet">
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    </head>

    <body>
    <!-- container section start -->
  <section id="container" class="">
  
  
      <header class="header dark-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>
  
        <!--logo start-->
        <a href="index.php" class="logo">SHOE <span class="lite">GLAMOUR</span></a>
        <!--logo end-->
  
  
        <div class="top-nav notification-row">
        <form action="login.php" method="POST">
            <input type="submit" class="" name="logout" value="Logout(<?php echo $_SESSION['name']; ?>)">
        </form>  
        </div>
          
      </header>
      <!--header end-->
  
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">

          <div class="container" style="color:gray;background-color:white">
            <h4 id="date_time"></h4>
          </div>
          
          <li class="sub-menu">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
          </li>

          <li class="sub-menu">
          <a href="#;" class="">
                        <i class="fa fa-desktop"></i>
                        <span>Cashiering</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
        <ul class="sub">
          <li><a class="" href="add_to_cart.php"> <i class="fa fa-plus"> </i> Add to Cart</a></li>
          <li><a class="" href="view_cart.php"> <i class="fa fa-list"> </i> Show Cart</a></li>
          <li><a class="" href="change_quantity.php"> <i class="fa fa-pencil-square-o"> </i> Change Quantity</a></li>
          <li><a class="" href="delete_from_cart.php"> <i class="fa fa-pencil-square-o"> </i> Remove Purchase </a></li>
        </ul>
        </li>
        
          <li class="active">
            <a href="#;" class="">
                          <i class="icon_genius"></i>
                          <span>Inventory</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="view_products.php"> <i class="fa fa-list"> </i> List of Products</a></li>

              <?php if($_SESSION['usertype']=="admin"){ ?>
              <li><a class="" href="add_products.php"> <i class="fa fa-plus"> </i> Add New Product</a></li>
              <li><a class="" href="update_products.php"> <i class="fa fa-pencil-square-o"> </i> Change Details</a></li>
              <?php } ?>
            </ul>
          </li>

          <li class="sub-menu">
          <a href="#;" class="">
          <i class="fa fa-th"></i>
                        <span>Categories</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
          <ul class="sub">
            <li><a class="" href="view_categories.php"> <i class="fa fa-list"> </i> List of Category</a></li>

            <?php if($_SESSION['usertype']=="admin"){ ?>
            <li><a class="" href="add_category.php"> <i class="fa fa-plus"> </i> Add New Category</a></li>
            <li><a class="" href="update_categories.php"> <i class="fa fa-pencil-square-o"> </i> Change Details</a></li>
            <?php } ?>
          </ul>
        </li>

           <li class="sub-menu">
            <a href="#;" class="">
                          <i class="fa fa-users"></i>
                          <span>Accounts</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="view_accounts.php"> <i class="fa fa-list"></i> List of Accounts</a></li>

              <?php if($_SESSION['usertype']=="admin"){ ?>
              <li><a class="" href="add_accounts.php"> <i class="fa fa-plus"></i> Add New Account</a></li>
              <li><a class="" href="update_accounts.php"> <i class="fa fa-pencil-square-o"></i> Change Details</a></li>
              <?php } ?>
            </ul>
          </li>

           <li class="sub-menu">
            <a href="view_transactions.php" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Sales</span>
                      </a>
          </li>
  
          <!--<li class="sub-menu">
            <a href="developers.php" class="devBtn">
            <i class="fa fa-android"> </i>    
                     <span>Developers</span>
                      </a>
          </li>-->


        </ul>
        <!-- sidebar menu end-->
          
        </div>
      </aside>
      <!--sidebar end-->
  
      <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-users"></i> Inventory</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-uers"></i><a href="view_products.php">Inventory</a></li>
              <li><a href="update_products.php"> <i class="fa fa-plus"></i> Change Product details</a></li>        
            </ol>
          </div>
        </div>

    <div class="row">
    <div class="col-lg-12">
            <section class="panel">  

            <br>
            <div class="container">
            <form action="<?php $_PHP_SELF; ?>" method="POST">
                    <label for="product_name">Product Name</label><br>
                        <input type="text" name="product_name" class="product_name" required />

                        <input type="submit" name="submit" value="Search" />
            
            </form>
    </div><br>
    <div class="container">
<?php
    if(isset($_POST['submit'])){
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);

    $query = "SELECT * FROM products WHERE product_name = '$product_name';";
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $var = $row['1'];

    $query2 = "SELECT * FROM categories";
    $result2 = $conn->query($query2);

    $query3 = "SELECT * FROM categories WHERE category_number = '$var';";
    $result3 = $conn->query($query3);
    $row3 = $result3->fetch_array();
        
    if ($result->num_rows>0&&$result2->num_rows>0) {
?>
    
        <form action="<?php $_PHP_SELF; ?>" method="POST">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Product Number</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Add Stock</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            <tr>
                                <td><input type="text" name="product_number" size="15" value="<?php echo $row['0']; ?>" readonly/></td>
                                <td><input type="text" name="product_name" size="15" value="<?php echo $row['2']; ?>" required/></td>
                                <td><input type="number" name="product_price" value="<?php echo $row['5']; ?>" required/></td>
                                <td><input type="text" name="description" size="15" value="<?php echo $row['3']; ?>" required/></td>
                                <td><input type="number" name="add_product_stock" min="1" placeholder="Current: <?php echo $row['4']; ?>" /></td>
                                <td><select id="category" name="category" required>
                                        <option value="<?php echo $row3['0']; ?>" name="<?php echo $row3['0']; ?>"> <?php echo $row3['1']; ?> </option>

                                            <?php while($row2=$result2->fetch_array()){ ?>
                                                <?php if($row2['0']!=$row['1']){ ?>
                                                    <option value="<?php echo $row2['0']; ?>" name="<?php echo $row2['0']; ?>"> <?php echo $row2['1']; ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                    </select></td>
                            </tr>
                        </tbody>
                    </table>

                    <input type="submit" name="submit2" value="Change">
                    <a href="view_products.php">Cancel</a>
        </form><br>
                                                  
                        <?php 
                    } else {
                         echo "No such product exists.";   
                        }
                    } ?>
    </div>


    </div>
    </div>
    </section>
</div>
</section>
<div class="text-right">
<div class="credits">
<!--
  All the links in the footer should remain intact.
  You can delete the links only if you purchased the pro version.
  Licensing information: https://bootstrapmade.com/license/
  Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
-->
<!-- <a href="#">Free Bootstrap Templates</a> by <a href="#">BootstrapMade</a> -->
</div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

                    
    <?php
        } else {
            header('location:login.php');   
        }?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script type="text/javascript">
        $(function() {
            
            //autocomplete
            $(".product_name").autocomplete({
                source: "product_search.php",
                minLength: 1
            });                

        });
        </script>
         <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
    <script>
      function date_time(id)
      {
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu' , 'Fri', 'Sat');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+months[month]+'-'+d+'-'+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
    }
    </script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>   
    </body>
</html>