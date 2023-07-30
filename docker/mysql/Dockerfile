FROM mysql:latest

# Установка переменных окружения MySQL 1
ENV MYSQL_ROOT_PASSWORD=test
ENV MYSQL_DATABASE=test
ENV MYSQL_USER=test
ENV MYSQL_PASSWORD=test

# Копирование файла базы данных в контейнер
COPY ./docker/mysql/dumps/dump.sql /docker-entrypoint-initdb.d/

# Открытие порта для подключения к MySQL извне контейнера
EXPOSE 3306
