
# PHP MVC Project

This is a PHP project that implements an MVC (Model-View-Controller) architecture similar to Laravel framework.

## Folder Structure


### index.php :
 This is the entry point of the application. It includes the necessary files, registers the autoloader, and calls the appropriate controller action based on the request.

## App: 
This folder contains the application code organized into separate directories for models, views, and controllers.

### Models: 
This folder contains the model classes, each extending the abstract Model class. These models have the basic CRUD operations implemented using the PDO database library.

To create a new model, create a new file in the Models directory and extend the Model class. Be sure to set the $tableName property to the name of the database table that the model represents.

### Views:(To-DO)

This folder contains the views (HTML templates) that are rendered by the controller actions. Each view corresponds to a specific controller action.

### Controllers(To-DO):

This folder contains the controller classes. These classes handle the user input and decide which view to render based on that input. Each controller action corresponds to a specific URL route.

## Creating a New Model

To create a new model, follow these steps:

1. Create a new PHP file in the App/Models directory.
2. Define a new class that extends the Model class.
3. Set the $tableName property to the name of the database table that the model represents.
5. Define any additional methods necessary for your specific use case.

Here's an example of what a simple Post model might look like:

```
<?php

namespace App\Models;

use App\Model;

class Post extends Model
{
    protected static $tableName = 'posts';

    // Add any additional methods here
}

```

## Goal

The goal of this project is to provide a basic MVC structure for **PHP applications**, similar to the popular **Laravel framework**. This structure can be used as a starting point for building more complex web applications, with additional models, views, and controllers.