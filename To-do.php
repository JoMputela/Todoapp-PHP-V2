<?php
session_start();

require 'function.php';

 

// check if the delete and task is set in the GET / URL
if (isset($_GET['delete']) && isset($_GET['task'])) {
  // Call delete function with task
  delete($_GET['task'],$_GET['duedate']);
  // session_unset();
}

// check if the form has been submitted
if (isset($_POST['Submit22'])) {
  // Call add function with task
  add($_POST['task'],$_POST['duedate']);
}




$taskname = '';
if (isset($_GET['task'])) {
  $taskname = $_GET['task'];
} 
?>
​
<!DOCTYPE html>
<html>
  <head>
    <title>Todo App</title>
    <link rel="stylesheet" href="css/styles.css">





<style type="text/css">
  



@import url(

'href="https://fonts.googleapis.com/css?family=Black+And+White+Picture|Macondo+Swash+Caps|Montaga&display=swap" rel="stylesheet'


    );

html{

font-family: 'Montaga', serif;
font-family: 'Black And White Picture', sans-serif;
font-family: 'Macondo Swash Caps', cursive;
    
}

body{
    background-image: url(5.jpg);
    background-size: cover;
}
h5{
    text-align: center;
}
.todoform{
    /*width: 35%; */
    border: 29px solid #51c149;
    padding: 35px;
    margin: -11px;
    margin-left: 630px;
    margin-right: 100px;
    /* margin-top: 100px; */
    border-width: 5px 0.5px 2px 7px;
    background-color: #9c9fa56b;
    border-radius: 21px;
}
.inp{
    margin: auto;
    margin-left: 50px;
}
.inp input{
   width: 58%;
    height: 38px;
    margin: 8px;
    background-color: #acec8b6e;
    border-radius: 11px;

}
#Submit22{
   margin-left: 118px;
    width: 36%;
    height: 36px;
    background-color: #46ab3fbf;
    border-radius: 17px;
}
#form{
    margin: auto;
}
ul li{
    list-style-type: none;
}



</style>


  </head>
  <body>
      <div class="todoform">
        <form action="index.php" method="POST" class='form' id="form">
            <center><strong><h1><u>TO DO APP</u></h1></strong></center><hr>
            <br><br>
          <div class="inp">
            <div>
              <label>Add Task:</label> <input type="text" name="task" value="<?php echo  $taskname; ?>">
            </div>
            <div>
              <label>Due Date:</label><input type="date" name="duedate" required>
            </div>
            <div>
              <button type="Submit" name="Submit22" id="Submit22"> enter</button>
              <input type="Submit" name="Submit22" id="Submit22"/>
              <br><br>
            </div>
          </div>
        </form>

        <ul>
          <?php
          if (isset($_SESSION['tasks'])) {
            echo 'No of tasks: ' . count($_SESSION['tasks']);
            foreach ($_SESSION['tasks'] as $task) {
          ?>
            <li><?php echo $task[0] . "  /  ".$task[1]; ?> <a href="index.php?delete=1&task=<?php echo $task[0]; ?>&duedate=<?php echo $task[1] ?>">delete</a> <a href="index.php?edit=1&task=<?php echo $task[0]; ?>">edit</a></li>
          <?php
            }
          } ?>
        </ul>
      </div>
  </body>
</html>








