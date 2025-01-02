<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Homepage | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <style>
        /*  styles for the pop-ups */
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
        // JavaScript to handle the pop-ups
        function openPopup(id) {
            document.getElementById(id).style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        }

        function closePopup() {
            var popups = document.querySelectorAll('.popup');
            for (var i = 0; i < popups.length; i++) {
                popups[i].style.display = 'none';
            }
            document.getElementById('popup-overlay').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="homepageContainer">
            <a href="login.php">Login</a>
            <a href= "signup.php">SignUp</a>
        </div>
    </div>
    <div class="banner">
        <div class="homepageContainer">
            <div class="bannerHeader">
                <h1>LMS</h1>
                <p><b>Laundry Management System</b></p>
            </div>
            <p class="bannerTagline">
                <b>Manage your laundry items through chain, from washing to different other services and sales</b>
            </p>
            <div class="bannerIcons">
                <a href="javascript:void(0);" onclick="openPopup('applePopup')"><i class="fa fa-apple"></i></a>
                <a href="javascript:void(0);" onclick="openPopup('androidPopup')"><i class="fa fa-android"></i></a>
                <a href="javascript:void(0);" onclick="openPopup('windowsPopup')"><i class="fa fa-windows"></i></a>
            </div>
        </div>
    </div>
    <div class="homepageContainer">
        <div class="homepageFeatures">
            <div class="homepageFeature">
                <span class="featureIcon"><i class="fa fa-gear"></i></span>
                <h3 class="featureTitle">Editable Theme</h3>
                <p class="featureDescription">Here's a versatile theme sentence for a project or presentation that you can easily modify to fit your needs.</p>
            </div>
            <div class="homepageFeature">
                <span class="featureIcon"><i class="fa fa-star"></i></span>
                <h3 class="featureTitle">Flat Design</h3>
                <p class="featureDescription">Flat design uses clean, open space, crisp edges, bright colors, and two-dimensional (flat) illustrations.</p>
            </div>
            <div class="homepageFeature">
                <span class="featureIcon"><i class="fa fa-globe"></i></span>
                <h3 class="featureTitle">Reach Your Audience</h3>
                <p class="featureDescription">Connect with your audience by delivering clear, compelling messages tailored to their interests and needs.</p>
            </div>
        </div>
    </div>

    <div class="homepageNotified">
        <div class="homepageContainer">
            <div class="homepageNotifiedContainer">
                <div class="emailForm">
                    <h3>Get Notified Of Any Updates</h3>
                    <p>Staying informed is crucial in today's fast-paced world, and notifications help you do just that. They ensure you receive timely updates, whether it's an important email, a reminder for an upcoming event, or breaking news. With the right balance, they keep you connected, informed, and proactive in managing your personal and professional life.</p>
                    <form action="">
                        <div class="formContainer">
                            <input type="text" placeholder="Email Address"/>
                            <button>Notify</button>
                        </div>
                    </form>
                </div>
                <div class="video">
                    <iframe src="https://youtu.be/U5cK0gVOz_Q?si=c7Glnl4aMUVYOU0S" width="500px" height="400px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="homepageContainer">
            <a href="javascript:void(0);" onclick="openPopup('contactPopup')">Contact</a>
            <a href="javascript:void(0);" onclick="openPopup('servicesPopup')">Services</a>
            <a href="javascript:void(0);" onclick="openPopup('pricingPopup')">Pricing</a>
            <a href="javascript:void(0);" onclick="openPopup('emailPopup')">Email</a>
            <a href="javascript:void(0);" onclick="openPopup('galleryPopup')">Gallery</a>
            <a href="javascript:void(0);" onclick="openPopup('privacyPolicyPopup')">Privacy Policy</a>
        </div>
    </div>

    <!-- Pop-up content -->
    <div id="popup-overlay" class="popup-overlay" onclick="closePopup()"></div>

    <div id="contactPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Contact Us</h2>
        <p>📞 Call Us: 9861489382</p>
        <p>✉️ Email Us: theuncalled48@gmail.com</p>
        <p>💬 Live Chat: Chat with us in our social medial platforms</p>
    </div>
    
    <div id="servicesPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Our Services</h2>
        <p>We offer a range of services to meet all your laundry needs:</p>
        <ul>
            <li>Washing and Drying</li>
            <li>Ironing</li>
            <li>Dry Cleaning</li>
            <li>Special Fabric Care</li>
            <li>Pickup and Delivery</li>
        </ul>
    </div>

    <div id="pricingPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Pricing</h2>
        <p>We offer flexible pricing plans to suit businesses of all sizes. Contact us for a customized quote based on your specific requirements.</p>
    </div>

    <div id="emailPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Email</h2>
        <p>Stay updated with our latest news and updates. Subscribe to our newsletter by providing your email address below:</p>
        <form action="">
            <input type="text" placeholder="Email Address"/>
            <button>Subscribe</button>
        </form>
    </div>

    <div id="galleryPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Gallery</h2>
        <p>Check out our gallery to see our laundry management system in action.</p>
        <!-- add images or links to your gallery here -->
    </div>

    <div id="privacyPolicyPopup" class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2>Privacy Policy</h2>
        <p>Your privacy is important to us. Please review our full privacy policy to understand how we collect, use, and protect your personal information.</p>
    </div>

