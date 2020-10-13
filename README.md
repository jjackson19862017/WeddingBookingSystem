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

### 10th - Connected up the Search Button

I have connected the search button on the navigation bar, to search for the bride or groom name and display the results in a table.

### 11th - Changed add_wedding.php and Created a quick weddings insert

I have changed the add_wedding, so that users can see the bride and groom instead of having to remember a customers id number.

I have also added a quick wedding form, that the user can just add an appointment date and then a hold date will be created.  After the appointment has happened then the user can fill the rest of the details in.

### 12th - Change to Customers in the Add Wedding Forms

Only the customers that dont have a wedding booked will show in the Bride & Groom Dropdown Menu.

### 13th - Changed Frontend

I changed the Navigation Bar and dropdown menus.

I also changed the page headers to jumbrotrons for more or a cleaner user experience.

I added a few comments.

### 14th - Changed Viewing All User Frontend

Modifed Edit Customer so that you can change the status of wedding booked or not.

Also updated the Users Page, to place the users in Cards with different colours for the different roles.

Also added a font awesome icon to the search button.

### 15th - Changed View All Customers Frontend

Modified View All Customers to show less information, to make it less confusing on the end user.

The View Button will bring up a customers profile page so that they can see all their details, will work on that next.

### 16th - Created Customers View Page

Renamed the customers details page to just customers.

Created a Customers View Page to show all the information relating to the bride and groom and if they have an event.

### 17th - Added a way to Edit Customers Details

I have added an accordion element onto one of the cards to display a form to edit the current bride and groom.

I will leave in the Edit Button on the view_all_customers page, I will remove at a later date.

### 18th - Changed View All Weddings Frontend

I have made the table more compact but still kept the original data viewable, I have also changed the order by the nearest wedding event at the top of the table.

### 19th - Added Cards to Index, Updated Wedding Section

I have added cards to the index (dashboard) so that at a glance users can see where we are upto.

I have changed some of the View All Wedding Table Headers and taken off the option to say yes or no, it will be yes automatically.

I have also added a quick add wedding form into the index and removed the option from the navigation bar.

### 20th - Increased Index Cards

I have added more cards to the index page to increase users awareness of the current outstanding items that need to be addressed.

### 21st - More Details to Index Cards

I have added more information to the cards that populate the index, this inculdes the couples names and links to their details.

### 22nd - Added Update Event Function Date to Dashboard

I have created a small form to sit underneath the set appointment form, so that users can book weddings in.

### 23rd - Little Fixes

I have changed the subtotal variable to cost, as later when I introduce a cash tracking system.  This will be less confusing.

I have added buttons on the view all weddings, for different queries in the future.

I have changed the admin title on the window.

I have added a input date field for contract issued date.

### 24th - Cleaning up my code

I have tried to clean up my code for readability and reproduction.

I have also added a signed button to quickly indicate that that contract has been returned and signed.

I have also rearranged my includes folder in the admin section for better organision.

## Removal of items

### view_all_customers

Edit Button



### Files
add_wedding_quick.php
