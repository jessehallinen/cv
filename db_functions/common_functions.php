<?php
require_once('sql_connection.php');

function getMeasures() {
    global $con;
    try {
        if($stmt = $con->prepare("SELECT id, name FROM measure")) {
            $stmt->execute();
            $array = [];
            foreach ($stmt->get_result() as $row)
            {
                $array[] = [$row['id'], $row['name']];
            }
            $stmt->close();
            return $array;
        }
    }
    catch (Exception $e) {
        throw $e;
    }
}

function getRecipes() {
    global $con;
    try {
        if($stmt = $con->prepare("SELECT r.id, r.name, r.description, r.instructions,
            GROUP_CONCAT(CONCAT(i.name, '_'), CONCAT(ri.amount, '_'), mu.name SEPARATOR '|') AS ingredients
            FROM recipe r
            JOIN recipe_ingredient ri ON r.id = ri.recipe_id
            JOIN ingredient i ON i.id = ri.ingredient_id
            LEFT OUTER JOIN measure mu ON mu.id = ri.measure_id
            GROUP BY r.id")) {
            $stmt->execute();
	        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        }
    }
    catch (Exception $e) {
        throw $e;
    }
}
?>