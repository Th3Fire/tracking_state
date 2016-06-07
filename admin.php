​<!DOCTYPE html>
<html lang="en">
<head>

	<title>Admin Panel</title>
	<meta charset="UTF-8"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	
	<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />

	<link href="css/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="iconic.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="js/prefix-free.js"></script>
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
	<script type="text/javascript" src="js/bootstrap-notify.js"></script>
	<script type="text/javascript" src="js/bootstrap-notify.min.js"></script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
	<?php session_start(); require_once("connect_db.php");

	if(!isset($_SESSION['UserID']))
	{
		header ("Location: login.php");
		exit();
	}?>
</head>
<body>
	<header>
		<?php include '_header.php'; ?>
	</header>
	<div id='main'>
		<article><!-- Content -->
			<table class="table-fill" >
				<thead>
					<tr>
						<th class="text-left" width="10%">No.</th>
						<th class="text-center" width="20%">Name</th>
						<th class="text-center" width="30%">Email</th>
						<th class="text-center" width="15%">Status</th>
						<th class="text-center" width="25%">Detail</th>
					</tr>
				</thead>

				<tbody class="table-hover">
					<tr>
						<?php
						$sql = "SELECT ID,Name,Email,Status,Detail FROM member";
						$result = mysqli_query($con,$sql);

						if($result->num_rows > 0){
							while ($rows = $result->fetch_array(MYSQL_BOTH)) {
								$checkProcess = $rows['Status'];
								echo "<tr>";
								echo '<td class="text-center">'.$rows['ID'].'</td>';
								echo '<td class="text-center">'.$rows['Name'].'</td>';
								echo '<td class="text-center">'.$rows['Email'].'</td>';
								if($checkProcess == "Processing"){
									echo '<td class="text-center">
									<a class="btEdit" id='.$rows['ID'].'><button type="button" class="btn btn-warning">
										<i class="icon-refresh icon-spin"></i>&nbsp'.$rows['Status'].'</button></a></td>';
									}else if($checkProcess == "Success"){
										echo '<td class="text-center">
										<a class="btEdit" id='.$rows['ID'].'><button type="button" class="btn btn-success">
											<i class="icon-ok"></i>&nbsp'.$rows['Status'].'</button></a></td>';
										}else if($checkProcess == "Fail"){
											echo '<td class="text-center">
											<a class="btEdit" id='.$rows['ID'].' ><button type="button" class="btn btn-danger">
												<i class="icon-remove"></i>&nbsp'.$rows['Status'].'</button></a></td>';
											}
											echo '<td class="text-center">
											<font size="3" style="float: left; padding: 12px;">'.$rows['Detail'].'</font>
											<a class="btEditComment" id='.$rows['ID'].' style="float: right;"><button type="button" class="btn btn-primary">
												<i class="icon-edit"></i>&nbspEdit</button></a></td>';
												echo "</tr>";
											}
										}

										?>
									</tr>
								</tbody>

							</table>
						</article><!-- Content -->
						<div class="navside"></div><!-- Left side -->
						<aside><!-- Right side -->
						</aside><!-- Right side -->
					</div>
					<footer>
						<?php include 'footer.php'; ?>
					</footer>
					<script >

						$(document).on('click', '.btEdit', function(e) {
							var x = ($(this).attr('id'));
							e.preventDefault();


							bootbox.dialog({
								message: "Please select option you want.",
  //title: "Custom title",
  buttons: {
  	success: {
  		label: "Processing",
  		className: "btn-warning",
  		callback: function() {
        //Example.show("great success");
        $.ajax(
        {
        	url : 'update_data.php',
        	data : 
        	{
        		id : x,
        		status: '"Processing"',

        	},
        	success : function(data) 
        	{
        		window.location.replace("admin.php");
        	}
        });
    }

},
danger: {
	label: "Success",
	className: "btn-success",
	callback: function() {
		$.ajax(
		{
			url : 'update_data.php',
			data : 
			{
				id : x,
				status: '"Success"',
				
			},
			success : function(data) 
			{
				window.location.replace("admin.php");
			}
		});
	}
},
main: {
	label: "Fail!",
	className: "btn-danger",
	callback: function() {
		$.ajax(
		{
			url : 'update_data.php',
			data : 
			{
				id : x,
				status: '"Fail"',
				
			},
			success : function(data) 
			{
				window.location.replace("admin.php");
			}
		});
	}
}
}
});

						});


///////////////////////////

$(document).on('click', '.btEditComment', function(e) {
	var x = ($(this).attr('id'));
	e.preventDefault();

	bootbox.prompt("Please input your comment.", function(result) {

		if (result === null) {
			bootbox.hideAll();
		} else {

			$.ajax(
			{
				url : 'update_data.php',
				data : 
				{
					id : x,
					myComment: "\""+result+"\"",

				},
				success : function(data) 
				{
					window.location.replace("admin.php");
				}
			});
		}
	});

});
//////////////////////////

</script>

</body>
</html>
