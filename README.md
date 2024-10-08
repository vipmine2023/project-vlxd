1. Download Xampp
2. Edit file php.ini "extension=php_zip.dll"
   Edit file config.inc.php [
    $cfg['Servers'][$i]['host'] = '127.0.0.1'; => $cfg['Servers'][$i]['host'] = 'localhost';
   ]

3. composer install
4. php artisan key:generate
5. php artisan storage:link
6. php artisan serve