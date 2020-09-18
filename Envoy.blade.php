@servers(['prod' => 'omido@64.227.4.190'])

@story('deploy', ['on' => 'prod'])
start
git
@if($composer)
    composer
@endif
permissions
rebuild-cache
finish
@endstory

@task('start')
cd /var/www/html/cervekenya.com
php artisan down
echo 'Updating the production environment...'
@endtask

@task('finish')
cd /var/www/html/cervekenya.com
php artisan up
echo 'All done!'
@endtask

@task('git')
cd /var/www/html/cervekenya.com
git pull
@endtask

@task('composer')
cd /var/www/html/cervekenya.com
if [ -d "vendor" ]; then
rm -rf vendor
fi
composer install --no-dev
@endtask

@task('permissions')
cd /var/www/html/cervekenya.com
echo 'File permissions set successfully'
@endtask

@task('rebuild-cache')
cd /var/www/html/cervekenya.com
php artisan view:clear
php artisan route:clear
php artisan cache:clear
php artisan config:clear
@endtask
