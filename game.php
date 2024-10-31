<?php
// Demand a GET parameter
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

// Set up the values for the game...
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;

// Hard code the computer to rock for now
$computer = 0; // TODO: Make the computer random

// Function to determine game result
function check($computer, $human) {
    if ($human == 0) {
        return "Tie";
    } elseif ($human == 1 && $computer == 0) {
        return "You Win";
    } elseif ($human == 1 && $computer == 2) {
        return "You Lose";
    } elseif ($human == 2 && $computer == 0) {
        return "You Lose";
    } elseif ($human == 2 && $computer == 1) {
        return "You Win";
    } else {
        return "Tie";
    }
}

// Check the result
$result = check($computer, $human);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Paper Scissors Game cc709c4b </title>
    <link rel="stylesheet" href="styles.css">
    <?php require_once "bootstrap.php"; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        pre {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Rock Paper Scissors</h1>
    <?php
    if (isset($_REQUEST['name'])) {
        echo "<p>Welcome: ";
        echo htmlentities($_REQUEST['name']);
        echo "</p>\n";
    }
    ?>
    <form method="post">
        <select name="human" class="form-control">
            <option value="-1">Select</option>
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <br>
        <input type="submit" value="Play" class="btn btn-primary">
        <input type="submit" name="logout" value="Logout" class="btn btn-secondary">
    </form>

    <pre>
        <?php
        if ($human == -1) {
            print "Please select a strategy and press Play.\n";
        } else {
            print "Your Play = $names[$human] \nComputer Play = $names[$computer] \nResult = $result\n";
        }
        ?>
    </pre>
</div>
</body>
</html>
