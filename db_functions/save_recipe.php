<?php
session_start();
require_once('sql_connection.php');
$msg = "";

function redirect() {
	global $msg;
	$_SESSION['message'] = $msg;
	if(isset($_GET['goto'])) {
		header('Location: ' . htmlspecialchars($_GET['goto']));
	}
	else {
		header('Location: ../cookbook.php');
	}
	die;
}

if (isset($_SESSION['loggedin'])) {
	try {
		if(!isset($_POST['recipe-name'], $_POST['recipe-desc'], $_POST['recipe-inst'], $_POST['recipe-ingr'])) {
			$msg .= "Täytä reseptistä tarvittavat kentät.";
			redirect();
		}

		// Better to use transactions to prevent ingredients missing from recipes if something goes wrong.
		$con->autocommit(FALSE); //turn on transactions

		$editing_recipe = $_POST['recipe-id'] != '';

		// If recipe id was given then delete the old recipe.
		if($editing_recipe)
		{
			$stmt_del = $con->prepare("DELETE FROM recipe WHERE id = ?");
			$stmt_del->bind_param("i", $_POST['recipe-id']);
			$stmt_del->execute();
			$stmt_del->close();
		}

		$recipe_name = $con->real_escape_string($_POST['recipe-name']);
		$recipe_desc = $con->real_escape_string($_POST['recipe-desc']);
		$recipe_inst = $con->real_escape_string($_POST['recipe-inst']);

		// Insert new recipe into the database.
		$stmt_rec = $con->prepare("INSERT INTO recipe (name, description, instructions) VALUES (?, ?, ?)");
		$stmt_rec->bind_param("sss",  $recipe_name, $recipe_desc, $recipe_inst);
		$stmt_rec->execute();
		$recipe_id = $con->insert_id;
		$stmt_rec->close();
		
		if(isset($_POST['recipe-ingr'])) {
			// Insert new ingredients into database.
			$stmt_ing = $con->prepare("INSERT IGNORE INTO ingredient (name) VALUES (?)");
			$stmt_ing->bind_param("s", $recipe_ingr);
			for ($i = 0; $i < count($_POST['recipe-ingr']); $i++)  {
				$recipe_ingr = $con->real_escape_string($_POST['recipe-ingr'][$i]);
				$stmt_ing->execute();
			}
			$stmt_ing->close();

			// Get ids for ingredients and keep the array order.
			$clause = implode(',', array_fill(0, count($_POST['recipe-ingr']), '?')); //create question marks
			//$stmt_ing_ids = $con->prepare("SELECT id, name FROM ingredient WHERE name IN (?) ORDER BY FIELD(name, ?)"); //cant use placeholder ? in order by
			$stmt_ing_ids = $con->prepare("SELECT id, name FROM ingredient WHERE name IN ($clause)");
			$types = str_repeat('s', count($_POST['recipe-ingr'])); //create strings for bind_param
			$stmt_ing_ids->bind_param($types, ...$_POST['recipe-ingr']);
			$stmt_ing_ids->execute();
			$ingr_rows = $stmt_ing_ids->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt_ing_ids->close();

			// Insert new recipe_ingredients to link recipe and ingredients together.
			$stmt_rec_ing = $con->prepare("INSERT INTO recipe_ingredient (recipe_id, ingredient_id, measure_id, amount) VALUES (?, ?, ?, ?)");
			$stmt_rec_ing->bind_param("iiid", $recipe_id, $ingr_id, $measure_id, $amount);
			for ($i = 0; $i < count($_POST['recipe-ingr']); $i++)  {
				$ingr_name = $con->real_escape_string($_POST['recipe-ingr'][$i]);
				// Find ingredient id
				for($j = 0; $j < count($ingr_rows); $j++) {
					if($ingr_rows[$j]['name'] === $ingr_name) {
						$ingr_id = $ingr_rows[$j]['id'];
						break;
					}
				}
				$measure_id = intval($_POST['ingr-measure'][$i]);
				$amount = floatval($_POST['ingr-amount'][$i]);
				$stmt_rec_ing->execute();
			}
			$stmt_rec_ing->close();
		}

		$con->autocommit(TRUE); //turn off transactions + commit queued queries

		$msg .= "Resepti tallennettu.";
	} catch(Exception $e) {
		$msg .= "Reseptin tallentamisessa tapahtui virhe.";
		$con->rollback(); //remove all queries from queue if error (undo)
		throw $e;
	}

	$path_base = '../images/img_' ;
	
	// If new image uploaded.
	if($_FILES["recipe-img"]["error"] != 4) {
		// Delete old image if there is one for this id.
		$old_img = $path_base . $_POST['recipe-id'] . '.jpg';
		if(file_exists($old_img)) {
			unlink($old_img);
		}

		// Use recipe id as a name.
		$uploadfile = '/var/www/html/cv/images/img_' . $recipe_id . '.jpg';
		if ($_FILES['recipe-img']['size'] > 0.5 * 1024 * 1024 or !move_uploaded_file($_FILES['recipe-img']['tmp_name'], $uploadfile)) {
			$_SESSION['message'] = "Virhe kuvan lähetyksessä! Tarkista että kuvatiedoston koko on alle 0.5Mt";
		} 
	}
	else {
		if($editing_recipe) {
			// Rename the image file
			if(file_exists($path_base . $_POST['recipe-id'] . '.jpg')) {
				rename($path_base . $_POST['recipe-id'] . '.jpg', $path_base . $recipe_id . '.jpg');
			}
		}
	}
}

redirect();
?>