<?php require'includes/connect.php' ;?><?php //include configsession_start();if(!isset($_SESSION['email'])){		header("location:index.php");}else{//echo"$_SESSION['uname']";?><!DOCTYPE html><html lang="en"><head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>| Document |</title>	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">	<link type="text/css" href="css/theme.css" rel="stylesheet">	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'></head><body>	<div class="navbar navbar-fixed-top">		<div class="navbar-inner">			<div class="container">				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">					<i class="icon-reorder shaded"></i>				</a>			  	<a class="brand" href="index.php">			  	Softwarez Solutions : Admin			  	</a>				<div class="nav-collapse collapse navbar-inverse-collapse">					<ul class="nav pull-right">					<li><a href="#">Logout</a></li>							</ul>						</li>					</ul>				</div><!-- /.nav-collapse -->			</div>		</div><!-- /navbar-inner -->	</div><!-- /navbar -->	<div class="wrapper">		<div class="container">			<div class="row">				<div class="span12">					<div class="content">						<div class="module">							<div class="module-head">								<h3>Tables</h3>							</div>										<div class="module-body">								<p>									<strong>Blogs</strong>									-									<small>you can activate|edit|delete post from here </small>								</p>			<!--table for posts-->												<table class="table">								  <thead>									<tr>									  <th>#</th>									  <th>Title</th>									  <th>Date</th>									  <th>Action</th>									</tr>								  </thead>								  <tbody><script language="JavaScript" type="text/javascript">    function delpost(id, title)  {	  if (confirm("Are you sure you want to delete '" + title + "'"))	  {	  	window.location.href = 'table.php?delpost=' + title;	  }  } </script><?php if(isset($_GET['delpost'])){ 		$id=$_GET['delpost'];	$qry="DELETE FROM `ss_post` WHERE title='$id' " ;	$run1 =mysql_query($qry);	header('Location:table.php?action=deleted');	exit;} ?>								  <?php								  	$query="SELECT * FROM `ss_post` ORDER BY pid DESC LIMIT 25";										$run =mysql_query($query);									while($row=mysql_fetch_array($run)){									$id=$row['pid'];									$title=$row['title'];											$postdate=$row['date_posted'];									echo"									<tr>									<td>$id</td>							            ";									  ?>									  <td><a href='edit-comment.php?edit=<?php echo $row['title'];?>'><?php echo $row['title'];?></a></td>									  <td>$postdate</td>											  <td>										<a href='edit-post.php?edit=<?php echo $row['title'];?>'>Edit</a>  										<?php $_SESSION['pid']=$id; ?>										<a href="javascript:delpost('<?php echo $_SESSION['pid'];?>','<?php echo $row['title'];?>')">Delete</a>									  </td>								<?php								 echo "</tr>";									}		 								  ?>																																			  </tbody>								</table>								<br />								<!-- <hr /> -->								<br />						<!--table for posts-->												<p>									<strong>user form</strong>									-									<small>-Website Response</small>								</p>								<table class="table table-striped">								  <thead>									<tr>									  <th>Name</th>									  <th>Email</th>									  <th>Subject</th>									  <th>problem</th>									  <th>Date</th>									 </tr>								  </thead>								  <tbody>								 <?php								  	$query="SELECT * FROM `ss_usersupport` ORDER BY pid DESC LIMIT 25";										$run =mysql_query($query);									while($row=mysql_fetch_array($run)){									$pid=$row['pid'];									$name=$row['name'];																	    $email=$row['email'];									$date=$row['dategen'];																		$sub=$row['sub'];																		$desc=$row['desc'];																		$attach=$row['attach'];																																			  ?>									  <tr>									  <td><?php echo $name; ?></td>									  <td><?php echo $email; ?></td>									  <td><a href='ticket-solution.php?edit=<?php echo $row['pid'];?>'><?php echo $row['sub'];?></a></td>                                        <td><?php echo $desc; ?></td>									  <td><?php echo $date; ?></td>								<?php								 echo "</tr>";									}		 								  ?>								 								  </tbody>								</table>								<br />								<!-- <hr /> -->								<br />								<p>									<strong>Contact Us Form Data</strong>									-									<small>-Website Response</small>								</p>								<table class="table table-striped">								  <thead>									<tr>									  <th>Name</th>									  <th>Mobile</th>									  <th>Email</th>									  <th>Message</th>									  <th>Date</th>									 </tr>								  </thead>								  <tbody>								 			 <?php								  	$query="SELECT * FROM `contactus` ORDER BY id DESC LIMIT 25";										$run =mysql_query($query);									while($row=mysql_fetch_array($run)){									$name=$row['name'];									$mail=$row['email'];											$mobile=$row['mobile'];									$msg=$row['message'];									$date_time=$row['date_time'];									echo"									<tr>									<td>$name</td>									  <td>$mail</td>									  <td>$mobile</td> 									  <td>$msg</td>									  <td>$date_time</td>";									  								 echo "</tr>";									}		 								?>					 								 								  </tbody>								</table>								<br />								<!-- <hr /> -->								<br />								<p>									<strong>Leave Us a message</strong>									-									<small>Website Response</small>								</p>								<table class="table table-bordered">								  <thead>									<tr>									  <th>#</th>									  <th>Name</th>									  <th>Email</th>									  <th>Mobile</th>									  <th>Message</th>									  <th>Date</th>									</tr>								  </thead>								  <tbody>								 			 <?php								  	$query="SELECT * FROM `naipathya_usermsg` ORDER BY id DESC LIMIT 25";										$run =mysql_query($query);									while($row=mysql_fetch_array($run)){									$id=$row['id'];									$name=$row['name'];									$mail=$row['email'];											$mobile=$row['mobile'];									$msg=$row['msg'];									$date_time=$row['date_time'];									//`id`, `name`, `email`, `mobile`, `msg`									echo"									<tr>									  <td>$id</td>									  <td>$name</td>									  <td>$mail</td>									  <td>$mobile</td> 									  <td>$msg</td>									  <td>$date_time</td>";									  echo "</tr>";									}		 								?>					 																	  </tbody>								</table>								<br />								<!-- <hr /> -->								<br />																<br>								<p>									<strong>Combined</strong>									-									<small>table class="table table-striped table-bordered table-condensed"</small>								</p>								<table class="table table-striped table-bordered table-condensed">								  <thead>									<tr>									  <th>#</th>									  <th>First Name</th>									  <th>Last Name</th>									  <th>Username</th>									</tr>								  </thead>								  <tbody>									<tr>									  <td>1</td>									  <td>Mark</td>									  <td>Otto</td>									  <td>@mdo</td>									</tr>									<tr>									  <td>2</td>									  <td>Jacob</td>									  <td>Thornton</td>									  <td>@fat</td>									</tr>									<tr>									  <td>3</td>									  <td>Larry</td>									  <td>the Bird</td>									  <td>@twitter</td>									</tr>								  </tbody>								</table>							</div>						</div>										<div class="module">                                <div class="module-head">                                    <h3>                                        Visitors Information</h3>                                </div>                                <div class="module-body table">                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"                                        width="100%">                                        <thead>                                            <tr>                                                <th>                                                    IP                                                                                                </th>                                                <th>                                                    Id                                                                                                </th>                                                <th>                                                    Affliate                                                 </th>                                                <th>                                                    Referral                                                </th>                                                <th>                                                    Date                                                </th>                                                <th>                                                    Url                                                </th>                                            </tr>                                        </thead>                                                <tbody>                                <?php			$query="SELECT * FROM `naipathya_tracker` ORDER BY id DESC";				$run =mysql_query($query);		    while($row=mysql_fetch_array($run)){	    	$Id=$row['id'];			    	$server=$row['server'];				    $browser=$row['browser'];		    $refral=$row['refral'];		    $ipadr=$row['ipadr'];		    $date=$row['date_time'];		    $creferral=$row['creferral'];		    $uri=$row['uri'];									?>										                                <tr class="odd gradeX">                                                <td>                                                    <?php echo "$ipadr" ?>                                                </td>                                                <td>                                                    <?php echo "$Id" ?>                                                </td>                                                <td>                                                     <?php echo "$creferral" ?>                                                </td>                                                <td>                                                    <?php echo "$refral" ?>                                                              </td>                                                <td class="center">                                                    <?php echo "$date" ?>                                                </td>                                                <td class="center">                                                    <?php echo "$uri" ?>                                                </td>                                            </tr>                                        <?php } ?>	                                                                           </tbody>                                        <tfoot>                                            <tr>                                                <th>                                                    Rendering engine                                                </th>                                                <th>                                                    Browser                                                </th>                                                <th>                                                    Platform(s)                                                </th>                                                <th>                                                    Engine version                                                </th>                                                <th>                                                    CSS grade                                                </th>                                            </tr>                                        </tfoot>                                    </table>                                </div>                            </div>																									<br />											</div><!--/.content-->				</div><!--/.span9-->			</div>		</div><!--/.container-->	</div><!--/.wrapper-->	<div class="footer">		<div class="container">			 			<b class="copyright">&copy; Admin - naipathya.in </b> All rights reserved.		</div>	</div>	<script src="scripts/jquery-1.9.1.min.js"></script>	<script src="scripts/jquery-ui-1.10.1.custom.min.js"></script>	<script src="bootstrap/js/bootstrap.min.js"></script>	<script src="scripts/datatables/jquery.dataTables.js"></script>	<script>		$(document).ready(function() {			$('.datatable-1').dataTable();			$('.dataTables_paginate').addClass("btn-group datatable-pagination");			$('.dataTables_paginate > a').wrapInner('<span />');			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');		} );	</script></body></html><?php } ?>