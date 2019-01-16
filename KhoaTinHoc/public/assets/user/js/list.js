
function seachIdInfomation() {
    var ipId, filterId, table, tr, tdId, i, txtValue;
    ipId = document.getElementById("idStudent");
    filterId = ipId.value.toUpperCase(); 

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        tdId = tr[i].getElementsByTagName("td")[0];
        if (tdId) { 
            txtValue = tdId.textContent || tdId.innerText;
            if (txtValue.toUpperCase().indexOf(filterId) > -1) {
                tr[i].style.display = ""; 
            } else {
                tr[i].style.display = "none"; 
            }
        }   
    }    
} 

function seachNameInfomation() {
    var ipName, filterName, table, tr, tdName, i, txtValue; 
    ipName = document.getElementById("nameStudent"); 
    filterName = ipName.value.toUpperCase();

    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[1];
        if (tdName) { 
            txtValue = tdName.textContent || tdName.innerText;
            if (txtValue.toUpperCase().indexOf(filterName) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
} 


