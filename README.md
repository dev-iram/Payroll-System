# Payroll-System-Global-Tour-Operators-PHP
![ATM Kiosk System (4)](https://user-images.githubusercontent.com/22479692/123950672-d6b0c780-d99b-11eb-9b99-6ffc6e03438a.png)

This is a project I created as per specifications in C&G Procedural programming module during the course of my FIT ICTAP Software Development apprenticeship.  
In the case of this assignment, it consists of two projects.  The goal of this assignment is to reuse the intial website developed, and create additional features that allow for users to create bookings which can be assigned to tour guides, allow for tour guides to be able to run these tours based on their commission and generate a payroll. 

✦ Programming Language; PHP, HTML, CSS, Bootstrap, SQL  
✦ Software Tools;  
  &nbsp;&nbsp;&nbsp;&nbsp;✧ Microsoft Visual Code: Used to create the website and edit files  
  &nbsp;&nbsp;&nbsp;&nbsp;✧ FileZilla: Used to host the server and website files  
  &nbsp;&nbsp;&nbsp;&nbsp;✧ PhpMyAdmin: Used to run MySQL server and create database   
  &nbsp;&nbsp;&nbsp;&nbsp;✧ Google Chrome: Used to view website and test  
    
**This website is hosted at: http://iram.innovador-ie.com/index.html**


## Assignment Brief
You work as a software developer for a software company called Soft Ireland which is specialised in developing bespoken computer application using a variety of technologies available.  

The project taken by the company is to create an application to process the payroll of the client. The document does not contain enough details about the application. Therefore, you have been asked to interview the client to gather the requirements of the application, and to produce a report highlighting the design specification of the solution in which should include, for example: diagram, inputs, outputs, and any other relevant information about the application.

## Purpose  
✦ The purpose and scope of this project involves the creation of a payroll system to manage external tour guides on behalf of Global Tour Operators. We will produce a piece of software that will allow tour guides and administrators of Global Tour Operators to be able to login to the system to carry out a variety of different tasks. There will be different access functionality in the system based on the role of the user.  

✦ A tour guide will only have access to bookings and payroll, with restrictive functionality compared to the administrator. A tour guide will be able to flag a booking that they would like to complete and view their payroll.  

✦ An administrator will have far more access and functionality within the system, they will be able to access a number of pages on the system, such as – home, tours, tour guides, bookings, commissions, payroll and set up. Each of these pages will have additional functions for the administrator, for example, the tours page will allow the administrator to create, read, update and delete tours as the administrator pleases. This CRUD feature will be available on all of the pages in the system that deals with the database, so that the administrator has control and is able to modify data accordingly.  

✦ The system itself will be simple and clean. It will be responsive to allow tour guides and administrators to be able to use their phones in order to access the portal and view data for ease.  

✦ The system will feature a login page that is required to have a valid username and password in order to access the system. The administrator will have the ability to create new users as required.  

✦ The primary user of this system is the administrator as they control the backend to the bookings. They will be able to control what tours are available, and all that goes with it, such as the tour guides, the commission rates, surcharges, the rate of pay, etc.  

✦ The system will be created using C# Language while the database for this project will be created using SQLite and the system used to manage this database will be DB Browser. 
This system will be integrated from the already established and produced Howth website.  


## Project Requirements  
  
The project requirements and methods that Global Tour Operators would like to be featured within the scope of this system includes:  
  
✦	**Tour Bookings** – allow the general public to access the Howth website and a section created within the website that will allow for bookings to be created. Allow end-users to be able to book a tour by providing their information, such as their name, contact number and email address, and selecting a tour, date of the tour and number of people they would like on the tour.   http://iram.innovador-ie.com/bookings.php  
✦	**Booking Reference** – Issue a booking reference after a user has submitted a booking  
✦	Storing the data Tour Bookings – store this data in the backend of the system, that will only allow administrators and tour guides to be able to access. Administrators will be able to create, read, update and delete bookings while tour guides will only be able to read and assign tours to themselves.  
✦	**Login System** – Allows tour guides and administrators with credentials to be able to access the payroll system. Functionality depends on the role of the user logged in.  http://iram.innovador-ie.com/admin/index.php  
✦	**Tours** – Only to be accessed by administrator. Allows admin to create, read, update and delete tours. (CRUD)   
✦	**Commissions** - Only to be accessed by administrator. Allows admin to create, read, update and delete commissions. (CRUD)  
✦	**Tour Guides** - Only to be accessed by administrator. Allows admin to create, read, update and delete tour guides. (CRUD)  
✦	**Bookings** – to be accessed by both tour guides and administrator. Bookings that have been created by the website’s end-user will go here, the tour guide will be able to assign a tour to themselves. The administrator will be able to create, read, update and delete bookings. (CRUD)  
✦	**Bookings** – When a tour is done, the tour guide/admin will click a completed status  
✦	**Payroll** – Only to be accessed by administrator. Allows admin to create, read, update and delete commissions. (CRUD)   
✦	**System** - requires all tours completed by the tour guide, based on their experience it will assign a commission to the cost of the tours, and based on the amount of people that have been on the tour.  
✦	**Setup** – Only to be accessed by administrator.  
✦	**Navigation bar** – payroll system to have navigation menu on the top, with the option for logout on the right.  
✦	Tour guides to be able to see what they can expect in terms of pay  
✦	Administrator to be able to see how much money to transfer after the 25% tax allocation has been calculated for revenue services.  
✦	**Database** – A database to store all of this information – using Php My Admin on the server side.   


## Functionality  
  
✦	The Howth website has already been developed and established by previous site developers. This will be re-used to add further functionality to the required system.  
✦	A user will be able to make a booking on the website.   
✦	A booking reference will be generated after a booking has been created.  
✦	Tour guides and administrators will have a login page that requires valid credentials in order to access the backend of the system.   
✦	Administrators will have access to a Tours section. They will be able to create, read, edit and update tours.   
✦	Administrators will have access to a Tour Guides section. They will be able to create, read, edit and update tour guides.   
✦	Administrators will have access to a Commissions section. They will be able to create, read, edit and update commissions.   
✦	Administrators and Tour Guides will have access to a payroll section. Only the administrator will be able to modify payroll related details, and tour guides will only be able to view payslips.   
✦	Administrators and Tour Guides will have access to a bookings section. Only the administrator will be able to modify, update and delete bookings, while the tour guide will be able to assign themselves a tour.   
✦	Set up can only be accessed and modified by the administrator.  
✦	A navigation bar will be created for the backend of this Global Tour Operators page, that will feature a navigation bar at the top, with the option for a logout on the right.   
✦	Tour guides to be able to see what they can expect in terms of pay  
✦	Administrator will be able to see how much money to transfer after the 25% tax allocation has been calculated for revenue services.  
✦	Database – A database will store all of this information – using Php My Admin on the server side.  


## Testing  
http://iram.innovador-ie.com/admin/index.php  

### Credentials  
  
**Admin User**  
  Username: ad  
  Password: 123  
  
  
  **Tour Guide User**  
  Username: tg  
  Password: 123  
  
  
  ### Generate Payroll  
  http://iram.innovador-ie.com/admin/payroll.php 
    
  **Date Range**   
  Start Date: 01/06/20  
  End Date:   01/10/20    
  
  If you are an admin, please select **Tour Guide Test** as *Tour Guide* from dropdown list
  
  
  Additionally, bookings can be made here: http://iram.innovador-ie.com/bookings.php with any data. 

