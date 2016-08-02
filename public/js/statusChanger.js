var _token = $('input[name="_token"]').val();

function changeStatus() {
    var status = document.getElementById("selectStatus").value;
    document.getElementById("showStatus").innerHTML = "You selected: " + status;
   
 
   $.post({
    type: "PUT",
    url: $("#changeStatusForm").attr('action'),
    data: { status: $('#selectStatus').val(),  _token : _token },

    
  });
}


