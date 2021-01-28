<?php
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);
    $date = date("m/d/Y");

    if (!empty($firstname) && !empty($lastname)) {
        $greeting = "<h1>Hello, my name is {$firstname} {$lastname}.</h1>";
    } else {
        $greeting = "<p>You did not submit firstname and lastname parameters.</p>";
    }

    if (!empty($age) && is_numeric($age)) {
        $message = "I am {$age} years old, and ";
        $daysOld = number_format($age * 365, 0, ',');

        if ($age >= 18) {
            $message .= "I am old enough to vote in the United States.";
        } else {
            $message .= "I am not old enough to vote in the United States.";
        }

        $message = "<p>" . $message . "</p>";
        $message .= nl2br("\n") . "<p>That means I'm at least {$daysOld} days old.</p>";
    } else {
        $message = nl2br("\n") . "<p>You did not submit a numeric age parameter.</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tony Banh - Week 2 Assignment</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <nav>
        <div class="date"><?php echo "Today is {$date}" ?></div>
    </nav>
    <div class="container">
        <div class="greeting"><?php echo $greeting ?></div>
        <br>
        <div class="message"><?php echo $message ?></div>
    </div>
</body>
</html>