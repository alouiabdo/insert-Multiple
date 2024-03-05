<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertMultiple.css">
</head>
<body>
    <h1>PHP MySQL Insert Multiple Records</h1>
<form method="POST">
    <div class="one">
    <label for="">Firstname :</label>
    <input type="text" name="Fname" id="">
    <label for="">Lastname :</label>
    <input type="text" name="Lname" id="">
    <label for="">Email :</label>
    <input type="text" name="Email" id="">
    </div>
    <div class="two">
    <label for="">Firstname :</label>
    <input type="text" name="FnameOne" id="">
    <label for="">Lastname :</label>
    <input type="text" name="LnameOne" id="">
    <label for="">Email :</label>
    <input type="text" name="EmailOne" id="">
    </div>
        <input type="submit" name="sub" id="he" value="Insert">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $servername ="localhost";
            $username = "root";
            $password = "";
            $fname = $_POST["Fname"];
            $lname = $_POST["Lname"];
            $email = $_POST["Email"];
            $fnameOne = $_POST["FnameOne"];
            $lnameOne = $_POST["LnameOne"];
            $emailOne = $_POST["EmailOne"];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $sqlOne = "INSERT INTO `tableone`(id,firstName, lastName, email, country, age) VALUES ('','$fname', '$lname', '$email', '','')";
            $conn->exec($sqlOne);
            $sqlTwo ="INSERT INTO `tableone` (firstName, lastName, email) VALUES ('$fnameOne', '$lnameOne', '$emailOne')";
            $conn->exec($sqlTwo);
            $conn->commit();
            echo "<p class = green>New records created successfully</p>";
            } catch (PDOException $e) {
                $conn->rollback();
            echo "<p class = red>New record note created</p> " . $e->getMessage();
        }
    }
    ?>
</body>
</html>