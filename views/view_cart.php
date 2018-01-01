<?php session_start();
	include "../controllers/view_cart_function.php"; 

	if(isset($_SESSION['name'])||isset($_COOKIE['user_name'])){

		$query = "SELECT * FROM cart;";
		$result = $conn->query($query);

		$query2 = "SELECT * FROM products;";
    $result2 = $conn->query($query2);
    
    $query3 = "SELECT * FROM transactions WHERE transaction_id = LAST_INSERT_ID() ;";
    $result3 = $conn->query($query3);
    $row3 = $result3->fetch_array();
    $receipt_num = $row3['transaction_id'] + 1; 

		$items = 0;
		$total = 0;
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
            <input type="submit" class="" name="logout" value="Logout(<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; } else { echo $_COOKIE['user_name']; } ?>)">
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

          <li class="active">
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
        
          <li class="sub-menu">
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
		  <h3 class="page-header"><i class="icon_genius"></i> Cashiering</h3>
		  <ol class="breadcrumb">
			<li><i class="icon_genius"></i><a href="view_cart.php">Cashiering</a></li>
			<li><a href="view_cart.php"> <i class="fa fa-list"></i> Show Cart</a></li>        
		  </ol>
		</div>
	  </div>

	  <div class="row">
		<div class="col-lg-12">
		  <section class="panel">


	<div class="container">
	<?php if ($result->num_rows>0) { ?>
		<form action="<?php $_PHP_SELF; ?>" method="POST">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Product #</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Amount</th>
					</tr>
				</thead>
				
				<tbody>
					<?php while($row=$result->fetch_array()){ ?>
						<tr>
							<td><?php echo $row['0']; ?></td>
							<td><?php echo $row['1']; ?></td>
							<td><?php echo "Php ".$row['2']; ?></td>
							<td><?php echo $row['4']; ?></td>
							<td><?php echo "Php ".$row['5']; ?></td>
						</tr>
						
					<?php 
								$temp_items = $row['4'];
								$temp_total = $row['5'];
								$items = $items + $temp_items;
								$total = $total + $temp_total;
							} 
					?>
				</tbody>
			</table>
			<table>
						<tr>
							<td>Items:</td>
							<td><input type="number" name="items" value="<?php echo $items; ?>" readonly/></td>
						</tr>
						<tr>
							<td>Total: (Php)</td>
							<td><input type="number" name="total" value="<?php echo $total; ?>" readonly/></td>
						</tr>
						<tr>
							<td>Customer:</td>
							<td><input type="text" name="customer"/></td>
						</tr>
						<tr>
							<td>Payment: (Php)</td>
							<td><input type="number" name="payment" min="<?php echo $total; ?>" /></td>
						</tr>	
						<tr>
							<td><input type="submit" name="void" value="Cancel Purchase" /></td>
							<td><input type="submit" name="enter" value="Enter" /></td>
						</tr>	
			</table>
		</form>
	</div>
	<div class="container">

	<?php if(isset($_POST['enter'])&&$_POST['payment']>=1){ 

	
			$customer = mysqli_real_escape_string($conn, $_POST['customer']);
			$payment = mysqli_real_escape_string($conn, $_POST['payment']);
			$total_purchase = mysqli_real_escape_string($conn, $_POST['total']);
			$change = $payment - $total_purchase;
			?>
		
		<form action="<?php $_PHP_SELF; ?>" method="POST">
			<table>
				<tr>
					<td>Customer Name: </td>
					<td><input type="text" name="customer_name" value="<?php if(isset($customer)){ echo $customer;} else { echo "N/A"; } ?>" readonly/></td>
				</tr>
				<tr>
					<td>Amount Paid: (Php)</td>
					<td><input type="number" name="change" value="<?php echo $payment; ?>" readonly/></td>
				</tr>
				<tr>
					<td>Change: (Php)</td>
					<td><input type="number" name="change" value="<?php echo $change; ?>" readonly/></td><br>
				</tr>
				<tr>
					<td><input type="submit" name="done" value="Print Receipt" onclick="openPrintDialogue()" /></td>
				</tr>
			</table>
		</form>
		
	<?php	
		} else {
			echo "<br><h4><strong>Please enter payment.</strong></h4><br><br>";
		}
	} else { ?>
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Product #</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><h4>------------------</h4></td>
				<td><h4>------------------</h4></td>
				<td><h4>------------------</h4></td>
				<td><h4>------------------</h4></td>
				<td><h4>------------------</h4></td>
			</tr>
		</tbody>
		</table>
	<?php echo "<h3><br>No products added to the cart yet.</h3><br>"; } ?>
	</div><br>

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
          function openPrintDialogue(){
        $('<iframe>', {
          name: 'myiframe',
          class: 'printFrame'
        })
        .appendTo('body')
        .contents().find('body')
        .append(`
          <center>
          <h1>Shoe Glamour Store</h1>
          <p>33-1 Gempesaw St., Uyanguren Brgy. 28-C Poblacion District Davao City</p>
          <p>Cherry Ann O. Codilla - Prop.</p>
          <p>Non Vat Reg; TIN 940-163-569-000</P>
          <h4>Cash Invoice <?php echo "                 "; ?> No. <?php echo $receipt_num; ?></h4>
          <p>Sold to:<u>&nbsp<?php echo $customer; ?></u>&nbsp&nbsp&nbsp&nbsp&nbspDate/Time <?php echo $row3['timestamp']; ?> </p>
          <p>TIN__________________  OSCA/PWD ID NO.___</p>
          <p>Address________________ Cardholder's Sig._____</p>
          <p>Business Style______________________________</p>
          <table border="1px">
            <thead>
              <tr>
                <th>Qty.</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row3['items']; ?></td>
                <td><?php echo $row3['products']; ?></td>
                <td><?php echo $row3['price']; ?></td>
                <td><?php echo $row3['total_amount']; ?></td>
              </tr>
                <tr><td>&nbsp</td><td></td><td></td><td></td></tr>
                <tr><td>&nbsp</td><td></td><td></td><td></td></tr>
                <tr><td>&nbsp</td><td></td><td></td><td></td></tr>
              <tr>
                <td></td>
                <td></td>
                <td><strong>Total Amount Due</strong></td>
                <td><strong><?php echo 'Php' . $total; ?></strong></td>
              </tr>
            </tbody>
          </table>
          <p></p>
          <br><br>
          <?php echo $_SESSION['full_name']; ?><br>
          ___________________________
          <p>Cashier/Authorized Representative</center></p><br><br>
          <center><p><u>THIS DOCUMENT IS NOT VALID FOR CLAIMING INPUT TAXES</u></p></center>
        `);

        window.frames['myiframe'].focus();
        window.frames['myiframe'].print();

        setTimeout(() => { $(".printFrame").remove(); }, 1000);
      };

      $('button').on('click', openPrintDialogue);
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