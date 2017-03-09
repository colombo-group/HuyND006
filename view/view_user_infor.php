<div class="container box-user-pr">
	
	<?php if($user['img']!=""){ ?>
	<div class="row">
		
		<div class="col-md-12 content"><img style="max-width: 100%;" src="<?php echo $user['img']; ?>"></div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-3 title">Fullname</div>
		<div class="col-md-9 content"><?php echo $user['fullname']; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3 title">Position</div>
		<div class="col-md-9 content"><?php if($user['id_acc']==1) {echo 'Administrator';} else if($user['id_acc']==2) echo "Admod"; else echo 'User'; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3 title">Reference</div>
		<div class="col-md-9 content"><?php 
		if(count($refer)>0){
			foreach($refer as $row){
			echo $row['fullname'].', ';
		}
		}
		?></div>
	</div>
	<?php
	$a="";
	$b="";
	if(isset($user['id'])&&isset($_SESSION['id'])&&$user['id']==$_SESSION['id']){
		$a=true;
	}
	if(isset($_SESSION['id_acc'])&&($_SESSION['id_acc']==1||($_SESSION['id_acc']==2&&$user['id_acc']!=2))){
	 	$b=true;	
	}
	if($a||$b){
	?>
	<div class="row">
		<div class="col-md-3 title">Username</div>
		<div class="col-md-9 content"><?php echo $user['username']; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3 title">Email</div>
		<div class="col-md-9 content"><?php echo $user['email']; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3 title">Phone</div>
		<div class="col-md-9 content"><?php echo $user['phone']; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3 title">Gender</div>
		<div class="col-md-9 content"><?php echo $user['gender']==null?'Updating!':$user['gender']; ?></div>
	</div>
	<div class="row">

	<?php if($b&&$user['id_acc']!=2){ ?>
		<div class="col-md-3 content"><a href="index.php?controller=prefer&id=<?php echo $user['id']; ?>">Prefer</a></div>
	<?php } ?>

	<?php if($user['id_acc']<3&&$_SESSION['id_acc']==1){  ?>
		<div class="col-md-3 content"><a href="index.php?controller=demote&id=<?php echo $user['id']; ?>">Demote</a></div>
	<?php }  ?>
		<div class="col-md-6 content"><a href="index.php?controller=add_edit_account&act=edit&id=<?php echo $user['id']; ?>">Edit this Account</a></div>
	</div>
	<?php } else{ ?>
		<div class="row">
		<div class="col-md-2 title"></div>
		<div class="col-md-9 content"><a href="index.php?act=sign_in_other">Sign in to this Account</a></div>
	</div>
	<?php } ?>
</div>