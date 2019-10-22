# laravel-vue-app

## Getting Started

Sebagai pembelajaran penggunaan vue pada laravel 6.2.0

sumber https://www.malasngoding.com/category/laravel/

Langkah sebelum memulai :
- sudah menginstal composer (depedencies)

component vue yang sudah bisa di gunakan :
- router
- resource by axios
- pagination
- modal
- validation errors (optional)
- vform axios (optional)

jalankan perintah pengambilan paket (laravel) yang di butuhkan :
```bash
composer install
```

jalankan perintah penambahan table :
```bash
php artisan migrate
```

jalankan perintah penambahan record :
```bash
php artisan db:seed --class=PegawaiSeeder
```

yang sudah :
1. CRUD pegawai (test)
2. Soft delete (penghapusan data sementara) pegawai

Tampilan

list
![home](https://github.com/maulana20/laravel-vue-app/blob/master/image/home.PNG)

edit
![edit](https://github.com/maulana20/laravel-vue-app/blob/master/image/edit.PNG)

trash
![trash](https://github.com/maulana20/laravel-vue-app/blob/master/image/trash.PNG)
