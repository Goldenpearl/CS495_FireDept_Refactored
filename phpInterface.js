FIREFIGHTER_CLASS_ID = 0;
APPARATUS_CLASS_ID = 1;
TIMESLOT_CLASS_ID = 2;
USER_CLASS_ID = 3;
SCHEDULE_TIMESLOT_CLASS_ID = 4;
AVAILABLE_TIMESLOT_CLASS_ID = 5;
MY_EVENT_CLASS_ID = 6;
ASSIGNED_FIREFIGHTER_CLASS_ID = 7;
ASSIGNED_APPARATUS_CLASS_ID = 8;

function recieveJson(classId){
	var response1;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "databaseInterface.php?id=" + classId, false);
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

