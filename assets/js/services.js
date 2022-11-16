var url = 'assets/php/servicesDB.php';

let serviceList = [];

function initServices()
{
    getAllServicesFromDB();
}

function initServicesUser()
{
    getAllServicesFromDBUser();
}

// Database fetch requests
function getAllServicesFromDB()
{
    //Send request to PHP backend. Tells db to return all services in a JSON file
    var formDataAllServices = new FormData();
    formDataAllServices.set('var1', 'getAllServices');

    fetch(url, {
        method: 'POST',
        body: formDataAllServices
    })
    .then(res => res.json())
    .then(res => getAllServices(res))
    .catch(e => console.error('Error, getAllServices(), ' + e))
}

// Database fetch requests
function getAllServicesFromDBUser()
{
    //Send request to PHP backend. Tells db to return all services in a JSON file
    var formDataAllServices = new FormData();
    formDataAllServices.set('var1', 'getAllServicesUser');

    fetch(url, {
        method: 'POST',
        body: formDataAllServices
    })
    .then(res => res.json())
    .then(res => getAllServicesUser(res))
    .catch(e => console.error('Error, getAllServicesFromDBUser(), ' + e))
}

//  Get functions
function getAllServices(response) {
    console.log(response);

    for(let i=0; i<response.results.length; i++)
    {
        let ID = '' + Object.values(response.results)[i].SERVICE_ID;
        let name = '' + Object.values(response.results)[i].serviceName;
        let description = '' + Object.values(response.results)[i].serviceDescription;
        let price = '' + Object.values(response.results)[i].servicePrice;
        let isHidden = '' + Object.values(response.results)[i].serviceIsHidden;

        addServiceCard(ID, name, description, price, isHidden);
    }
}

//  Get functions
function getAllServicesUser(response) {
    console.log(response);

    for(let i=0; i<response.results.length; i++)
    {
        let ID = '' + Object.values(response.results)[i].SERVICE_ID;
        let name = '' + Object.values(response.results)[i].serviceName;
        let description = '' + Object.values(response.results)[i].serviceDescription;
        let price = '' + Object.values(response.results)[i].servicePrice;

        addServiceCardUser(ID, name, description, price);
    }
}

// Set functions
//
function setService(ID) {
    
    let price = document.getElementById(ID + '_price').value;
    if(!isNumber(price))
    {
        // Check if something other than a decimal number is in the text field. If there is, send error and return out of the function.
        //
        window.alert("Error: Only numbers allowed in the price field. Data not updated.");
        return;
    }
    // Loads the textarea fields from the HTML page into a form that is submitted to the PHP backend
    // Updates DB entries with HTML fields
    //
    var formDataFull = new FormData();
    formDataFull.set('var1', 'setServiceByID');
    formDataFull.set('var2',  document.getElementById(ID + '_price').value);
    formDataFull.set('var3',  document.getElementById(ID + '_description').value);
    formDataFull.set('var4',  document.getElementById(ID + '_name').value);
    formDataFull.set('var5',  ID + '');
    
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, setService(ID), ' + e));
}


function toggleHideServiceByID(ID, hideStatus) {
    
    var formDataFull = new FormData();
    formDataFull.set('var1', 'toggleHideServiceByID');
    formDataFull.set('var2', ID + '');
    formDataFull.set('var3', hideStatus + '');
    
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, setShowService(ID), ' + e));
}

function isUpdated(data)
{
    console.log(data);
    
    if(data == "OK"){
        window.alert("The information was updated successfully");
    }
    else if(data == "DOK"){
        window.alert("The service was deleted successfully");
    }
    else{
        window.alert("There was an error updating the data. Please try again later.");
    }

    window.location.reload();
}

function addNewService()
{
    // Loads the textarea fields from the HTML page into a form that is submitted to the PHP backend
    // Updates DB entries with HTML fields
    //
    var formDataFull = new FormData();
    formDataFull.set('var1', 'addNewService');
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, addNewService(), ' + e));
}

function deleteConfirmation(ID) {
    let choice = confirm("Are you sure you want to delete this service?");

    if (choice==true)
    {
        deleteService(ID);
    }
    else    
    {
        window.alert("The service was not deleted.");
    }
  }

