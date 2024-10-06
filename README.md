# Drive-In Cinema API

## The Purpose

This API was made with PHP's Laravel framework for a special task. The goal of it was to implement an API for a drive-in cinema with two data tables.
1. Films
2. Screenings of the films

## Install

To install this app you only need to have some form of Docker installed on your computer.
After you navigate into the main directory where you can find the 'docker-compose.yaml' file you need to run the following command:

```docker-compose up --build```

It installs 3 containers for the app.
1. The Laravel API
2. MySQL database
3. A basic UI for viewing the data

## Using

After the command has completed and the app has started the API will be available threw the following url:

```http://localhost:9000/api```

For accessing the frontend app, you should use this one:

```http://localhost:3000```

For authentication purposes the API uses Laravel Sanctum's cookie based authentication.
