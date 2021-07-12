<html>
	<head>
		<link type="text/css" rel="stylesheet" href="./style.css" /></link>
		<style>
		tr{
		    padding:0.5em;
			background-color:#faebd7;
		}
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		
	</head>
<body style="background-color:#ffff99;color:#2a52be;">
	<div class="navbar navbar-fixed-top" style="font:10px;">.
		<div class="container">
			<a href="#" class="navbar-brand" style="font-size:30px;"> &nbsp;&nbsp;&nbsp;&nbsp;The Sparks Bank</a> 				
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.html"><span class="glyphicon glyphicon-home "></span> HOME</a></li>
				<li><a href="transfer.html"><span class="glyphicon glyphicon-send "></span> Transfer Money</a></li>
				<li><a href="history.php"><span class="glyphicon glyphicon-time "></span> Transfer History</a></li>
			</ul>
			</div>		   
		</div>
  </div>
   <div class="users">

	<?php
		echo "<div>".
		 "<table border=\"border style=\" \"  \" id=\"users_table\">".
		 "<tr>".
			"<th>Name</th>".
			"<th>Balance</th>".
			"<th>Email</th>".
		"</tr>";
		
     
	 
	  $con=mysqli_connect("localhost","root","","banking_system") or die(mysqli_error($con));
	  if(!$con)
	  {
		  die("Connection Failed:".mysqli_connect_error);
	  }
	  
	  
		$sel_query="SELECT Name,Balance,Email from users";
		$sel_res=$con->query($sel_query);
		if($sel_res->num_rows>0)
			while($row=$sel_res->fetch_assoc())
			{
				
				echo "<tr>";
				echo "<td style=\" padding:5px;\">". $row["Name"]."</td>"."<td>".$row["Balance"]."</td>"."<td>".$row["Email"]."</td>";
				
				echo "</tr>";	
				
			} 
			
		echo '';
	echo "</table>".
	"</div>";
	
	mysqli_close($con);
	?>
	</div>
	
</body>
</html>