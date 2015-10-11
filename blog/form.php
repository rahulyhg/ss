<?php require'includes/connect.php' ?><?php require'includes/admin.php' ?>
<?php
session_start();
if(!isset($_SESSION['email'])){
	
	header("location:index.php");
}
else{

//echo"$_SESSION['uname']";
?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<!--style sheet for header-->
		<link href="css/theme.css" rel="stylesheet" />	
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
	  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
			  		Edmin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>
								
								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
															</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="index.php">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon icon-bullhorn"></i>
									News Feed
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon icon-inbox"></i>
									Inbox
									<b class="label green pull-right">11</b>
								</a>
							</li>
							
							<li>
								<a href="#">
									<i class="menu-icon icon-tasks"></i>
									Tasks
									<b class="label orange pull-right">19</b>
								</a>
							</li>
						</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
                                <li><a href="#"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                <li><a href="#"><i class="menu-icon icon-book"></i>Typography </a></li>
                                <li><a href="form.php"><i class="menu-icon icon-paste"></i>Add Post </a></li>
                                <li><a href="table.php"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="#"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="#">
											<i class="icon-inbox"></i>
											Login
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon-inbox"></i>
											Profile
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="includes/logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->

				
				
				
				
				

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Post</h3>
							</div>
							<div class="module-body">							
	
<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		
		if($postKey ==''){
			$error[] = 'Please enter the content.';
		}
				if($postImg ==''){			$error[] = 'Please enter the content.';		}

		
		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){


		$title=$_POST['postTitle'];
		$permalink=$_POST['permaLink'];				$keyword=$_POST['postKey'];		
		$img=$_POST['postImg'];
		$desc=$_POST['postDesc'];
		$count=$_POST['postCont'];				$dat=date('Y-m-d H:i:s');		$getid=new admin;				$aid=$getid->getuserid($_SESSION['email']);


				//insert into database
//$qry='INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate`) VALUES ('','$_POST['postTitle']','$_POST['postKey']','$_POST['postImg']','$_POST['postDesc']','$_POST['postCont']','date('Y-m-d H:i:s')')' ;
//$qry="INSERT INTO `naipathya_blog_posts`(`id`, `postTitle`, `postKey`, `postImg`, `postDesc`, `postCont`, `postDate` , `postAuthor` , `status`) VALUES ('','$title','$keyword','$img','$desc','$count','$dat','$postAuthor','active')";		$qry="INSERT INTO `ss_post`(`pid`, `title`, `permalink`, `keywords`, `img`, `sdesc`, `ldesc`, `aid`, `status`, `date_posted`) VALUES ('','$title','$permalink','$keyword','$img','$desc','$count','$aid','active','$dat')";
			$var=mysql_query($qry);
			if($var>0){
				
			echo"<script>alert('Post Added Successfully')</script>";	
			header("location:welcome.php");			
			}
			else{
					echo"<script>alert('Please Retry')</script>";				
			}
		}

	}
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo'<div class="alert">								
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Warning!</strong> '.$error.'
				</div>';
			
		}
	}
	?>


	
							<br />
	
	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' <?php echo isset($_POST['postTitle']) ? 'value="'.$_POST['postTitle'].'"' : '' ?> class="span8"></p>
		<p><label>Permalink</label><br />		<input type='text' name='permaLink' <?php echo isset($_POST['permaLink']) ? 'value="'.$_POST['permaLink'].'"' : '' ?> class="span8"></p>		
		<p><label>keyword</label><br />
		<input type='text' name='postKey' <?php echo isset($_POST['postKey']) ? 'value="'.$_POST['postKey'].'"' : '' ?> class="span8"></p>		<p><label>Image For Preview</label><br />		<input type='text' name='postImg' <?php echo isset($_POST['postImg']) ? 'value="'.$_POST['postImg'].'"' : '' ?> class="span8" ></p>
	
		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo isset($_POST['postDesc']) ? ''.$_POST['postDesc'].'' : '' ?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo isset($_POST['postCont']) ? ''.$_POST['postCont'].'' : '' ?></textarea></p>
	
		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	
	
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 
			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>

<?php
} 
?>		