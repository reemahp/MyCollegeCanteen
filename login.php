<?php 

session_start();

	include("login/connection.php");
	include("login/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		//something was posted
		
		$method = $_POST['method'];
		if($method == 'login')
		{

			$email_id = $_POST['email_id'];
			$password = $_POST['password'];
		if(!empty($email_id) && !empty($password) )
		{
			$admin= "admin@somaiya.edu";
			//read from database
			$query = "select * from users where email_id = '$email_id' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($email_id == $admin){
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
						if (isset($user_data['password']) && $user_data['password'] === $password) 
						{
								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: adm.php");
								die;
						} else {
							echo "<div class=\"alert alert-danger\">
							<strong>Alert!</strong> Wrong email id or password.
							</div>";
						}
				} else {
					echo "<div class=\"alert alert-danger\">
					<strong>Alert!</strong> Wrong email id or password.
					</div>";
				}
			}
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
						if (isset($user_data['password']) && $user_data['password'] === $password) 
						{
								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: CollegeCanteen.php");
								die;
						} else {
							echo "<div class=\"alert alert-danger\">
							<strong>Alert!</strong> Wrong email id or password.
							</div>";
						}
				} else {
					echo "<div class=\"alert alert-danger\">
					<strong>Alert!</strong> Wrong email id or password.
					</div>";
				}
			
			}		
				
		}
	}
	else if($method == 'register'){
		
		{
			
			//something was posted
			$name = $_POST['name'];
			$email_id = $_POST['email_id']; 
			$password = $_POST['password'];
			$query = "select * from users where email_id = '$email_id' limit 1";
			$result = mysqli_query($con, $query);
			if(!empty($name) && !empty($password) && !empty($email_id))
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
						if (isset($user_data['email_id']) && $user_data['email_id'] === $email_id) 
						{
							echo "<div class=\"alert alert-danger\">
							<strong>Alert!</strong> Email id already exists.
							</div>";
						}
			else{
					
					
				   $query = "insert into users (name,email_id,password) values ('$name','$email_id','$password')";
	   
				mysqli_query($con, $query);
	   
				   header("Location: login.php");
				die;
			}
			}}else
			{
				echo "<div class=\"alert alert-danger\">
							<strong>Alert!</strong> Enter some valid information.
							</div>";
			}
		}
	}
}

?>



