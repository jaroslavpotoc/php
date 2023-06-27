document.getElementById("search").addEventListener("input", function() {
    var searchValue = this.value.toLowerCase();
    var tableRows = document.getElementsByTagName("tr");

    for (var i = 1; i < tableRows.length; i++) {
        var rowData = tableRows[i].getElementsByTagName("td");
        var foundMatch = false;

        for (var j = 0; j < rowData.length; j++) {
            var cellData = rowData[j].innerHTML.toLowerCase();

            if (cellData.indexOf(searchValue) > -1) {
                foundMatch = true;
                break;
            }
        }

        if (foundMatch) {
            tableRows[i].style.display = "";
        } else {
            tableRows[i].style.display = "none";
        }
    }
});