
<div class="container box-sign">
<form method="post" action="index.php?controller=add_edit_account&act=do_edit&id=<?php echo $id; ?>" enctype="multipart/form-data">
	<div class="row sign">
		<div class="row col-md-6">
			<div class="col-md-4 title">Username </div>
			<div class="col-md-7 info">
				<input class="form-control" disabled value="<?php echo $user['username']; ?>">
			</div>
			
		</div>

		<div class="row col-md-6">
			<div class="col-md-4 title">Email </div>
			<div class="col-md-7 info">
				<input class="form-control" disabled value="<?php echo $user['email']; ?>">
			</div>
			
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Password *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="password1" value="<?php echo $user['pass']; ?>" onkeyup="check('password')" type="password" required placeholder="Password" name="password1">
			</div>
			<div class="col-md-1" id="check_pass1"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Phone *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="phone" value="<?php echo $user['phone']; ?>" onkeyup="check('phone')" type="text" required placeholder="Phone number" name="phone">
				<input type="hidden" id="old_phone" value="<?php echo $user['phone']; ?>" name="">
			</div>
			<div class="col-md-1" id="check_phone"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Password *</div>
			<div class="col-md-7 info">
				<input class="form-control" value="<?php echo $user['pass']; ?>"  id="password2" onkeyup="check('password')" type="password" required placeholder="Enter your password again" name="password2">
			</div>
			<div id="check_pass2"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Image profile </div>
			<div class="col-md-7 info">
				<input class="form-control" type="file"  name="img">
				<?php if($user['img']!=null){ ?>
				<img style="width: 100px;" src="<?php echo $user['img']; ?>">
				<input type="hidden" name="old_img" value="<?php echo $user['img']; ?>">
				<?php } ?>

			</div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Fullname *</div>
			<div class="col-md-7 info">
				<input class="form-control" value="<?php echo $user['fullname'] ?>" onkeyup="check('fullname')" id="fullname" type="text" required placeholder="Fullname" name="fullname">
			</div>
			<div class="col-md-1" id="check_fullname"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Your Sologan </div>
			<div class="col-md-7 info">
				<input class="form-control" value="<?php echo $user['intro']; ?>" name="intro">
			</div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title" >Gender</div>
			<div class="col-md-7 info">
				<div class="col-md-5">Male <input <?php echo $user['gender']==null?'checked':''; echo $user['gender']=='Male'?'checked':''; ?> type="radio"  name="gender" value="Male"></div>
				<div class="col-md-5">Female <input <?php echo $user['gender']=='Female'?'checked':''; ?> type="radio" name="gender" value="Female"></div>
			</div>
			<div class="col-md-1" id="check_fullname"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Fullname *</div>
			<div class="col-md-7 info">
				<input type="date" value="<?php echo isset($user['birthday'])?$user['birthday']:''; ?>" name="birthday" class="form-control">
			</div>
			<div class="col-md-1" id="check_fullname"></div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-1 col-xs-offset-5" style="display: none;"  id="sub" >
		<input type="submit" name="" class="btn btn-info"  value="Change" onclick="return window.confirm('Are you sure?')">
	</div>
	
	</form>
	
</div>

<script type="text/javascript">
var temp=new Array();

temp[0]=null;
temp[1]=null;
temp[2]=null;
	function check(index){
		var password1=document.getElementById('password1').value;
		var password2=document.getElementById('password2').value;
		var phone=document.getElementById('phone').value;
		var old_phone=document.getElementById('old_phone').value;
		var fullname=document.getElementById('fullname').value;
		var reg_fullname=/^[a-zA-z ]+$/;
		switch(index){
			case 'phone': {
				if(isNaN(phone)||phone==""){
				temp[2]=0;
				document.getElementById('check_phone').innerHTML="<i class='fa fa-times'>  </i>";
				}
				else{
					$.post('view/check_exits_phone.php', {'username':phone}, function(data) {
					temp[2]=data;
					
					if(temp[2]=='1'){
						// alert(temp[2]);
						temp[2]=1;
						document.getElementById('check_phone').innerHTML="<i class='fa fa-check'></i>";
						$('form').unbind();
					}
					else if(temp[2]=='0'){
						if(old_phone==phone){
							document.getElementById('check_phone').innerHTML="<i class='fa fa-check'></i>";
							$('form').unbind();
						}
						else{
							document.getElementById('check_phone').innerHTML="<i class='fa fa-times'>Existed</i>";
							$('form').submit(function(e){
								e.preventDefault();
							});
						}
					}
				});
			}
			
			break;
			}
			case 'fullname': {
				
				if(reg_fullname.test(fullname)){
					document.getElementById('sub').setAttribute('style','display:block');
					document.getElementById('check_fullname').innerHTML="<i class='fa fa-check'> </i>";
				}
				else {
					document.getElementById('sub').setAttribute('style','display:none');
					document.getElementById('check_fullname').innerHTML="<i class='fa fa-times'>  </i>";
				}
				break;
			}
			case 'password': {
				if(password1==password2&&password1!=""){
					document.getElementById('sub').setAttribute('style','display:block');
					document.getElementById('check_pass1').innerHTML="<i class='fa fa-check'> </i>";
					document.getElementById('check_pass2').innerHTML="<i class='fa fa-check'> </i>";
				}
				else {
					document.getElementById('sub').setAttribute('style','display:none');
					document.getElementById('check_pass2').innerHTML="<i class='fa fa-times'>  </i>";
				}
				break;
			}
		}
	}
window.onload=function(){
	if(temp[0]==null&&temp[1]==null&&temp[2]==null){
	document.getElementById('sub').setAttribute('style','display:block');
}
}
</script>