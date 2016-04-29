FIREFIGHTER_CLASS_ID = 0;
APPARATUS_CLASS_ID = 1;
TIMESLOT_CLASS_ID = 2;
USER_CLASS_ID = 3;
SCHEDULE_TIMESLOT_CLASS_ID = 4;
AVAILABLE_TIMESLOT_CLASS_ID = 5;
MY_EVENT_CLASS_ID = 6;
ASSIGNED_FIREFIGHTER_CLASS_ID = 7;
ASSIGNED_APPARATUS_CLASS_ID = 8;

function recieveScheduleJson() {	
		var response1;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "databaseInterface.php?id=" + SCHEDULE_TIMESLOT_CLASS_ID, false);
        xmlhttp.send();
		document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function recieveFirefighterJson() {	
		var response1;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "databaseInterface.php?id=" + FIREFIGHTER_CLASS_ID, false);
        xmlhttp.send();
		document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function recieveEventsJson() {	
		var response1;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "databaseInterface.php?id=" + MY_EVENT_CLASS_ID, false);
        xmlhttp.send();
		document.write(xmlhttp.responseText);
		return xmlhttp.responseText;
		//xmlhttp.close;
}

function test(){
	 recieveEventsJson();
	 recieveFirefighterJson();
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

