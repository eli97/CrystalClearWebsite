var url = 'assets/php/review.php';
function adminDB(){
    var getDataReview = new FormData();
    fetch(url, {
        method: 'POST',
        body: getDataReview
    })
    .then(res => res.json())
    .then(res => printData(res))
    
}

function viewer(){
    var getDataReview = new FormData();
    fetch(url, {
        method: 'POST',
        body: getDataReview
    })
    .then(res => res.json())
    .then(res => printReviewData(res))
}
function printData(res){
    console.log(res);
    newr = JSON.parse(res[0])
    console.log(newr.cid);

    for(i=0; i<res.length; i++){
        card = JSON.parse(res[i])
        let id = card.cid;
        let name = card.cname;
        let pDate= card.postDate;
        let stars = card.stars;
        let mgs = card.message;
        let approval = card.approval;
        addAdminReviewCard(id, name, pDate, stars, mgs, approval)
    }
    
}
function printReviewData(res){
    console.log(res);

    for(i=0; i<res.length; i++){
        card = JSON.parse(res[i])
        let id = card.cid;
        let name = card.cname;
        let pDate= card.postDate;
        let stars = card.stars;
        let mgs = card.message;
        let approval = card.approval;
        if(approval == 1){
            addReviewCard(name, stars, mgs, pDate);
        }
        
        
    }
    
}
function addAdminReviewCard(ID, name, datePost, stars, mgs, approval)
{   
    let newDate = datePost.split("-");
    let reviewCard = `<div class="card  shadow p-3 mb-5 bg-white rounded  h-75">
    <div class="card-body">
        <h5 class="card-title">Customer Name: `+ name +`</h5>
        <h5 class="card-title" >Customer ID: `+ ID +`</h5>
        <h5 class="card-title" >Date Written: `+ newDate[1] +`/`+ newDate[2] +`/`+ newDate[0] +`</h5>
        
        
        <h5 class="card-tittle"> Stars </h5>
        <div>`;
    for(let i = 0; i < 5; i++){
        if(i <= stars){
            reviewCard += `<span class="fa fa-star checked"></span>`;
        }else{
            reviewCard += `<span class="fa fa-star"></span>`;
        }
    }
    reviewCard += `
        </div>
        <h4>Review text</h4>
        <ul>
            <p class="card-text">`+mgs+`</p>
        </ul>`;
    if(approval == 0 ){
        reviewCard += `<div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="`+ ID +`:`+ datePost +`" name="update[]">
            <label class="form-check-label" for="flexSwitchCheckDefault">Approve</label>
        </div>

    </div>`;
    }
    else{
        reviewCard += `<div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="`+ ID +`:`+ datePost +`" name="update[]" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Approve</label>
        </div>
    </div>`;
    }
        


    // Add the above card to the HTML
    //
    document.getElementById('reviewCards').innerHTML += reviewCard;
}
function addReviewCard(name, stars, mgs, datePost){
    let newDate = datePost.split("-");
    let reviewCard = `<div class="card  shadow p-3 mb-5 bg-white rounded  h-75">
    <div class="card-body">
        <h4 class="card-title">-`+ name +`</h4>
        <p>Date Written: `+ newDate[1] +`/`+ newDate[2] +`/`+ newDate[0] +`</p>
        <div>`;
    for(let i = 0; i < 5; i++){
        if(i <= stars){
            reviewCard += `<span class="fa fa-star checked"></span>`;
        }else{
            reviewCard += `<span class="fa fa-star"></span>`;
        }
    }
    reviewCard += `
        </div>
        <ul>
            <p class="card-text">`+mgs+`</p>
        </ul>
    </div>`;
    document.getElementById('reviewCards').innerHTML += reviewCard;
}

function show_alert(){
    
    alert("Are you sure want to submit these changes? Month old reviews that aren't approve will be deleted");
}