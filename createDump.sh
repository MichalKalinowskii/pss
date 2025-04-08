docker exec -i db mariadb-dump -uroot -proot --databases wordpress --skip-comments > ./dump/dump.sql

#Jeśli chcesz postawić na nowo kontenery z wczęśniejszymi danymi
#docker-compose down -v
#docker-compose up -d
