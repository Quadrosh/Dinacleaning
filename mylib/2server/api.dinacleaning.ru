#user 'dinacleaning' virtual host 'api.dinacleaning.ru' configuration file
<VirtualHost 82.146.47.91:80>
	ServerName api.dinacleaning.ru
	AddDefaultCharset off
	AssignUserID dinacleaning dinacleaning
	DocumentRoot /var/www/dinacleaning/data/www/api.dinacleaning.ru/rest/web
	ServerAdmin webmaster@api.dinacleaning.ru
	ServerAlias www.api.dinacleaning.ru
	DirectoryIndex index.html index.php
	ScriptAlias /cgi-bin/ /var/www/dinacleaning/data/www/dinacleaning.ru/cgi-bin/
	<FilesMatch "\.ph(p[3-5]?|tml)$">
		SetHandler application/x-httpd-php
	</FilesMatch>
	<FilesMatch "\.phps$">
		SetHandler application/x-httpd-php-source
	</FilesMatch>
	<IfModule php5_module>
		php_admin_value sendmail_path "/usr/sbin/sendmail -t -i -f webmaster@api.dinacleaning.ru"
		php_admin_value upload_tmp_dir "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value session.save_path "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value open_basedir "/var/www/dinacleaning/data:."
	</IfModule>
	<IfModule php7_module>
		php_admin_value sendmail_path "/usr/sbin/sendmail -t -i -f webmaster@api.dinacleaning.ru"
		php_admin_value upload_tmp_dir "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value session.save_path "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value open_basedir "/var/www/dinacleaning/data:."
	</IfModule>
	CustomLog /var/www/httpd-logs/api.dinacleaning.ru.access.log combined
	ErrorLog /var/www/httpd-logs/api.dinacleaning.ru.error.log
</VirtualHost>
<Directory /var/www/dinacleaning/data/www/dinacleaning.ru/rest/web >
	<IfModule php5_module>
		php_admin_flag engine on
	</IfModule>
	<IfModule php7_module>
		php_admin_flag engine on
	</IfModule>
	Options +Includes +ExecCGI
</Directory>
