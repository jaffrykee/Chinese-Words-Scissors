<?php
	include_once("../lib/init.php");
	include_once("../lib/sql.php");
	include_once("../lib/str.php");
	include_once("../lib/mls_input2.php");
	if($_SESSION["hoid"]==NULL)
		$_SESSION["hoid"]=1;
	else
		$_SESSION["hoid"]++;
//	echo $_POST['nr'];
	echo '<div class="hst_one" id="ho'.$_SESSION["hoid"].'">你：'.$_POST['nr'].'</div>';
	$_SESSION["hoid"]++;
	echo '<div class="hst_one" id="ho'.$_SESSION["hoid"].'">陶可米：';
	if(ord($_POST['nr'])==ord('-'))
	{
		$s1=strcspn($_POST['nr'],' ',1);
		$cmd=substr($_POST['nr'],1,$s1);			//$cmd:指令语句(无参数)
//		echo '$cmd='.$cmd.' | $s1='.$s1.' | $sql=';
		$sql="select * from mls_command where cmd='".$cmd."'";			//$sql:查询语句
//		echo $sql.' | $a=';
		$a=substr($_POST['nr'],$s1+2);				//$a:指令参数a
//		echo $a;
		$arr=explode(" ",$a);
//		for($i=0;$arr[$i];$i++)
//		{
//			echo ' | $arr['.$i.']='.$arr[$i];
//		}
		$res=mysql_query($sql);
		if($row=mysql_fetch_array($res))
		{
			eval($row['deal']);
		}
		else
		{
			echo "指令不存在";
		}
//		if($_POST['nr']=='-sql_list status_basic')
//			sql_list("select * from status_basic","status_basic");
	}
	else
	{
		$sa=array();
		$sl=utf_strlen($_POST['nr']);
		for($i=0;$i<$sl;$i++)
		{
//			echo utf_substr($_POST['nr'],$i,1)." | ";
			$sa[$i]=utf_substr($_POST['nr'],$i,1);
/*			if($i==0)
			{
				$sql="SELECT id FROM word WHERE word LIKE '".$sc."%'";
				$res=mysql_query($sql);
				$w_s=array();
				for($s=0;$row=mysql_fetch_array($res);$s++)
				{
					$w_s[$s]=$row;
				}
				if($s!=0)
				{
					mls_word_sel($w_s);
				}
			}*/
		}
		get_real($sa,'word',NULL);
	}
	'</div>'
?>