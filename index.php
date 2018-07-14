<?php

$page = "";
$page = "home";
include_once 'partials/header.php';

if(!empty($_SESSION) || isset($_SESSION['admin_name'])){
    header('Location: dashboard.php');
}

?>

<?php
if(isset($_POST['login'])){
		//get user input

	$name = trim($_POST['admin_name']);
	$password = trim($_POST['password']);
	$errors = [];
	$msgs = [];


		// Validate
	if(strlen($name) < 6 ){
		$errors[] = "Username must be atleast 6 characters!";
	}
	if(strlen($password) < 6 ){
		$errors[] = "Password must be atleast 6 characters!";
	}


		// If no errors,DB Upload
	if(empty($errors)){
		 $query = $connection->prepare('SELECT * FROM `users` WHERE name = :name');
        $query->bindValue(':name', strtolower($name));
        $query->execute();
        $data = $query->fetch();

        if($query->rowCount() === 1 && $password === $data['password']){
        	$_SESSION['id'] = $data['id'];
        	$_SESSION['name'] = $data['name'];
        	$_SESSION['last_login_time'] = time();
			header('Location: dashboard.php');
        }
	}
}
?>

<!-- Page Content -->
<div class="container py-5">
    <div class="row py-5">

		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<?php if (!empty($errors)) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) { ?>
                            <p><?php echo $error ?></p>  
                        <?php } ?>
                    </div>   
                <?php } ?>
                <?php if (!empty($msgs)) { ?>
                    <div class="alert alert-success">
                        <?php foreach ($msgs as $msg) { ?>
                            <p><?php echo $msg ?></p>  
                        <?php } ?>
                    </div>   
                <?php } ?>
				<div class="form-group">
	                <label for="admin_name">Username</label>
	                <input type="text" name="admin_name" id="admin_name" class="form-control" required="1">
	            </div>
	            <div class="form-group">
	                <label for="password">Password</label>
	                <input type="password" name="password" id="password" class="form-control">
	            </div>
	            <div class="form-group">
	                <button name="login" class="btn btn-success">Login</button>
	            </div>
            </form>
		</div>
		<div class="col-md-4"></div>
    </div>
</div>
<!-- /content container -->
<?php include_once 'partials/footer.php'; ?>