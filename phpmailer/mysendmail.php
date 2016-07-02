<?php
session_start();

// test
//send_func("wangshihao", "wangshihao@lightinthebox.com", "test func", "<h1>hello</h1>");

function send_func($to_name, $to_email, $title, $body) {
	require("PHPMailerAutoload.php");
	$mail = new PHPMailer(); //建立邮件发送类
	$mail->CharSet = "UTF-8";
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->Host = "smtp.exmail.qq.com"; // 您的企业邮局域名
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = "wangshihao@lightinthebox.com"; // 邮局用户名(请填写完整的email地址)
	$mail->Password = "xiaofeng_1"; // 邮局密码
	$mail->Port=25;
	$mail->From = "wangshihao@lightinthebox.com"; //邮件发送者email地址
	$mail->FromName = "wangshihao";
	$mail->AddAddress($to_email, $to_name);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");

	//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
	$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式

	$mail->Subject = $title; //邮件标题
	$mail->Body = $body; //邮件内容，上面设置HTML，则可以是HTML

	if(!$mail->Send())
	{
		echo "邮件发送失败. <p>";
		echo "错误原因: " . $mail->ErrorInfo;
		exit;
	}
}

?>