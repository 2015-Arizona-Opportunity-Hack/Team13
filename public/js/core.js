
$(document).ready(function() {
/* ----Objects Start---- */
/* Host */
function host(id, firstName, lastName, email, phone, userName, password) {
	this.id = id;
	this.firstName = firstName;
	this.lastName = lastName;
	this.email = email;
	this.phone = phone;
	this.userName = userName;
	this.password = password;
}

/* Event */
function event(id, hostId, name, startDate, endDate, addr1, addr2, city, state, zip, isLocal, isVirtual, ticketPrice, description) {
	this.id = id;
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
function item(id, eventId, name, description, pathToPic, storePrice) {
	this.id = id;
	this.eventId = eventId;
	this.name = name;
	this.description = description;
	this.pathToPic = pathToPic;
	this.storePrice = storePrice;
}

/* Order */
function order(id, orderNumber, ticketQuantity) {
	this.id = id;
	this.orderNumber = orderNumber;
	this.ticketQuantity = ticketQuantity;
}

/* Participant */
function participant(id, eventId, name, email, phone, orderId) {
	this.id = id;
	this.eventId = eventId;
	this.name = name;
	this.email = email;
	this.phone = phone;
	this.orderId = orderId;
}

/* Ticket */
function ticket(id, particiapntId, eventId, orderId, confirmation) {
	this.id = id;
	this.particiapntId = particiapntId;
	this.eventId = eventId;
	this.orderId = orderId;
	this.confirmation = confirmation;
}

/* Winner */
function winner(id, itemId, participantId) {
	this.id = id;
	this.itemId = itemId;
	thi.particiapntId = particiapntId;
}
/*----Objects End----*/

/*----Form Elements----*/
var loginForm = $("#loginform");
var signUpForm = $("#signupform");
var contactForm = $("#feedbackForm");
/*----Form Elements End----*/

/*----Functions----*/
function login() {
	var data = loginForm.serializeArray();
    $.ajax({
        type: 'POST',
        url: 'Login API',
        data: data,
        dataType: 'JSON',
        success: function(json) {
            console.log(json);
        }
    });
}
function signUp() {
	var data = signUpForm.serializeArray();
    $.ajax({
        type: 'POST',
        url: 'Sign Up API',
        data: data,
        dataType: 'JSON',
        success: function(json) {
            console.log(json);
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
            if(json.success == true) {
            	swal("Feedback submitted", "We will contact you shortly!", "success");
            } else {
                sweetAlert("Feedback not sent!", "Something went wrong!", "error");
            }
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
});