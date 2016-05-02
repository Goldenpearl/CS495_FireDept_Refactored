<?php
require "classes.php";

function createConnection(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fireDept";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}
function queryConnection($conn, $queryString){
	$result = $conn->query($queryString);
	return $result;
}
function closeConnection($conn){
	$conn->close();
}

function queryDatabase($queryString){
	$conn = createConnection();
	$result = queryConnection($conn, $queryString);
	closeConnection($conn);
	return $result;
}

function executeQueryString($queryString)
{
	$conn = createConnection();
	$success = false;
	if ($conn->query($queryString) === TRUE) 
	{
		//echo "<br>New record created successfully<br>";
		$success=true;
	} 	
	else 
	{
		//echo "Error: " . $queryString . "<br>" . $conn->error;
	
	}
	closeConnection($conn);
	return $success;
}

function getAllFirefighters(){
	$q = intval($_GET);
	$firefighters = array();
	$sql = "call get_all_firefighters();";
	$result = queryDatabase($sql);
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$firefighterId = $row["firefighterId"];
				$firefighterFName = $row["firstName"];
				$firefighterLName = $row["lastName"];
				$firefighterEmail = $row["email"];
				$firefighterPhone = $row["phone"];
				$firefighterSecondaryPhone = $row["secondaryPhone"];
				$firefighterPhoneCarrier = $row["phoneProvider"];
				$firefighter = new Firefighter($firefighterId, $firefighterFName, $firefighterLName, $firefighterEmail, $firefighterPhone, $firefighterSecondaryPhone, $firefighterPhoneCarrier);
				array_push($firefighters, $firefighter); 
			}
	}
	return $firefighters;
}

function getAllApparatus(){
	$q = intval($_GET);
	$apparati = array();
	$sql = "call get_all_apparatus();";
	$result = queryDatabase($sql);
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$apparatusName = $row["apparatusName"];
				$apparatusDescription = $row["apparatusDescription"];
				$numberOfSlots = $row["numberOfSlots"];
				$apparatusId = $row["apparatusId"];
				$apparatus = new Apparatus($apparatusId, $apparatusName, $numberOfSlots, $apparatusDescription);
				array_push($apparati, $apparatus); 
			}
	}
	return $apparati;
}

function getAllUsers(){
	$users = array();
	$result = queryDatabase("Call get_all_users();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");
	
	$users;
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$username = $row['username'];	
				$pass = $row['pass'];	
				$firefighterId = $row['firefighterId'];	
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$secondaryPhone =$row['secondaryPhone'];
				$carrier = $row['phoneProvider'];
				$firefighter = new Firefighter($firefighterId, $firstName, $lastName, $email, $phone, $secondaryPhone, $carrier);
				$user = new User($username, $pass, $firefighter);
				array_push($users, $user); 
		}
	}
	return $users;
}

function getAllScheduleTimeslots(){
	$timeslots = array();
	$result = queryDatabase("Call get_all_schedule_timeslots();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");

	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$startTime = $row['startTime'];
				$endTime = $row['endTime'];
				$timeslotId = $row['timeslotId'];
				$firefighterId = $row['firefighterId'];	
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$secondaryPhone =$row['secondaryPhone'];
				$carrier = $row['phoneProvider'];
				$scheduleTimeslotId= $row['scheduleTimeslotId'];
				$firefighter = new Firefighter($firefighterId, $firstName, $lastName, $email, $phone, $secondaryPhone, $carrier);
				$timeslot = new TimeSlot($timeslotId, $startTime, $endTime, $firefighter);
				$scheduleTimeslot = new ScheduleTimeslot($scheduleTimeslotId, $firefighter, $timeslot);
				array_push($timeslots, $scheduleTimeslot); 
		}
	}
	return $timeslots;
}
function getAllAvailableTimeslots(){
	$timeslots = array();
	$result = queryDatabase("Call get_all_available_timeslots();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$startTime = $row['startTime'];
				$endTime = $row['endTime'];
				$timeslotId = $row['timeslotId'];
				$firefighterId = $row['firefighterId'];	
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$secondaryPhone =$row['secondaryPhone'];
				$carrier = $row['phoneProvider'];
				$availableTimeslotId= $row['availableTimeslotId'];
				$firefighter = new Firefighter($firefighterId, $firstName, $lastName, $email, $phone, $secondaryPhone, $carrier);
				$timeslot = new TimeSlot($timeslotId, $startTime, $endTime, $firefighter);
				$availableTimeslot = new AvailableTimeslot($availableTimeslotId, $firefighter, $timeslot);
				array_push($timeslots, $availableTimeslot); 
		}
	}
	return $timeslots;
}

