<?php

require '../session/sessionConfig.php';

require '../view/header.php';

makeHeader('Tech Login');

//RESPONSIVE NAVBAR
require '../view/nav.php';

//PAGE TITLE
echo "
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Technician
    </div>
</div>";

//PAGE CONTENT
echo "
<div class='sectionContainer'>
    <form action='processTechLogin.php' method='post' class='loginForm'>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
                Tech Login
            </div>
        </div>";
        
        if (!empty($_GET['error'])) {

            $error = $_GET['error'];

            echo "<div class='sectionContainer'>";
    
            require "../messages/errorMessage.php";
    
            buttonlessErrorMessage($error);          
            
            echo "</div>";
        }
            
        echo "
        <p class='loginFormDescription' >Enter your email and password to login.</p>
        <div class='inputContainer'>
            <div class='input'>
                <input class='inputBox' placeholder='Email' type='text' name='techUser'>
            </div>
            <div class='input'>
                <input class='inputBox' placeholder='Password' type='password' name='techPass'>
            </div>
            <div class='input'>
                <button type='submit' class='button blue loginButton'>Login</button>
            </div>
        </div>
    </form>
</div>";


require '../view/footer.php';
