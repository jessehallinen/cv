<?php
require_once('sql_connection.php');
//select the ingredient based on the user input
if(isset($_POST["ingrQuery"])) {
    $request = mysqli_real_escape_string($con, $_POST["ingrQuery"]) . '%';
    if($stmt = $con->prepare("SELECT DISTINCT name FROM ingredient WHERE name LIKE ? GROUP BY name")) {
        $stmt->bind_param("s", $request);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        echo json_encode([$result]);
        $stmt->close();
    }
}
?>