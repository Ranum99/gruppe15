<?php
$navn = $_POST['navn'];
$email = $_POST['email'];
$passord = $_POST['passord'];
$bildeURL = $_POST['bilde'];

if (!empty($navn) || !empty($email) || !empty($passord) || !empty($bildeURL)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "Gruppe15...123";
    $dbname = "brukere";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    //SENDER MAIL FOR Å GODTA BRUKER AV ADMIN
    $to = 'aleksander.sandnes@hotmail.com';
    $subject = 'User needs approval';
    $message = 'The user {userName} needs your approval' .
        '----------------------------------- ' . "\r\n" .
        'Accept: ' . $accept_link . "\r\n" .
        'Decline: ' . $decline_link . "\r\n";

    $headers = 'From:aleksander.sandnes@hotmail.com' . "\r\n"; // Set FROM headers
    mail($to, $subject, $message, $headers); // Send the email

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM foreleser WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO foreleser (brukernavn, email, passord, bildeURL, brukerType) VALUES (?, ?, ?, ?, 2)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $navn, $email, $passord, $bildeURL);
            $stmt->execute();
            echo "Bruker lagt til";
        } else {
            echo "Bruker allerede registrert";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Du må fylle ut alle feltene";
    die();
}

?>