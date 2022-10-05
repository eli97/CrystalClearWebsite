var url = 'assets/php/database.php';

window.addEventListener('load', () => {
    
    var formDataBasic = new FormData();
    formDataBasic.set('var1', 'getBasic');
    
    fetch(url, {
        method: 'POST',
        body: formDataBasic
    })
    .then(res => res.json())
    .then(res => getBasic(res))
    .catch(e => console.error('Error, getBasic(), ' + e))
});

window.addEventListener('load', () => {
    
    var formDataChem = new FormData();
    formDataChem.set('var1', 'getChem');
    
    fetch(url, {
        method: 'POST',
        body: formDataChem
    })
    .then(res => res.json())
    .then(res => getChem(res))
    .catch(e => console.error('Error, getChem(), ' + e))
});

window.addEventListener('load', () => {
    
    var formDataFull = new FormData();
    formDataFull.set('var1', 'getFull');

    
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.json())
    .then(res => getFull(res))
    .catch(e => console.error('Error, getFull(), ' + e))
});

//  Get functions
function getBasic(response) {
    console.log(response);

    document.getElementById('BasicPrice').value = response.results.price;
    document.getElementById('BasicDescription').value = response.results.description;
}

function getChem(response) {
    console.log(response);

    document.getElementById('ChemPrice').value = response.results.price;
    document.getElementById('ChemDescription').value = response.results.description;
}

function getFull(response) {
    console.log(response);

    document.getElementById('FullPrice').value = response.results.price;
    document.getElementById('FullDescription').value = response.results.description;
}

// Set functions
function setBasic() {

    var formDataBasic = new FormData();
    formDataBasic.set('var1', 'setBasic');
    formDataBasic.set('var2',  document.getElementById('BasicPrice').value);
    formDataBasic.set('var3',  document.getElementById('BasicDescription').value);

    
    fetch(url, {
        method: 'POST',
        body: formDataBasic
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, setBasic(), ' + e))
}

function setChem() {

    var formDataChem = new FormData();
    formDataChem.set('var1', 'setChem');
    formDataChem.set('var2',  document.getElementById('ChemPrice').value);
    formDataChem.set('var3',  document.getElementById('ChemDescription').value);

    
    fetch(url, {
        method: 'POST',
        body: formDataChem
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, setChem(), ' + e))
}

function setFull() {

    var formDataFull = new FormData();
    formDataFull.set('var1', 'setFull');
    formDataFull.set('var2',  document.getElementById('FullPrice').value);
    formDataFull.set('var3',  document.getElementById('FullDescription').value);

    
    fetch(url, {
        method: 'POST',
        body: formDataFull
    })
    .then(res => res.text())
    .then(res => isUpdated(res))
    .catch(e => console.error('Error, setFull(), ' + e))
}

function isUpdated(data)
{
    if(data == "OK"){
        window.alert("The information was updated successfully");
    }
    else
        window.alert("There was an error updating the data. Please try again later.");
}
