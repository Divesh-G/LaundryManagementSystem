<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Pop-Up</title>
    <style>
        /* Add some styles for the pop-up */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 1000;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .close-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
            float: right;
        }
    </style>
    <script>
        // Add JavaScript to handle the pop-up
        function openPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
        }
    </script>
</head>
<body>
    <!-- Navigation links -->
    <a href="javascript:void(0);" onclick="openPopup()">Contact</a>
    <a href="">Services</a>
    <a href="">Pricing</a>
    <a href="">Email</a>
    <a href="">Gallery</a>
    <a href="">Privacy Policy</a>

    <!-- Pop-up content -->
    <div id="popup-overlay" class="popup-overlay" onclick="closePopup()"></div>
    <div id="popup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Contact Us</h2>
        <p>📞 Call Us: 9861489382</p>
        <p>✉️ Email Us: theuncalled48@gmail.com</p>
        <p>💬 Live Chat: Click here to start a chat</p>
    </div>
</body>
</html>
