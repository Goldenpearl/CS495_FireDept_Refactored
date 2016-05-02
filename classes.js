
function parseFirefighter(json){
	var ob = JSON.parse(json);	
	var firefighterOb = ob["Firefighter"];
	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);
	console.log(firefighter.getSummary());
	return firefighter;
}

function parseApparatus(json){
	var ob = JSON.parse(json);	
	var apparatusOb = ob["Apparatus"];
	var appartusId = apparatusOb.appartusId;
    var apparatusName = apparatusOb.apparatusName;
	var description = apparatusOb.description;
	var numberOfSlots = apparatusOb.numberOfSlots;
	console.log(apparatusOb);
	
	//var apparatus;
	//return apparatus;
}

function parseUser(json){
	var ob = JSON.parse(json);	
	var userOb = ob["User"];
	var firefighterOb = userOb["Firefighter"];

	var username = userOb.username;
	var pass = userOb.password;

	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);

	console.log(userOb);
	//var user;
	//return user;
}

function parseScheduleTimeslot(json){
	var ob = JSON.parse(json);	
	var scheduleTimeslotOb = ob["ScheduleTimeslot"];
	var firefighterOb = scheduleTimeslotOb["Firefighter"];
	var timeslotOb = scheduleTimeslotOb["Timeslot"];

	var scheduleTimeslotId = scheduleTimeslotOb.scheduleTimeslotId
	
	var endTime = timeslotOb.endTime;
	var startTime = timeslotOb.startTime;
	var timeslotId = timeslotOb.timeslotId;
	//var timeslot = new Timeslot(timeslotId, startTime, endTime);
	
	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);

	console.log(scheduleTimeslotOb);
	//var scheduleTimeslot;
	//return scheduleTimeslot;
}
function parseAvailableTimeslot(json){
	var ob = JSON.parse(json);	
	var availableTimeslotOb = ob["AvailableTimeslot"];
	var firefighterOb = availableTimeslotOb["Firefighter"];
	var timeslotOb = availableTimeslotOb["Timeslot"];

	var availableTimeslotId = availableTimeslotOb.availableTimeslotId
	
	var endTime = timeslotOb.endTime;
	var startTime = timeslotOb.startTime;
	var timeslotId = timeslotOb.timeslotId;
	//var timeslot = new Timeslot(timeslotId, startTime, endTime);
	
	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);

	console.log(availableTimeslotOb);
	//var availableTimeslot;
	//return availableTimeslot;
}
function parseMyEvent(json){
	var ob = JSON.parse(json);	
	var myEventOb = ob["MyEvent"];
	var timeslotOb = myEventOb["Timeslot"];

	var eventId = myEventOb.eventId
	var eventName = myEventOb.eventName
	var eventDescription = myEventOb.eventDescription
	
	var endTime = timeslotOb.endTime;
	var startTime = timeslotOb.startTime;
	var timeslotId = timeslotOb.timeslotId;
	//var timeslot = new Timeslot(timeslotId, startTime, endTime);

	console.log(myEventOb);
	//var myEvent;
	//return myEvent;
}

function parseAssignedFirefighter(json){

}

function parseAssignedApparatus(json){

}

function Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier){
	this.firefighterId=firefighterId;
	this.firstName=firstName;
	this.lastName=lastName;
	this.email=email;
	this.phone=phone;
	this.secondaryPhone=secondaryPhone;
	this.carrier=carrier;
	
	this.getFullName = function(){
		return this.firstName + " " + this.lastName;
	}
	
	this.getFirstName = function(){
		return this.firstName;
	}
	
	this.getFirefighterId = function (){
		return this.firefighterId;
	}
	this.getLastName = function(){
		return this.lastName;
	}
	this.getEmail = function(){
		if(this.email == null)
			return "N/A";
		else 
			return this.email;
	}
	
	this.getPhone = function(){
		if(this.phone == null)
			return "N/A";
		else 
			return this.phone;
	}
	this.getSecondaryPhone = function(){
		if(this.secondaryPhone == null)
			return "N/A";
		else 
			return this.secondaryPhone;
	}
	
	this.getCarrier = function(){
		if(this.carrier = "null")
			return "N/A";
		else 
			return this.carrier;
	}
	
	this.getSummary = function(){
		return "Firefighter ("+firefighterId+", "+firstName+", "+lastName+")";
	}
	//this.getJson = function(){
		//return '{' +this.getNestedJson()+'}';			
	//}
	
	//this.getNestedJson = function(){
		//JSON.stringify(this);
	//}
}