<?php

require_once('AES.php');
require_once("connect_db.php");

// กำหนด API Passkey
define('API_PASSKEY', 'APIWuttinunt');

if($_SERVER['REMOTE_ADDR'] == '203.146.127.115' && isset($_GET['request']))
{
    $aes = new Crypt_AES();
    $aes->setKey(API_PASSKEY);
    $_GET['request'] = base64_decode(strtr($_GET['request'], '-_,', '+/='));
    $_GET['request'] = $aes->decrypt($_GET['request']);
    if($_GET['request'] != false)
    {
        parse_str($_GET['request'],$request);
        $request['Ref1'] = base64_decode($request['Ref1']);
        $request['Ref2'] = base64_decode($request['Ref2']);
        $request['Ref3'] = base64_decode($request['Ref3']);

        // เริ่มต้นการทำงานของระบบของท่าน

        $mysql = "INSERT INTO member (Name,Email,Status,Detail,Password) VALUES('".$request['Ref1']."','".$request['Ref2']."','Processing','','".$request['Ref3']."')";


        if (mysqli_query($con, $mysql)) {
            echo "Record Add User successfully";
        } else {
            echo "Error Adding user record: " . mysqli_error($con);
        }

        // สิ้นสุดการทำงานของระบบของท่าน

        echo 'SUCCEED';
    }
    else
    {
        echo 'ERROR|INVALID_PASSKEY';
    }
}
else
{
    echo 'ERROR|ACCESS_DENIED';
}
?>