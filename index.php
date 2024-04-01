<?php include('common/header.php'); ?>

<!doctype html>
<html lang="en">
	<head>
		<title>Login</title>
	</head>
	<body class="login-background">
		
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="Images/kdulogo.png" alt="" class="align-items-center" width="100" height="100">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">Welcome !</h2>
                <form class="p-1" action="Login/login.php" method="POST"> <!-- Changed action to Login/login.php -->
                    
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="btnlogin" value="ENTER" class="btn btn-white pl-5 pr-5 ">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
