//products chart

loadAllProducts();


function loadAllProducts(){

    var data = new FormData();
    data.append("products" , "products");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log(this.response);

        var chart = new CanvasJS.Chart("productChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Products"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "column",
                dataPoints: JSON.parse(this.response)
            }]
        });
        
        chart.render();

    };

    xhr.send(data);
    return false;

}


//users chart


loadAllUsers();


function loadAllUsers(){

    var data = new FormData();
    data.append("users" , "users");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log(this.response);


        var chart = new CanvasJS.Chart("usersChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Users"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "column",
                dataPoints: JSON.parse(this.response)
            }]
        });
        
        chart.render();

    };

    xhr.send(data);
    return false;

}

//schedule chart


loadAllschedule();


function loadAllschedule(){

    var data = new FormData();
    data.append("schedule" , "schedule");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log(this.response);


        var chart = new CanvasJS.Chart("scheduleChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Booked Appointments"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "column",
                dataPoints: JSON.parse(this.response)
            }]
        });
        
        chart.render();

    };

    xhr.send(data);
    return false;

}


//vechcleservice chart


loadAllservice();


function loadAllservice(){

    var data = new FormData();
    data.append("service" , "service");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log(this.response);


        var chart = new CanvasJS.Chart("serviceChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Vechicle Services"
            },
            axisY: {
                title: "Count",
                valueFormatString: "#",
                interval: 1
            },
            data: [{
                type: "column",
                dataPoints: JSON.parse(this.response)
            }]
        });
        
        chart.render();

    };

    xhr.send(data);
    return false;

}

//Appointments chart


loadAllAppointments();


function loadAllAppointments (){

    var data = new FormData();
    data.append("appointments" , "appointments");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log("myesp" + this.response);


        var completed = [];
        var pending = [];
        var missed = [];

        var allData = JSON.parse(this.response);


        for (var i = 0 ; i < allData.length ; i++){
            var rawdata = allData[i];
            console.log(rawdata);

            if(rawdata.state == "completed"){

                delete rawdata.state;
                console.log("deleted" + rawdata);
                completed.push(rawdata);

            }else if (rawdata.state == "missed"){
                delete rawdata.state;
                missed.push(rawdata);

            }else if(rawdata.state == "pending"){
                delete rawdata.state;
                pending.push(rawdata);
            }

        }

      
        var chart1 = new CanvasJS.Chart("appointmentChart1", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Completed"
            },
            axisY: {
                title: "Count",
                valueFormatString: "#",
                interval: 1,
                minimum: 0
            },
            data: [{
                type: "column",
                dataPoints: completed
            }]
        });

        var chart2 = new CanvasJS.Chart("appointmentChart2", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Pending"
            },
            axisY: {
                title: "Count",
                valueFormatString: "#",
                interval: 1,
                minimum: 0
            },
            data: [{
                type: "column",
                dataPoints: pending
            }]
        });

        var chart3 = new CanvasJS.Chart("appointmentChart3", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Missed"
            },
            axisY: {
                title: "Count",
                valueFormatString: "#",
                interval: 1,
                minimum: 0
            },
            data: [{
                type: "column",
                dataPoints: missed
                
            }]
        });



chart1.render();
chart2.render();
chart3.render();




    };

    xhr.send(data);
    return false;

}


