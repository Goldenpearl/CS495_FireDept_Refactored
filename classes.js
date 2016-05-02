
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
	var apparatusId = apparatusOb.apparatusId;
    var apparatusName = apparatusOb.apparatusName;
	var description = apparatusOb.description;
	var numberOfSlots = apparatusOb.numberOfSlots;
	console.log(apparatusOb);
	
	var apparatus = new Apparatus(apparatusId, apparatusName, description, numberOfSlots);
	return apparatus;
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
	var user = new User(username, pass, firefighter);
	return user;
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
	var timeslot = new Timeslot(timeslotId, startTime, endTime);
	
	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);

	console.log(scheduleTimeslotOb);
	//var scheduleTimeslot = new ScheduleTimeslot(scheduleTimeslotId, firefighter, timeslot);
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
	//var availableTimeslot = new availableTimeslot(availableTimeslotId, firefighter, timeslot);
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
	//var myEvent = new Event(eventId, eventName, eventDescription, timeslot);
	//return myEvent;
}

function parseAssignedFirefighter(json){
	var ob = JSON.parse(json);	
	var assignedFirefighterOb = ob["AssignedFirefighter"];
	var firefighterOb = assignedFirefighterOb["Firefighter"];
	var myEventOb = assignedFirefighterOb["MyEvent"];
	var timeslotOb = myEventOb["Timeslot"];
	
	var assignedFirefighterId = assignedFirefighterOb.assignedFirefighterId
	var apparatusId = assignedFirefighterOb.apparatusId

	var firefighterId = firefighterOb.firefighterId;
	var firstName = firefighterOb.firstName;
	var lastName = firefighterOb.lastName;
	var email = firefighterOb.email;
	var phone = firefighterOb.phone;
	var secondaryPhone = firefighterOb.secondaryPhone;
	var carrier = firefighterOb.carrier;
	var firefighter = new Firefighter(firefighterId, firstName, lastName, email, phone, secondaryPhone, carrier);

	var endTime = timeslotOb.endTime;
	var startTime = timeslotOb.startTime;
	var timeslotId = timeslotOb.timeslotId;
	//var timeslot = new Timeslot(timeslotId, startTime, endTime);
	
	var eventId = myEventOb.eventId
	var eventName = myEventOb.eventName
	var eventDescription = myEventOb.eventDescription
	//var myEvent = new MyEvent(eventId, eventName, eventDescription, timeslot);

	//var assignedFirefighter = new AssignedFireFighter(assignedFirefighterId, apparatusId, firefighter, myEvent);
	console.log(assignedFirefighterOb);
	//return assignedFirefighter;
}

function parseAssignedApparatus(json){
	var ob = JSON.parse(json);	
	var assignedApparatusOb = ob["AssignedApparatus"];	
	var apparatusOb = assignedApparatusOb["Apparatus"];
	var myEventOb = assignedApparatusOb["MyEvent"];
	var timeslotOb = myEventOb["Timeslot"];

	var assignedApparatusId = assignedApparatusOb.assignedApparatusId

	var appartusId = apparatusOb.appartusId;
    var apparatusName = apparatusOb.apparatusName;
	var description = apparatusOb.description;
	var numberOfSlots = apparatusOb.numberOfSlots;
	//var apparatus = new Apparatus(apparatusId, apparatusName, apparatusDescription, numberOfSlots);

	var endTime = timeslotOb.endTime;
	var startTime = timeslotOb.startTime;
	var timeslotId = timeslotOb.timeslotId;
	//var timeslot = new Timeslot(timeslotId, startTime, endTime);
	
	var eventId = myEventOb.eventId
	var eventName = myEventOb.eventName
	var eventDescription = myEventOb.eventDescription
	//var myEvent = new MyEvent(eventId, eventName, eventDescription, timeslot);

	console.log(assignedApparatusOb);
	//var assignedAppartus = new AssignedApparatus(assignedApparatusId, myEvent, apparatus);
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

function Apparatus(apparatusId, apparatusName, apparatusDescription, numberOfSlots){
	this.apparatusId=apparatusId;
	this.apparatusName=apparatusName;
	this.apparatusDescription=apparatusDescription;
	this.numberOfSlots=numberOfSlots;
	
	this.getApparatusId = function(){
		return this.apparatusId;
	}
	this.getApparatusDescription = function (){
		return this.apparatusDescription;
	}
	this.getNumberOfSlots = function(){
		return this.numberOfSlots;
	}
	this.getApparatusName = function(){
		return this.apparatusName;
	}
	
	this.getSummary = function(){
		return "Apparatus (Id: "+getApparatusId()+", Name: "+getApparatusName()+", Slots: "+getNumberOfSlots()+")";
	}
	//this.getJson = function(){
		//return '{' +this.getNestedJson()+'}';			
	//}
	
	//this.getNestedJson = function(){
		//JSON.stringify(this);
	//}
}


function User(username, pass, firefighter){
	this.username=username;
	this.pass=pass;
	this.firefighter=firefighter;
	
	this.getUsername = function(){
		return this.username;
	}
	this.getPassword = function (){
		return this.pass;
	}
	this.getFirefighter = function(){
		return this.firefighter;
	}
	
	this.getSummary = function(){
		return "User (Username: "+getUsername()+", Password: "+getPassword()+", Firefighter: "+getFirefighter().getSummary()+")";
	}
	//this.getJson = function(){
		//return '{' +this.getNestedJson()+'}';			
	//}
	
	//this.getNestedJson = function(){
		//JSON.stringify(this);
	//}
}

function Timeslot(timeslotId, startTime, endTime){
	this.timeslotId=timeslotId;
	this.startTime=startTime;
	this.endTime=endTime;
	
	this.getTimeslotID = function(){
		return this.timeslotId;
	}
	this.getStartTime= function (){
		return this.startTime;
	}
	this.getEndTime = function(){
		return this.endTime;
	}
	
	this.getSummary = function(){
		return "Timeslot (ID: "+getTimeslotID()+", Start time: "+getStartTime()+", End time: "+getEndTime()+")";
	}
	//this.getJson = function(){
		//return '{' +this.getNestedJson()+'}';			
	//}
	
	//this.getNestedJson = function(){
		//JSON.stringify(this);
	//}
}