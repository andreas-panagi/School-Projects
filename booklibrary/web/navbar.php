<?php
//make the hashed password

?>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="btm_border">
<div class="h_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
		</div>
		<div class="social-icons">
			<ul>
			     <li><a class="facebook" href="#" target="_blank"> </a></li>
			     <li><a class="twitter" href="#" target="_blank"></a></li>
			     <li><a class="googleplus" href="#" target="_blank"></a></li>
			     <li><a class="pinterest" href="#" target="_blank"></a></li>
			     <li><a class="dribbble" href="#" target="_blank"></a></li>
			     <li><a class="vimeo" href="#" target="_blank"></a></li>
		   </ul>
		</div>	
		<div class="clear"></div>
	</div>
<div class='h_btm'>
		<div class='cssmenu'>
			<ul>
			    <li><a href='index.php'><span>Home</span></a></li>
			    <li><a href='about.php'><span>About</span></a></li>
			    <li><a href='staff.php'><span>Staff</span></a></li>
			    <li class='has-sub'><a href='service.php'><span>Services</span></a></li>
					<li class='has-sub'><a href='contact.php'><span>Contact</span></a></li>
					<?php if( isset($_SESSION['login_user']) && !empty($_SESSION['login_user']) ) 
					{ //to check if the user is logged in and show log out or log in options
					?>
					<li class='last'><a href='logout.php'><span>Log Out</span></a></li>
					<?php }else{ ?>
					<li class='last'><a href='login.php'><span>Log In</span></a></li>
					<?php } ?>
					<?php
						if ($_SESSION['login_user'] == 'admin') {
					?>
					<li class='last'><a href='admin.php'><span>Students</span></a></li>
					<?php	
						} else if (!empty($_SESSION['login_user']) && ($_SESSION['login_user'] !== 'admin')){
					?>
							<li class='last'><a href='borrowed.php'><span>My Books</span></a></li>
					<?php	
						}
					?>

			 	<div class="clear"></div>
			 </ul>
	</div>
	<div class="search">
    	<form action="search.php" method="GET">
    		<input type="text" name="query">
    		<input type="submit" value="">
    	</form>
	</div>
    <div class="clear"></div>
</div>
</div>
</div>
</div>
 </body>

  