# OneVision

Сервис для ТЗ(OneVision)

### Инструкция

> Ниже инструкция как развернуть проект

Команды:

- Для build docker контейнера:
    ```shell
    vendor/bin/sail build либо docker-compose build
    ```

- Для поднятие контейнера в режиме демона:
    ```shell
    vendor/bin/sail up -d
    ```
- Для сбора пакетов проекта:
    ```shell
    vendor/bin/sail composer install
    ```
  
- Для сбора npm пакетов
    ```shell
    vendor/bin/sail npm run dev
    ```
  #### Запуск проекта:

    ```shell
    localhost:8085
    ```