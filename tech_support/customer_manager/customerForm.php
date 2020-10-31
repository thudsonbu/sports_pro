<?php

//database connection and query
require "../model/database.php";
require "../model/selectQuery.php";

$email = $_GET['email'];

$query = "SELECT * FROM customers WHERE email='$email'";

// $query = "SELECT firstname, lastname, address, city, state, postalcode
// countrycode, phone, email FROM customers WHERE email='$email'";

$out = selectQuery($con, $query);

if($out[1]){ // IF ERROR ( selectQuery returns array with result and boolean error )

    echo "<p class='message'>Query Error</p>";

} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

    echo "<p class='message'>No Results Found</p>";

} else { // IF NO ERROR AND RESULTS CREATE TABLE

    echo "<form action='processCustomer.php' method='post' class='form'>";

    echo "
    <div class='formTitleContainer'>
        <div class='formTitle'>
            Update Customer Information
        </div>
    </div>
    ";

    $result = $out[0];
    $fields = mysqli_fetch_fields($result);
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);

    $loc = 0;
    foreach ($fields as $field){

        $field_name = $field->name;

        if ($field_name == 'customerID'){
            continue;
        };

        $field_value = $line[$field_name];

        echo "
        <div class='formEntry'>
            <div class='fieldName'>$field->name</div>
            <input class='fieldInput' type='text' name='$field->name' value='$field_value'>
        </div>
        ";

        $loc += 1;

    }

    echo "
    <div class='buttonContainer'>
        <a href='index.php' class='button grey'>Cancel</a>
        <button type='submit' class='button green'>Update Customer</button>
    </div>
    ";

    echo "</form>";

}

// CLOSE CONNECTION
mysqli_close($con);