# laravel-vue-app

## Getting Started

Sebagai pembelajaran penggunaan vue pada laravel 6.2.0

sumber https://www.malasngoding.com/category/laravel/

sumber auth:api https://medium.com/@ripoche.b/create-a-spa-with-role-based-authentication-with-laravel-and-vue-js-ac4b260b882f

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
3. Login with auth:api (postman test)

Tampilan

auth:api

login
![login](https://github.com/maulana20/laravel-vue-app/blob/master/image/login.PNG)

user
![user](https://github.com/maulana20/laravel-vue-app/blob/master/image/user.PNG)

logout
![logout](https://github.com/maulana20/laravel-vue-app/blob/master/image/logout.PNG)

view

login
![login-vue](https://github.com/maulana20/laravel-vue-app/blob/master/image/login-vue.PNG)

home
![home](https://github.com/maulana20/laravel-vue-app/blob/master/image/home.PNG)

edit
![edit](https://github.com/maulana20/laravel-vue-app/blob/master/image/edit.PNG)

trash
![trash](https://github.com/maulana20/laravel-vue-app/blob/master/image/trash.PNG)
