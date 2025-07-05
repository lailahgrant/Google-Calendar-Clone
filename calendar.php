<?php 
/**
 * include the connection.php file to connect to the db
 * 
 */

include "connection.php";

// Messages
$successMsg = '';
$errorMsg = '';

//store returned events from the db
//initialize new array to store the fetched events
$eventsFromDB = [];

/*
*Handle Add Appointment (insert  new appointment)
*/
//chech if the form method is post and action is equal to add
if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['action'] ?? '') === "add"){
//cut whtespace from the start and end
    $course = trim($_POST["course_name"] ?? '');
    $instructor = trim($_POST['instructor_name'] ?? '');
    $start = trim($_POST["start_date"] ?? '');
    $end = trim($_POST["end_date"] ?? '');

    //if these fields exist, create a statement from the db connection
    if($course && $instructor && $start && $end){
        $stmt = $conn->prepare(
            "INSERT INTO appointments (course_name, instructor_name, start_date, end_date) VALUES (?, ?, ?, ?)"
        );

        //bind the ?,?,?,? to four ssss
        $stmt->bind_param("ssss", $course, $instructor, $start, $end);

        $stmt->execute(); //execute the SQL statement

        $stmt->close(); //

        //redirect the user
        header("Location: " . $_SERVER["PHP_SELF"] . "?success=1");
        exit;
    }else{
        //if we don't have these values, redirect the user
        header("Location: " . $_SERVER["PHP_SELF"] . "?error=1");
        exit;
    }

}


/**
 * HANDLE EDIT APPOINTMENT
 */
if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === 'edit'){
    $id = $_POST["id"] ?? null;
    $course = trim($_POST["course_name"] ?? '');
    $instructor = trim($_POST['instructor_name'] ?? '');
    $start = trim($_POST["start_date"] ?? '');
    $end = trim($_POST["end_date"] ?? '');
}

if($id && $course && $instructor && $start && $end){
    $stmt = $conn->prepare(
        "UPDATE appointments SET course_name = ?, instructor_name = ?, start_date = ?, end_date = ? WHERE id =?"
    );

    $stmt-> bind_param("ssssi", $course, $instructor,  $start, $end, $id);

    $stmt-> execute();

    $stmt-> close();

    //redirect user
    header("Location: " . $_SERVER["PHP_SELF"] . "?success=2");

    exit;

}else{
    header("Location: ". $_SERVER["PHP_SELF"] . "?error=2");
}


/**
 * HANDLE DELETE APPOINTMENT
 */
if($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "delete"){
    $id = $_POST['id'] ?? null;

    if($id){
        $stmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: ". $_SERVER["PHP_SELF"] . "?success=3");

        exit;
    }
}

/**
 * SUCCESS AND ERROR MESSAGES
 */
if(isset($_GET["success"])){
    $successMsg = match($_GET["success"]){
        '1' => ":smile Appointment added successfully",
        '2' => "Appointment edited successfully",
        '3' =? "Appointment deleted successfully",
        default => ''
    };
}

if (isset($_GET["error"])) {
    $srrorMsg = 'Error occured, Please check your input.';
}


