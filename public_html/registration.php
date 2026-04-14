<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// DB Connection
$conn = new mysqli(
    "localhost",
    "u510762903_TanSri25",
    "t7GTxae15>cYPjrtVJc+7>",
    "u510762903_TanSri25"
);

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

$verified = false;
$error = "";

// ================= SEND OTP =================
if (isset($_POST['email'])) {

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];

    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tsrivastava413@gmail.com';
        $mail->Password = 'ylkgvluhrdqmhllu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('tsrivastava413@gmail.com', 'Portfolio');
        $mail->addAddress($_SESSION['email']);

        $mail->Subject = "OTP Verification";
        $mail->Body = "Your OTP is: $otp";

        $mail->send();

    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}

// ================= VERIFY OTP =================
if (isset($_POST['user_otp'])) {

    if ($_POST['user_otp'] == $_SESSION['otp']) {

        $stmt = $conn->prepare("INSERT INTO contacts (name,email,message) VALUES (?,?,?)");
        $stmt->bind_param("sss", $_SESSION['name'], $_SESSION['email'], $_SESSION['message']);
        $stmt->execute();

        $verified = true;
        session_destroy();

    } else {
        $error = "❌ Invalid OTP";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verification</title>

    <style>
        body {
            background: #07080f;
            color: white;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* OTP box */
        .otp-box {
            text-align: center;
        }

        input {
            padding: 10px;
            margin: 10px;
        }

        button {
            padding: 10px 20px;
            background: #0dcaf0;
            border: none;
            color: black;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <?php if ($verified == true) { ?>

        <!-- ✅ SHOW SUCCESS ONLY AFTER OTP -->

        <div style="text-align:center">
            <h1>✅ Message Sent!</h1>
            <p>Your form has been successfully submitted.</p>
            <a href="index.php" style="color:#0dcaf0;">Back to Portfolio</a>
        </div>

    <?php } else { ?>

        <!-- 🔐 OTP UI -->

        <div class="otp-box">
            <h2>Enter OTP</h2>

            <form method="POST">
                <input type="text" name="user_otp" placeholder="Enter OTP" required>
                <button type="submit">Verify OTP</button>
            </form>

            <p style="color:red;">
                <?php echo $error; ?>
            </p>
        </div>

    <?php } ?>

</body>

</html>