<?php 	include 'connection.php';

session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

	<?php 
	if ($_SERVER["REQUEST_METHOD"]=="POST" ){

			$uname = $_POST['username'];
			$pwd   = $_POST['password'];

			if(empty($uname)){
				$nameError = "Name is required";
			}
			if(empty($pwd)){
				$pwdError = "Password is required";
			}

			if (empty($nameError) && empty($pwdError) ) {
				$stmt = $con->prepare("SELECT * from users where name=? and password=?");
				$stmt->execute([$uname,$pwd]);
				$row = $stmt->rowCount();
				if ($row>0) {
						$_SESSION['name'] = true;
						header("location:dashboard.php");
				}else{
					header("location:index.php");
				}

			}
			
		}
	 ?>

</head>
<body>

	<div class="container mt-5">
		<center>	
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    
		    <h6 class="card-subtitle mb-2 text-muted">Login</h6>
		    <form method="POST">	
		    <p class="card-text">
		    	
				<div class="input-group mb-3 ">
		 		 <span class="input-group-text" id="basic-addon1">username</span>
		 		 <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" style="width: 60%">
		 		 <div class="text-danger"><?php if(!empty($nameError)){echo $nameError; } ?></div>
				</div>
				<div class="input-group mb-3">
		 		 <span class="input-group-text" id="basic-addon1">Password</span>
		 		 <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="password">
		 		 <div  class="text-danger"><?php if(!empty($pwdError)){echo $pwdError; } ?></div>
				</div>
				<div class="input-group mb-3">		 		
		 		 <input type="submit" class="btn btn-success" value="login">
				</div>
		    </p>
		    </form>
		    
		  </div>
		</div>
		</center>
	</div>	

</body>
</html>