<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Google Calendar Clone Project</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <meta
      name="description"
      content="A simple Google Calendar clone project built with PHP, MySQL, HTML, CSS, and JavaScript."
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- HEADER START-->
    <header>
      <h1> <i class="ri-calendar"></i> Calender</h1>
      <h2>The Google Calendar Clone</h2>
    </header>
    <!-- HEADER END-->

    <!-- CLOCK START-->
    <div class="clock-container">
      <div id="clock"></div>
    </div>
    <!-- CLOCK END-->

    <!-- CALENDAR SECTION START -->
    <div class="calendar">
      <div class="nav-btn-container">
        <button class="nav-btn" onclick=""><i class="ri-prev">Prev</i></button>
        <h2 id="monthYear" style="margin: 0;" ></h2>
        <button class="nav-btn"><i class="ri-next">Next</i></button>
      </div>

      <div class="calendar-grid" id="calendar">
      </div>
    </div>
    <!-- CALENDAR SECTION END -->

    <!-- MODAL POPUP FOR ADD, EDIT, DELETE APPOINTMENTS START -->
     <div class="modal" id="eventModal">
      <div class="modal-content">
        <div id="eventSelectorWrapper">
      <label for="eventSelector">
        <strong>Select Event:</strong>
      </label>
      <select name="" id="eventSelector" onchange="handleEventSelection" >
        <option disabled selected value="">Choose Event....</option>
      </select>
     </div>
      

     <!-- MAIN FORM START-->
      <form method="POST" action="" id="eventForm">
        <input type="hidden" name="action" id="formAction" value="add" >
        <input type="hidden" name="event_id" id="eventId">

        <label for="courseName">Course Title:</label>
        <input type="text" name="course_name" id="courseName" required>

        <label for="instructorName">Instructor Name:</label>
        <input type="text" name="instructor_name" id="instructorName" required>

        <label for="startDate">Start Date:</label>
        <input type="date" name="start_date" id="startDate" required>

        <label for="endDate">End Date:</label>
        <input type="date" name="end_date" id="endDate" required>

        <button type="submit">Save</button>
      </form>
     <!-- MAIN FORM END-->

     <!-- DELETE FORM START - to delete task-->
      <form action="" method="POST"  onsubmit="return confirm('Are you sure you want to delete this appointment?')" >
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="event_id" id="deleteEventId">
        <button type="submit" class="submit-btn">Delete</button>
      </form>
     <!-- DELETE FORM END -->

     <!-- CANCEL ANY ACTION START -->
      <button type="button" class="submit-btn" onclick="" >Cancel</button>
     <!-- CANCEL ANY ACTION END -->

     </div>
     </div>
     <!-- MODAL POPUP FOR ADD, EDIT, DELETE APPOINTMENTS END -->

     <script src="calendar.js"></script>
  </body>
</html>
