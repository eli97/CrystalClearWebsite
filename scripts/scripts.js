let isDarkModeEnabled = "";

function contrastToggle() {
    let element = document.body;
    element.classList.toggle("darkMode");

    isDarkModeEnabled = getCookie("darkMode");

    if (isDarkModeEnabled == "" || isDarkModeEnabled == "Disabled") {        
        setCookie("darkMode", "Enabled", 5)
    }
    else{
        setCookie("darkMode", "Disabled", 5)
    }

    console.log(document.cookie);
}

function setCookie(cname, cvalue, exdays) {
    const date = new Date();
    date.setTime(date.getTime() + (exdays*24*60*60*1000));
    let expires = date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + "Expires=" + expires + ";" + "SameSite=Lax";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function checkDarkModeCookie() {
    if (getCookie("darkMode") == "Enabled") {
     contrastToggle();
    }
    else {
      
    }
}

document.onreadystatechange = function(){
    if (document.readyState === "complete") {
        checkDarkModeCookie();
    }
    else {
        window.onload = function () {
            checkDarkModeCookie();
        }
    }

    console.log(document.cookie);
}
