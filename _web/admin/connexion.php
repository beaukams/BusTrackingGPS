<?php
	  try{
		$bdd = new PDO('mysql:host=localhost;dbname=tranversalebus', 'root', '');
    	}
	catch(PDOException $e)
	  {
       die( $e->getMessage());
	  }
     ?>