#user 'dinacleaning' virtual host 'api.dinacleaning.ru' configuration file
<VirtualHost 82.146.47.91:80>
	ServerName api.dinacleaning.ru
	DocumentRoot /var/www/dinacleaning/data/www/dinacleaning.ru/rest/web
	AddDefaultCharset UTF-8
	AssignUserID dinacleaning dinacleaning
	ServerAdmin webmaster@api.dinacleaning.ru
	ServerAlias www.api.dinacleaning.ru
	DirectoryIndex index.html index.php
	### GZIP
      <ifModule mod_deflate.c>
        <IfModule mod_filter.c>
          AddOutputFilterByType DEFLATE text/plain
          AddOutputFilterByType DEFLATE text/html
          AddOutputFilterByType DEFLATE text/xml
          AddOutputFilterByType DEFLATE text/css
          AddOutputFilterByType DEFLATE application/xml
          AddOutputFilterByType DEFLATE application/xhtml+xml
          AddOutputFilterByType DEFLATE application/rss+xml
          AddOutputFilterByType DEFLATE application/javascript
          AddOutputFilterByType DEFLATE application/x-javascript 
          AddOutputFilterByType DEFLATE application/json
          AddOutputFilterByType DEFLATE application/vnd.ms-fontobject application/x-font-ttf font/opentype image/svg+xml image/x-icon
          BrowserMatch ^Mozilla/4 gzip-only-text/html
          BrowserMatch ^Mozilla/4\.0[678] no-gzip
          BrowserMatch \bMSIE !no-gzip !gzip-only-text/html 
        </ifModule>
      </ifModule>
      ### Cache step 1 - Header set Cache-Control
          <ifModule mod_headers.c>
              # 43200 - day, 604800 - week, 2592000 - month
            <FilesMatch "\.(html|js|css)$">
              Header set Cache-Control "max-age=2592000"
              # Header unset Last-Modified
            </FilesMatch>
            <Files *.txt>
              Header add Cache-Control "max-age=43200"
            </Files>
            <FilesMatch "\.(flv|swf|ico|gif|jpg|jpeg|png)$">
              Header set Cache-Control "max-age=2592000"
            </FilesMatch>
            <FilesMatch "\.(pl|php|cgi|spl|scgi|fcgi)$">
              # disable cache 
              Header unset Cache-Control
            </FilesMatch>
          </IfModule>

          ### Cache step 2 - ExpiresByType 
          <IfModule mod_expires.c>
            # Enable expires
            ExpiresActive On            
            # Default cache expiration
            ExpiresDefault "access plus 10 month"            
            # Images
            ExpiresByType image/gif                 "access plus 1 month"
            ExpiresByType image/png                 "access plus 1 month"
            ExpiresByType image/jpg                 "access plus 1 month"
            ExpiresByType image/jpeg                "access plus 1 month"          
            # CSS, JavaScript
            ExpiresByType text/css                  "access plus 1 year"
            ExpiresByType application/javascript    "access plus 1 year"
            ExpiresByType text/javascript           "access plus 1 year"
          </IfModule>

          ### Delete ETag header (possible problem with cache gzip)
          <IfModule mod_headers.c>
            Header unset ETag
            Header set Cache-Control "max-age=2592000, public"
          </IfModule>
          FileETag None

      
    ### END gzip+cache

	ScriptAlias /cgi-bin/ /var/www/dinacleaning/data/www/api.dinacleaning.ru/cgi-bin/
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
