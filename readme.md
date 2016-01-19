# Products Api

This is a REST API for managing products and it is based on the Lumen framework.

The availavle endpoints are:

  - `GET api/v1/products`
  - `GET api/v1/products/{id}`
  - `POST api/v1/products`
  - `PUT api/v1/products/{id}`
  - `DELETE api/v1/products/{id}`


### Installation
First you need to clone the repo and create a .env file or you can just copy the example.env file. 

Then in the root directory run the following commands  
```sh
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

### Testing
Tests are written for each endpoint. You can run tests by just running `phpuinit` in the root directory.
