<?php
include_once 'config.php';
$sql = "DELETE FROM work WHERE userid='" . $_GET["userid"] . "'";
if (mysqli_query($dbo, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($dbo);
}
mysqli_close($dbo);
?>