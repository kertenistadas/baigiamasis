# Trip booking system

### Requirements

- PHP 8.2
- MySQL 8.0
- [Composer](https://getcomposer.org/download/)

### Launching the application

- Install [Docker & docker-compose](https://www.docker.com/)
- Update `app/Configuration/Configuration.php` file with your database credentials
- Start the stack: `docker-compose up -d`
- Enter PHP container: `docker-compose exec php sh`
- Install Composer dependencies (from PHP container): `composer install`
- Open PHPMyAdmin at [http://localhost:18080](http://localhost:18080) and import **reservations.sql** file to have 
initial tables
- Open the application at [http://localhost](http://localhost)

### Structure

All the public files are served from `app/public` directory.

- Configuration: MySQL configuration
- Controller: contains application controllers
- Model: contains application models
- public: static files are served from this directory. All the routing to controller actions is handled in `index.php` file
- Repository: contains services that interact with the database
- Service: contains application services (MySQL client, CSV Generator)
- View: contains application views

### Available resources

| URL                    | Description        | Port  | 
|------------------------|--------------------|-------|
| http://localhost       | Application        | 80    |
| http://localhost       | MySQL service      | 3306  |
| http://localhost:18080 | PHPMyAdmin service | 18080 |
