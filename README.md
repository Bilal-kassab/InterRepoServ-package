# InterRepoServ/InreSer Package

A Laravel package to streamline the process of creating Interfaces, Repositories, Services, and DTOs (Data Transfer Objects) in a Laravel project. This package enables you to follow clean coding practices by using the Repository Pattern and Service Layer Pattern, promoting a modular and testable application structure.

## Installation
To install the package, run the following command:

> ## composer require interreposerv/inreser
Usage
1. Creating an Interface
This command generates a new interface file under the app/Interfaces directory:

bash
Copy code
php artisan make:interface YourInterfaceName
Replace YourInterfaceName with the desired name of the interface. Interfaces define the structure of methods that implementing classes will use, providing consistency across your application.

2. Creating a Repository
This command creates a repository class in the app/Repositories directory, optionally implementing a specific interface:

bash
Copy code
php artisan make:repository YourRepositoryName
To make the repository implement an interface, use the --interface option:

bash
Copy code
php artisan make:repository YourRepositoryName --interface=YourInterfaceName
Replace YourRepositoryName with the repository name and YourInterfaceName with the interface name. Using repositories separates data logic from controllers, making it easier to swap data sources without modifying the interface.

3. Creating a Service
To create a service class, run:

bash
Copy code
php artisan make:service YourServiceName
This generates a new service class in the app/Services directory. Services encapsulate business logic and promote code reusability across different parts of your application.

4. Creating a DTO (Data Transfer Object)
Data Transfer Objects (DTOs) help manage data structures by ensuring data integrity and keeping code organized. To create a DTO, use:

bash
Copy code
php artisan make:dto YourDtoName
This command generates a DTO class in app/DTOs with predefined methods for transforming data to and from arrays.

Additional Information
This package automatically registers these artisan commands, allowing for easy generation of Interfaces, Repositories, Services, and DTOs with a consistent structure across your Laravel application.

