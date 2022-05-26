<?php
$db_connection = pg_connect("host=localhost dbname=my_project_3 user=postgres password=postgres");
    $id = $_GET['class_id'];
 if(isset($_GET['nhanlop'])){
 	$nhanlop = $_GET['nhanlop'];
 	if($nhanlop == 1){
 	 $result_nhanlop = pg_query($db_connection, "SELECT nhan_lop($id, 1)");
 	  	 echo "<script>alert('nhận lớp thành công');</script>";

 	 header("#");
 	}
 }
 
 else{

 }
?>

<!DOCTYPE html>
<html  lang="en">
<head>
   	<title class=" text-xs-center fas fa-graduation-cap">  lớp gia sư  </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/angular-material.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="css/1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">gia sư TMN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav"><li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
					
				</ul>
			</div>
		</nav> -->


	<div class="inra">
		<div class="container">
			<div class="jumbotron">
				<h1 class="text-xs-center"><i class=" text-xs-center fas fa-graduation-cap"></i> thông tin lớp gia sư</h1>
				<hr class="m-y-md">

<?php
    $id = $_GET['class_id'];
    $result = pg_query($db_connection, "SELECT * FROM lop_gia_su where class_id = $id");
 
        $row = pg_fetch_object($result);
      
?>
 
				<div class="card-deck" style="margin-left: 20rem">
	
						<div class="card " style="width: 30rem;margin-right: 20rem;
						font-size: 20px"ng-show="!motlop.hienra">
						<div class="card-header" style="background: linear-gradient(135deg, #71b7e6, #9b59b6); color:white;">
							thông tin về lớp mã <?php echo"<td>$row->class_id</td>"; ?>
						</div>
						<div class="card-block">
							<b > class_id  : </b><i><?php  echo"<td>$row->class_id</td>"; ?></i><br>
							<b> bộ môn  : </b><i><?php  echo"<td>$row->bo_mon</td>"; ?></i><br>
							<b> giới tính yêu cầu : </b><i><?php echo"<td>$row->gioi_tinh_yeu_cau</td>"; ?></i><br>
							<b> quận : </b><i><?php echo"<td>$row->quan_phuong</td>" ?></i><br>
							<b> địa chỉ : </b><i><?php echo"<td>$row->dia_chi</td>" ?></i><br>
							<b> lương : </b><i><?php echo"<td>$row->luong</td>"; ?></i><br>
							<b> thời gian học : </b><i><?php  echo"<td>$row->thoi_gian_hoc</td>"; ?></i><br>
							<b> trình độ : </b><i><?php   echo"<td>$row->trinh_do</td>"; ?></i><br>
							<b> trạng thái : </b><i><?php echo"<td>$row->trang_thai</td>"; ?></i><br>
							<b> yêu cầu : </b><i><?php echo"<td>$row->yeu_cau</td>"; ?></i><br>
							<i>Nếu bạn có nhu cầu nhận thêm thông tin mã số lớp <?php echo"<td>$row->class_id</td>"; ?> hãy liên hệ tới số điện thoại <?php $sdt =  pg_fetch_object(pg_query($db_connection, "SELECT * FROM tai_khoan where id_tk = $row->id_admin ")); echo"<td>$sdt->sdt</td>"; ?> để được tư vấn .</i>
							<?php if($row->trang_thai == 'còn trống'){ ?>
							<div class="button">
					          <a href="?nhanlop=1&class_id= <?php echo"$id" ?>" style=" background: linear-gradient(135deg,#9b59b6, #71b7e6 );color: white; margin-top: 5px;" class="float-xs-right btn btn-outline-danger btn-block" > Nhận lớp</a>
					        </div>
					    	<?php }else{ ?>
					    		<div class="button" style="color: red;"> Lớp đã được nhận </div>
					    	<?php } ?>
						</div>
	
					</div>

					</div>
				<?php  ?> 
</div>
</div>
</div>
    <script type="text/javascript" src="vendor/bootstrap.js"></script>  
	<script type="text/javascript" src="vendor/angular-1.5.min.js"></script>  
	<script type="text/javascript" src="vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="vendor/angular-material.min.js"></script>  
	<script type="text/javascript" src="js/bailam2.js"></script>
	
</html>
 