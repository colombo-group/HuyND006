<?php
	class model{
		public function fetch($sql){
			global $conn;
			$result=mysqli_query($conn,$sql);
			$arr= array();
			//duyet cac ban ghi
			while($row=mysqli_fetch_array($result)){
				$arr[]=$row;
			}
			return $arr;
		}
		public function fetch_one($sql){
			global $conn;
			$result=mysqli_query($conn,$sql);
			// $row= array();
			$row=mysqli_fetch_array($result);
			return $row;
		}
		public function execute($sql){
			global $conn;
			mysqli_query($conn,$sql);
		}
		public function count($sql){
			global $conn;
			$result=mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}
		// public function check_phone($phone){
		// 	$pattern_input_phone="/[^0-9$]/";
		// 	preg_match_all($pattern_input_phone, $phone, $matches,PREG_OFFSET_CAPTURE);
		// 	if(sizeof($matches[0]<1)){
		// 		$erro="Your phone number is not valid";
		// 		return $erro;
		// 	}
		// }
	}
?>