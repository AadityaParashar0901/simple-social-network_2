<?php
    include ("config.php");
    if (isset($_REQUEST["query_submit"]) && $_REQUEST["query_submit"] == "true") {
        $email = $_REQUEST["query_email"];
        $query = $_REQUEST["query_query"];
        $datetime = date("Y-m-d H:i:s");
        $result = $connection->query("insert into queries(Email, Query, DateTime) values ('$email', '$query', '$datetime');");
        if ($result === TRUE) $_SESSION["toast_message"] = "Query sent";
        else $_SESSION["toast_message"] = "Query was not sent";
        header("Location: index.php");
    }
?>