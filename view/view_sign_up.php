<div class="container box-sign">
<form method="post" action="index.php?controller=add_edit_account&act=add" id="form" enctype="multipart/form-data">
	<div class="row sign">
		<div class="row col-md-6">
			<div class="col-md-4 title">Username *</div>
			<div class="col-md-7 info">
				<input class="form-control" type="text" id="username" required placeholder="Include lowercase, uppercase or number" name="username" onkeyup="check('username')">
			</div>
			<div class="col-md-1" id="check_user"></div>
		</div>

		<div class="row col-md-6">
			<div class="col-md-4 title">Email *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="email" onkeyup="check('email')" type="Email" required placeholder="email" name="email">
			</div>
			<div class="col-md-1" id="check_email"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Password *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="password1" onkeyup="check('password')" type="password" required placeholder="Password" name="password1">
			</div>
			<div class="col-md-1" id="check_pass1"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Phone *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="phone" onkeyup="check('phone')" type="text" required placeholder="Phone number" name="phone">
			</div>
			<div class="col-md-1" id="check_phone"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Password *</div>
			<div class="col-md-7 info">
				<input class="form-control" id="password2" onkeyup="check('password')" type="password" required placeholder="Enter your password again" name="password2">
			</div>
			<div id="check_pass2"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Image profile </div>
			<div class="col-md-7 info">
				<input class="" type="file"  name="img">
			</div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Fullname *</div>
			<div class="col-md-7 info">
				<input class="form-control" onkeyup="check('fullname')" id="fullname" type="text" required placeholder="Fullname" name="fullname">
			</div>
			<div class="col-md-1" id="check_fullname"></div>
		</div>
		<div class="row col-md-6">
			<div class="col-md-4 title">Reference </div>
			<div class="col-md-7 info">
				<input class="form-control" onkeyup="check('refer')" type="text"  placeholder="Username or Email of your Reference" name="refer" id="refer">
			</div>
			<div class="col-md-1"  id="check_refer"></div>
		</div>
	</div>
	
	<div class="col-md-1 col-xs-offset-5" style=""  id="sub" >
		<input type="submit" name="" class="btn btn-info"  value="Sign up" onclick="return window.confirm('You really want to sign up and agree with our rules?')">
	</div>
	
	</form>
	<div class="col-md-4 col-xs-offset-4">
		Do you have an Account ?<a href="index.php?controller=sign_in">Sign in</a>
	</div>
</div>

<script type="text/javascript">
var temp=new Array();
temp[0]="";
temp[1]="";
temp[2]="";
temp[3]="";
temp[4]="";
temp[5]=1;

function check_sub(){
	if(temp[0]==1&&temp[2]==1&&temp[3]==1&&temp[4]==1&&temp[5]==1&&temp[1]==1){
		$('#form').unbind();
	}
	else{
		$('#form').submit(function(event){
		{
			event.preventDefault();
		}
	});
	}
}
function check(index) {
	
	var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
	var email=document.getElementById('email').value;
	var username=document.getElementById('username').value;
	var password1=document.getElementById('password1').value;
	var password2=document.getElementById('password2').value;
	var phone=document.getElementById('phone').value;
	var fullname=document.getElementById('fullname').value;
	var refer=document.getElementById('refer').value;
	
	var reg_fullname=/^[a-zA-z ]+$/;
	switch(index){
		case 'email':{
			if(reg_mail.test(email)){
			// document.getElementById('check_email').innerHTML="<i class='fa fa-check'> </i>";
			// alert('ok');
			// var check=true;
			$.post('view/check_exits_email.php', {'username':email}, function(data) {
				temp[0]=data;
				if(temp[0]=="1"){
					temp[0]=1;
					check_sub();
					document.getElementById('check_email').innerHTML="<i class='fa fa-check'></i>";
					
				}
				else if(temp[0]=="0") {
					temp[0]=0;
					document.getElementById('check_email').innerHTML="<i class='fa fa-times'>Existed</i>";
				}
			});
			}
			else{
				temp[0]=0;
				check_sub();
				document.getElementById('check_email').innerHTML="<i class='fa fa-times'>  </i>";
			}
			
			break;
		}
		case 'username': {
			var reg_user=/^[A-Za-z0-9_]+$/;
			if(username.length>=6&&reg_user.test(username)){
				$.post('view/check_exits_username.php', {'username':username}, function(data) {
				temp[1]=data;
				// alert(data);
				// console.log(data);
				if(temp[1]=='1'){
					temp[1]=1;
					check_sub();
					document.getElementById('check_user').innerHTML="<i class='fa fa-check'></i>";
					
				}
				else if(temp[1]=="0") {
					temp[1]=0;
					check_sub();
					document.getElementById('check_user').innerHTML="<i class='fa fa-times'>Existed</i>";
				}
			});
			}
			else {
				temp[1]=0;
				check_sub();
				document.getElementById('check_user').innerHTML="<i class='fa fa-times'>  </i>";
			}
			
			
			break;
		}
		case 'phone': {
			if(isNaN(phone)||phone==""){
				temp[2]=0;
				check_sub();
				document.getElementById('check_phone').innerHTML="<i class='fa fa-times'>  </i>";
			}
			else{
				$.post('view/check_exits_phone.php', {'username':phone}, function(data) {
				temp[2]=data;
				
				// alert(data);
				if(temp[2]=='1'){
					// alert(temp[2]);
					temp[2]=1;
					check_sub();
					document.getElementById('check_phone').innerHTML="<i class='fa fa-check'></i>";
				}
				else if(temp[2]=='0'){
					temp[2]=0;
					check_sub();
					document.getElementById('check_phone').innerHTML="<i class='fa fa-times'>Existed</i>";
				}
			});
			}
			
			break;
		}
		case 'fullname': {
			if(reg_fullname.test(fullname)){
				temp[3]=1;
				check_sub();
				// document.write(reg_fullname.test(fullname));
				document.getElementById('check_fullname').innerHTML="<i class='fa fa-check'> </i>";
			}
			else {
				temp[3]=0;
				check_sub();
				document.getElementById('check_fullname').innerHTML="<i class='fa fa-times'>  </i>";
			}
			
			
			break;
		}
		case 'password': {
			if(password1==password2&&password1!=""){
				temp[4]=1;
				check_sub();
				document.getElementById('check_pass1').innerHTML="<i class='fa fa-check'> </i>";
				document.getElementById('check_pass2').innerHTML="<i class='fa fa-check'> </i>";
			}
			else {
				temp[4]=0;
				check_sub();
				document.getElementById('check_pass2').innerHTML="<i class='fa fa-times'>  </i>";
			}
			break;
		}
		case 'refer': {
			if(refer!=""){
				$.post('view/check_exits_refer.php', {'username':refer}, function(data) {
				temp[5]=data;
				// alert(data);
				// console.log(data);
				if(temp[5]=="1"){
					temp[5]=1;
					check_sub();
					document.getElementById('check_refer').innerHTML="<i class='fa fa-check'></i>";
				}
				else if(temp[5]=="0"){
					temp[5]=0;check_sub();
					document.getElementById('check_refer').innerHTML="<i class='fa fa-times'></i>";
				}
			});
			}
			else if(refer=="") {
				temp[5]==1
				check_sub();
				document.getElementById('check_refer').innerHTML="";
			}
			break;
		}

	}
}
</script>