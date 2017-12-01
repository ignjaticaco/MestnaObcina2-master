<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
            <?php session_start(); ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Estate &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
            <?php
            require 'db.php';
            $velikostod = (!empty($_GET['velikostod']) ? $_GET['velikostod'] : null);
            $velikostdo = (!empty($_GET['velikostdo']) ? $_GET['velikostdo'] : null);
            $lokacija = (!empty($_GET['lokacija']) ? $_GET['lokacija'] : null);
            $najemninaod = (!empty($_GET['najemninaod']) ? $_GET['najemninaod'] : null);
            $najemninado = (!empty($_GET['najemninado']) ? $_GET['najemninado'] : null);
            if(!empty($velikostod) && !empty($velikostdo) && !empty($lokacija) && !empty($najemninaod) && !empty($najemninado))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE lokacija=$lokacija AND velikost BETWEEN $velikostod AND $velikostdo AND najemnina BETWEEN $najemninaod AND $najemninado;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($velikostod) && !empty($velikostdo) && !empty($lokacija))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE lokacija=$lokacija AND velikost BETWEEN $velikostod AND $velikostdo;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($lokacija) && !empty($najemninaod) && !empty($najemninado))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE lokacija=$lokacija AND najemnina BETWEEN $najemninaod AND $najemninado;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($velikostod) && !empty($velikostdo) && !empty($najemninaod) && !empty($najemninado))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE velikost BETWEEN $velikostod AND $velikostdo AND najemnina BETWEEN $najemninaod AND $najemninado;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($lokacija))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE lokacija=$lokacija;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($velikostod) && !empty($velikostdo))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE velikost BETWEEN $velikostod AND $velikostdo;";
                $result = mysqli_query($conn, $query);
            }
            else if(!empty($najemninaod) && !empty($najemninado))
            {
                $query = "SELECT * FROM poslovni_prostori WHERE najemnina BETWEEN $najemninaod AND $najemninado;";
                $result = mysqli_query($conn, $query);
            }
            else
            {
                $sql = "SELECT * FROM poslovni_prostori ";
                $result = $conn->query($sql);
            }
            ?>
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="header-inner">
					<h1><a href="index.php">MOV<span>.</span></a></h1>
					<nav role="navigation">
						<ul>
							<li class="call"><a href="tel://038961600"><i class="icon-phone"></i> 03 8961 600</a></li>
							<li class="cta"><a href="contact.php">Kontaktiraj Nas</a></li>
                                                        <?php
                                                        if(isset($_SESSION['id']))
                                                        {
                                                            echo '<li class="cta"><a href="odjava.php">Odjavi Se</a></li>';
                                                        }
                                                        else
                                                        {
                                                            echo '<li class="cta"><a href="login.php">Prijavi Se</a></li>';
                                                        }
                                                        if(isset($_SESSION['id']))
                                                        {
                                                            echo '<li class="cta"><a href="dodajanjeprostora.php">Dodaj Prostor</a></li>';
                                                        }
                                                        ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<div class="fh5co-page-title" style="background-image: url(images/slide_6.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h1><span class="colored">Najemi</span> Poslovni Prostor</h1>
				</div>
			</div>
		</div>
	</div>
	<div id="best-deal">
		<div class="container">
                    <div id="indeks">
                           <div id="tretina">
            <form action="index.php" method="get" style="margin-bottom: 5px;">
                <div class="text2">Velikost<br>
                         od:</div><div class="box2"><input type="text" name="velikostod"></div>
                    <div class="text2">do:</div><div class="box2"><input type="text" name="velikostdo"></div>
                            </div><div id="tretina">
                <div class="text2">Lokacija</div>
                <div class="box2"><select name="lokacija">
                    <?php
                        session_start();
                        require 'db.php';
                        mysqli_query($conn, "SET NAMES 'utf8'");
                        $query = "SELECT lokacija FROM poslovni_prostori";
                        $result2 = mysqli_query($conn, $query);
                        while($row2 = mysqli_fetch_array($result2))
                        {
                            echo '<option value="'. $row2['lokacija'] .'">' .$row2['lokacija']. '</option>';
                        }
                    ?>
                        
                    </select></div>
                <div class ="text3" id="xls"><a href ="izvozPodatkov.php"> Izvozi csv vseh prostorov</a></div>	
                            </div><div id="tretina">
                <div class="text2">Najemnina
                    od:</div><div class="box2"><input type="text" name="najemninaod"></div>
                    <div class="text2">do:</div><div class="box2"><input type="text" name="najemninado"></div>
                    <div id="submit" class="barva"><input type="submit" value="Submit"></div>
                            </form>
                                </div>
                            <div></div>
                            <?php while($row = $result->fetch_assoc()) { 
                ?>
				<div <?php echo "'".$row['id']."'";?> class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-property">
						<figure>
							<img src="<?php echo $row['slika']; ?>" alt="Slika" class="img-responsive">
                                                        <a href="posamezni_prostor.php?id=<?php echo $row['id'];?>" class="tag">For Rent</a>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#"><?php echo $row['lokacija']; ?></a></h3>
							<div class="price-status">
		                 	<span class="price"><?php echo $row['najemnina']; ?><span class="per">/Month</span></span>
		               </div>                 
		               <p><?php echo $row['opis']; ?></p>
	            	</div>
	            	<p class="fh5co-property-specification">
                            <span><strong><?php echo $row['velikost']; ?></strong> Sq Ft</span>
                            <span><strong><?php if ($row['prosto'] == 0){     echo 'Ni Prosto';}else{    echo 'Je Prosto';} ?> </strong></span> 
                            <?php if ($row['prosto'] == 0){echo'
                            <span><strong><a href = "http://localhost/MestnaObcina/povprasevanje.php/?id='.$row["id"].'">Pošlji Povpraševanje</a></strong></span>';}?>
	            	</p>
					</div>
				</div>
 <?php }?>

	
	
	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>About Us</h3>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				<p><a href="#" class="btn btn-primary btn-outline with-arrow btn-sm">I'm button <i class="icon-arrow-right"></i></a></p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Services</h3>
				<ul class="float">
					<li><a href="#">Web Design</a></li>
					<li><a href="#">Branding &amp; Identity</a></li>
					<li><a href="#">Free HTML5</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>
				<ul class="float">
					<li><a href="#">Free Bootstrap Template</a></li>
					<li><a href="#">Free HTML5 Template</a></li>
					<li><a href="#">Free HTML5 &amp; CSS3 Template</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Follow Us</h3>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-google-plus"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2016 Free HTML5 template. All Rights Reserved. <span>Designed with <i class="icon-heart"></i> by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images by <a href="http://unsplash.com/" target="_blank">Unsplash</a></span></p>	
			</div>
			
		</div>
	</footer>
	</div>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>
