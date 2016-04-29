<?php

$FIREFIGHTER_CLASS_ID = 0;
$APPARATUS_CLASS_ID = 1;
$TIMESLOT_CLASS_ID = 2;
$USER_CLASS_ID = 3;
$SCHEDULE_TIMESLOT_CLASS_ID = 4;
$AVAILABLE_TIMESLOT_CLASS_ID = 5;
$MY_EVENT_CLASS_ID = 6;
$ASSIGNED_FIREFIGHTER_CLASS_ID = 7;
$ASSIGNED_APPARATUS_CLASS_ID = 8;


class Firefighter {
	private $id = 0;
	private $fName = "";
	private $lName = "";

	function __construct($id, $fName, $lName, $email, $phone, $secondaryPhone, $carrier){
		$this->fName=$fName;
		$this->lName=$lName;
		$this->id = $id;
		$this->email = $email;
		$this->phone = $phone;
		$this->secondaryPhone = $secondaryPhone;
		$this->carrier = $carrier;
	}
	
	public function getSummary(){
		return 
		"Name: ".
		$this->fName.
		" ".
		$this->lName. 
		"<br> Id: ".
		$this->id.
		"<br>";
	}
	
	public function getFirstName(){
		return $this->fName;
	}
	
	public function getLastName(){
		return $this ->lName;
	}
	
	public function getId(){
		return $this ->id;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getPhone(){
		return $this ->phone;
	}
	
	public function getSecondaryPhone(){
		return $this ->secondaryPhone;
	}
	
	public function getCarrier(){
		return $this->carrier;
	}

	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$arr = array('firefighterId'=>$this->id, 'firstName'=>$this->fName, 
			'lastName'=>$this->lName, 'email'=>$this->email, 'phone' =>$this->phone,
			'secondaryPhone'=>$this->secondaryPhone,'carrier'=>$this->carrier) ;
		$json = json_encode($arr);
		return $json;
	}

	public static function getFirefighterFromJson($json){
		//echo($json);
		$data = json_decode($json, true);
		$array = ($data["Firefighter"]);
		//var_dump($array, true);
		$fName= $array["firstName"];
		$lName = $array["lastName"];
		$id = $array["firefighterId"];
		$email= $array["email"];
		$phone = $array["phone"];
		$secondaryPhone = $array["secondaryPhone"];
		$carrier = $array["carrier"];
		return new Firefighter($id, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
	}
	
	public static function getClassId(){
		return $FIREFIGHTER_CLASS_ID;
	}
}

class Apparatus{
	private $id = 0;
	private $name = "";
	private $description = "";
	private $numberOfSlots = 0;

	function __construct($id, $name,  $description, $numberOfSlots){
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->numberOfSlots = $numberOfSlots;
	}
	
	public function getSummary(){
		return 
		"Name: ".
		$this->name.
		"<br> Slots:".
		$this->numberOfSlots. 
		"<br> Id: ".
		$this->id.
		"<br>";
	}

	public function getId(){
		return $this ->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getDescription(){
		return $this ->description;
	}
	
	public function getNumberOfSlots(){
		return $this ->numberOfSlots;
	}
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$arr = array('appartusId'=>$this->id, 'apparatusName'=>$this->name, 
			'description'=>$this->description, 'numberOfSlots'=>$this->numberOfSlots);
		$json = json_encode($arr);
		return $json;
	}
	
	public static function getApparatusFromJson($json){
		//echo($json);
		$data = json_decode($json, true);
		$array = ($data["Apparatus"]);
		//var_dump($array, true);
		$id= $array["appartusId"];
		$apparatusName = $array["apparatusName"];
		$description = $array["description"];
		$numberOfSlots= $array["numberOfSlots"];
		return new Apparatus($id, $apparatusName, $description, $numberOfSlots);
	}
	
	public static function getClassId(){
		return $APPARATUS_CLASS_ID;
	}
}

class Timeslot{
	private $timeslotId;
	private $startTime;
	private $endTime;
	
	function __construct($timeslotId, $startTime, $endTime){
		$this->startTime = $startTime;
		$this->endTime = $endTime;
		$this->timeslotId = $timeslotId;
	}
	
	public function getSummary(){
		return "StartTime : <br>".
		$this->startTime.
		"<br><br> EndTime: <br>".
		$this->endTime.
		"<br>TimeslotId: <br>".
		$this->timeslotId.
		"<br>";
	}
	
	public function getStartTime(){
		return $this->startTime;
	}
	
	public function getEndTime(){
		return $this->endTime;
	}
	
