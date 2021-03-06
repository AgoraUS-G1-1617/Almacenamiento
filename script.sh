# Funciona DB
#!/bin/bash
sudo docker run --name db \
    -v "/home/usuario/EGC/Almacenamiento-dev/despliegue/bd.sql":/home/user/populate.sql \
    -e MYSQL_ROOT_PASSWORD="ROOT" \
    --restart=always \
    -d mysql:5.7 \
    --bind-address=0.0.0.0



      
sudo docker run -d --name storage \
	--link db:exdb \
	-v "/home/usuario/EGC/Almacenamiento-dev/":/home/auth/ \
	-e WEB_DOCUMENT_ROOT=/home/auth \
	--restart=always \
	-p 8081:80 \
	webdevops/php-nginx:debian-8

sleep 10

sudo docker exec db \
    bash -c "exec mysql -uroot -p"ROOT" < /home/user/populate.sql"



