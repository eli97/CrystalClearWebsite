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
    formDataAllServices.set('var1', 'getAllServices');

    fetch(url, {
        method: 'POST',
        body: formDataAllServices
    })
    .then(res => res.json())
    .then(res => getAllServicesUser(res))
    .catch(e => console.error('Error, getAllServicesUser(), ' + e))
}

//  Get function
function getAllServices(response) {
    console.log(response);

    for(i=0; i<response.results.length; i++)
    {
        let ID = '' + Object.values(response.results)[i].SERVICE_ID;
        let name = '' + Object.values(response.results)[i].serviceName;
        let description = '' + Object.values(response.results)[i].serviceDescription;
        let price = '' + Object.values(response.results)[i].servicePrice;

        addServiceCard(ID, name, description, price);
    }
}

function getAllServicesUser(response) {
    console.log(response);

    for(i=0; i<response.results.length; i++)
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

function isUpdated(data)
{
    console.log(data);
    
    if(data == "OK"){
        window.alert("The information was updated successfully");
    }
    else
        window.alert("There was an error updating the data. Please try again later.");
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

function addServiceCard(ID, name, description, price)
{
    let servicesCard = `
        <div class="col">
            <div class="card">
                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://crystalclearwestsac.com/assets/img/pool_stock_1.jpg">
                <div class="card-body text-center p-4">
                    <h4 class="text-center card-title"><textarea id="`+ ID  +"_name" +`" rows="1" cols="25" style="resize: none;" >`+ name +`</textarea></h4>
                    <textarea id="` + ID + "_description" + `" class="form-control-lg" rows="10" cols="25px">`+ description +`</textarea>
                    <div class="price-input">
                        <div style="display: flex;">
                            <div style="flex: 50%;">
                                <h4 class="text-center card-title" style="float: right">Price:</h4>
                            </div>
                            <div style="flex: 50%;">
                                <textarea id="`+ ID  +"_price" +`" rows="1" cols="7" style="resize: none; float: left;" >`+ price +`</textarea>
                            </div>
                        </div>
                        <div class="d-flex" style="margin-top: 25px;">
                            <button class="btn btn-primary" type="button" onclick="setService(` + ID + `);" style="">Update</button>
                            <button class="btn btn-secondary" type="button" onclick="deleteService(` + ID + `);" style="margin-left: 25px; background-color: red;">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Add the above card to the HTML
    //
    document.getElementById('ServicesCards').innerHTML += servicesCard;
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
                <div class="d-flex"><a class="btn btn-primary" role="button" href="fill_application.html">Subscribe Now</a></div>
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