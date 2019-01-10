<?php
        include('admin/lib/dbcon.php');
		dbcon(); 
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................ admin .....................................................*/
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			$num_row = mysql_num_rows($result);
			
		/*...................................................Technical Staff ..............................................*/
		$query_client = mysql_query("SELECT * FROM client WHERE username='$username' AND password='$password'")or die(mysql_error());
		$num_row_client = mysql_num_rows($query_client);
		$row_client = mysql_fetch_array($query_client);
		
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['admin_id'];
		echo 'true_admin';
		
		mysql_query("insert into user_log (username,login_date,admin_id)values('$username',NOW(),".$row['admin_id'].")")or die(mysql_error());
		
		}else if ($num_row_client > 0){
		$_SESSION['client']=$row_client['client_id'];
		echo 'true';
		
		mysql_query("insert into user_log (username,login_date,client_id)values('$username',NOW(),".$row_client['client_id'].")")or die(mysql_error());
		
		 }else{ 
				echo 'false';
		}	
				
		?>