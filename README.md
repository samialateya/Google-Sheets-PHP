## About Auth Starter

It's a PHP Application to simplify working with Google Sheets SDK for php.

Note: i used Slim 3 to construct the application but you can easily use the google sheet helper class in any other project;

## Features

User has the following features provided as Web and API

- API Routes from read, write and delete data from the file
- reusable helper class that you can use in any other application 


## Installation

First clone this repository and install the dependencies

```
git clone https://github.com/samialateya/Auth-Starter.git
composer install
```

## Google Developer Console Setup
1- login to [google console](https://console.developers.google.com/) and create new project
2- go to Dashboard and click enable API and Services
3- find google sheet API and click Enable
4- click on create credentials, it will asks you for the following
	a- select API : chose google sheet api
	b- what will be access : chose application data
	c- Are you planning to use this API with Compute Engine: chose NO
	d- click next
	e- add service account name : chose any name you want
	f- click create and continue 
	g- chose the role as currently used / owner
5- go to services account :
	a- you will see a list of all credentials you created select the last one you created
	b- go to keys -> add key -> create new key -> select json
	c- then the json file with all credentials needed will be downloaded to you device
6- thats all on google developer console
7- in the credentials json file you will find "client_email" key, copy the value of this key 'which is an email address' and share it with the spread sheet that you want to read from

## links
[Postman collection] (https://www.getpostman.com/collections/4ff2d50c8308875ae60b)  to test the app

## Contributing

Thank you for considering contributing.
Feel free to fork this repo and submit a pull request with your updates

## Errors and Vulnerabilities

Please open an issue on Github if you discover a vulnerability with this repo or you face an error feel free to contact me on my email [samialateya@hotmail.com](mailto:samialateya@hotmail.com)