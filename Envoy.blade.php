@servers(['salwa' => 'root@salamdakwah.com'])

@task('pull', ['on' => ['salwa'], 'confirm' => false])
    cd /var/www/salwa
    git pull
    php artisan migrate
@endtask

@task('up', ['on' => ['salwa'], 'confirm' => false])
    cd /var/www/salwa
    php artisan up
@endtask

@task('down', ['on' => ['salwa'], 'confirm' => false])
    cd /var/www/salwa
    php artisan down
@endtask
