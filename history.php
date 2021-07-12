<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link type="text/css" rel="stylesheet" href="style.css" /></link>
	<style>
		table{
			background-color:#e7feff;
			margin:100px;
			}   
		td{
			padding:0.2em;
		  }
	</style>

</head>
<body class="history">
	<div class="navbar navbar" style="font:20px;">.
		<div class="container">
		<a href="#" class="navbar-brand" style="font-size:30px;"> &nbsp;&nbsp;&nbsp;&nbsp;The Sparks Bank</a> 				
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
			<li><a href="./index.html"><span class="glyphicon glyphicon-home "></span> HOME</a></li>
			<li><a href="./transfer.html"><span class="glyphicon glyphicon-send "></span> Transfer Money</a></li>
			<li><a href="./users.php"><span class="glyphicon glyphicon-user"></span> Customers</a></li>
			</ul>
		</div>		   
    </div>
  </div>
  
  <div>
  <?php

	echo "<div>".
		 "<table border=\"border-width:1px;\"margin=\"50px;\" id=\"history_table;\">".
		 
		 "<tr>".
			"<th>To_Name</th>".
			"<th>From_Name</th>".
			"<th>Amount</th>".
			"<th>Transfer Time</th>".
		"</tr>".
		"<tbody id=\"tbdy\">";
     
	 
	  $con=mysqli_connect("localhost","root","","banking_system") or die(mysqli_error($con));
	  if(!$con)
	  {
		  die("Connection Failed:".mysqli_connect_error);
	  }
	  
	  
		$sel_query="SELECT To_Name,From_Name,Amount,Trtime from history";
		$sel_res=$con->query($sel_query);
		if($sel_res->num_rows>0)
			while($row=$sel_res->fetch_assoc())
			{
				
				echo "<tr>";
				echo "<td>". $row["To_Name"]."</td>"."<td>".$row["From_Name"]."</td>"."<td>".$row["Amount"]."</td>"."<td>".$row["Trtime"]."</td>";
				echo "</tr>";	
				
			} 
	
	echo " ".
	"</tbody>".
	"</table>".
	"</div>";
	
	mysqli_close($con);
	?>
  </div>
 </body>
</html>