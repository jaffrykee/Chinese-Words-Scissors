<?php
	function utf_substr($str,$start,$len)
	{
		$j=0;
		for($m=0,$n=0,$nstr=$str;$m<$start;$m++)
		{
			$temp_str=substr($nstr,$n,1);
			if(ord($temp_str) >= 224)
			{
				$n+=3;
			}
			elseif(ord($temp_str)>=192)
			{
				$n+=2;
			}
			else
			{
				$n++;
			}
		}
		for($i=0;$i<$len&&$j<(strlen($str)-$n);$i++)
		{
			$temp_str=substr($str,$j+$n,1);
			if(ord($temp_str) >= 224)
			{
				$j+=3;
			}
			elseif(ord($temp_str)>=192)
			{
				$j+=2;
			}
			else
			{
				$j++;
			}
		}
		return substr($str,$n,$j);
	}
	function utf_strlen($str)
	{
		for($i=0;$j<strlen($str);$i++)
		{
			$temp_str=substr($str,$j,1);
			if(ord($temp_str) >= 224)
			{
				$j+=3;
			}
			elseif(ord($temp_str)>=192)
			{
				$j+=2;
			}
			else
			{
				$j++;
			}
		}
		return $i;
	}

	function utf_array_to_string($arr,$start,$len)
	{
		if($start==NULL)
		{
			$start=0;
		}
		if($len==NULL)
		{
			for($i=$start;$arr[$i]!=NULL;$i++)
			{
				$str=$str.$arr[$i];
			}
		}
		else
		{
			$end=$start+$len;
			for($i=$start;$arr[$i]!=NULL&&$i<$end;$i++)
			{
				$str=$str.$arr[$i];
			}
		}
		return $str;
	}
?>