(function() {
    "use strict";
  
    /**
     * The starting point in our program, setting up a listener
     * for the "load" event on the window, signalling the HTML DOM has been constructed
     * on the page. When this event occurs, the attached function (init) will be called.
     */
    window.addEventListener("load", init);
  
    function init() {
      // Note: In this function, we usually want to set up our event handlers
      // for UI elements on the page.
      console.log("Window Loaded!");
      document.getElementById("sendMsg").addEventListener("click", sendMail);
    }
  
    // Add any other functions in this area (you should not implement your
    // entire program in the init function, for similar reasons that
    // you shouldn't write an entire Java program in the main method).
    
    
  })();
//var url = "assets/php/contact.php";
function sendMail(){
  console.log("Attempting to send mail");
  
  /*jQuery.ajax({
    type: "POST",
    file: "assets/php/contact.php",
    dataType: 'json',
    data: {functionname: 'sendMail'},

    success: function (obj, textstatus) {
      if(!('error' in obj)) {
        window.alert("The information was sent successfully");
        setTimeout(5000);
        window.location.assign("thankyou.html");
      }
      else {
        console.log(obj.error);
        window.alert("Error sending data, please try again after a few minutes.");
        setTimeout(5000);
      }
      //window.location.reload;
    }
  })*/

  fetch("assets/php/contact.php", {
    method: 'POST',
    body: {
      action: 'send'
    }
  })
  .then(res => {console.log(data);
  });
}

function test(){
  console.log('test');
}

function isSent(data)
{
    console.log(data);
    
    if(data == "OK"){
        window.alert("The information was sent successfully");
        location.href = 'thankyou.html';
    }
    else if(data == "DOK"){
      window.alert("Error sending data, please try again after a few minutes.");
  }

    window.location.reload();
}