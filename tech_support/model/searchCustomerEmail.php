<?php

function searchCustomer($email) {

    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // attempt database connection
    try {
        require "../model/connectionVariables.php";

        $con = mysqli_connect($host, $username, $password, $dbname);

    } catch(Exception $e) {

        return [null, $e];
    }

    // if database connection, attempt query
    if($con){

        try {
            // query the database using prepared statement
            $query = mysqli_prepare($con,
                "SELECT customerID, CONCAT(firstname, ' ', lastname) AS 'Name', email
                FROM customers 
                WHERE email=?"
            );
            mysqli_stmt_bind_param($query, "s", $email);
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);

            // if no rows are returned send back no result and no error
            if(mysqli_num_rows($result) < 1) {

                return [null, null];

            } else {
                // rows were returned so send back result and no error
                return [$result, null];
            }

        } catch(Exception $e) {

            return [null, $e];
        }
    }

    mysqli_close($con);
}