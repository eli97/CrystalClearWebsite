function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then
    (
        function()
            {console.log('User signed out.'); }
    );
}

function getCurrentUserIcon() {
    return GoogleAuth.currentUser.get().getBasicProfile().getImageUrl();
}

function isLoggedIn() {
    
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
}
