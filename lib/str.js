// JavaScript Document
/*
js工具-js常用方法,js常用判断方法
SUMMARY :
function obj$(id) 根据id得到对象
function val$(id) 根据id得到对象的值
function trim(str) 删除左边和右边空格
function ltrim(str) 删除左边空格
function rtrim (str) 删除右边空格
function isEmpty(str) 字串是否有值
function equals(str1, str2) js判断比较两字符串是否相等
function equalsIgnoreCase(str1, str2) js判断忽略大小写比较两个字符串是否相等
function isChinese(str) js判断判断是否中文
function isEmail(strEmail) js判断是否电子邮件
function isImg(str) js判断是否是一个图片格式的文件jpg|jpeg|swf|gif
function isInteger(str) js判断是否是一个整数
function isFloat js判断是否是一个浮点数
function isPost(str) js判断是否邮编(1位至6位
function isMobile(str) js判断是否是手机号
function isPhone(str) js判断是否是电话号码必须包含区号,可以含有分机号
function isQQ(str) js判断是否合法的QQ号码
function isIP(str) js判断是否是合法的IP
function isDate(str) js判断是否日期类型(例:2005-12-12)
function isIdCardNo(idNumber) js判断是否是合法的身份证号
*/
function isChinese(str)
{
var str = str.replace(/(^\s*)|(\s*$)/g,'');
if (!(/^[\u4E00-\uFA29]*$/.test(str)
&& (!/^[\uE7C7-\uE7F3]*$/.test(str))))
{
return false;
}
return true;
}


function isEmail(str)
{
if(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(str))
{
return true
}
return false;
}

function isChina(s) //判断字符是否是中文字符
{
	var patrn= /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;
	if(!patrn.exec(s))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function echoMsg(str)
{
	en_str=encodeURI(str);
	window.location.href='../user/msg.php?msg='+en_str;
}