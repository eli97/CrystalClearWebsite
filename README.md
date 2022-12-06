# CrystalClearWebsite
![](/pages/CClogo.PNG)

## Synopsis: 

This is a website for Crystal Clear Pool Service, managed by sole proprietor Daniel Semeryuk. The website will advertise his business and provide convenient features 
for his clients. His clients will be able to create an account for the website, which will allow them to subscribe to his services online and pay automatically, as well 
as provide a convenient way to see payment and service history. New clients who find his business online are not obligated to create an account and can still choose to 
request an estimate in person and pay through traditional means like check or cash. 

## Testing:

1. Testing consists of ensuring that all web pages scale properly when zooming in/out and resizing the browser window. 
2. For data entry, simple SQL injection is tested which should be avoided by using prepared statements and grants. 
3. All mandatory fields should be validated and indicated.
4. Password complexity requirements should be reliably enforced.
5. Check each page for broken links and images.
6. Input fields should be checked for the max field value. Input values greater than the specified max limit should not be accepted or stored in the database.
7. Check all input fields for special characters.
8. The user should not be able to submit a page twice by pressing the submit button in quick succession.

Testing will be expanded upon as development continues:
1. Test Environment:
    * Testing branch in Github Repository
    * Test Database (test data)
    * Google Sheets/Excel (Test case management)
2. Testing:
    * Create test cases from user stories and jira subtasks
    * Test cases pass/fail according to Acceptance Criteria
    * Regression and new functionality
    * Manual and automated tests
3. Bugs/Defects:
    * Open a new jira for bug/defect
    * Include steps to recreate
    * Include documentation (test steps, descriptions, screenshots, etc.)
    
Testing System Requirements
   * Windows Operating System (Windows 10)
   * Google Chrome, Mozilla Firefox, Microsoft Edge
   * Selenium 4.4.3 or Newer
   * Python 3.10 or newer
   * ChromeDriver (Google Chrome version) -- for automation
   * PHPUnit Ver. 9

To run:
   * open terminal in vscode
   * cd ./Tests
   * python <test_file>.py

## Deployment:

Deployment of this website consists of reserving a hostname, choosing a hosting service, configuring DNS settings, and migrating all source code for deployment. Initial
deployment will consist of a work-in-progress live demo.

## Developer instructions: 

Our team has used VS Code git integration for revision control, which offers a GUI. We referred to the prototype and client meetings for development of pages and 
features.

1. Fork the repository 
2. Create your feature branch: git checkout -b new-feature
3. Commit your changes: git commit -am 'Added feature'
4. Push to the branch: git push origin new-feature
5. Submit a pull request
    
## Prototype:
![](/ProtoTypeImages/HomePage.png)
![](/ProtoTypeImages/ServicesPage.png)
![](/ProtoTypeImages/LoginPage.png)
![](/ProtoTypeImages/SignUpPage.png)
![](/ProtoTypeImages/AccountDetailsPage.png)
![](/ProtoTypeImages/AdministrationPage.png)
![](/ProtoTypeImages/ContactMePage.png)

## JIRA Timeline:

### Sprint 01

Draft project charter document 

Meet with client for initial requirements and details elicitation

### Sprint 02

Decide on tech stack and development tools

Create a mockup of the website

### Sprint 03

Construct homepage

Create Services Page

Construct login Page

Construct signup page

### Sprint 04

Create database to store user information

Host database for initial testing

Add drop down menu to all pages

Add dark mode and light mode 

### Sprint 05

Add functionality for user to delete account and all associated data

Add functionality for customers to request additional filter washes

Add functionality for customers to request services without an account 

### Sprint 06

Add functionality to cancel subscriptions

Add administrative functionality (update service pricing and descriptions)

### Sprint 07

Implement payment system

Store payment details in database

Ensure records are accessible from client and administrative view

### Sprint 08

Deploy website and conduct final testing 

### Sprint 09

### Sprint 10


## Application Flow:
![](/Diagrams/applicationflow.png)

## ER diagram:
![](/Diagrams/erd.png)
