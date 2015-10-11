
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

function submitContact() {
	var data = $("#feedbackForm").serializeArray();
    $.ajax({
        type: 'POST',
        url: 'Contact API',
        data: data,
        dataType: 'JSON',
       rules: {
    field: {
      required: true,
      email: true
    }
  },
        success: function(json) {
            console.log(json);
            if(json.success == true) {
                //$('#success').modal('show');
                //window.location = "medicationauthorize.php?pet=" + json.petid + '&name=' + json.name;
                //console.log("medicationauthorize.php?pet=" + json.petid + '&name=' + json.name);
            } else {
                //$('#fail').modal('show');
            }
        }
    });
}
$.validate({
    modules : 'location, date, security, file',
    onSuccess : function() {
    submitContact();
        return false; // Will stop the submission of the form
    }
 });

});