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
4. Psswored complexity requirements should be reliably enforced.
5. Check each page for broken links and images.
6. Input fields should be checked for the max field value. Input values greater than the specified max limit should not be accepted or stored in the database.
7. Check all input fields for special characters.
8. The user should not be able to submit a page twice by pressing the submit button in quick succession.

Testing will be expanded upon as development continues.

## Deployment:

Deployment of this website consists of reserving a hostname, choosing a hosting service, configuring DNS settings, and migrating all source code for deployment. Initial
deplyment will consist of a work-in-progress live demo.

## Developer instructions: 

Our team has used VS Code git integration for revision control, which offers a GUI. We referred to the prototype and cleint meetings for development of pages and 
features.

1. Fork the repository 
2. Create your feautre branch: git checkout -b new-feature
3. Commit your changesL git commit -am 'Added feature'
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

## Use your JIRA to create a timeline section with key milestones for your project



NOTE: When coming up with the timeline this is the timeline for what you expect to get done in 191 based on the user stories you created in the backlog for all the key features with estimates.
