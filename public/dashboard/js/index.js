$(function() {
	//token = 'zis9DVotLppy3qhW7MuqMSwQKtbTzoevwsUZUFBt';

	getName();
    getEvents();

    $.validate({
        modules : 'location, date',
        onSuccess : function() {
          addEvent();
          return false; // Will stop the submission of the form
        }
    });

    function getName() {
    	$.ajax({
	        type: 'GET',
	        url: '../server/host',
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + token
		  	},
	        success: function(json) {
	            if(json.success != false) {
	            	console.log(json);

	            	$.each($('span#fullname'), function() {
					    $(this).html(json.firstname + ' ' + json.lastname);
					});

	            }
	        }
	    });
    }

    function getEvents() {
    	$.ajax({
	        type: 'GET',
	        url: '../server/event/host',
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + token
		  	},
	        success: function(json) {
	            if(json.success != false) {
	            	console.log('success');
	            	var template = $('#eventtemplate').html();
			        Mustache.parse(template);   // optional, speeds up future uses
			        var rendered = Mustache.render(template, json);
			        $('#events').html(rendered);
	            }
	        }
	    });
    }

    function addEvent() {
    	console.log('adding');

    	var data = $('form').serializeArray();
    	console.log(data);

    	$.ajax({
	        type: 'POST',
	        url: '../server/event/',
	        data: data,
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + token
		  	},
	        success: function(json) {
	            console.log(json);
	            if(json.success == true) {
	                $('#success').modal('show');
	                setTimeout(function(){
					   window.location.reload(1);
					}, 3000);
	            } else {
	                $('#fail').modal('show');
	            }
	                
	            
	        }
	    });
    }
});