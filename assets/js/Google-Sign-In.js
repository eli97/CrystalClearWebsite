function onSignIn(response) {
    const profile = decodeJwtResponse(response.credential);
    localStorage.setItem("status", "loggedin");
    console.log('ID: ' + profile.sub); 
    localStorage.setItem("id",profile.sub);
    console.log('Name: ' + profile.name);
    localStorage.setItem("name",profile.name);
    console.log('Image URL: ' + profile.picture);
    localStorage.setItem("image",profile.picture);
    console.log('Email: ' + profile.email);
    localStorage.setItem("email",profile.email);
    window.location.href = './profile.php'; //CHANGE THIS TO APPROPRIATE PAGE WHEN ON DEPLOYED SITE
}

//Used to decode the JWT Response from Google API to get user information
function decodeJwtResponse(token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
  }).join(''));

  return JSON.parse(jsonPayload);
}


function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then
    (
        function()
        {
            localStorage.clear();
        }
    );
}


/*
function isLoggedIn() {
   
    if(sessionStorage.getItem('UserEntity')==null) 
    {
        //Redirect
        window.location.href = 'login.html';
    }
    else 
    {
        var userEntity = {};
        userEntity = JSON.parse(sessionStorage.getItem('UserEntity'));
    }
*/

    //let target = document.getElementById("loginBtn");
    //
    //if (GoogleAuth.currentUser.get() != null) {
    //    target.innerHTML += "
    //        <a class="btn btn-primary border-0 border-dark ms-md-2" id="profileBtn" role="button" href="login.html" style="background: #171e28;--bs-primary: #052065;--bs-primary-rgb: 5,32,101;">Profile</a>
    //    ";
    //}
    //else {
    //    target.innerHTML += "
    //        <a class="btn btn-primary border-0 border-dark ms-md-2" id="profileBtn" role="button" href="login.html" style="background: #171e28;--bs-primary: #052065;--bs-primary-rgb: 5,32,101;">User Login</a>
    //    ";
    //}
