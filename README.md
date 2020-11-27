# Laravel MAU

**Laravel MAU** is a Laravel 8 based application that has the scaffolding of manually auth integration, [as the documentation described](https://laravel.com/docs/8.x/authentication#authenticating-users). It also include [Laravel Email Verification](https://laravel.com/docs/8.x/verification) and [Laravel Password Reset](https://laravel.com/docs/8.x/passwords) functionalities. For the frontend, I used [Tailwind CSS](https://tailwindcss.com/) with official and free [Tailwind UI Components](https://tailwindui.com/components). Why Tailwind? because if you want to scale up this app with [Laravel Livewire](https://laravel-livewire.com/) easily (don't confuse, [Laravel Livewire](https://laravel-livewire.com/) also support [Bootstrap](https://getbootstrap.com/), but you have to edit some Laravel config files).

## Installation

### 1. Clone this repository on your local machine

```bash
git clone https://github.com/OCarvajalMora/laravel-mau.git
```

### 2. Set up your environment
* Duplicate **.env.example** file into the same location and rename the **copy of .env.example** file to **.env**.
* Install the project dependencies with Composer, running the following command into your folder project:
```bash
composer install
```
* Then, generate a new APP_KEY into your **.env** file running this command (into your folder project, sure):
```bash
# the key generated will be stored into APP_KEY variable on your .env file
php artisan key:generate
```
* Finally, in **.env file**, set up your database and Mailtrap variables (Mailtrap is necessary if you want to use email validation, and reset password functionalities, for example, in development environment). Learn more about Mailtrap.io [here](https://mailtrap.io/).

### 3. Usage

Open your command line (terminal on Mac and cmd on Windows) into the project folder location and run the following commands:

```bash
# this will run the database migrations 
php artisan migrate

# this will run the application into a local host. Usually, http://127.0.0.1:8000
php artisan run serve 
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Questions?
You are welcome to send me an email to [os.carvajalmora@gmail.com](mailto:os.carvajalmora@gmail.com)
