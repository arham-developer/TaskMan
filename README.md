# Task Management
This project is a web application build using [Laravel 10.x](https://laravel.com/docs/10.x) with [Livewire 2.8](https://laravel-livewire.com/docs/2.x/quickstart) and Mysql as database

## Overview
This application will serve as a practical tool for users like admin, regular user, and guest also to organize their tasks with functionalities: add, view, update, and delete tasks. A task is defined by a title, description, priority level (High, Medium, Low), status (pending, in-progress, or done) and unit or depart or division. And a task can have a subtask or unlimited nested task
 
## Installation
* Clone this repo
* Composer install
* Make `.env` file and setup an empty mysql database
* In terminal, run :

`php artisan key:generate`

then

`php artisan migrate --seed` and `php artisan storage:link`

and run application
`php artisan serve`
 
 ## Usage
 * users
 - Admin : `admin@taskm.com` password: `adminpassword`
 - User : `user@taskm.com` password `userpassword`
- Guest: just click `Login as guest` button on login page

NOTE: or please check and adjust the `UserSeeder.php` file on seeders, then run `php artisan migrate --seed` again

## User Roles
<b>Admin</b> can access all tasks and also can take action on it, included ability to organise units divisions or departements, and regular users.

<b>Regular User</b> can organize task also but limited of the tasks that assigned to selected user only

<b>Guest</b> can access public tasks only

## App Structure
```
Login
├── Tasks
│   └── Subtask
│   │   └── Sub subtask
│   │   │   ├── ... subtasks
│   └── Subtask
│   └── Subtask
├── Units
├── Users
└── Logout
```

## Features
#### Tasks
at tasks list page will start to create a task, then show the top tasks with info about sort by priority and created as descending
* title
* description
* priority
* unit
* status
* list of sub task
* timetracks count
#### Detail Task
 - Add sub task 
 - Sub tasks list, like top tasks before with clickable the detail on each to reach the subtask detail, (unlimited)
 - Start and stop Track time
 - Delete the current task


#### Timetracks
* This feature to tracking times when user start and stop the task
* Each detail page of a task will have timetracks button
* Time track has constraint that determine if any record in-progress, it will prevent duplicate tracking activity at one task
#### Units
 units is a simple CRUD unit or division or departmennt
#### Users 
As general also, this feature is a simple create more regular user

## Restful-API
Finally endpoints provided and tested, using sanctum for the sessions and access control
- Post `api/login`
    ```
    {
    	"email": "admin@taskm.com",
	    "password": "adminpassword"
    }
    ```
- Post `api/logout`
- Get `api/units`
- Get `api/tasks`
- Get `api/subtasks/{taskId}`
sample `api/subtasks/df8bec5c-63e9-4d0d-9835-d64dba31eb65`
- Post `api/task/create` (task)
```
{
	"is_public": true,
	"title": "task by api more",
	"description": null,
	"priority": "high",
	"unit_id": 2
}
```
- Post `api/task/create` (subtask)
```
{
	"is_public": true,
	"title": "task by api more",
	"description": null,
	"priority": "high",
	"unit_id": 2,
    "parent_id": "df8bec5c-63e9-4d0d-9835-d64dba31eb65"
}
```
- Post `api/task/delete/{taskId}`
sample `api/task/delete/df8bec5c-63e9-4d0d-9835-d64dba31eb65`
- Post `api/task/update/{taskId}`
sample `api/task/update/df8bec5c-63e9-4d0d-9835-d64dba31eb65`
```
{
	"is_public": true,
	"title": "task title api EDIT",
	"description": null,
	"priority": "low",
	"unit_id": 2
}
```

## Todos
- Edit unit or division
- Delete task on task root
- Set public on task card directly
- Update user, user profile page

## Whats Next
- Search and pagination (Fixed)
- Filter & duplicate task
- Task roles and subtask roles
- More user roles in advance
- Navigation menu hierarchy by user roles or permissions in advance
- Optimise query with raw query, and more to minimize access time at least under 100ms

## Notes
as exprerienced web developer, 100% sure that this web app is very scalable and maintainable as easy by (others) web developer, it always consistently uses PHP - Laravel, Livewire, Restful-API rules conventions with a precise and effective. Database architecture has designed and added into this web app even allows for integration with various related external resources, such as File Storages, Mail System and etc. Would be nice and glad if can explain and demonstrate next ideas or  advanced plans on next phase.

Regards

Arham Arifuddin




