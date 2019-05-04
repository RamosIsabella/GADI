
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(ajax.responseText);
		document.getElementById("searchResult").innerHTML = ajax.responseText;
    }
};
ajax.open("GET", "http://187.49.93.234:3344/printer/api/Printer?apikey=8048370b-643f-4f0a-add2-12dd93d5ab12&a=stateList&data={}", true);
ajax.send();
</script>
</head>
<body>

Your result is: <span id="searchResult"></span>

</body>
</html>
