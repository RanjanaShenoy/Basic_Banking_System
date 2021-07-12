<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link type="text/css" rel="stylesheet" href="style.css" /></link>
</head>

<body style="background-color:#ffff99;color: #4997d0;">
	<div class="navbar navbar-fixed-top" style="font:20px;">.
	<div class="container">
	<a href="#" class="navbar-brand" style="font-size:30px;"> &nbsp;&nbsp;&nbsp;&nbsp;The Sparks Bank</a> 				
	<div class="collapse navbar-collapse" id="myNavbar">
	<ul class="nav navbar-nav navbar-right">
		<li><a href="./index.html"><span class="glyphicon glyphicon-home "></span> HOME</a></li>
		<li><a href="./transfer.html"><span class="glyphicon glyphicon-send "></span> Transfer Money</a></li>
		<li><a href="./users.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
	</ul>
   </div>
	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="./history.php" class="btn btn-info" role="button">Transaction History</a>  
  </div>
  </div>
  
   
	<?php 
		$con=mysqli_connect("localhost","root","","banking_system");  
	
	  if(!$con)
	  {
		  die("Connection Failed:".mysqli_connect_error);
	  }
	  
	  
	 
	if($_GET["users1"] && $_GET["users2"] && $_GET["balance"])
	{
      $from_name=$_GET["users1"];
	  $to_name=$_GET["users2"];
	  $balance=$_GET["balance"];
	}
	 
	  
	  if( $from_name == $to_name)
	  {
		echo "<script>
		 alert(\"Cannot Transfer to Same Person\");
		 </script>";
	  }
	  
	  if($from_name != $to_name)
	  {
			$sel_query="SELECT Name,Balance,Email from users"; 
			
				
			
			if ($result = $con -> query($sel_query))
			{
				while ($row = $result -> fetch_row()) 
				{
			
					if($from_name==$row[0])
					{
						$name=$row[0];
						$bal=$row[1];
						break;
					}
			    }
				echo 
				"<script>".
				"alert(\"NAME of sender: $name , Balance: $bal \");".
				"</script><br />";
	
				$result -> free_result();
  
	      }	
	
			$sel_query2="SELECT Name,Balance,Email from users"; // where name=".$from_name;
			if ($result2 = $con -> query($sel_query2))
			{
				while ($row2 = $result2 -> fetch_row()) 
				{
			
					if($to_name==$row2[0])
					{
						$name2=$row2[0];
						$bal2=$row2[1];
						break;
					}
				}
		
				$result2 -> free_result();
         
			}	
	       	  
			if($balance<=$bal)
			{
				
				echo "<script> 
				alert(\"NAME of receiver: $name2 , Balance of receiver: $bal2 \");
				</script><br /><br />";
				
				echo "<script> 
				alert(\"Amount to be transfered from $name to $name2 : $balance \");
				</script><br /><br />";
				
				
				$bal_upd=(int)$bal-(int)$balance;
				
				echo "<script> 
				alert(\"Updated Balance of $name: $bal_upd \");
				</script><br /><br />";
				
				
				$upd_qry1= "UPDATE users SET Balance=\"$bal_upd\" WHERE Name=\"$name\"";
				
				$bal_upd2=(int)$bal2+(int)$balance;
				
				echo "<script> 
				alert(\"Updated Balance of $name2: $bal_upd2 \");
				</script><br />";
				
				
				$upd_qry2 = "UPDATE users SET Balance=\"$bal_upd2 \" WHERE Name=\"$name2 \"";
                
				  
				 $ins_qry1="Insert into history(To_Name,From_Name,Amount) values(\"$name\",\"$name2\",\"$balance\")";
				
				
				if($con->query($upd_qry1) === TRUE)
				{
					if($con->query($upd_qry2) === TRUE)
					{
						if($con->query($ins_qry1) ==TRUE)
						{
							echo "<script> 
				           alert(\"Record updated successfully\")";
						}	
					} 
				}
				else 
				{
					echo "<script> 
				   alert(\"Error updating record:\")
				   </script>" .$con->error;
				}
					
			}
			else if($balance>$bal)
			{
				echo "<script> 
				alert(\"Insufficient Balance\")
				</script>";
			}
			
	  }
	  
	 $con->close();
   ?>	
   
   </body>
</html>