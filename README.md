# apache,php
## mac 自带 apache
```sh
sudo apachectl start
sudo apachectl stop
sudo apachectl -k restart
```

### apache err log position
```sh
tail -fn100 /var/log/apache2/error_log
```

### mac 自带 php.ini 位置
```sh
sudo cp /private/etc/php.ini.defalut /private/etc/php.ini
```

---


## Apache Installation
```sh
# install 
brew install httpd
# DocumentRoot is /usr/local/var/www.

# list
brew services list

# start
brew services start httpd
# access: localhost:8080
```

#### configuration apache
- position: /usr/local/etc/httpd/httpd.conf
- configuration file:
```sh
# 1. DocumentRoot
DocumentRoot "/Users/..."
<Directory "/Users/....">

# 2. AllowOverride 
AllowOverride Node -> AllowOverride All

# 3. mod_rewrite
LoadModule rewrite_module lib/httpd/modules/mod_rewrite.so

# 4. User/Group
# ls -la 
User _www -> <your-name>
Group _www -> staff

# 5. Listen
Listen 8080

# 6. ServerName
#ServerName www.example.com:8080
ServerName localhost

# 7. restart
brew services restart httpd

# 8. for test
echo 'Hello' >> index.html
```
---


## Mysql Installation
```sh
brew search mysql
brew install mysql@5.7

#start
brew services start mysql@5.7
# /usr/local/opt/mysql@5.7/bin/mysql -V

# .zshrc
export PATH=${PATH}:/usr/local/opt/mysql@5.7/bin
```

## PHP Installration
```sh
brew search php
brew install php@7.3
```
> If you need to have php@7.3 first in your PATH run:
  echo 'export PATH="/usr/local/opt/php@7.3/bin:$PATH"' >> ~/.zshrc
  echo 'export PATH="/usr/local/opt/php@7.3/sbin:$PATH"' >> ~/.zshrc

> For compilers to find php@7.3 you may need to set:
  export LDFLAGS="-L/usr/local/opt/php@7.3/lib"
  export CPPFLAGS="-I/usr/local/opt/php@7.3/include"

## Apache PHP Setup
1. To enable PHP in Apache add the following to httpd.conf and restart Apache:
```
LoadModule php7_module /usr/local/opt/php@7.3/lib/httpd/modules/libphp7.so
```
2. set Directory indexes for php
```
<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>
```
and replace it with this:
```
<IfModule dir_module>
    DirectoryIndex index.php index.html
</IfModule>

<FilesMatch \.php$>
    SetHandler application/x-httpd-php
</FilesMatch>
```

## Composer Installration
...


## Get the Magento software
```sh
mkdir magento2
composer create-project --repository=https://repo.magento.com/ magento/project-community-edition magento2
```

### use Public Key & Private Key for login
- access: magento.com
- login -> Marketplace -> My Profile -> Access Keys -> Magento 2
- copy Public Key & private Key
- Y
- Installing...

