<div class="row header">
    <div class="col-md-2 img">
    <div class="">Image</div>
    </div>
    <div class="col-md-3 name">
    Fullname <a href="index.php?p=<?php echo $page; ?>&record=<?php echo $record_per_page; ?>&act=asc_fullname"><img src="public/img/len.png"></a> <a href="index.php?p=<?php echo $page; ?>&record=<?php echo $record_per_page; ?>&act=desc_fullname"><img src="public/img/xuong.png"></a>
    </div>
    <div class="col-md-4">About me</div>
    <div class="col-md-3">Signing up Day <a href="index.php?p=<?php echo $page; ?>&record=<?php echo $record_per_page; ?>&act=asc_date"><img src="public/img/len.png"></a> <a href="index.php?p=<?php echo $page; ?>&record=<?php echo $record_per_page; ?>&act=desc_date"><img src="public/img/xuong.png"></a></div>
</div>
<!-- list acc -->
<?php  foreach($arr as $row){  ?>
<div class="row">
    <div class="col-md-2 img">
    <?php if($row['img']!=null){ ?>
        <img style="width:100%; margin:0 auto;" src="<?php echo $row['img']; ?>">
    <?php } ?>
    </div>
    <div class="col-md-3 fullname">
    <a href="index.php?controller=user_info&id=<?php echo $row['id']; ?>"><?php echo $row['fullname'] ?></a>
    </div>
    <div class="col-md-4 intro">"<?php echo $row['intro']; ?>"</div>
    <div class="col-md-3 date"><?php echo $row['j_day']; ?></div>
</div>
<?php } ?>
<div class="btn-group col-md-2" style="margin:20px;">
    <button type="button" class="btn btn-default">Number of record</button>
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu" style="left: 15px;">
        <li><a href="index.php?record=10&p=1">10</a></li>
        <li><a href="index.php?record=20&p=1">20</a></li>
        <li><a href="index.php?record=50&p=1">50</a></li>
        <li><a href="index.php?record=100&p=1">100</a></li>
    </ul>
</div>
<?php


 if($count>$record_per_page){

 ?>
<ul class="pagination col-md-4">
    <?php
        $i=$page;
        if($i>1){
            echo "<li><a href='index.php?p=".($i-1)."&record=$record_per_page'>Prev</a></li>";
        }
        if($i<3){
            for($j=$page-1;$j<=$page+3;$j++){
                if($j==0){
                        continue;
                    }
                    echo "<li><a href='index.php?p=".$j."&record=$record_per_page'>".$j."</a></li>";
                    if($j==$num_page){
                        break;
                    }
                }
        }
        if($i>=3){
                for($j=$page-2;$j<=$page+2;$j++){

                    echo "<li><a href='index.php?p=".$j."&record=$record_per_page'>".$j."</a></li>";
                    if($j==$num_page){
                        break;
                    }
                }
            }
            
            if($i<$num_page){
            echo "<li><a href='index.php?p=".($i+1)."&record=$record_per_page'>Next</a></li>";
        }
    }?>
</ul>