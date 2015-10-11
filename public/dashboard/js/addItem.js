$(function() {
	access_token = $.cookie("token");

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
	        url: '../../server/host',
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
	        url: '../../server/event/host',
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

    function getItems() {
    	$.ajax({
	        type: 'GET',
	        url: '../../server/item/event/' + param('id'),
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + access_token
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
	        },
	        error: function(json) {
	        	console.log(json);
	        	alert("FAIL!!!!!");
	        }

	    });
    }

    function viewItem(id) {
    	$.ajax({
	        type: 'GET',
	        url: '../../server/item/' + id,
	        dataType: 'JSON',
	        headers: {
		    "Authorization": "Bearer " + access_token
		  	},
	        success: function(json) {
	            if(json.success != false) {
	            	$('#itemName').val(json.name);
	            	$('#itemDescription').val(json.description);
	            	$('#itemPrice').val(json.storeprice);
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