function getAllEvents(){
	$events = array();
	$result = queryDatabase("Call get_all_events();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$id = $row['eventId'];
				$eventName = $row['eventName'];
				$eventDescription = $row['eventDescription'];
				$startTime = $row['startTime'];
				$endTime = $row['endTime'];
				$timeslotId = $row['timeslotId'];
				$timeslot = new TimeSlot($timeslotId, $startTime, $endTime);
				$event = new MyEvent($id, $eventName, $eventDescription, $timeslot);
				array_push($events, $event); 
		}
	}
	return $events;
}
function getAllAssignedFirefighters(){
	$assignedFirefighters = array();
	$result = queryDatabase("Call get_all_assigned_firefighters();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$id = $row['assignedFirefighterID'];
				$firstName = $row['firstName'];
				$lastName  = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$secondaryPhone = $row['secondaryPhone'];
				$phoneProvider = $row['phoneProvider'];
				$firefighterId  = $row['firefighterId'];
				$eventId = $row['eventId'];
				$eventName = $row['eventName'];
				$eventDescription = $row['eventDescription'];
				$startTime = $row['startTime'];
				$endTime = $row['endTime'];
				$timeslotId = $row['timeslotId'];
				$apparatusId = $row['apparatusId'];
				$firefighter = new Firefighter($firefighterId, $firstName, $lastName, $email, $phone, $secondaryPhone, $phoneProvider);
				$timeslot = new TimeSlot($timeslotId, $startTime, $endTime);
				$event = new MyEvent($eventId, $eventName, $eventDescription, $timeslot);
				$assignedFirefighter = new AssignedFirefighter($id, $firefighter, $event, $apparatusId);
				array_push($assignedFirefighters, $assignedFirefighter); 
		}
	}
	return $assignedFirefighters;
}

function getAllAssignedApparatus(){
	$assignedApparati = array();
	$result = queryDatabase("Call get_all_assigned_apparatus();");
	//var_dump($result);
	//$result = queryDatabase("get_all_schedule_timeslots_between(".$startTime.", ".$endTime.");");
	if ($result->num_rows > 0) {
		mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc()) {
				$id = $row['assignedApparatusId'];
				$eventId = $row['eventId'];
				$eventName = $row['eventName'];
				$eventDescription = $row['eventDescription'];
				$startTime = $row['startTime'];
				$endTime = $row['endTime'];
				$timeslotId = $row['timeslotId'];
				$apparatusId = $row['apparatusId'];
				$apparatusName = $row['apparatusName'];
				$apparatusDescription = $row['apparatusDescription'];
				$numberOfSlots = $row['numberOfSlots'];
				$apparatus = new Apparatus($apparatusId, $apparatusName, $apparatusDescription, $numberOfSlots);
				$timeslot = new TimeSlot($timeslotId, $startTime, $endTime);
				$event = new MyEvent($eventId, $eventName, $eventDescription, $timeslot);
				$assignedApparatus = new AssignedApparatus($id, $event, $apparatus);
				array_push($assignedApparati, $assignedApparatus); 
		}
	}
	return $assignedApparati;
}

function echoAllFirefightersToJSON(){
	$firefighters = getAllFirefighters();
	$jsonString = "";
	foreach($firefighters as $firefighter){
		echo $firefighter->getJSON()."<br> ";
	}
	return $jsonString;
}

function echoAllApparatusToJSON(){
	$apparati = getAllApparatus();
	$apparati = getAllApparatus();
	$jsonString = "";
	foreach($apparati as $apparatus){
		echo $apparatus->getJSON()."<br> ";
	}
	return $jsonString;
}
function echoAllScheduleTimeslotsToJSON(){
	$scheduleTimeslots = getAllScheduleTimeslots();
	$jsonString = "";
	foreach($scheduleTimeslots as $scheduleTimeslot){
		echo $scheduleTimeslot->getJSON()."<br> ";
	}
	return $jsonString;
}

function echoAllEventsToJSON(){
	$myEvents = getAllEvents();
	$jsonString = "";
	foreach($myEvents as $myEvent){
		echo $myEvent->getJSON()."<br> ";
	}
	return $jsonString;
}

function echoAllAssignedApparatusToJSON(){
	$assignedApparati = getAllAssignedApparatus();
	$jsonString = "";
	foreach($assignedApparati as $assignedApparatus){
		echo $assignedApparatus->getJSON()."<br> ";
	}
	return $jsonString;
}
function echoAllAssignedFirefightersToJSON(){
	$assignedFirefighters = getAllAssignedFirefighters();
	$jsonString = "";
	foreach($assignedFirefighters as $assignedFirefighter){
		echo $assignedFirefighter->getJSON()."<br> ";
	}
	return $jsonString;
}

function echoAllAvailableTimeslotsToJSON(){
	$availableTimeslots = getAllAvailableTimeslots();
	$jsonString = "";
	foreach($availableTimeslots as $availableTimeslot){
		echo $availableTimeslot->getJSON()."<br> ";
	}
	return $jsonString;
}

