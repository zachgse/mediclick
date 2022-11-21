<?php
if (isset($_POST['g-recaptcha-response'])){
    $secretkey="6LdYXQEfAAAAAEGRqJra5jkScn7bybYuD-Abqgoo";
    $ip= $_SERVER['REMOTE ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response
    &remoteip=$ip";
    $fire=file_get_contents($url);
    $data=json_decode($fire);
    if($data->success==true){
        echo "success";
    }
    else{
        echo "Please fill ReCaptcha";
    }

    
}
else{
    echo "ReCaptcha Error";
}


?>