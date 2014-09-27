<?php
	function sql_list($sql,$list)				//select要包含ID,但是不显示ID;突出显示名字
	{
		echo $list;
		echo '<table>';
		$resf=mysql_query('show full fields from '.$list);
		$fd=array();
		while($rowf=mysql_fetch_array($resf))
		{
			$fd[$rowf["Field"]]=$rowf["8"];
		}
		echo '<tr>';
		$fd_k=array_keys($fd);
		for($i=0;$fd_k[$i]!=NULL;$i++)
		{
			echo '<td width="25%">'.$fd[$fd_k[$i]].'</td>';
		}
//		echo print_r($fd);
		echo '</tr>';
		$result=mysql_query($sql);
		while ($row=mysql_fetch_assoc($result)){
			$a=array_keys(array_intersect_key($fd,$row));
			echo '<tr>';
			$row_k=array_keys($row);
			for($i=0;$row_k[$i]!=NULL;$i++)
			{
				echo '<td>'.$row[$row_k[$i]].'</td>';
			}
//			echo print_r($row);
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function list_name()
	{
		$res=mysql_query("show tables");
		while($row=mysql_fetch_array($res))
		{
			echo $row['0'].' | ';
		}
	}
	
	function input_batch($list_name,$separator,$string,$realid)
	{
		if($realid)
		{
			$rid=$realid;
		}
		else
			$rid=1;
		$arr_input=explode($separator,$string);
		for($i=0;$arr_input[$i];$i++)
		{
			mysql_query("INSERT INTO ".$list_name." (word,realid) VALUES ('".$arr_input[$i]."','".$rid."')");
		}
		echo "输入完毕。";
	}
	function get_all($sql)
	{
		$res=mysql_query($sql);
		$res_a=array();
		for($i=0;$row=mysql_fetch_array($res);$i++)
		{
			$res_a[$i]=$row;
		}
		if($i==0)
			return false;
		else
			return $res_a;
	}
?>