function echoAllUsersToJSON(){
	$users = getAllUsers();
	$jsonString = "";
	foreach($users as $user){
		echo $user->getJSON()."<br> ";
	}
	return $jsonString;
}

function insertFirefighter($firefighter){
	$fname = $firefighter -> getFirstName();
	$lname = $firefighter -> getLastName();
	$email = $firefighter -> getEmail();
	$phone = $firefighter -> getPhone();
	$secondaryPhone = $firefighter ->getSecondaryPhone();
	$carrier = $firefighter ->getCarrier();
	$queryString = "call firefighter_insert(" .
	"'".
	$fname.
	"'".
	", ".
	"'".
	$lname.
	"'".
	", ".
	"'".
	$email.
	"'".
	", ".
	"'".
	$phone.
	"'".
	", ".
	"'".
	$secondaryPhone.
	"'".
	", ".
	"'".
	$carrier.
	"'".
	"); ";
	$successfulFirefighterInsert = executeQueryString($queryString);
	return $successfulFirefighterInsert;
}
function insertApparatus($apparatus){
	$name = $apparatus->getName();
	$description = $apparatus->getDescription();
	$numberOfSlots = $apparatus->getNumberOfSlots();
	$queryString = "call apparatus_insert(" .
	"'".
	$name.
	"'".
	", ".
	"'".
	$description.
	"'".
	", ".
	"'".
	$numberOfSlots.
	"'".
	"); ";	
	$successfulApparatusInsert = executeQueryString($queryString);
	return $successfulApparatusInsert;
}
function insertScheduleTimeslot($scheduleTimeslot){
	$startTime = $scheduleTimeslot->getTimeslot()->getStartTime();
	$endTime = $scheduleTimeslot->getTimeslot()->getEndTime();
	$firefighterId = $scheduleTimeslot->getFirefighter()->getId();
	$queryString = "call schedule_timeslot_insert(" .
	"'".
	$startTime.
	"'".
	", ".
	"'".
	$endTime.
	"'".
	", ".
	"'".
	$firefighterId.
	"'".
	"); ";	
	$successfulScheduleTimeslotInsert = executeQueryString($queryString);
	return $successfulScheduleTimeslotInsert;
}
function insertAvailableTimeslot($availableTimeslot){
	$startTime = $availableTimeslot->getTimeslot()->getStartTime();
	$endTime = $availableTimeslot->getTimeslot()->getEndTime();
	$firefighterId = $availableTimeslot->getFirefighter()->getId();
	$queryString = "call available_timeslot_insert(" .
	"'".
	$startTime.
	"'".
	", ".
	"'".
	$endTime.
	"'".
	", ".
	"'".
	$firefighterID.
	"'".
	"); ";
	$successfulEventInsert = executeQueryString($queryString);
	return $successfulEventInsert;
}
function insertEvent($myEvent){
	$eventName=$myEvent->getEventName();
	$eventDescription=$myEvent->getEventDescription();
	$startTime=$myEvent->getTimeslot()->getStartTime();
	$endTime=$myEvent->getTimeslot()->getEndTime();
	$queryString = "call my_event_insert(" .
	"'".
	$eventName.
	"'".
	", ".
	"'".
	$eventDescription.
	"'".
	", ".
	"'".
	$startTime.
	"'".
	", ".
	"'".
	$endTime.
	"'".
	"); ";
	$successfulEventInsert = executeQueryString($queryString);
	return $successfulEventInsert;
}
function insertAssignedApparatus($assignedApparatus){
	$eventId=$assignedApparatus->getEvent()->getId();
	$apparatusId=$assignedApparatus->getApparatus()->getId();
	$queryString = "call assigned_apparatus_insert(" .
	"'".
	$eventId.
	"'".
	", ".
	"'".
	$apparatusId.
	"'".
	"); ";
	$successfulAssignedApparatusInsert = executeQueryString($queryString);
	return $successfulAssignedApparatusInsert;
}
function insertAssignedFirefighter($assignedFirefighter){
	$eventId=$assignedFirefighter->getEvent()->getId();
	$apparatusId=$assignedFirefighter->getApparatusId();
	$firefighterId =$assignedFirefighter->getFirefighter()->getId();
	$queryString = "call assigned_firefighter_insert(" .
	"'".
	$eventId.
	"'".
	", ".
	"'".
	$apparatusId.
	"'".
	", ".
	"'".
	$firefighterId.
	"'".
	"); ";
	$successfulAssignedFirefighterInsert = executeQueryString($queryString);
	return $successfulAssignedFirefighterInsert;
}

