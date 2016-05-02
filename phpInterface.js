FIREFIGHTER_CLASS_ID = 0;
APPARATUS_CLASS_ID = 1;
TIMESLOT_CLASS_ID = 2;
USER_CLASS_ID = 3;
SCHEDULE_TIMESLOT_CLASS_ID = 4;
AVAILABLE_TIMESLOT_CLASS_ID = 5;
MY_EVENT_CLASS_ID = 6;
ASSIGNED_FIREFIGHTER_CLASS_ID = 7;
ASSIGNED_APPARATUS_CLASS_ID = 8;

RECIEVE_ID = 0;
GIVE_ID = 1;
function recieveJson(classId){
	var response1;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "databaseInterface.php?operationId="+ RECIEVE_ID+"&classId="+ classId, false);
        xmlhttp.send();
		document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function sendJson(classId, json){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "databaseInterface.php?operationId="+ GIVE_ID+"&classId="+ classId +"&json="+json, false);
        xmlhttp.send();
		//document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function test(){
	 //recieveJson(FIREFIGHTER_CLASS_ID);
	 //recieveJson(APPARATUS_CLASS_ID);
	 //recieveJson(USER_CLASS_ID);
	 //recieveJson(SCHEDULE_TIMESLOT_CLASS_ID);
	 //recieveJson(AVAILABLE_TIMESLOT_CLASS_ID);
	// recieveJson(MY_EVENT_CLASS_ID);
	 //recieveJson(ASSIGNED_FIREFIGHTER_CLASS_ID);
	 //recieveJson(ASSIGNED_APPARATUS_CLASS_ID);
	//var firefighters = grabFromDatabase(FIREFIGHTER_CLASS_ID)
	//var apparati = grabFromDatabase(APPARATUS_CLASS_ID);
	//var users = grabFromDatabase(USER_CLASS_ID);
	//var scheduleTimeslot = grabFromDatabase(SCHEDULE_TIMESLOT_CLASS_ID);
	//var availableTimeslot = grabFromDatabase(AVAILABLE_TIMESLOT_CLASS_ID);
	var myEvent = grabFromDatabase(MY_EVENT_CLASS_ID);
	var assignedFirefighter = grabFromDatabase(ASSIGNED_FIREFIGHTER_CLASS_ID);
	var assignedApparatus= grabFromDatabase(ASSIGNED_APPARATUS_CLASS_ID);
	//Bugs: ' causes query to not work
	//change procedure to only insert firefighter if user is also inserted
	//submits query twice: could be refresh issue
	//Create a "failure" system
	//sendJson(FIREFIGHTER_CLASS_ID, '{"Firefighter":{"firefighterId":"10","firstName":"May","lastName":"Ki","email":"torchic@blaziken.com","phone":null,"secondaryPhone":null,"carrier":null}}');
	//sendJson(APPARATUS_CLASS_ID, '{"Apparatus":{"appartusId":"1","apparatusName":"Big Truck","description":"12","numberOfSlots":"Its HUGE!"}}');
	//sendJson(USER_CLASS_ID, '{"User":{"username":"bee","password":"f","Firefighter":{"firefighterId":"10","firstName":"May","lastName":"Ki","email":"torchic@blaziken.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	//sendJson(SCHEDULE_TIMESLOT_CLASS_ID, '{"ScheduleTimeslot":{"scheduleTimeslotId":"2","Timeslot":{"startTime":"2016-04-24 04:00:00","endTime":"2016-04-24 10:00:00","timeslotId":"4"},"Firefighter":{"firefighterId":"2","firstName":"Ash","lastName":"Ketchum","email":"pikachu100@pokeball.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	//sendJson(AVAILABLE_TIMESLOT_CLASS_ID, '{"AvailableTimeslot":{"availableTimeslotId":"3","Timeslot":{"startTime":"2016-04-24 11:00:00","endTime":"2016-04-24 12:00:00","timeslotId":"16"},"Firefighter":{"firefighterId":"3","firstName":"Misty","lastName":"Bubbles","email":"misty32453453@staryu.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	//sendJson(MY_EVENT_CLASS_ID,'{"MyEvent":{"eventId":"2","eventName":"Cake","eventDescription":"Fun!","Timeslot":{"startTime":"2016-04-23 11:00:00","endTime":"2016-04-23 12:00:00","timeslotId":"2"}}}');
	//sendJson(ASSIGNED_FIREFIGHTER_CLASS_ID, '{"AssignedFirefighter":{"assignedFirefighterId":"1","apparatusId":"1","Firefighter":{"firefighterId":"1","firstName":"Kelly","lastName":"Blair","email":null,"phone":null,"secondaryPhone":null,"carrier":"att"},"MyEvent":{"eventId":"1","eventName":"Party","eventDescription":"Fun!","Timeslot":{"startTime":"2016-04-23 11:00:00","endTime":"2016-04-23 12:00:00","timeslotId":"1"}}}}');
	//sendJson(ASSIGNED_APPARATUS_CLASS_ID,'{"AssignedApparatus":{"assignedApparatusId":"2","Apparatus":{"appartusId":"3","apparatusName":"Small Truck","description":"Its tiny!","numberOfSlots":"3"},"MyEvent":{"eventId":"1","eventName":"Party","eventDescription":"Fun!","Timeslot":{"startTime":"2016-04-23 11:00:00","endTime":"2016-04-23 12:00:00","timeslotId":"1"}}}}');
}

function grabFromDatabase(classId){
	var json = recieveJson(classId);
	var classArray = parseJsonToJS(classId, json);
	return classArray;
}

function parseJsonToJS(classId, json){
	var jsonArray = json.split("<br>");
		var classes = new Array();
		for(n=0; n<jsonArray.length-1; n++){
			var singleClass = parseSingleJson(classId, jsonArray[n]);
			classes.push(singleClass);
		}
		return classes;
}

function parseSingleJson(classId, json){
	if(classId == FIREFIGHTER_CLASS_ID)
	{
		return parseFirefighter(json);
	}
	else if(classId == APPARATUS_CLASS_ID)
	{
		return parseApparatus(json);
	}
	else if(classId == USER_CLASS_ID)
	{
		return parseUser(json);
	}
	else if(classId == SCHEDULE_TIMESLOT_CLASS_ID)
	{
		return parseScheduleTimeslot(json);
	}
	else if(classId == AVAILABLE_TIMESLOT_CLASS_ID)
	{
		return parseAvailableTimeslot(json);
	}
	else if(classId == MY_EVENT_CLASS_ID)
	{
		return parseMyEvent(json);
	}
	else if(classId == ASSIGNED_FIREFIGHTER_CLASS_ID)
	{
		return parseAssignedFirefighter(json);
	}
	else if(classId == ASSIGNED_APPARATUS_CLASS_ID)
	{
		return parseAssignedApparatus(json);
	}
}
/*
function parseScheduleJson(timeslotJson){
	var timeslotArrayJson = timeslotJson.split("<br>");
		var timeslots = new Array();
		for(n=0; n<timeslotArrayJson.length-1; n++){
			var timeslot = parseScheduleTimeslot(timeslotArrayJson[n]);
			timeslots.push(timeslot);
		}
		return timeslots;
}

function grabSchedule(){
	var scheduleJson = recieveScheduleJson();
	return parseScheduleJson(scheduleJson);
}

*/

