

<?php
       include 'data.php';  

       $user_id = $_REQUEST['User_ID'];

      if(isset($_POST['post'])){
 
    $eventname=$_POST['eventname'];
    $date=$_POST['date'];
    $enddate=$_POST['enddate'];
    $description=$_POST['desc'];
    
	   $query = " INSERT INTO events(Eventname,Startdate,Enddate,Description,User_ID)VALUES ('$eventname','$date','$enddate','$description','$user_id')";
	   
	  mysqli_query($conn, $query);

      
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="../plugins/jquery-3.4.1.min.js"></script>
  <script src="../plugins/moment.js"></script>
    <link rel="stylesheet" href="../plugins/fullcalendar-3.10.0/fullcalendar.css">
</head>
<script>
$(document).ready(function(){
  var userId = '<?php echo $user_id;?>';
  function requestEvent(){

  }
  $.ajax({
    url:'display.php',
    datatype:'JSON',
    type:'POST',
    data:{id: userId},
    success:function(response){
      console.log(response);
      if(response){
        generateCalendar(JSON.parse(response));
      }
    }
  });
});

function generateCalendar(response){
  $('#calendarContainer').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: Date.now(),
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events:response
  });

}
    </script>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>
                <br><br>
                <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
                <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">ADD EVENT</h4>
        </div>
        <div class="modal-body">
        <form method="POST">
          <input type="text" name="eventname" placeholder="Event Name"><br><br>
          <input type="date" name="date" placeholder="StartDate"><br><br>
          <input type="date" name="enddate" placeholder="EndDate"><br><br>
          <textarea name="desc">Description</textarea>
          <button type="submit"  name="post" >Submit</button>
          </form>
          </div>

        <div class="modal-footer">
           
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
      
    </div>
  </div>
  

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div id="calendarContainer"></div>
        </div>
    </div>
</div>
<script src="../plugins/fullcalendar-3.10.0/fullcalendar.min.js"></script>

</body>
</html>
























