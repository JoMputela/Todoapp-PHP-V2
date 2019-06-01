<?php


require_once 'app/init.php';

if (isset($_POST['name'])) {

	$name = trim($_POST['name']);
	
	if (!empty($name)) {
		  $addedQuery = $db->prepare("
		  		INSERT INTO items (name, user, done, created)
		  		VALUES (:name, :user, 0, NOW())

		  	");

		  $addedQuery->execute([
		  		'name' => $name,
		  		'user' => $_SESSION['user_id']


		  ]);



	}
}

/*

   // edit task
function edit($name,$items){
  //Initialize our list
  $items = $_SESSION['name'];
    // Check if the list is set
  if (isset($items)){
   // Find task in items return position
  $position = array_search($task, $items);
      // If the position is found = > 0
  if ($position>=0){
    // Edit task
    $items[$position] = $newtask;

  }
      // Save back to session
  $_SESSION['name']= $items;
 }

}
*/

header('Location: index.php');
  


  ?>


