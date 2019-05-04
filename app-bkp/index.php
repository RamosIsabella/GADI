
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function ajax_get(url, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log('responseText:' + xmlhttp.responseText);
            try {
                var data = JSON.parse(xmlhttp.responseText);
            } catch(err) {
                console.log(err.message + " in " + xmlhttp.responseText);
                return;
            }
            callback(data);
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

ajax_get('http://187.49.93.234:3344/printer/api/Printer?apikey=8048370b-643f-4f0a-add2-12dd93d5ab12&a=stateList&data={}', function(data) {
    //document.getElementById("title").innerHTML = data.Printer.activeExtruder;
	document.getElementById("title").innerHTML = data.Printer.extruder[0].tempRead;
});


</script>
</head>
<body>

Temperatura do bico: <div id="title"></div>
<hr>
<div id="text"></div>


</body>
</html>
