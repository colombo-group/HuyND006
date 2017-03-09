<?php
 	if(isset($_GET['erro'])){ 
 		// echo $_SESSION['erro'];
 		$_SESSION['erro']++;

 ?>
 <div class="container col-md-9 col-xs-offset-3 row" style="color:red"><?php echo $_GET['erro']; ?></div>
 <?php } ?>
 <div class="clearfix"></div>
<div class="container box-sign-in">

<form method="post" action="index.php?controller=welcome">
	<fieldset>
		<legend>What's up Bro!!</legend>
		<div class="box">
			<div class="row"><div id="name" class="col-md-4">Username or Email</div><div class="col-md-8"><input type="text" required class="form-control" name="username" placeholder="Enter your Email or Username"></div></div> 
			 <div class="row"><div  id="name" class="col-md-4">Password</div><div class="col-md-8"><input type="password" required class="form-control" name="password" placeholder="Enter your password"></div></div> 
			  
			 <div class="row"><div class="col-md-8 col-xs-offset-4"><input type="submit" name="" class="btn btn-primary" value="Sign-in"></div></div>
		</div>
	</fieldset>
</form>
</div>