$(document).ready(function(){

    $("#botonGuardar").click(function(){
    	var obj = {};

    	obj.lat = $("#inputLat").val();
		obj.len = $("#inputLen").val();

       $.ajax({
	    type: 'POST',
	    url: 'api/new_location',
	    data: JSON.stringify(obj),
	    success: function(msg) {
	      alert(msg);
	    },
	    error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
	  });
    });


});