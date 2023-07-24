<?php
include 'db.php';

if (isset($_POST["code"]) && !empty($_POST["code"])) {
    // AJAX isteği ile gelen kod verisini al
    $number = $_POST["number"];
    $verificationCode = $_POST["code"];

    $check = $db->prepare("SELECT * FROM sms WHERE pnumber=? AND code=? ORDER BY id desc");
    $check->execute([$number, $verificationCode]);

    // fetch() işleminden sonuç alınacak
    $result = $check->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        // Sonuç bulunursa
        $expectedCode = $result["code"];
        if ($verificationCode == $expectedCode) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        // Sonuç bulunamazsa
        echo "false";
    }
} else {
    echo "Kod eksik veya boş!";
}
?>
