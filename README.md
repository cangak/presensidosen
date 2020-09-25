# Presensi Mengajar Dosen POLNEP

## Cara Instalasi
* Clone Repository ini
* Masuk ke directory hasil cloning tadi
* Jalankan perintah instalasi composer
```
composer install
```
* Initialisasi kode dengan menjalankan perintah
```
php init
```
* Kemudian Pilih Development
* Konfigurasi database yang ada di common/main-local.php
* Jalankan database migrations dengan perintah
```
./yii migrate
./yii migrate --migrationPath=@yii/rbac/migrations
./yii rbac/init


```
* Login sebagai root dengan melui link site/login
* Default username: cangakkeren ; password: j3mp0l4n
