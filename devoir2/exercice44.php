
  
<?php

require_once('ex1.php');
$valid = true;

function testMail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function testPassword($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
    }
    return true;
}

if (!empty($_POST)) {
    $passwordErr = $emailErr = $email = $password = "";
    $email = $_POST["email"];
    $password =  preg_replace('/\s+/', '', $_POST["password"]);

    try {
        if (!testMail($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $emailErr = "Invalid email format";
        }
        if (!testPassword($password)) {
            $valid = false;
            $passwordErr = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
    } catch (\Throwable $th) {
        
        echo $emailErr;
        echo '<br/>';
        echo $passwordErr;
    }
    if ($valid) {
        try {
            $myfile = fopen("users.txt", "r") or die("Unable to open file!");
            $exist = false;
            $passMatch = false;
            while (!feof($myfile)) {
                $array = splitString(fgets($myfile), '|');
                if ($array[0] == $email) {
                    $exist = true;

                    if (preg_replace('/\s+/', '', $array[1]) == $password) {
                        $passMatch = true;
                    }
                }
            }
            fclose($myfile);
        } catch (\Throwable $th) {
            throw $th;
        }
        if ($exist) {
            if ($passMatch) {
                echo 'auth success';
            } else {
                echo 'pass false';
            }
        } else {
            echo 'user doesn\'t exist';
        }
    }
}
