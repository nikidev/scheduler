function changeStatus() {
    var status = document.getElementById("selectStatus").value;
    document.getElementById("demo").innerHTML = "You selected: " + status;
    //send to database
}


// $.ajax({
//     type: "GET",
//     url: $("#changeStatusForm").attr('action'),
//     data: {
//       status: status
//     },
    
//   });