	public function getTimeslotId(){
		return $this->timeslotId;
	}
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$arr = ["startTime"=>$this->startTime, "endTime"=>$this->endTime, "timeslotId"=>$this->timeslotId];
		$json = json_encode($arr);
		return $json;
	}
	
	public static function getTimeslotFromJson($json){
		//echo($json);
		$data = json_decode($json, true);
		$array = ($data["Timeslot"]);
		//var_dump($array, true);
		$startTime= $array["startTime"];
		$endTime = $array["endTime"];
		$timeslotId = $array["timeslotId"];
		return new Timeslot($timeslotId, $startTime, $endTime);
	}

	public static function getClassId(){
		return $TIMESLOT_CLASS_ID;
	}
}

class User{
	private $username;
	private $pass;
	private $firefighter;
	function __construct($username, $pass, $firefighter){
		$this->username = $username;
		$this->pass = $pass;
		$this->firefighter = $firefighter;
	}
	
	public function getSummary(){
		return "User: <br>".
		$this->username.
		"Password: <br>".
		$this->pass.
		"<br><br> Firefighter:<br>".
		$this->firefighter->getSummary().
		"<br>";
	}
	
	public function getUsername(){
		return $this->username;
	}	
	
	public function getPassword(){
		return $this->pass;
	}
	
	public function getFirefighter(){
		return $this->firefighter;
	}
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"User": {'.
		'"username": "'.
		$this->username.
		'",'.
		'"password": "'.
		$this->pass.
		', "Firefighter":'.
		$this->getFirefighter()->getJSON().
		'}}';
		return $str;
	}
	
	public static function getUserFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["User"]);
		$firefighterArray = $array["Firefighter"];
		//var_dump($array, true);
		
		$username = $array["username"];
		$pass = $array["password"];
		$fName= $firefighterArray["firstName"];
		$lName = $firefighterArray["lastName"];
		$email= $firefighterArray["email"];
		$phone = $firefighterArray["phone"];
		$secondaryPhone = $firefighterArray["secondaryPhone"];
		$carrier = $firefighterArray["carrier"];
		$firefighterId = $firefighterArray["firefighterId"];
		$firefighter = new Firefighter($firefighterId, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
		$user = new User($username, $pass, $firefighter);
		return $user;
	}
	
	public static function getClassId(){
		return $USER_CLASS_ID;
	}
}

class ScheduleTimeslot{
	private $id;
	private $firefighter;
	private $timeslot;
	
	function __construct($id, $firefighter, $timeslot){
		$this->id = $id;
		$this->firefighter = $firefighter;
		$this->timeslot = $timeslot;
	}
	
	public function getSummary(){
		return "ScheduleTimeslotId: <br>".
		$this->id.
		"<br><br> Firefighter:<br>".
		$this->firefighter->getSummary().
		"<br><br> Timeslot:<br>".
		$this->timeslot->getSummary().
		"<br>";
	}
	
	public function getScheduleTimeslotId(){
		return $this->id;
	}	
	
	public function getFirefighter(){
		return $this->firefighter;
	}
	
	public function getTimeslot(){
		return $this->timeslot;
	}
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"ScheduleTimeslot": {'.
		'"scheduleTimeslotId": "'.
		$this->id.
		'",'.
		'"Timeslot":'.
		$this->timeslot->getJSON().
		', "Firefighter":'.
		$this->getFirefighter()->getJSON().
		'}}';
		return $str;
	}
	
	public static function getScheduleTimeslotFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["ScheduleTimeslot"]);
		$timeslotArray = $array["Timeslot"];
		$firefighterArray = $array["Firefighter"];
		//var_dump($array, true);
		
		$scheduleTimeslotId = $array["scheduleTimeslotId"];
		$startTime= $timeslotArray["startTime"];
		$endTime = $timeslotArray["endTime"];
		$timeslotId = $timeslotArray["timeslotId"];
		$fName= $firefighterArray["firstName"];
		$lName = $firefighterArray["lastName"];
		$email= $firefighterArray["email"];
		$phone = $firefighterArray["phone"];
		$secondaryPhone = $firefighterArray["secondaryPhone"];
		$carrier = $firefighterArray["carrier"];
		$firefighterId = $firefighterArray["firefighterId"];
		$firefighter = new Firefighter($firefighterId, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
		$timeslot = new Timeslot($timeslotId, $startTime, $endTime, $firefighter);
		$scheduleTimeslot = new ScheduleTimeslot($scheduleTimeslotId, $firefighter, $timeslot);
		return $scheduleTimeslot;
	}
	
	public static function getClassId(){
		return $SCHEDULE_TIMESLOT_CLASS_ID;
	}
}

