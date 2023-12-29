$(document).ready(function () {
	$.ajax({ 
        method: 'POST', 
        url: count_url,    
		dataType: 'JSON',
        success: function(res){    
			console.log(res)
            toastr.info("Your Google Map API Requests Count: " + res[0]['value']);
        }, 
        error: function(e){  
			console.log(e)
            // alert('Error while request..' + e['responseText']); 
        } 
	});
});
