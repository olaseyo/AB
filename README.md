# A&D Booking Console

[![Build Status](https://travis-ci.org/andela-kerinoso/potato-orm.svg)](https://travis-ci.org/andela-kerinoso/potato-orm)


This is a simple transportation booking web app built on top a light MVC framework.

## Installation

[PHP](https://php.net) 5.5+ and [Composer](https://getcomposer.org) are required.


``` bash
Clone Repo,extract it inside phpmyadmin htdoc folder
```

``` bash
$ composer install
```

``` bash
  Create a database called ticketing
```

``` bash
  Import database file. File can be located in the root directory
```

``` php
  Update the configuration file config.php in the Config directory accordingly

define('DB_HOST','localhost');
define('DB_USER','olumide');
define('DB_PASSWORD','root');
define('DATABASE','ticketing');
define('SERVER','http://localhost:8888');
```

## Usage
Access project from you localhost menu or follow this pattern:
host:port/folder_name

## Testing


``` php
Update the yml files in the testing directory with your project url

actor: FunctionalTester
modules:
    enabled:
        # add a framework module here
        - PhpBrowser:
            url: http://localhost:8888/Ticketing
        - \Helper\Functional
    step_decorators: ~   
```
##Entity Relationship Diagram
![alt text](https://github.com/olaseyo/AB/blob/main/ticketing.png?raw=true)

## Database Constraints

 
Bookings: The bookings table has three distinct constraints namely: Primary,Foreign Key,Not Null
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
User_id: user_id here, is a foreign key which references the user creating the record. From the user table to bookings table, a one to many relationship is maintained. Which means a user can have many bookings.
customer_id: customer_id here, is a foreign key which references the customer  the record belongs to. From the customers table to bookings table, a one to many relationship is maintained. Which means a customer can have many bookings.
schedule_id: schedule_id here, is a foreign key which references the travel schedules  the record belongs to. From the travel schedules table to bookings table, a one to many relationship is maintained. Which means a travel schedule can have many bookings.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.

Buses: The buses table has three distinct constraints namely: Primary,Foreign Key,Not Null
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
User_id: user_id here, is a foreign key which references the user creating the record. From the user table to buses table, a one to many relationship is maintained. Which means a user can have many buses.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.


Customers: The customer table has four distinct constraints namely: Primary,Foreign Key,Not Null and unique.
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
user_id: user_id here, is a foreign key which references the user creating the record. From the user table to customers table, a one to many relationship is maintained. Which means a user can have many customers.
phone: The phone column has a unique constraint. This enforces that no record should have the same phone number. The purpose of this is to make sure that unnecessary repetition is not allowed in the DB.
email: The email column has a unique constraint. This enforces that no record should have the same email. The purpose of this is to make sure that unnecessary repetition is not allowed in the DB.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.


Drivers: The drivers table has three distinct constraints namely: Primary,Foreign Key,Not Null
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
User_id: user_id here, is a foreign key which references the user creating the record. From the user table to drivers table, a one to many relationship is maintained. Which means a user can have many buses.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.

Payments: The payments table has three distinct constraints namely: Primary,Foreign Key,Not Null.
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
user_id: user_id here, is a foreign key which references the user creating the record. From the users table to payments table, a one to many relationship is maintained. Which means a user can have many payments.
booking_id: The booking_id is a foreign key which references the booking  the payment belongs to. From the bookings table to payments table, a one to one relationship is maintained. Which means a booking can have one payment.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.

Travel Schedules: The travel schedule table has three distinct constraints namely: Primary,Foreign Key,Not Null.
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
          The primary key combines two constraints; unique and notnull.
user_id: user_id here, is a foreign key which references the user creating the record. From the users table to schedule table, a one to many relationship is maintained. Which means a user can create many schedules.
bus_id: The bus_id is a foreign key which references the bus the schedule belongs to. From the bus table to schedule table, a one to many relationship is maintained. Which means a bus can be scheduled many times.
driver_id: The driver_id is a foreign key which references the driver the schedule belongs to. From the driver table to the schedule table, a one to many relationship is maintained. Which means a driver can be scheduled for a trip many times.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.

User: The user table has two distinct constraints namely: Primary,Not Null
Id: The column id has a primary key constraint which prevents it from having duplicate records, null is not also allowed.
Not null:Generally, the not null constraint was applied on most of the columns to prevent empty columns and maintain integrity.






## Supported database

Currently, only MYSQL and PostgreSQL are supported.

Work towards the support for other popular databases is in progress.
