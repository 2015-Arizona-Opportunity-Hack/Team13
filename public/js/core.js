token = "";

$(document).ready(function() {

	var options = {
  valueNames: [ 'name', 'born' ]
};



var userList = new List('users', options);
/* ----Objects Start---- */
/* Host */
function host(firstName, lastName, email, phone, userName, password) {
	this.firstName = firstName;
	this.lastName = lastName;
	this.email = email;
	this.phone = phone;
	this.userName = userName;
	this.password = password;
}

/* Event */
function event(hostId, name, startDate, endDate, addr1, addr2, city, state, zip, isLocal, isVirtual, ticketPrice, description) {
	this.hostId = hostId;
	this.name = name;
	this.startDate = startDate;
	this.endDate = endDate;
	this.addr1 = addr1;
	this.addr2 = addr2;
	this.city = city;
	this.state = state;
	this.zip = zip;
	this.isLocal = isLocal;
	this.isVirtual = isVirtual;
	this.ticketPrice = ticketPrice;
	this.description = description;
}

/* Item */
function item(eventId, name, description, pathToPic, storePrice) {
	this.eventId = eventId;
	this.name = name;
	this.description = description;
	this.pathToPic = pathToPic;
	this.storePrice = storePrice;
}

/* Order */
function order(orderNumber, ticketQuantity) {
	this.orderNumber = orderNumber;
	this.ticketQuantity = ticketQuantity;
}

/* Participant */
function participant(id, eventId, name, email, phone, orderId) {
	this.eventId = eventId;
	this.name = name;
	this.email = email;
	this.phone = phone;
	this.orderId = orderId;
}

/* Ticket */
function ticket(id, particiapntId, eventId, orderId, confirmation) {
	this.particiapntId = particiapntId;
	this.eventId = eventId;
	this.orderId = orderId;
	this.confirmation = confirmation;
}

/* Winner */
function winner(id, itemId, participantId) {
	this.itemId = itemId;
	thi.particiapntId = particiapntId;
}
/*----Objects End----*/

/*----Form Elements----*/
var loginForm = $("#loginform");
var signUpForm = $("#signupform");
var contactForm = $("#feedbackform");
var participantForm = $("#participantform");
var paypalForm = $("#paypalform");
/*----Form Elements End----*/

/*----Functions----*/
function login() {
	var username = $("#login-username").val();
	var password = $("#login-password").val();
	$.ajax({
		type: 'POST',
		data: {grant_type: 'password', client_id: 'testclient', client_secret: '', username:username, password:password},
		url: 'server/index.php/access_token',
		success: function(json) {
			console.log(json);
			//token = json.access_token;
			$.cookie('token', json.access_token);
			console.log($.cookie('token'));
			window.location.href = "dashboard/index.php";
		},
		error: function() {
			sweetAlert("Invalid Username or Password", "Please try again.", "error");
		}
	});
}
function signUp() {
	var data = signUpForm.serializeArray();
    $.ajax({
        type: 'POST',
        url: 'server/index.php/host',
        data: data,
        dataType: 'JSON',
        success: function(json) {
            console.log(json);
            if (json.success == true) {
            	swal("Successfully Registered!", "Sign in with new credentials.", "success")
    		}
    		else if (json.success == false) {
    			sweetAlert(json.message, "Please try again.", "error");
    		}
            $('#signupbox').hide(); 
            $('#loginbox').show();
        },
        error: function() {
        	sweetAlert("Invalid Registration", "Please try again.", "error");
        }
    });
}
function submitContact() {
	var data = contactForm.serializeArray();
    $.ajax({
        type: 'POST',
        url: 'Contact API',
        data: data,
        dataType: 'JSON',
        success: function(json) {
            console.log(json);
            swal("Feedback submitted", "We will contact you shortly!", "success");
        },
        error: function() {
        	sweetAlert("Feedback not sent!", "Something went wrong!", "error");
        }
    });
}
function submitPayPal() {
	var ticketTotal = $("#tickets").val() * 3.50;
	var data = paypalForm.serializeArray();
    $.ajax({
        type: 'POST',
        url: 'PayPal API',
        data: data,
        dataType: 'JSON',
        success: function(json) {
            console.log(json);
        },
        error: function() {
        	//Temporary
        	swal("Ticket Total: $"+ ticketTotal, "Redirecting to PayPal...", "success");
        }
    });
}
function goToEvent() {
	var eventId = $("#eventId").val();
	$.ajax({
		type: 'GET',
		url: 'server/index.php/event/id/'+eventId,
		success: function(json) {
			console.log(json);
			if (json.success == true) {
				window.location.href = "event.html?id=" + eventId;
			}
			else {
				sweetAlert("Oops...", "Event Id doesn't exist!", "error");
			}
		},
		error: function() {
			sweetAlert("Oops...", "Server Error, Event Id did not send!", "error");
		}
	});
}
/*----Functions End----*/

$.validate({
	form: loginForm,
    onSuccess : function() {
    login();
        return false; // Will stop the submission of the form
    }
 });
$.validate({
	form: signUpForm,
    onSuccess : function() {
    signUp();
        return false; // Will stop the submission of the form
    }
 });
$.validate({
	form: contactForm, 
    modules : 'location, date, security, file',
    onSuccess : function() {
    submitContact();
        return false; // Will stop the submission of the form
    }
 });
$.validate({
	form: participantForm, 
    modules : 'location, date, security, file',
    onSuccess : function() {
    goToEvent();
        return false; // Will stop the submission of the form
    }
 });
$.validate({
	form: paypalForm, 
    modules : 'location, date, security, file',
    onSuccess : function() {
    submitPayPal();
        return false; // Will stop the submission of the form
    }
 });
$('.login-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
$('.participant-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});