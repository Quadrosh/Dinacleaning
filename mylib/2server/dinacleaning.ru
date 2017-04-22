#user 'dinacleaning' virtual host 'dinacleaning.ru' configuration file
<VirtualHost 82.146.47.91:80>
	ServerName dinacleaning.ru
	DocumentRoot "/var/www/dinacleaning/data/www/dinacleaning.ru/client"
	ServerAdmin webmaster@dinacleaning.ru
	AddDefaultCharset UTF-8
	AssignUserID dinacleaning dinacleaning
	CustomLog /var/www/httpd-logs/dinacleaning.ru.access.log combined
	ErrorLog /var/www/httpd-logs/dinacleaning.ru.error.log
	<FilesMatch "\.ph(p[3-5]?|tml)$">
		SetHandler application/x-httpd-php5
	</FilesMatch>
	ScriptAlias /php-bin/ /var/www/php-bin-isp-php70/dinacleaning/
	AddHandler application/x-httpd-php5 .php .php3 .php4 .php5 .phtml
	Action application/x-httpd-php5 /php-bin/php
	ServerAlias www.dinacleaning.ru
	DirectoryIndex index.html

</VirtualHost>
<Directory "/var/www/dinacleaning/data/www/dinacleaning.ru/client">
	Options +Includes -ExecCGI
	RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    DirectoryIndex index.html
    RewriteRule . index.html
</Directory>