class AvailableTimeslot{
	private $id;
	private $firefighter;
	private $timeslot;

	function __construct($id, $firefighter, $timeslot){
		$this->id = $id;
		$this->firefighter = $firefighter;
		$this->timeslot = $timeslot;
	}
	
	public function getSummary(){
		return "AvailableTimeslotId: <br>".
		$this->id.
		"<br><br> Timeslot:<br>".
		$this->timeslot->getSummary().
		"<br><br> Firefighter:<br>".
		$this->firefighter->getSummary().
		"<br>";
	}
	
	public function getAvailableTimeslotId(){
		return $this->id;
	}	
	
	public function getFirefighter(){
		return $this->firefighter;
	}
	
	public function getTimeslot(){
		return $this->timeslot;
	}
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"AvailableTimeslot": {'.
		'"availableTimeslotId": "'.
		$this->id.
		'",'.
		'"Timeslot":'.
		$this->timeslot->getJSON().
		', "Firefighter":'.
		$this->getFirefighter()->getJSON().
		'}}';
		return $str;
	}
	
	public static function getAvailableTimeslotFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["AvailableTimeslot"]);
		$timeslotArray = $array["Timeslot"];
		$firefighterArray = $array["Firefighter"];
		//var_dump($array, true);
		$availableTimeslotId = $array["availableTimeslotId"];
		$startTime= $timeslotArray["startTime"];
		$endTime = $timeslotArray["endTime"];
		$timeslotId = $timeslotArray["timeslotId"];
		$fName= $firefighterArray["firstName"];
		$lName = $firefighterArray["lastName"];
		$email= $firefighterArray["email"];
		$phone = $firefighterArray["phone"];
		$secondaryPhone = $firefighterArray["secondaryPhone"];
		$carrier = $firefighterArray["carrier"];
		$firefighterId = $firefighterArray["firefighterId"];
		$firefighter = new Firefighter($firefighterId, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
		$timeslot = new Timeslot($timeslotId, $startTime, $endTime, $firefighter);
		$availableTimeslot = new AvailableTimeslot($timeslot, $scheduleTimeslotId);
		return $availableTimeslot;
	}

	public static function getClassId(){
		return $this->$AVAILABLE_TIMESLOT_CLASS_ID;
	}
}

class MyEvent{
	private $id;
	private $eventName;
	private $eventDescription;
	private $timeslot;
	
	function __construct($id, $eventName, $eventDescription, $timeslot){
		$this->id = $id;
		$this->eventName = $eventName;
		$this->eventDescription = $eventDescription;
		$this->timeslot = $timeslot;
	}
	
	public function getSummary(){
		return "EventId: <br>".
		$this->id.
		"<br><br>EventName: <br>".
		$this->name.
		"<br><br> Timeslot:<br>".
		$this->timeslot->getSummary().
		"<br>";
	}
	
	public function getTimeslot(){
		return $this->timeslot;
	}
	
	public function getEventId(){
		return $this->id;
	}	
	
	public function getEventName(){
		return $this->eventName;
	}	
	
	public function getEventDescription(){
		return $this->eventDescription;
	}	
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"MyEvent": {'.
		'"eventId": "'.
		$this->id.
		'",'.
		'"eventName": "'.
		$this->eventName.
		'",'.
		'"eventDescription": "'.
		$this->eventDescription.
		'",'.
		'"Timeslot":'.
		$this->timeslot->getJSON().
		'}}';
		return $str;
	}
	
	public static function getMyEventFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["MyEvent"]);
		$timeslotArray = $array["Timeslot"];
		//var_dump($array, true);
		$eventId = $array["eventId"];
		$eventDescription = $array["eventDescription"];
		$eventName = $array["eventName"];
		$startTime= $timeslotArray["startTime"];
		$endTime = $timeslotArray["endTime"];
		$timeslotId = $timeslotArray["timeslotId"];
		$timeslot = new Timeslot($timeslotId, $startTime, $endTime);
		$myEvent = new MyEvent($timeslot, $scheduleTimeslotId);
		return $myEvent;
	}

	public static function getClassId(){
		return $MY_EVENT_CLASS_ID;
	}
}

class AssignedFirefighter{
	private $id;
	private $firefighter;
	private $myEvent;
	private $apparatusId;
	
	function __construct($id, $firefighter, $myEvent, $apparatusId){
		$this->id = $id;
		$this->firefighter = $firefighter;
		$this->myEvent = $myEvent;
		$this->apparatusId = $apparatusId;
	}
	
