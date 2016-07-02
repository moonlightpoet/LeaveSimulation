<?php

// $body = "<a href='http://www.baidu.com/' target='_blank'>点我重新生成密码</a>";
 
// sendMail_smtp("moonlightpoet@lightinthebox.com",'测试',$body);
 
echo 'hello,0<br />';
 
function sendMail_smtp($smtpemailto,$mailsubject,$mailbody){
    //error_reporting(7);
    echo 'hello,1<br />';
    require('Mail-1.3.0/Mail.php');
    //require_once 'Mail-1.3.0/Mail/mime.php';
	echo 'hello,2<br />';
    $from = 'moonlightpoet@lightinthebox.com';
    $to   = $smtpemailto;
    $password = 'thereisthepasswordofyouremail';
     
    $mail_config=array(
            "host"=>"smtp.exmail.qq.com",
            "port"=>465,
            "auth"=>true,
            "username"=>$from,
            "password"=>$password,
            "from"=>$from,
    );
     
    $hdrs = array(
            'From'=>$from,
            'To' => $to, //收信地址
            'Subject'=>$mailsubject
    );
     
    $mime = new Mail_mime();
    //$mime->setTXTBody($text);
    //添加附件
    //$mime->addHTMLImage('php.gif','image/gif','12345',true);
    $mime->_build_params['html_charset'] = "utf-8";//设置编码格式
    $mime->_build_params['head_charset'] = "utf-8";//设置编码格式  
    $mime->setHTMLBody($mailbody);
    $body = $mime->get();
    $hdrs = $mime->headers($hdrs);
     
    $mail = Mail::factory('smtp',$mail_config);
    $succ = $mail->send($to,$hdrs,$body);
     
    if (PEAR::isError($succ))
    {
        //echo 'Email sending failed: ' . $succ->getMessage();
        $err = 'Email sending failed: ' . $succ->getMessage();
        $content = $to."\t".date('Y-m-d H:i:s')."\t ".$err." \r\n" ;
    }
    else
    {
        //$content = $to."\t".date('Y-m-d H:i:s')."\t Email sent succesfully \r\n" ;
        return true;
         
    }
     
}

?>
