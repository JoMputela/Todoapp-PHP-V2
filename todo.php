<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user

	");

$itemsQuery->execute([

	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

//foreach($items as $item){
//	print_r($item['name']);
//}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway&display=swap" rel="stylesheet">


    <title>To Do List</title>
	<link rel="stylesheet" href="main.css">

  </head>
  <body>

<div class="list">
	    <h1 class="header">To Do</h1>



	    <?php if (!empty($items)): ?> 
	
	    	<ul class="items">

	    <?php foreach($items as $item): ?>

		    	<li>
		    		<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>

		    	<?php if (!$item['done']): ?>
		    		<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">mark as done</a>
		    		
		    	<?php endif; ?>
		    	</li>

		<?php endforeach; ?>
	    	</ul>


	    <?php else: ?>
	    	<p>you haven't added items yet</p>
	    <?php endif; ?>


	    <form class="item-add" action="add.php" method="post">
	    	<input type="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off" required>
	    	<input type="submit" class="submit" value="Add">
	    </form>


</div>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>