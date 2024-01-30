## Installation steps
1. run `docker compose up -d --build`
2. run `docker exec backend composer install`

## Steps to enable xdebug
1. copy `docker-compose.override.yml.example` and rename into `docker-compose.override.yml`
2. if you use Linux you need to change XDEBUG's client_host to a proper ip
3. `PHP_IDE_CONFIG: "serverName=app"` this is refers to phpStorm settings

## Working app features
* get all turbines `/turbines`
* get specific turbine by id `turbines/{id}`
* get specific turbine address `turbines/{id}/address`

## Sample app features (some parts of the code have to be finished)
* create a turbine (simple validation is implemented)
* update a turbine
* delete a turbine

## Possible improvements:
* Finish implementing turbine creating, updating, and deleting
* Week routing. Now routing can only accept one variable, and it should be numeric type
* Use separate db for tests
* Add PHP Code sniffer
* Specifying a database connection/config depending on the environment