function deleteService(ID) {
    
    var formDataFull = new FormData();
    formDataFull.set('var1', 'deleteServiceByID');
    formDataFull.set('var2', ID + '');
    
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, deleteServiceByID(ID), ' + e));
}

function addServiceCard(ID, name, description, price, isHidden)
{

    let visibilityButton = '';

    if (isHidden == 0)
    {
        visibilityButton = `<button class="btn btn-warning" type="button" onclick="toggleHideServiceByID(` + ID +', 1' + `);" style="">Hide</button>`;
    }
    else
    {
        visibilityButton = `<button class="btn btn-warning" type="button" onclick="toggleHideServiceByID(` + ID +', 0'+ `);" style="">Publish</button>`;
    }

    let servicesCard = `
        <div class="col">
            <div class="card">
                <img class="card-img-top w-120 d-block fit-cover" style="height: 200px;" src="https://crystalclearwestsac.com/assets/img/pool_stock_1.jpg">
                <div class="card-body text-center p-4">
                    <h4 class="card-title text-center">
                        <div class="mb-3">
                            <textarea id="`+ ID  +"_name" +`" class="form-control" rows="1" cols="25" style="resize: none;" >`+ name +`</textarea>
                        </div>
                    </h4>
                    <div class="mb-3">
                        <textarea id="` + ID + "_description" + `" class="form-control" rows="10">`+ description +`</textarea>
                    </div>
                    <div class="mb-3" id="price-input">
                        <div style="display: flex;">
                            <div style="flex: 50%;">
                                <h4 class="card-title text-center" style="float: right">Price:</h4>
                            </div>
                            <div style="flex: 50%;">
                                <textarea id="`+ ID  +"_price" +`" class="form-control" rows="1" cols="7" style="resize: none; float: left;" onkeypress="allowOnlyNumbers(event)">`+ price +`</textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" onclick="setService(` + ID + `);" style="">Update</button>
                        <button class="btn btn-danger" type="button" onclick="deleteConfirmation(` + ID + `);" style="">Delete</button>
                        ` + '' + visibilityButton + `
                    </div>
                </div>
            </div>
        </div>
    `;

    // Add the above card to the HTML
    //
    document.getElementById('ServicesCards').innerHTML += servicesCard;
}

// Function to confirm if there's a number
//
function isNumber(n) 
{
    return !isNaN(parseFloat(n)) && isFinite(n);
}

var keycodes = 
{
    'number0': 48,
    'number9': 57,
    'decimal': 46
};

function allowOnlyNumbers(e)
{
    // If the keystroke event isn't a number or decimal/period then block input
    //
    if ((e.charCode < keycodes.number0 || e.charCode > keycodes.number9) &&
        e.charCode !== keycodes.decimal)
    {
        return e.preventDefault ()
    }
}

//~~~~~DELETE THIS AFTER PHOTO UPLOAD/SELECTION IS IMPLEMENTED~~~~~//
var stockPhotoCnt = 0;
var photoArray = [];

photoArray.push("assets/img/AdobeStock_151519721.jpeg");
photoArray.push("assets/img/AdobeStock_496196117.jpeg");
photoArray.push("assets/img/AdobeStock_151519928.jpeg");


photoArray = {photo1, photo2, photo3};

//~~~~~DELETE THIS AFTER PHOTO UPLOAD/SELECTION IS IMPLEMENTED~~~~~//

function addServiceCardUser(ID, name, description, price)
{   
    console.log(photoArray[stockPhotoCnt]);

    let servicesCard = `
    <div class="col">
        <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="` + photoArray[stockPhotoCnt] +`">
            <div class="card-body p-4">
                <h4 class="card-title">`+ name +`</h4>
                <p class="card-text">`+ description +`<br></p>
                <div class="d-flex"><a class="btn btn-primary" role="button" href="service_proposal.html">Subscribe Now</a></div>
            </div>
        </div>
    </div>
    `;

    // Add the above card to the HTML
    //
    document.getElementById('ServicesCards').innerHTML += servicesCard;

    //~~~~~DELETE THIS AFTER PHOTO UPLOAD/SELECTION IS IMPLEMENTED~~~~~//
    stockPhotoCnt = (stockPhotoCnt + 1) % 3;
    //~~~~~DELETE THIS AFTER PHOTO UPLOAD/SELECTION IS IMPLEMENTED~~~~~//
}