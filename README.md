
<br/>
<p align="center">
  <a href="https://github.com/metinyesil/Wp2Fac">
    <img src="https://i.ibb.co/JqTZZc8/wp2fac.png" alt="Logo" width="80" height="80">
  </a>  <h3 align="center">Wp2Fac</h3>

  <p align="center">
    Whatsapp 2 Factor Verification Code Sending Module
    <br/>
    <br/>
  </p>
</p>



## Table Of Contents

* [About the Project](#about-the-project)
* [Getting Started](#getting-started)
  * [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [Authors](#authors)
* [Acknowledgements](#acknowledgements)

## About The Project

EN:
A 2-factor module you can use for your website or app. With this module, you will be able to offer your users an additional verification method.

TR:
Websiteniz veya uygulamanız için kullanabileceğiniz bir 2 faktör modülü. Bu modül sayesinde, kullanıcılarınıza ek bir doğrulama yöntemi sunabileceksiniz.

## Getting Started

Please follow the steps below for installation.

### Installation

EN:
- You will need a vds server, you should run everything in the /server folder on the vds server.
- Install Python in the VDS and install the pywhatkit library in it.
- Upload the files in the main directory to your server and run the system by installing the database.
- line 19 in send.php Change the "http://localhost/wp2fac/server/run.php" folder to your own vds ip and the directory where you keep the files.
- Start using!

TR:
- bir vds sunucuya ihtiyacınız olacak, /server klasörü içerisindeki her şeyi vds sunucuda çalıştırmalısınız.
- VDS içerisine Python yükleyin ve içerisine pywhatkit kütüphanesini yükleyin.
- Ana dizinde bulunan dosyaları sunucunuza yükleyin ve veritabanını yükleyerek sistemi çalıştırın.
-  send.php içerisindeki 19. satırda bulunan "http://localhost/wp2fac/server/run.php" klasörünü kendi vds ip ve dosyaları tuttuğunuz dizin şeklinde değiştirin.
- Kullanım başlasın!

## Usage

EN:
- Open index.php file and enter +[area code][number] (combined) format.
- Then enter the incoming code and you can see that the response returned as "confirmed".

TR:
- index.php dosyasını açın ve +[alan kodu][numara] (birleşik) formatı ile girin.
- Daha sonra gelen kodu girin ve "onaylandı" olarak dönen response olduğunu görebilirsiniz.



