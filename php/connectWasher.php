<?php
function connectWasher(){
	global $link;
	if(isset($_POST['washerCapacityName'])&&isset($_POST['brand']))//洗衣機
	{
		$brand=$_POST['brand'];
		$washerCapacityName=intval($_POST['washerCapacityName']);
		if($brand=="無")
			$sql="select * from `washer` where `容量`<$washerCapacityName && `容量`>=($washerCapacityName-2) order by `能源效率` DESC limit 0,3";
		else
			$sql="select * from `washer` where `容量`<$washerCapacityName && `容量`>=($washerCapacityName-2) && `商標名稱` like '$brand' order by `能源效率` DESC limit 0,3";
		$result = mysqli_query($link,$sql);
		if ($result->num_rows > 0) 
		{ 
		// 輸出每行數據 
			echo "<h4>以下為推薦您的洗衣機:</h4>";
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				echo "<a href='https://feebee.com.tw/s/?q={$row['商品型號']}'>";
				echo "商品型號: ". $row["商品型號"]. "  商標名稱: ". $row["商標名稱"]."  能源效率: ". $row["能源效率"]."  年耗電量: ". $row["年耗電量"]."  容量: ". $row["容量"]."</a><br> "; 
			} 
		}
		else
			echo "抱歉並無符合條件的產品";
	}
	
}
?>

