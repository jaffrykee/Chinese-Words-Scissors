<?php
	include_once("../lib/init.php");
	if($_GET['oun']!=NULL&&$_GET['ok']!=NULL&&$_GET['rn']!=NULL&&$_GET['em']!=NULL)
	{
		$sql="SELECT * FROM user WHERE name='".$_GET['oun']."'";
		$res=mysql_query($sql);
		if(mysql_fetch_array($res))
		{
			echo_Msg('用户名已存在(err:ul_002)');
		}
		else
		{
			$sql="SELECT * FROM user WHERE real_name='".$_GET['rn']."'";
			$res=mysql_query($sql);
			if(mysql_fetch_array($res))
			{
				echo_Msg('昵称已存在(err:ul_002)');
			}
			else
			{
				$sqli="INSERT INTO user (name,pass_word,real_name,email,class) VALUES ('".$_GET['oun']."', '".$_GET['ok']."', '".$_GET['rn']."', '".$_GET['em']."', '4')";
				mysql_query($sqli);
				if(mysql_insert_id()!=0)
				{
					$_SESSION['uid']=mysql_insert_id();
					$sql="SELECT * FROM user WHERE id='".$_SESSION['uid']."'";
					if($row=mysql_fetch_array($res))
					{
						$_SESSION['user']=$row['name'];
						$_SESSION['real_name']=$row['real_name'];
						$_SESSION['class']=$row['class'];
					}
					echo_Msg('注册成功了');
				}
				else
				{
					echo_Msg('注册失败了XD(err:ul_003)');
				}
			}
		}
	}
	else
	{
		echo_Msg('注册失败(err:ul_001)');
	}

?>