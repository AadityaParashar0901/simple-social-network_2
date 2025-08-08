<?php
    include ("config.php");
    if (isset($_REQUEST["query_submit"]) && $_REQUEST["query_submit"] == "true") {
        $email = $_REQUEST["query_email"];
        $query = $_REQUEST["query_query"];
        $result = $connection->query("insert into queries(Email, Query) values (\"$email\", \"$query\");");
        if ($result === TRUE) $_SESSION["toast_message"] = "Query sent";
        else $_SESSION["toast_message"] = "Query was not sent";
        header("Location: index.php");
    }
?>