# Laravel MAU

**Laravel MAU** is a Laravel 8 based application that has the scallfolding of manually auth integration, [as the documentation described](https://laravel.com/docs/8.x/authentication#authenticating-users). It also include [Laravel Email Verification](https://laravel.com/docs/8.x/verification) and [Laravel Password Reset](https://laravel.com/docs/8.x/passwords) functionalities. For the frontend, I used [Tailwind CSS](https://tailwindcss.com/). Why Tailwind? because if you want to scale up this app with [Laravel Livewire](https://laravel-livewire.com/) easily (don't confuse, [Laravel Livewire](https://laravel-livewire.com/) also support [Bootstrap](https://getbootstrap.com/), but you have to edit some Laravel config files).

## Installation

### 1. Clone this repository on your local machine

```bash
git clone https://github.com/OCarvajalMora/laravel-mau.git
```

### 2. Set up your environment
* Duplicate **.env.example** file into the same location.
* Rename the **copy of env.example** file to **.env**.
* In **.env file**, set up your database and Mailtrap variables (this is necessary if you want to use email validation, and reset password functionalities, for example). Learn more about Mailtrap.io [here](https://mailtrap.io/).

### 3. Usage

Open your command line (terminal on Mac and cmd on Window) into the project folder location and run the following commands:

```bash
php artisan migrate # this will run the database migrations 
php artisan run serve # this will run the application into a local host. Usually: http://127.0.0.1:800
```


## Questions?
You are welcome to send me an email to [os.carvajalmora@gmail.com](mailto:os.carvajalmora@gmail.com)
