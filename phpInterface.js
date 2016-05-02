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
		document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function test(){
	 recieveJson(FIREFIGHTER_CLASS_ID);
	 recieveJson(APPARATUS_CLASS_ID);
	 recieveJson(USER_CLASS_ID);
	 recieveJson(SCHEDULE_TIMESLOT_CLASS_ID);
	 recieveJson(AVAILABLE_TIMESLOT_CLASS_ID);
	 recieveJson(MY_EVENT_CLASS_ID);
	 recieveJson(ASSIGNED_FIREFIGHTER_CLASS_ID);
	 recieveJson(ASSIGNED_APPARATUS_CLASS_ID);
	 sendJson(FIREFIGHTER_CLASS_ID, '{"Firefighter":{"firefighterId":"10","firstName":"May","lastName":"Ki","email":"torchic@blaziken.com","phone":null,"secondaryPhone":null,"carrier":null}}');
	 sendJson(APPARATUS_CLASS_ID, '{"Apparatus":{"appartusId":"1","apparatusName":"Big Truck","description":"12","numberOfSlots":"It\'s HUGE!"}}');
	// sendJson(USER_CLASS_ID,'{"User": {"username": "ash","password": "34, "Firefighter":{"firefighterId":"7","firstName":"Ash","lastName":"Ketchum","email":"pikachu100@pokeball.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	 //sendJson(SCHEDULE_TIMESLOT_CLASS_ID, {'"ScheduleTimeslot": {"scheduleTimeslotId": "2","Timeslot":{"startTime":"2016-04-24 04:00:00","endTime":"2016-04-24 10:00:00","timeslotId":"4"}, "Firefighter":{"firefighterId":"2","firstName":"Ash","lastName":"Ketchum","email":"pikachu100@pokeball.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	 //sendJson(AVAILABLE_TIMESLOT_CLASS_ID, {'"AvailableTimeslot": {"availableTimeslotId": "1","Timeslot":{"startTime":"2016-04-24 11:00:00","endTime":"2016-04-24 12:00:00","timeslotId":"16"}, "Firefighter":{"firefighterId":"3","firstName":"Misty","lastName":"Bubbles","email":"misty32453453@staryu.com","phone":null,"secondaryPhone":null,"carrier":null}}}');
	//sendJson(MY_EVENT_CLASS_ID,);
	 //sendJson(ASSIGNED_FIREFIGHTER_CLASS_ID,);
	 //sendJson(ASSIGNED_APPARATUS_CLASS_ID,);
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

