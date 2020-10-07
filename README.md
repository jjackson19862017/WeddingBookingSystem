# Wedding Booking System

I am learning PHP, so while I am learning the course I thought I would test my knowledge and understanding as I built it.

So I am planning to build an CMS style interface.

It will only be needed for a hand full of users, so I have created a login screen that will take them to the interface.

The Three different types of users will be:

1. Super - This type of user will have access to everything on the interface.
2. Admin - This type of user will have access to the bookings.
3. Owner - This type of user will have access to the bookings and also the overall profits that would come from present and future bookings.

## Setup

I initially started this on an XAMMP server on my Mac, but then decided to use Digital Ocean as a server for this project.

Originally I planned to setup a Raspberry pi as a LAMP Server and server the files from there however I have never thought of getting a cloud based service before and took the opportunity to go down this route.

## Technologies Used

In this section, you should mention all of the languages, frameworks, libraries, and any other tools that you have used to construct this project. For each, provide its name, a link to its official site and a short sentence of why it was used.

| Technology      | How it was used                                                 | Website                                            |
| :--------------:|-----------------------------------------------------------------|:---------------------------------------------------:|
| HTML            | Backbone of everything                                          | <https://www.w3schools.com/html/default.asp>         |
| CSS             | Styling for the Bootstrap to work on                            | <https://www.w3schools.com/css/default.asp>          |
| JAVASCRIPT      | Used for some functionality on the website                      | <https://www.w3schools.com/js/default.asp>           |
| PHP             | Scripting Language                                              | <https://www.php.net>                              |
| GITHUB          | Stores my work so that other people and myself can reference it | <https://www.github.com>                             |
| VSCODE          | An IDE allowing me to code on my computer                       | <https://code.visualstudio.com/>                     |

## Commits

### 1st - Init Commit

Just creating the repo

### 2nd - Setting up directorys

Just creating the folders and updating the gitignore to not upload my connection information.

### 3rd - Setting up Index

Creating all the php files to handle, database connection, header, navigation and footer for the index site.

### 4th - Configuring the Login Screen

Created login screen from using a template from getbootstrap.com, this will allow the users to access the CMS.

### 5th - Changed css location

Originally I used a CDN link to bootstrap but then thought against it and just created a locally used bootstrap css file.  Will cut down on bandwidth and everything is kept locally.

### 6th - Created Admin Section

Created the index, and included fontawesome files for later.
I have also setup the navigation file, with a few things

1. User Menu - for Adding and viewing all users
2. Customer Menu - for adding and viewing all customers
3. Wedding Menu - for creating wedding events and viewing all events so far
4. Logged in User Menu - Changing their options and logging out.

### 7th - Created User Area

Created the options to

Create Users
Read all current users
Update Users
Delete Users

### 8th - Created Customer Area

Created the options to

Create Customers
Read all current Customers
Update Customers
Delete Customers

### 8th - Created Wedding Events Area

Created the options to

Create Wedding Events
Read all current Wedding Events
Update Wedding Events
Delete Wedding Events

I also changed some directory locations

### 9th - Updated Wedding View All

Updated the view_all_weddings page to make it more user friendly.

Also taken out the £ symbol on the edit page as it broke the site.