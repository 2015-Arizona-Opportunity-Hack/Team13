$(function() {
	var access_token = $.cookie("token");

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

    $("#signOut").click(signOut);

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
					    $(this).html(json.host.firstname + ' ' + json.host.lastname);
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
	            	$('input[name="name"]').val(json.event.name);
	            	$('input[name="addr1"]').val(json.event.addr1);
	            	$('input[name="addr2"]').val(json.event.addr2);
	            	$('input[name="city"]').val(json.event.city);
	            	$('input[name="state"]').val(json.event.state);
	            	$('input[name="zip"]').val(json.event.zip);
	            	$('input[name="ticketprice"]').val(json.event.ticketprice);
	            	$('textarea[name="description"]').html(json.event.description);
	            	
	            }
	        }
	    });
    }

    function signOut() {
    	window.location.href="../";
    }

    function param(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
});