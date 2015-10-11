$(function() {

	getEvent();
	//getTickets();

	function getEvent() {
		$.ajax({
	        type: 'GET',
	        url: 'server/event/id/' + param('id'),
	        dataType: 'JSON',
	        success: function(json) {
	            if(json.success != false) {
	            	console.log(json);
	            	$('#event_name').html('<h1>'+json.event.name+'</h1>');
	            	$('#event_id').html('<h1>'+json.event.id+'</h1>');
	            }
	        }
	    });
	}

	function getTickets() {
		$.ajax({
	        type: 'GET',
	        url: 'server/ticket/event/' + param('id'),
	        dataType: 'JSON',
	        success: function(json) {
	        	console.log(json);
	            /*if(json.success != false) {
	            	
	            	$('#event_name').html('<h1>'+json.event.name+'</h1>');
	            	$('#event_id').html('<h1>'+json.event.id+'</h1>');
	            }*/
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