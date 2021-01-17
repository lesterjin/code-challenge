## Code Challenge

This challenge requires you to create an API that will import data from a third party API and be able
to display it.

## Framework

I used Lumen (8.2.1) (Laravel Components ^8.0)

## Features Created

I have fetched a 100 users from the given 3rd party API
Retrieved users data has been saved in **customer** table
Imported customers are only **Australian**
Importer can be used in any part of the application
Console command has been created
If the email exists, the customer will be updated.

## Tutorials
Please clone the repository *git clone https://github.com/lesterjin/code-challenge.git*
Please Modify the .env file  **config the database, root and pass, I have used the database name challenge**
Please Run *composer install*
Please Run *php artisan migrate*

To fetch the *customers* from the JSON API:
  - To use the **Console**, in the terminal, please type *php artisan import:customer*
  - To use the default seeder, please use the *php artisan db:seed*

To run the lumen framework, please type *php -S localhost:8000 -t public*
For the list of customers, please visit */api/customers*
To view single customer, please visit */api/customers/{id}* example: */api/customers/5*

## Developer Notes Guide:
The customer password should be hashed using the md5 algorithm. - **Created**
The database should only store the information that is needed for this task. - **Created**
In your tests make sure to not to request the real third party API. **Created** - **I have created a local json version of the parsed records**
The database layer should be Doctrine, Laravel Doctrine **Laravel Standard Coding has been used**
Please submit your code in a GitHub repository. - **Yes, Cheers!**

## NOTES:
*Howdy*, If you find this code working... **Please HIRE ME!**

