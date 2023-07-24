<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Numara ve Kod Girişi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="whatsappNumber">Whatsapp Numaranızı Giriniz:</label>
                    <input type="text" class="form-control" id="whatsappNumber" placeholder="Numara">
                    <button class="btn btn-primary mt-2" id="sendButton">Send</button>
                    <br><div class="spinner-border text-primary d-none" role="status" id="loader"></div>
                </div>
                <div id="result" class="mt-3"></div>
                <div class="form-group d-none" id="codeInput">
                    <label for="verificationCode">Kodu Giriniz (6 haneli):</label>
                    <input type="text" class="form-control" id="verificationCode" maxlength="6" pattern="\d{6}" required>
                    <button class="btn btn-primary mt-2" id="submitCode">Send</button>
                    <br> Süre: <span id="minutes">3</span>:<span id="seconds">0</span>
                </div>

                <div class="mt-3" id="timeoutMessage" style="color: red; display: none;">
                Lütfen sayfayı yenileyerek tekrar deneyiniz.
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sendButton").click(function() {
                var whatsappNumber = $("#whatsappNumber").val();
                $("#sendButton").hide();
                $("#loader").removeClass("d-none");

                $.ajax({
                    url: "send.php", // POST işlemini yapacağımız dosya
                    method: "POST",
                    data: { numara: whatsappNumber }, // POST olarak gönderilecek veri
                    success: function(response) {
                        // Başarılı yanıt geldiğinde
                        $("#loader").addClass("d-none");
                        $("#codeInput").removeClass("d-none");
                        startTimer();
                        $("#result").html("<p>" + response + "</p>");
                    },
                    error: function() {
                        // Hata oluştuğunda
                        alert("Numara gönderilemedi!");
                    }
                });
            });

            $("#submitCode").click(function() {
                var whatsappNumber = $("#whatsappNumber").val(); // whatsappNumber değişkenini tanımla
                var verificationCode = $("#verificationCode").val();
                
                // AJAX ile check.php'ye post işlemi yapalım
                $.ajax({
                    url: "check.php", // POST işlemini yapacağımız dosya
                    method: "POST",
                    data: { number: whatsappNumber, code: verificationCode }, // POST olarak gönderilecek veri
                   success: function(response) {
                        // Başarılı yanıt geldiğinde
                        // check.php'den gelen sonucu result alanına ekleyelim
                        if (response === 'true') {
                            $("#result").append("Başarılı");
                        } else {
                            $("#result").append("Başarısız");
                        }
                    },
                    error: function() {
                        // Hata oluştuğunda
                        alert("Kod gönderilemedi!");
                    }
                });
            });

            function startTimer() {
                var minutes = 3;
                var seconds = 0;

                var interval = setInterval(function() {
                    if (seconds == 0) {
                        if (minutes == 0) {
                            clearInterval(interval);
                            $("#timeoutMessage").show(); // Süre doldu uyarısı
                            $("#codeInput").hide(); // Kod inputunu gizle
                        } else {
                            minutes--;
                            seconds = 59;
                        }
                    } else {
                        seconds--;
                    }

                    $("#minutes").text("0"+minutes);
                    $("#seconds").text(seconds < 10 ? "0" + seconds : seconds);
                }, 1000); // Her 1 saniyede bir sayaçı azalt
            }
        });
    </script>
</body>
</html>
