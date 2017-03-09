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
		<div class="col-md-9 content"><?php if($user['id_acc']==1) {echo 'Administrator';} else if($user['id_acc']==2) echo "Admod"; else echo 'User';; ?></div>
	</div>
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
		<div class="col-md-3 title"></div>
		<div class="col-md-9 content"><a href="index.php?controller=add_edit_account&act=edit&id=<?php echo $user['id']; ?>">Edit this Account</a></div>
	</div>
</div>