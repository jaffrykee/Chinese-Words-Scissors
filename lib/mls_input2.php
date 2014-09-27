<?php
//必要lib:init.php sql.php str.php
	function get_real($sa,$table_word,$table_real)
	{
		$real_arr=array();
//		print_r($sa);
		for($i=0,$j=0,$k=0;$sa[$i]!=NULL;$i++)
		{
			if($j<=2)
			{
				if($j<=2)
				{
					$w_s!=array();
					$w_s[0]='1';
					for($j=0,$str_now=$sa[$i],$str_last=NULL,$j_end=0;$w_s!=NULL&&$j<50;$str_now=$str_now.$sa[$i+$j+1],$j++)
					{
						$sql="SELECT * FROM ".$table_word." WHERE word LIKE '".$str_now."%'";
		//	echo $sql;
						$w_s=get_all($sql);
						$p=count($w_s);
		//	echo ' | **********************************$p='.$p.'**********************************';
						if($w_s!=NULL)
						{
							$real_class=$w_s['0']['class'];
							$real_count=$w_s['0']['count'];
//							!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//	echo $str_now.' | ';
	//						$str_last=$str_now;
		//	print_r($w_s);
		//	echo '^^^^^^^^^^^^^^^^^^^^^^';
		/*					if($p==1)
							{
								$str_sql=$w_s['0']['word'];
								$len=utf_strlen($str_sql);
					echo $i.' | '.$len.' ][ ';
								$str_input=utf_array_to_string($sa,$i,$len);
					print_r($sa);
					echo $str_sql;
					echo $str_input.' | ';
								if(strcasecmp($str_sql,$str_input)==0)
								{
									$sql_1="SELECT * FROM word WHERE id='".$w_s['0']['id']."'";
					echo $sql_1.' | ';
									$res_1=mysql_query($sql_1);
									if($row_1=mysql_fetch_array($res_1))
									{
										//echo $row_1['name2'].'("'.utf_array_to_string($sa,0,$i).'","'.utf_array_to_string($sa,$i+$len,NULL).'")'.' | ';
										
									}
									else
									{
										echo '没有找到关键词';
									}
								}
							}
							else
							{
								for(;;)
								{
									$sql="SELECT * FROM word WHERE word LIKE '".$sa[$i].$sa[$i+1]."%'";
									$res=mysql_query($sql);
									$w_s=array();
									for($p=0;$row=mysql_fetch_array($res);$p++)
									{
										$w_s[$p]=$row;
									}
								}
							}*/
						}
						else
						{
							$str_last=utf_substr($str_now,0,utf_strlen($str_now)-1);
							if($str_last!=NULL)
							{
								if($str_temp!=NULL)
								{
	echo $str_temp.' | ';
									$real_arr[$k][0]=$str_temp;					//词
									$real_arr[$k][1]=-1;						//类型
									$real_arr[$k][2]=-1;							//优先级
									$k++;
								}
								$str_temp=NULL;
	echo $str_last.' | ';
								$real_arr[$k][0]=$str_last;
								$real_arr[$k][1]=$real_class;
								$real_arr[$k][2]=$real_count;
								$k++;
							}
							else
							{
								$str_temp=$str_temp.$str_now;
//	echo $str_temp.' | ';
							}
						}
					}
				}
			}
			else
			{
				$j--;
			}
		}
		if($str_temp!=NULL)
		{
	echo $str_temp.' | ';
			$real_arr[$k][0]=$str_temp;
			$real_arr[$k][1]=100;
			$k++;
		}
	print_r($real_arr);
	}

	function mls_word_sel($arr_ws)
	{
		print_r($arr_ws);
	}
?>