	public function getSummary(){
		return "AssignedFirefighterId: <br>".
		$this->id.
		"<br><br>Apparatus Id: <br>".
		$this->apparatusId.
		"<br><br> Firefighter:<br>".
		$this->firefighter->getSummary().
		"<br><br> Event:";
		$this->myEvent->getSummary().
		"<br>";
	}
	
	public function getAssignedFirefighterId(){
		return $this->id;
	}
		
	public function getFirefighter(){
		return $this->firefighter;
	}
	
	public function getEvent(){
		return $this->myEvent;
	}
	
	public function getApparatusId(){
		return $this->apparatusId;
	}	
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"AssignedFirefighter": {'.
		'"assignedFirefighterId": "'.
		$this->id.
		'",'.
		'"assignedApparatusId": "'.
		$this->apparatusId.
		'",'.
		'"Firefighter":'.
		$this->firefighter->getJSON().
		', "MyEvent":'.
		$this->myEvent->getJSON().
		'}}';
		return $str;
	}
	
	public static function getAssignedFirefighterFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["AssignedFirefighter"]);
		$timeslotArray = $array["Timeslot"];
		$firefighterArray = $timeslotArray["Firefighter"];
		//var_dump($array, true);
		
		$scheduleTimeslotId = $array["scheduleTimeslotId"];
		$startTime= $timeslotArray["startTime"];
		$endTime = $timeslotArray["endTime"];
		$timeslotId = $timeslotArray["timeslotId"];
		$fName= $firefighterArray["firstName"];
		$lName = $firefighterArray["lastName"];
		$email= $firefighterArray["email"];
		$phone = $firefighterArray["phone"];
		$secondaryPhone = $firefighterArray["secondaryPhone"];
		$carrier = $firefighterArray["carrier"];
		$firefighterId = $firefighterArray["firefighterId"];
		$firefighter = new Firefighter($firefighterId, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
		$timeslot = new Timeslot($timeslotId, $startTime, $endTime, $firefighter);
		$scheduleTimeslot = new ScheduleTimeslot($timeslot, $scheduleTimeslotId);
		return $scheduleTimeslot;
	}
	
	
	public static function getClassId(){
		return $ASSIGNED_FIREFIGHTER_CLASS_ID;
	}
}

class AssignedApparatus{
	private $id;
	private $myEvent;
	private $apparatus;
	
	function __construct($id, $myEvent, $apparatus){
		$this->id = $id;
		$this->myEvent = $myEvent;
		$this->apparatus = $apparatus;
	}
	
	public function getSummary(){
		return "AssignedApparatus: <br>".
		$this->id.
		"<br><br> Event:<br>".
		$this->myEvent->getSummary().
		"<br><br> Apparatus:<br>".
		$this->apparatus->getSummary().
		"<br>";
	}

	public function getAssignedApparatusId(){
		return $this->id;
	}	
	
	public function getEvent(){
		return $this->myEvent;
	}	
	
	public function getApparatus(){
		return $this->apparatus;
	}	
	
	public function getJSON(){
		return $this->getInnerJSON();
	}
	
	public function getInnerJSON(){
		$str = '{"AssignedApparatus": {'.
		'"scheduleTimeslotId": "'.
		$this->id.
		'",'.
		'"Apparatus":'.
		$this->apparatus->getJSON().
		', "MyEvent":'.
		$this->myEvent->getJSON().
		'}}';
		return $str;
	}

	public static function getAssignedApparatusFromJson($json){
		$data = json_decode($json, true);
		$array = ($data["AssignedApparatus"]);
		$myEventArray = $array["MyEvent"];
		$apparatusArray = $timeslotArray["Apparatus"];
		//var_dump($array, true);
		
		$scheduleTimeslotId = $array["scheduleTimeslotId"];
		$startTime= $timeslotArray["startTime"];
		$endTime = $timeslotArray["endTime"];
		$timeslotId = $timeslotArray["timeslotId"];
		$fName= $firefighterArray["firstName"];
		$lName = $firefighterArray["lastName"];
		$email= $firefighterArray["email"];
		$phone = $firefighterArray["phone"];
		$secondaryPhone = $firefighterArray["secondaryPhone"];
		$carrier = $firefighterArray["carrier"];
		$firefighterId = $firefighterArray["firefighterId"];
		$firefighter = new Firefighter($firefighterId, $fName, $lName, $email, $phone, $secondaryPhone, $carrier);
		$timeslot = new Timeslot($timeslotId, $startTime, $endTime, $firefighter);
		$scheduleTimeslot = new ScheduleTimeslot($timeslot, $scheduleTimeslotId);
		return $scheduleTimeslot;
	}
	
	public static function getClassId(){
		return $ASSIGNED_APPARATUS_CLASS_ID;
	}
}
?>