# coreui-laravel
CoreUI-laravel is simple adaptation to Laravel the most beautiful free Bootstrap 4 admin template created by Lukasz Holeczek

![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_charts.png)

### Instalação em 5 passos
```bash
git clone https://github.com/taboritis/coreui-laravel.git
cd coreui-laravel
composer install
cp .env.example .env
php artisan key:generate
```

- Você tem que se registrar e fazer login no aplicativo (banco de dados necessário)
- Se você é usuário MySQL, você pode colá-lo em seu arquivo .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coreui
DB_USERNAME=root
DB_PASSWORD=
```
- Para trabalhar com imagens e trazer seus caminhos
```bash
php artisan storage:link
```
- Para criar as pasta com node_modules para trazer as bibliotecas usadas
```bash
cd public/
npm installl
```

- Para criar uma tabela no banco de dados
```bash
	php artisan migrate
```
(ou para criar tabela com o usuário exemplar "John Doe")
```bash
	php artisan migrate:fresh --seed
``` 
 


##### That's all. Enjoy.

### Change log
##### v 1.0.6a
##### v 1.0.6
- Update to CoreUI 1.0.6
- In gulpfile.js prepared scripts to import libraries and app files to /public directory

## Screenshots

![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_charts.png)
![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_cards.png)
![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_charts.png)
![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_switches.png)
![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_tabs.png)
![alt text](https://raw.githubusercontent.com/taboritis/coreui-laravel/master/sample_widgets.png)