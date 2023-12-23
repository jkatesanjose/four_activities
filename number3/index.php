<!DOCTYPE html>
<html>
<head>
    <title>Problem 3</title>
</head>
<body>
    <h3>Email</h3>
    <form action="send.php" method="post">
        <input placeholder="Subject" type="text" id="subject" name="subject" required><br><br>
        <textarea placeholder="Message" id="message" name="message" required></textarea><br><br>
        <input placeholder="Recipient Email" type="email" id="email" name="email" required><br><br>

        <button type="submit" name="send">Send Email</button>
    </form>
</body>
</html>
