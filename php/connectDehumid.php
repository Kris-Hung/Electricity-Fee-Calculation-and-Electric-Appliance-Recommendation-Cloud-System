<?php
function connectDehumid(){
	global $link;
	if(isset($_POST['areaName'])&&isset($_POST['brand']))//除濕機
	{
		$areaName=intval($_POST['areaName']);
		$brand=$_POST['brand'];
		if($brand=="無")
			$sql="select * from `dehumidifier` where `除濕機等級`=$areaName order by `除濕機等級` DESC limit 0,3";
		else
			$sql="select * from `dehumidifier` where `除濕機等級`=$areaName && `商標名稱`like '$brand' order by `除濕機等級` DESC limit 0,3";
		$result = mysqli_query($link,$sql);
		
		if ($result->num_rows > 0) 
		{ 
		// 輸出每行數據 
			echo "<h4>以下為推薦您的除濕機:</h4>";
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				echo "<a href='https://feebee.com.tw/s/?q={$row['產品型號']}'>";
				echo "商品型號: ". $row["產品型號"]. "  商標名稱: ". $row["商標名稱"]."  能源效率: ". $row["能源效率"]."  能源等級: ". $row["能源等級"]."  除濕能力: ". $row["除濕能力"]."  除濕機等級: ". $row["除濕機等級"]."</a><br> "; 
			} 
		}
	}
}
?>

