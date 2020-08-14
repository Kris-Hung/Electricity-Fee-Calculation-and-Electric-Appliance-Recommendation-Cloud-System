<?php
function connectAircon(){
	global $link;
	if(isset($_POST['sun'])&&isset($_POST['roomSizeName'])&&isset($_POST['brand']))//冷氣
	{
		$sun=intval($_POST['sun']);
		$roomSizeName=intval($_POST['roomSizeName']);
		$brand=$_POST['brand'];
		if($brand=="無")
			$sql="select * from `冷氣` where `冷氣能力`>=($roomSizeName*$sun) && `冷氣能力`>=(($roomSizeName-1)*$sun) order by `能源效率` DESC limit 0,3";
		else
			$sql="select * from `冷氣` where `冷氣能力`>=($roomSizeName*$sun) && `冷氣能力`>=(($roomSizeName-1)*$sun) && `商標名稱` like '$brand' order by `能源效率` DESC limit 0,3";
		$result = mysqli_query($link,$sql);
		if ($result->num_rows > 0) 
		{ 
		// 輸出每行數據 
			echo "<h4>以下為推薦您的冷氣:</h4>";
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				echo "<a href='https://feebee.com.tw/s/?q={$row['產品型號']}'>";
				echo "商品型號: ". $row["產品型號"]. "  商標名稱: ". $row["商標名稱"]."  能源效率: ". $row["能源效率"]."  年耗電量: ". $row["年耗電量"]."  冷氣能力: ". $row["冷氣能力"]."</a><br> "; 
			} 
		}
		else 
			echo "抱歉並無符合條件的產品";
	}
	
	
}
?>