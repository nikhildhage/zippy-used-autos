# Backend Web Development 1

## Description

`This project is for the Backend Web Development 1 course. Zippy is a client with 10 cars on his lot and wants to have an application where users can view all his car data. Additionally, he wants an admin page where he can add and delete car data.`

## Dependencies

- PHP 8.12
- PhpMyAdmin
- Apache Server
- MySQL Database

## APP Routes/Urls

### Localhost Url

[index.php](http://localhost/zippy-used-autos/index.php)

### Admin Page Url

[admin_controller.php](http://localhost/zippy-used-autos/View/admin/admin_controller.php)

## Deployed Routes/Urls

## APP Structure

### Index Controller

`Index controller : index.php -> View/vehicleList.php. Index.php is a controller that sends user to default public page vehicleList.php.`

### Admin Controller

`Admin controller : admin/admin_controller.php -> admin/View/adminVehicleList.php. admin_controller.php is a controller that sends user to zippy's admin page adminVehicleList.php. Then adminVehicleLIst.php will have links to other admin pages.`
