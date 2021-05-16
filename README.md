# PHPUnit

Learn PHPunit

# Referent
https://phpunit.readthedocs.io/en/9.5/

## SetUp
- 1.
    ```
    Pull code from github https://github.com/QuocCuongUET/learn-phpunit.git
    ```
- 2.
    ```
    cd learn-phpunit
    ```
- 3.
    ```
    RUN docker-compose build
    ```
- 4.
    ```
    RUN docker-compose up -d
    ```
- 5.
    ```
    RUN docker exec -it learn_app_1 bash
    ```
- 6.
    ```
    RUN composer install
    ```
- 7.
    ```
    RUN ./vendor/bin/phpunit tests
    RUN ./vendor/bin/phpunit tests --filter {TestMethodName} {FilePath}
    ```

## Note

    - 1. When change code.
    ```
    RUN composer dump-autoload
    ```
    - 2. Name of function unit test must begin with 'test'
       Ex: public function test_something()


