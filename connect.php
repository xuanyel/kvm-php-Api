<?php
$type = $_REQUEST['type'];  //类型：1=测试 空=正常生产环境
// 连接libvirt（kvm）服务器
if ($type == 1 || $type == "1") {  //测试环境
    $url = "qemu+tcp://your_server_ip/system"; // Libvirt-kvm服务器地址(方法：tcp)
    $aaasasl = array(VIR_CRED_AUTHNAME => "youruser", VIR_CRED_PASSPHRASE => "userpassword");  //通过sasl认证TCP连接，VIR_CRED_AUTHNAME为sasl2账号，VIR_CRED_PASSPHRASE为sasl2密码（禁止外泄）
    $conn = libvirt_connect($url, false, $aaasasl); //连接kvm服务器（TCP+SASL2）
    if ($conn == false) {
        echo "{\"code\":\"400\",\"msg\":\"" . libvirt_get_last_error() . "\"}"; //json返回值（失败）
    } else {   // 否则 （成功）
        echo "{\"code\":\"200\",\"msg\":\"success\"}";  //json返回值（成功）
    }
}
else {  //正常环境
    $url = "qemu+tcp://your_server_ip/system"; // Libvirt-kvm服务器地址(方法：tcp)
    $aaasasl = array(VIR_CRED_AUTHNAME => "youruser", VIR_CRED_PASSPHRASE => "userpassword");  //通过sasl认证TCP连接，VIR_CRED_AUTHNAME为sasl2账号，VIR_CRED_PASSPHRASE为sasl2密码（禁止外泄）
    $conn = libvirt_connect($url, false, $aaasasl); //连接kvm服务器（TCP+SASL2）
    if ($conn == false) {
        echo "{\"code\":\"400\",\"msg\":\"" . libvirt_get_last_error() . "\"}"; //json返回值（失败）
    } else {   // 否则 （成功）
        //echo "{\"code\":\"200\",\"msg\":\"success\"}";  //json返回值（成功）
        $connect = "success";
    }
}
