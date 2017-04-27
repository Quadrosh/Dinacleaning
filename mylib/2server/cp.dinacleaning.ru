#user 'dinacleaning' virtual host 'cp.dinacleaning.ru' configuration file
<VirtualHost 82.146.47.91:80>
	ServerName cp.dinacleaning.ru
	DocumentRoot "/var/www/dinacleaning/data/www/dinacleaning.ru/rest/web"
	AddDefaultCharset UTF-8
	AssignUserID dinacleaning dinacleaning
	ServerAdmin webmaster@cp.dinacleaning.ru
	ServerAlias www.cp.dinacleaning.ru
	DirectoryIndex index.html index.php
	ScriptAlias /cgi-bin/ /var/www/dinacleaning/data/www/cp.dinacleaning.ru/cgi-bin/
	ScriptAlias /php-bin/ /var/www/php-bin-isp-php70/
	<FilesMatch "\.ph(p[3-5]?|tml)$">
		SetHandler application/x-httpd-php
	</FilesMatch>
	<FilesMatch "\.phps$">
		SetHandler application/x-httpd-php-source
	</FilesMatch>
	<IfModule php5_module>
		php_admin_value sendmail_path "/usr/sbin/sendmail -t -i -f webmaster@cp.dinacleaning.ru"
		php_admin_value upload_tmp_dir "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value session.save_path "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value open_basedir "/var/www/dinacleaning/data:."
	</IfModule>
	<IfModule php7_module>
		php_admin_value sendmail_path "/usr/sbin/sendmail -t -i -f webmaster@cp.dinacleaning.ru"
		php_admin_value upload_tmp_dir "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value session.save_path "/var/www/dinacleaning/data/mod-tmp"
		php_admin_value open_basedir "/var/www/dinacleaning/data:."
	</IfModule>
	CustomLog /var/www/httpd-logs/cp.dinacleaning.ru.access.log combined
	ErrorLog /var/www/httpd-logs/cp.dinacleaning.ru.error.log
</VirtualHost>
<Directory /var/www/dinacleaning/data/www/dinacleaning.ru/rest/web >
	<IfModule php5_module>
		php_admin_flag engine on
	</IfModule>
	<IfModule php7_module>
		php_admin_flag engine on
	</IfModule>
	Options +Includes +ExecCGI
	RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    DirectoryIndex index.php
    RewriteRule . index.php
</Directory>