<html>
<head>
<style media="screen">
      
 

			* {
		  box-sizing: border-box;
		 
	  }
	  
	  body {
            width: 100%;
            background-image: url("restaurant.webp");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
           
						display: flex;
		  justify-content: center;
		  align-items: center;
		  flex-direction: column;
        }
	  
	  h1 {
		  font-weight: bold;
		  margin: 0;
	  }
	  
	  h2 {
		  text-align: center;
	  }
	  
	  p {
		  font-size: 14px;
		  font-weight: 100;
		  line-height: 20px;
		  letter-spacing: 0.5px;
		  margin: 20px 0 30px;
	  }
	  
	  span {
		  font-size: 12px;
	  }
	  
	  
	  
	  button {
		  border-radius: 20px;
		  border: 1px solid #5f5b5b;
		  background-color: #6d6969;
		  color: #FFFFFF;
		  font-size: 12px;
		  font-weight: bold;
		  padding: 12px 45px;
		  letter-spacing: 1px;
		  text-transform: uppercase;
		  transition: transform 80ms ease-in;
	  }
	  
	  button:active {
		  transform: scale(0.95);
	  }
	  
	  button:focus {
		  outline: none;
	  }
	  
	  button.ghost {
		  background-color: transparent;
		  border-color: #FFFFFF;
	  }
	  
	  form {
		  background-color: #FFFFFF;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  flex-direction: column;
		  padding: 0 50px;
		  height: 100%;
		  text-align: center;
	  }
	  
	  input {
		  background-color: #eee;
		  border: none;
		  padding: 12px 15px;
		  margin: 8px 0;
		  width: 100%;
	  }
	  
	  .container {
		  background-color: #fff;
		  border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
				  0 10px 10px rgba(0,0,0,0.22);
		  position: relative;
		  overflow: hidden;
		  width: 768px;
		  max-width: 100%;
		  min-height: 480px;
	  }
	  
	  .form-container {
		  position: absolute;
		  top: 0;
		  height: 100%;
		  transition: all 0.6s ease-in-out;
	  }
	  
	  .sign-in-container {
		  left: 0;
		  width: 50%;
		  z-index: 2;
	  }
	  
	  .container.right-panel-active .sign-in-container {
		  transform: translateX(100%);
	  }
	  
	  .sign-up-container {
		  left: 0;
		  width: 50%;
		  opacity: 0;
		  z-index: 1;
	  }
	  
	  .container.right-panel-active .sign-up-container {
		  transform: translateX(100%);
		  opacity: 1;
		  z-index: 5;
		  animation: show 0.6s;
	  }
	  
	  @keyframes show {
		  0%, 49.99% {
			  opacity: 0;
			  z-index: 1;
		  }
		  
		  50%, 100% {
			  opacity: 1;
			  z-index: 5;
		  }
	  }
	  
	  .overlay-container {
		  position: absolute;
		  top: 0;
		  left: 50%;
		  width: 50%;
		  height: 100%;
		  overflow: hidden;
		  transition: transform 0.6s ease-in-out;
		  z-index: 100;
	  }
	  
	  .container.right-panel-active .overlay-container{
		  transform: translateX(-100%);
	  }
	  
	  .overlay {
		  background: #01afff;
		  background: -webkit-linear-gradient(to right, #746f6e, #5b5355);
		  background: linear-gradient(to right, #777170, #766f71);
		  background-repeat: no-repeat;
		  background-size: cover;
		  background-position: 0 0;
		  color: #FFFFFF;
		  position: relative;
		  left: -100%;
		  height: 100%;
		  width: 200%;
			transform: translateX(0);
		  transition: transform 0.6s ease-in-out;
	  }
	  
	  .container.right-panel-active .overlay {
			transform: translateX(50%);
	  }
	  
	  .overlay-panel {
		  position: absolute;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  flex-direction: column;
		  padding: 0 40px;
		  text-align: center;
		  top: 0;
		  height: 100%;
		  width: 50%;
		  transform: translateX(0);
		  transition: transform 0.6s ease-in-out;
	  }
	  
	  .overlay-left {
		  transform: translateX(-20%);
	  }
	  
	  .container.right-panel-active .overlay-left {
		  transform: translateX(0);
	  }
	  
	  .overlay-right {
		  right: 0;
		  transform: translateX(0);
	  }
	  
	  .container.right-panel-active .overlay-right {
		  transform: translateX(20%);
	  }
	  
	  .form-container a {
		  text-decoration: none;
	  }
	  
	  footer {
		  background-color: #222;
		  color: #fff;
		  font-size: 14px;
		  bottom: 0;
		  position: fixed;
		  left: 0;
		  right: 0;
		  text-align: center;
		  z-index: 999;
	  }
	  
	  footer p {
		  margin: 10px 0;
	  }
	  
	  footer i {
		  color: rgb(62, 55, 55);
	  }
	  
	  footer a {
		  color: #3a4144;
		  text-decoration: none;
	  }
		</style>
		  
    
    <link rel = "stylesheet" href = "mystyle.css">
		
<title>
My College Canteen
</title>
<script>
		function validateForm() {
			var email = document.forms["signupform"]["email_id"].value;
			var password = document.forms["signupform"]["password"].value;

			if (email == "") {
				alert("Email must be filled out");
				return false;
			} else {
				var emailRegex = /^\S+@somaiya.edu$/;
				if (!emailRegex.test(email)) {
					alert("Invalid email address");
					return false;
				}
			}


			if (password == "") {
				alert("Password must be filled out");
				return false;
			}

			
	}
	function validateForm1() {
			var email = document.forms["loginform"]["email_id"].value;
			var password = document.forms["loginform"]["password"].value;
			
			if (email == "") {
				alert("Email must be filled out");
				return false;
			} else {
				var emailRegex = /^\S+@somaiya.edu$/;
				if (!emailRegex.test(email)) {
					alert("Invalid email address");
					return false;
				}
			}


			if (password == "") {
				alert("Password must be filled out");
				return false;
			}
			
	}
	</script>
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
<body >
  <div class="bg-div">
    <div class="logo">
        <img src = "looogoo.jpeg">
        </div>

</div>
<br>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form name="signupform" action="login.php" onsubmit="return validateForm()" method = "POST" >
			<h1>Create Account</h1>
			
			
			<input type="name" name = "name" placeholder="Name" />
			<input type="email_id" name = "email_id" placeholder="Email" />
			<input type="password" name = "password" placeholder="Password" /> 
			<input type ="text" value = "register" name = "method" hidden>
			<button>REGISTER</button>
		</form>
	</div>

	
	<div class="form-container sign-in-container">
		<form name="loginform" action="login.php" onsubmit="return validateForm1()" method="POST" >
			<h1>LOGIN</h1>
		
			<input type="email_id" name="email_id" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<input type ="text" value = "login" name = "method" hidden>

            <br>
			<a href="#">Forgot your password?</a>
            <br>
			<button>LOGIN</button>
		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your somaiya email id.</p>
				<button class="ghost" id="signIn">LOGIN</button>
			</div>
	<div class="overlay-panel overlay-right">
		
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and login through somaiya email id!</p>
				<button class="ghost" id="signUp">REGISTER</button>
		</div>
	
</div>
</div>
	</div>
</div>



    <script>
        const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
    </script>
</body>

</html>	
