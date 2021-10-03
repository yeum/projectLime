server {
        listen 80;
        root /var/www/html;
        index index.html index.htm index.php;

        server_name localhost;

    	error_log  /var/log/nginx/error.log;
	access_log /var/log/nginx/access.log;


        location ~ \.php$ {
                try_files $uri =404;
                fastcgi_split_path_info ^(.+\.php)(/.+)$;
                fastcgi_pass php:9000; 
                fastcgi_index index.php;
                include fastcgi_params;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_param PATH_INFO $fastcgi_path_info;
        }
}