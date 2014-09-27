<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/small.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="frame">
		<div class="msg_p">
			<div class="msg_top">
				<?php
					if($_GET['msg']!=NULL)
					{
						if(ord($_GET['msg'])==ord('%'))
						{
							echo urldecode($_GET['msg']);
						}
						else
						{
							echo $_GET['msg'];
						}
					}
				?>
			</div>
			<div class="msg_bottom">
				<a href="../">回到主页</a>
			</div>
		</div>
	</div>
</body>
</html>
