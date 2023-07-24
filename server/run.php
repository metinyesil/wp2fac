<?php
if (isset($_POST["numara"]) && isset($_POST["code"])) {
    $whatsappNumber = $_POST["numara"];
    $code = $_POST["code"];
    shell_exec("py wp2fac.py --number=$whatsappNumber --code=$code");
} else {
    echo "Hata: Geçersiz veya eksik veri.";
}
?>
