
<?php
function connectFridge(){
	global $link;
	if(isset($_POST['refrigeratorCapacityName'])&&isset($_POST['brand']))//冰箱
	{
		$brand=$_POST['brand'];
		$refrigeratorCapacityName=intval($_POST['refrigeratorCapacityName']);
		if($brand=="無")
			$sql="select * from `新冰箱` where `容量`<$refrigeratorCapacityName && `容量`>=($refrigeratorCapacityName-100) order by `能源效率` DESC limit 0,3";
		else
			$sql="select * from `新冰箱` where `容量`<$refrigeratorCapacityName && `容量`>=($refrigeratorCapacityName-100) && `商標名稱`like '$brand' order by `能源效率` DESC limit 0,3";
		$result = mysqli_query($link,$sql);
		if ($result->num_rows > 0) 
		{ 
		// 輸出每行數據 
			echo "<h4>以下為推薦您的冰箱:</h4>";
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				echo "<a href='https://feebee.com.tw/s/?q={$row['產品型號']}'>";
				echo "商品型號: ". $row["產品型號"]. "  商標名稱: ". $row["商標名稱"]."  能源效率: ". $row["能源效率"]."  能源等級: ". $row["能源效率等級"]."  容量: ". $row["容量"]."</a><br> "; 
			} 
		}
		else 
			echo "抱歉並無符合條件的產品";
	}
	
	
}
?>
