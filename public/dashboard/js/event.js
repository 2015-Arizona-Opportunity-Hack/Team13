$(function() {
	//token = 'zis9DVotLppy3qhW7MuqMSwQKtbTzoevwsUZUFBt';

	getName();
    getEvents();

    getEvent();

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
		    "Authorization": "Bearer " + access_token
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
		    "Authorization": "Bearer " + access_token
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

    function getEvent() {
    	$.ajax({
	        type: 'GET',
	        url: '../server/event/id/' + param('id'),
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + access_token
		  	},
	        success: function(json) {
	        	console.log(json);
	            if(json.success != false) {
	            	$('input[name="name"]').val(json.name);
	            	$('input[name="addr1"]').val(json.addr1);
	            	$('input[name="addr2"]').val(json.addr2);
	            	$('input[name="city"]').val(json.city);
	            	$('input[name="state"]').val(json.state);
	            	$('input[name="zip"]').val(json.zip);
	            	$('input[name="ticketprice"]').val(json.ticketprice);
	            	$('textarea[name="description"]').html(json.description);
	            	
	            }
	        }
	    });
    }

    function param(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
});