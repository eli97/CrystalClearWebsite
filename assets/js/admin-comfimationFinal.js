//PREV Page
let payments = [
    [1, "Micheal Miyer",  "10/26/2022", 000000000, 10, "Chemical + Basket", "Cash"],
    [2, "Freddy Krueger",  "10/2/2022", 456789321, 20, "Full Server",       "Online"],
    [1, "Micheal Miyer",    "9/29/022", 123456789,  5, "Chemical + Basket", "Online"],
    [2, "Freddy Krueger",  "9/27/2022", 489635421,  5, "Basic Service", "Online"],
    [2, "Freddy Krueger",  "6/27/2022", 456789321,  5, "Basic Service", "Online"],
    [4, "Jason Voorhees",   "8/6/2022", 547863256,  5, "Chemical + Basket", "Online"],
    [2, "Freddy Krueger",  "7/27/2022", 456896324,  5, "Basic Service", "Online"],
    [1, "Micheal Miyer",   "7/26/2022", 856956789, 20, "Full Service",  "Online"],
    [3, "Candy  Man",      "7/31/2022", 000000000, 14, "Basic Service", "Check"],
    [4, "Jason Voorhees",   "7/6/2022", 547863256, 10, "Chemical + Basket", "Online"],
    [3, "Candy  Man",      "6/30/2022", 000000000, 15, "Basic Service", "Check"],
    [3, "Candy  Man",      "6/30/2022", 765419873,  5, "Basic Service", "Online"],
    [2, "Freddy Krueger",  "6/27/2022", 456789321,  5, "Basic Service", "Online"],
    [1, "Micheal Miyer2",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [8, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [6, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [3, "Micheal Miyer",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer2",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    [1, "Micheal Miyer1",   "6/26/2022", 123456789, 20, "Full Service",  "Online"],
    ];
  
    var currentindex = 0;
    while(currentindex <  payments.length)
    {
        currentindex += 10;
    }
    currentindex -= 10;
    
    show()
    
    function show(){
        //show only the PREV Page
        var table = document.getElementById("myTable")
        var row = '';
        
        // Padding 0's to Column 3 (Confirmation Number) to display correctly
        for(var i = currentindex; i < (currentindex+10) && i < payments.length; i++){
            row += `<tr>
                    <th scope="row">${(payments[i][0])}</th>
                    <th>${payments[i][1]}</th>
                    <th>${payments[i][2]}</th>
                    <th>${("000000000" + payments[i][3]).slice(-9)}</th>
                    <th>${payments[i][4]}</th>
                    <th>${payments[i][5]}</th>
                    <th>${payments[i][6]}</th>
                </tr>`;
            
        }
        
        table.innerHTML += row;
        
    }
    
  

    function prev(){
        currentindex -= 10;
        if(currentindex < 0){   
            window.location.href = "comfirm-next.html";
        } else {
            window.location.href = "comfirm-prev-next.html";
        }  
    }