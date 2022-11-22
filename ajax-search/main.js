function ajaxsearch(str) {

    if(str.length == 0) {
        document.getElementById("match").innerHTML = "";
        return;
    } else {

        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById("match").innerHTML = xmlHttp.responseText;
            }
        };

        xmlHttp.open('GET','functions.php?search='+str);
        xmlHttp.send();

    }

}