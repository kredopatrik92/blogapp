

## Blog Application

An Application consists of basic authentication and CRUD operation.

## Installation guide

- Link the project to laravel HERD
- Run composer install
- Run npm install
- Configure the database in the .env file
- Run php artisan migrate
- Run php artisan db:seed
- Run npm run dev

## Unit Testing
### Authentication Tests

- php artisan test --filter=Registration
- php artisan test --filter=Authentication

### CRUD Operation Tests

- php artisan test --filter=BlogAddEdit
- php artisan test --filter=BlogDetails
- php artisan test --filter=DeleteModal
- php artisan test --filter=UpvoteDownvote

### All Tests

- Run php artisan test


## Notes

After running tests must need to re-run "php artisan db:seed" before proceeding to test the application. In order to have its roles and permissions. 



