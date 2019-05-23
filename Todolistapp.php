<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>My-To-Do-App</title>


  <style>



ul {
     list-style-type: none;
    padding: 40;
    padding-right: 40;
    margin: 10;
    /* float: right; */
    width: 50%;
    /* height: auto; */

}

ul li {
  border: 1px solid #ddd;
    /* margin-top: -12px; */
    background-color: #f6f6f6;
    padding: 12px;

}

#headering {
    text-align: center;
    margin: 20px;
    padding-bottom: 10px;
    background-color: #CEECCE;
}

h1 {
    margin-top: 20px;
    padding-top: 30px;
}


  </style>

</head>
<body>

   <div id="headering">
    <h1>My to do list</h1>
</div> 


<center><form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
<input type = "text" name = "toDoEntry">
<input type = "submit">
</form></center>

<?php


    if(isset($_POST["toDoEntry"])){
        if(!(isset($_SESSION["items"]))){
        $_SESSION["items"] = array();
        $_SESSION["items"][] = $_POST["toDoEntry"];
        
 // PRG method to prevent data from the previous post populating the list on refresh / reload
     
       header('location:'.$_SERVER['PHP_SELF']);
       return;

Session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);


        echoL();       
    }else{
        $_SESSION["items"][] = $_POST["toDoEntry"];
        echoL();

    }
};

function echoL(){
    echo "<ul>";
        foreach($_SESSION["items"] as $item){
            echo "<li>".$item."</li>";
        };
        echo "</ul>"; 

};


?>




<script>

$(document).ready(function(){
    var done = 0;
    $("li").each(function(c){
        $(this).click(function(){
        checked = c;
         if(done == 0){
            $(this).css("text-decoration", "line-through");
            done = 1;
            sessionStorage.setItem(checked, done);

           }else{
               $(this).css("text-decoration", "none");
               done = 0;
               sessionStorage.setItem(checked, done);
            }
        });
    });
$("li").each(function(c){
    if(sessionStorage.getItem(c)==1){
        $(this).css("text-decoration", "line-through");
    }
});
});



</script>
 




</body>
</html>