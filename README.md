# OneVision

Сервис для ТЗ(OneVision)

### Инструкция

> Ниже инструкция как развернуть проект

Команды:

- Устанавливаем бэкенд зависимости командой **bash vendor/bin/sail composer install** набрав ее находясь в корневой директории проекта

- Для build docker контейнера:
    ```shell
    vendor/bin/sail build либо docker-compose build
    ```

- Для поднятие контейнера в режиме демона:
    ```shell
    vendor/bin/sail up -d
    ```
  
- Для сбора npm пакетов
    ```shell
    vendor/bin/sail npm run build
    ```
  #### Запуск проекта:

    ```shell
    localhost:8085
    ```