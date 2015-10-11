$(function() {
	//token = 'zis9DVotLppy3qhW7MuqMSwQKtbTzoevwsUZUFBt';

	getName();
    getEvents();

    getItems();

    $.validate({
        modules : 'location, date',
        onSuccess : function() {
          addItem();
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

    function getItems() {
    	$.ajax({
	        type: 'GET',
	        url: '../server/item/' + param('id'),
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + token
		  	},
	        success: function(json) {
	        	console.log(json);
	            if(json.success != false) {
	            	var template = $('#currentitemstemplate').html();
			        Mustache.parse(template);   // optional, speeds up future uses
			        var rendered = Mustache.render(template, json);
			        $('#currentitems').html(rendered);
	            	
	            	$('div#currentitems a').click(function() {
	            		var id = $(this).attr('id');
	            		viewItem(id);
	            	});
	            }
	        }
	    });
    }

    function viewItem(id) {
    	$('#viewitem').modal('show');
    	$.ajax({
	        type: 'GET',
	        url: 'http://localhost/Team13/server/item/' + param('id'),
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + token
		  	},
	        success: function(json) {
	        	console.log(json);
	            if(json.success != false) {
	            	$('#viewitem').modal('show');
	            }
	        }
	    });
    }

    function addItem() {

    }

    function param(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
});