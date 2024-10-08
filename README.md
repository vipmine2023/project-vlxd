1. Download Xampp
2. Edit file php.ini "extension=php_zip.dll"
   Edit file config.inc.php [
    $cfg['Servers'][$i]['host'] = '127.0.0.1'; => $cfg['Servers'][$i]['host'] = 'localhost';
   ]

3. Composer install
4. php artisan serve