function insertUser($user){
	$newUsername = $user->getUsername();
	$newPass = $user->getPassword();
	$firefighter = $user->getFirefighter();
	$fname = $firefighter -> getFirstName();
	$lname = $firefighter -> getLastName();
	$email = $firefighter -> getEmail();
	$phone = $firefighter -> getPhone();
	$secondaryPhone = $firefighter ->getSecondaryPhone();
	$carrier = $firefighter ->getCarrier();
	$queryString = "call user_insert(" .
	"'".
	$newUsername.
	"'".
	", ".
	"'".
	$newPass.
	"'".
	", ".
	"'".
	$fname.
	"'".
	", ".
	"'".
	$lname.
	"'".
	", ".
	"'".
	$email.
	"'".
	", ".
	"'".
	$phone.
	"'".
	", ".
	"'".
	$secondaryPhone.
	"'".
	", ".
	"'".
	$carrier.
	"'".
	"); ";
	$successfulAssignedFirefighterInsert = executeQueryString($queryString);
	return $successfulAssignedFirefighterInsert;
}

function parseFirefighter($firefighterJson){
	$firefighter = Firefighter::getFirefighterFromJson($firefighterJson);
	return $firefighter;
}

function parseApparatus($apparatusJson){
	$apparatus = Apparatus::getApparatusFromJson($apparatusJson);
	return $apparatus;
}
function parseScheduleTimeslot($scheduleTimeslotJson){
	$scheduleTimesslot = ScheduleTimeslot::getScheduleTimeslotFromJson($scheduleTimeslotJson);
	return $scheduleTimeslot;
}

function parseAvailableTimeslot($availableTimeslotJson){
	$availableTimeslot = AvailableTimeslot::getAvailableTimeslotFromJson($availableTimeslotJson);
	return $availableTimeslot;
}

function parseAssignedApparatus($assignedApparatusJson){
	$assignedApparatus = AssignedApparatus::getAssignedApparatusFromJson($assignedApparatusJson);
	return $assignedApparatus;
}
function parseAssignedFirefighter($assignedFirefighterJson){
	$assignedFirefighter = Assignedfirefighter::getAssignedFirefighterFromJson($assignedFirefighterJson);
	return $assignedFirefighter;
}
function parseUser($userJson){
	$user = User::getUserFromJson($userJson);
	return $user;
}


$operationId = $_REQUEST["operationId"];
if($operationId==0)
{
	$id = $_REQUEST["classId"];
	if($id == $FIREFIGHTER_CLASS_ID){
		echoAllFirefightersToJSON();
	}
	else if ($id==$APPARATUS_CLASS_ID){
		echoAllApparatusToJSON();
	}
	else if ($id==$USER_CLASS_ID){
		echoAllUsersToJSON();
	}
	else if ($id==$SCHEDULE_TIMESLOT_CLASS_ID){
		echoAllScheduleTimeslotsToJSON();
	}
	else if ($id==$AVAILABLE_TIMESLOT_CLASS_ID){
		echoAllAvailableTimeslotsToJSON();
	}
	else if ($id==$MY_EVENT_CLASS_ID){
		echoAllEventsToJSON();
	}
	else if ($id==$ASSIGNED_FIREFIGHTER_CLASS_ID){
		echoAllAssignedFirefightersToJSON();
	}
	else if ($id==$ASSIGNED_APPARATUS_CLASS_ID){
		echoAllAssignedApparatusToJSON();
	}
}
else if($operationId==1){
	$id = $_REQUEST["classId"];
	$json =  $_REQUEST["json"];
	if($id == $FIREFIGHTER_CLASS_ID){
		$firefighter = parseFirefighter($json);
		$success = insertFirefighter($firefighter);
	}
	else if ($id==$APPARATUS_CLASS_ID){
		$apparatus = parseApparatus($json);
		$success = insertApparatus($apparatus);
	}
	else if ($id==$USER_CLASS_ID){
		$user = parseUser($json);
		$success = insertUser($user);
	}
	else if ($id==$SCHEDULE_TIMESLOT_CLASS_ID){
		$scheduleTimeslot = parseScheduleTimeslot($json);
		$success = insertScheduleTimeslot($scheduleTimeslot);
	}
	else if ($id==$AVAILABLE_TIMESLOT_CLASS_ID){
		$availableTimeslot = parseAvailableTimeslot($json);
		$success = insertAvailableTimeslot($availableTimeslot);
	}
	else if ($id==$MY_EVENT_CLASS_ID){
		$myEvent = parseEvent($json);
		$success = insertEvent($myEvent);
	}
	else if ($id==$ASSIGNED_FIREFIGHTER_CLASS_ID){
		$assignedFirefighter = parseAssignedFirefighter($json);
		$success = insertFirefighter($assignedFirefighter);
	}
	else if ($id==$ASSIGNED_APPARATUS_CLASS_ID){
		$assignedApparatus = parseAssignedApparatus($json);
		$success = insertAssignedApparatus($assignedApparatus);
	}
}

?>