<?php
	if(@$_POST['submit'] !=''){
		$region= $_POST['region'];
		$district=$_POST['district'];

		// first remove comma at end to avoid insert empty record..
		$pincodes_trim =rtrim($_POST['pincodes'], ',');
		
		$pincodes=explode(',',$pincodes_trim); 

		$con=mysqli_connect('localhost','root','','pincodes');

		$query ="INSERT INTO pincodes_28(`region`,`district`,`pincode`) values ";

		$query_parts = array();

		foreach ($pincodes as $pincode) {	
			 $query_parts[] = "('" . $region . "', '" . $district . "','" . $pincode . "')";
		}

		echo $query .= implode(',', $query_parts); 

		$res = mysqli_query($con,$query);

		if(!$res){
			echo mysqli_error($con);
		}

	}
?>
<html>
	<head>
	<style>

input[type=text] {   
    padding: 12px 20px;
    margin: 8px 1%;
	width:45%;  
}

input[type=submit]{    
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;    
}

</style>
		
	</head>
	<body>
		<form method="post" name='' action="" style="margin-top: 200px">
				Region:<input type="text" name="region" value="Southland" /> <br/>
				District:<input type="text" name="district" value="" /> <br/>
				Pincodes:<textarea name="pincodes"></textarea> <br/>
				<center><input type="submit" name="submit" value="submit" />
		</form>	
	</body>
</html>
