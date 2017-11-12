
sync:
	rm ./src -rf
	cp /var/www/html/blitz-framework/ ./ -R
	mv ./blitz-framework ./src
	mysqldump -u root -p testes_blitz > testes_blitz.sql

logerror:
	sudo tail -f /var/log/httpd/error_log

loginfo:
	sudo tail -f /var/log/httpd/access_log

