<?php
include 'db.php';

if (isset($_POST["numara"]) && !empty($_POST["numara"])) {
    $whatsappNumber = $_POST["numara"];
    $verificationCode = rand(100000, 999999);

    // You can run the following 2 codes from server/run.php if you wish.
    $insert = $db->prepare("INSERT INTO sms SET pnumber=?, code=?");
    $insert->execute([$whatsappNumber, $verificationCode]);

    $postData = array(
        'numara' => $whatsappNumber,
        'code' => $verificationCode,
    );

    // CURL ile isteği yapın
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/wp2fac/server/run.php'); // server/run.php yerine doğru adresi yazın
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'CURL Hata: ' . curl_error($ch);
    } else {
        // Sunucudan dönen sonuçları alın
        echo $response;
    }

    curl_close($ch);




    
    echo '<div class="spinner-border text-primary d-none" role="status" id="loader"></div>';
} else {
    echo "Numara eksik veya boş!";
}
?>
