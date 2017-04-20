#user 'dinacleaning' virtual host 'dinacleaning.ru' configuration file
<VirtualHost 82.146.47.91:80>
	ServerName dinacleaning.ru
	AddDefaultCharset off
	AssignUserID dinacleaning dinacleaning
	DocumentRoot /var/www/dinacleaning/data/www/dinacleaning.ru
	ServerAdmin webmaster@dinacleaning.ru
	ServerAlias www.dinacleaning.ru
	DirectoryIndex index.html index.php
	<FilesMatch "\.ph(p[3-5]?|tml)$">
		SetHandler application/x-httpd-php5
	</FilesMatch>
	ScriptAlias /php-bin/ /var/www/php-bin-isp-php70/dinacleaning/
	AddHandler application/x-httpd-php5 .php .php3 .php4 .php5 .phtml
	Action application/x-httpd-php5 /php-bin/php
	CustomLog /var/www/httpd-logs/dinacleaning.ru.access.log combined
	ErrorLog /var/www/httpd-logs/dinacleaning.ru.error.log
</VirtualHost>
<Directory /var/www/dinacleaning/data/www/dinacleaning.ru>
	Options +Includes -ExecCGI
</Directory>
