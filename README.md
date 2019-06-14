# 104jb-c-slim
learning slim

#### Start up by Vagrant
`vagrant up --provision`

#### VM BOX default
```
default: SSH address: 127.0.0.1:2200
default: SSH username: ubuntu
default: SSH auth method: password
```

#### run composer install/update
```
cd /var/www/html/jobs/search/ 
composer update   
```
1.	Virtual box check Hyper V 

2.	啟動 登入
Vagrant up && vagrant ssh 

3.	Ubuntu install composer
https://www.kjnotes.com/devtools/88

4.	Enable mod_rewrite 
sudo a2enmod rewrite
https://hostadvice.com/how-to/how-to-enable-apache-mod_rewrite-on-an-ubuntu-18-04-vps-or-dedicated-server/

5.	設定 目錄檔案權限
config.vm.synced_folder ".", "/var/www/html/jobs/slim",
    :owner => "vagrant", :group => "vagrant",
    :mount_options => ["dmode=777,fmode=777"]

6.	使用 PHP-DI Compatibility with PHP-DI 6.0
"php-di/slim-bridge": "^2.0"

7.	使用sudo -i命令提升用户权限
