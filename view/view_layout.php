<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COLOMBO</title>
    <!-- <meta charset="utf-8"> -->
    <link rel = "stylesheet" type="text/css" href="public/css/style.css">
    <link rel = "stylesheet" type="text/css" href="public/font_awesome/css/font-awesome.css">

</head>
<body>
<div class="container-fluid">
    <div id ="top" class="container">
            <div class="container" >
                <div class="left-top">

                </div>
                <div class=" right-top">
                    <div class = "row">
                    <ul>
                        <li>
                            
                            <?php if(isset($_SESSION['user'])){ ?>
                            <a href="index.php?controller=user_pr&id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-user-o">&nbsp;Hi, <?php echo $_SESSION['user']; ?></i></a>
                            <?php } else{ ?>
                            <a href="index.php?controller=sign_in"><i class="fa fa-sign-in">&nbsp;Sign in</i></a><?php } ?>
                        </li>
                        <li>
                           
                           <?php if(isset($_SESSION['user'])){ ?>
                           <a href="index.php?act=sign_out"><i class="fa fa-sign-out ">&nbsp;Sign Out</i> </a>
                           <?php } else{ ?>
                            <a href="index.php?controller=sign_up"><i class="fa fa-user-plus">&nbsp;Sign up</i> </a><?php } ?>
                        </li>
                        
                        <li><a href="#"><img src="public/img/flag.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
        <div style="clear:both;"></div>
    <div id = "menu" class="container">
       <div class="row">
        <div class="left-menu ">
                        <a  href="#"><img src="public/img/logo.png"></a>
        </div>
        <nav class="navbar navbar-default col-">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="fa fa-home"></span>&nbsp;Trang chủ</a></li>
                    </ul>

         </nav>
    </div>
    </div>
    <div>
        <?php 
            if(file_exists($controller)){
                include $controller;
            }
        ?>
    </div>
<div class="footer container-fluid" style="background: orange;height: 100px;margin-top: 30px;">
    
</div>
</div>
    <script src="public/js/jquery-3.1.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>