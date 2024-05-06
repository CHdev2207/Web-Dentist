<?php

// connect db 
$conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('connection failed');

// funtion MAKE APPOINTMENT 
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $date = $_POST['date'];

    $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date)
    VALUES('$name','$email','$number','$date')") or die('query failed');

    if ($insert) {
        $message[] = 'appointment made successfully!';
    } else {
        $message[] = 'appointment failed!';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Design Dentist</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- style css   -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        :root {
            --white: #fffafa;
            --black: ##363535;
            --red: #ff6b6b;
            --green: #00b8b0;
            --blue: #06bfd4;
            --grey: #8a9299;
            --light-color: #666;
            --light-bg: #eee;
            --border: .2rem solid rgba(0, 0, 0, .1);
            --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none !important;
            text-transform: capitalize;
        }

        header {
            /* background-position: 100%; */
            /* background-color: var(--white); */
            box-shadow: var(--box-shadow);
        }

        header .container .navbar {
            align-items: center;
            justify-content: space-between;
        }

        header .container .navbar a {
            text-decoration: none;
        }

        *::-webkit-scrollbar {
            height: .5rem;
            width: 1rem;
        }

        *::-webkit-scrollbar-track {
            background-color: transparent;
        }


        *::-webkit-scrollbar-thumb {
            background-color: #3e403f;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-behavior: smooth;
            scroll-padding-top: 6.5rem;
        }

        section {
            padding: 7rem 2rem;
        }

        .heading {
            text-align: center;
            font-size: 4rem;
            color: var(--black);
            text-transform: uppercase;
            font-weight: bolder;
            margin-bottom: 3rem;

        }

        .link-btn {
            display: inline-block;
            padding: 1rem 3rem;
            border-radius: .5rem;
            background-color: var(--red);
            cursor: pointer;
            font-size: 1.7rem;
            color: var(--white);
        }

        .link-btn:hover {
            background-color: var(--light-color);
            color: var(--white);
        }


        .header {
            padding: 2rem;
            border-bottom: var(--border);
        }

        .header.active {
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            border: 0;
        }

        .header .logo {
            font-size: 3rem;
            color: var(--black);
            font-weight: 600;
        }

        .header .logo span {
            color: var(--red);
            font-weight: 600;
            font-size: 3rem;
        }

        .header .nav a {
            margin: 0 1rem;
            font-size: 1.9rem;
            color: var(--black);
            font-weight: 600;
        }

        .header .nav a:hover {
            color: var(--red);
        }


        #menu-btn {
            font-size: 2.5rem;
            color: black;
            cursor: pointer;
            display: none;
        }

        .home {
            background: url(https://cdn.pixabay.com/photo/2017/10/21/12/15/tooth-2874551_1280.jpg);
            background-size: cover;
            background-position: center;
        }

        .home .content {
            width: 45rem;
            padding: 2rem;
        }

        .home .content h3 {
            font-size: 5rem;
            text-transform: uppercase;
            color: var(--black);
            font-weight: bold;
        }

        .home .content p {
            line-height: 2;
            font-size: 1.5rem;
            color: var(--light-color);
            padding: 1rem 0;
            font-weight: bold;
        }

        .about .row {
            min-height: 60vh;
        }

        .about .content span {
            font-size: 2rem;
            color: var(--red);
            font-weight: bold;
        }

        .about .content h3 {
            font-size: 3rem;
            color: var(--black);
            margin-top: 1rem;
        }

        .about .content p {
            padding: 1rem;
            font-size: 1.4rem;
            color: var(--light-color);
            line-height: 2;
        }

        .services {
            background-color: var(--light-bg);
        }

        .services .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 2rem;
        }

        .services .box-container .box {
            text-align: center;
            padding: 2rem;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            border-radius: .5rem;
        }

        .services .box-container .box img {
            margin: 1rem 0;
            height: 4rem;
        }

        .services .box-container .box h3 {
            font-size: 2rem;
            padding: 1rem 0;
            color: var(--black);
        }

        .services .box-container .box p {
            font-size: 1.2rem;
            color: var(--grey);
            line-height: 2;
        }

        .process .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 2rem;
        }

        .process .box-container .box {
            background-color: var(--red);
            padding: 2rem;
            border-radius: .5rem;
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .process .box-container .box img {
            height: 20rem;
            margin: 1rem 0;
        }

        .process .box-container .box h3 {
            font-size: 2rem;
            color: var(--white);
            font-weight: bold;
            margin: 1.5rem 0;
        }

        .process .box-container .box p {
            font-size: 1.2rem;
            color: var(--white);
            line-height: 2;
        }

        .reviews {
            background-color: var(--light-bg);
        }

        .reviews .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 2rem;
        }

        .reviews .box-container .box {
            background-color: var(--white);
            text-align: center;
            border-radius: .5rem;
            box-shadow: var(--box-shadow);
            padding: 2rem;
        }

        .reviews .box-container .box img {
            height: 10rem;
            width: 10rem;
            border-radius: 50%;
        }

        .reviews .box-container .box p {
            padding: 2rem 0;
            line-height: 2;
            font-size: 1.5rem;
            color: var(--grey);
            margin-bottom: 0;
        }

        .reviews .box-container .box .stars {
            padding: .5rem 1.5rem;
            border-radius: .5rem;
            background-color: var(--light-bg);
            margin-bottom: 2rem;
            display: inline-block;
        }

        .reviews .box-container .box .stars i {
            font-size: 1.5rem;
            color: var(--red);
        }

        .reviews .box-container .box h3 {
            font-size: 2rem;
            color: var(--black);
            font-weight: bold;
        }

        .reviews .box-container .box span {
            color: var(--light-color);
            font-size: 1.5rem;
        }


        .contact form {
            border-radius: .5rem;
            background-color: var(--light-bg);
            padding: 2rem;
            margin: 0 auto;
            max-width: 50rem;
        }

        .contact form .message {
            margin-bottom: 2rem;
            border-radius: .5rem;
            background-color: var(--red);
            padding: 1.2rem 1rem;
            font-size: 1.7rem;
            color: var(--white);
            text-align: center;
        }

        .contact form .box {
            width: 100%;
            margin-top: 1rem;
            margin-bottom: 2rem;
            border-radius: .5rem;
            background-color: var(--white);
            padding: 1.2rem 1.4rem;
            font-size: 1.7rem;
            color: var(--black);
            text-transform: none;
        }

        .contact form span {
            font-size: 1.8rem;
            color: var(--black);
            font-weight: bold;
        }

        .footer {
            background-color: var(--light-bg);
        }

        .footer .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap: 3rem;
        }

        .footer .box-container .box {
            text-align: center;
        }

        .footer .box-container .box i {
            height: 5rem;
            width: 5rem;
            border-radius: 50%;
            line-height: 5rem;
            font-size: 2rem;
            background-color: var(--red);
            color: var(--white);
            margin-bottom: 1rem;
        }

        .footer .box-container .box h3 {
            font-size: 2rem;
            margin: 2rem 0;
            color: var(--black);
            font-weight: bold;
        }

        .footer .box-container .box p {
            font-size: 1.5rem;
            color: var(--light-color);
            text-transform: none;
        }

        .footer .credit {
            text-align: center;
            border-top: var(--border);
            padding-top: 2rem;
            margin-top: 2rem;
            font-size: 2rem;
            color: var(--light-color);
            padding-bottom: 2rem;
        }

        .footer .credit span {
            color: var(--red);
        }










        /* media Queries  */

        @media (max-width:991px) {

            html {
                font-size: 55%;
            }

            .header .link-btn {
                display: none;
            }

            section {
                padding: 5rem 2rem;
            }

        }


        @media (max-width:768px) {

            section {
                padding: 3rem 1rem;
            }

            #menu-btn {
                display: inline-block;
                transition: .2s linear;
            }

            #menu-btn.fa-times {
                transform: rotate(180deg);
            }

            .header .nav {
                position: absolute;
                top: 150%;
                left: 0;
                right: 0;
                background-color: var(--white);
                border-top: var(--border);
                border-bottom: var(--border);
                padding: 1rem 0;
                text-align: center;
                flex-flow: column;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: .2s linear;
            }

            .header .nav.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            .header .nav a {
                margin: 1rem 0;
                font-size: 2rem;
            }

            .home {
                background-position: left;
            }

            .home .content {
                width: auto;
            }

        }


        @media (max-width:450px) {

            html {
                font-size: 50%;
            }


            .home .content h3 {
                font-size: 4rem;
            }

            .heading {
                font-size: 3rem;
            }

        }
    </style>

</head>

<body>

    <!-- header section starts  -->
    <header class="header fixed-top">

        <div class="container">
            <div class="navbar">

                <a href="#home" class="logo">dental<span>Care.</span></a>

                <nav class="nav">
                    <a href="#home">home</a>
                    <a href="#about">about</a>
                    <a href="#services">services</a>
                    <a href="#reviews">reviews</a>
                    <a href="#contact">contact</a>
                </nav>

                <a href="#contact" class="link-btn">make appointment</a>

                <div id="menu-btn" class="fas fa-bars"></div>

            </div>
        </div>

    </header>

    <!-- home section starts -->
    <section class="home" id="home">
        <div class="container text-center text-md-left">
            <div class="row min-vh-100 align-items-center">
                <div class="content ">
                    <h3>let us brighten your smile</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Iure laborum expedita dolores? Similique dolore quaerat dolorum alias veritatis quas eveniet?</p>
                    <a href="#contact" class="link-btn">Make Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <!-- about section starts  -->
    <section class="about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 image">
                    <img src="images/home-5.png.jpg" class="w-100 mb-5 mb-0" alt="">
                </div>

                <div class="col-md-6 content">
                    <span>about us</span>
                    <h3>True Healthcare For Your Family</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Odio eum asperiores recusandae vero maxime dolor alias
                        veritatis labore hic at?Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Voluptatum, quae!</p>
                    <a href="#contact" class="link-btn">Make Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section starts  -->
    <section class="services" id="services">
        <h1 class="heading">our services</h1>

        <div class="box-container container">

            <div class="box">
                <img src="images/icon-1.png" alt="">
                <h3>Alignment Specialist</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>

            <div class="box">
                <img src="images/icon-2.png" alt="">
                <h3>Cosmetic Dentistry</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>

            <div class="box">
                <img src="images/icon-3.png" alt="">
                <h3>Oral Hygiene Experts</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>

            <div class="box">
                <img src="images/icon-4.png" alt="">
                <h3>Root Cannal Specialist</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>

            <div class="box">
                <img src="images/icon-5.png" alt="">
                <h3>Live Dental Advisory</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>

            <div class="box">
                <img src="images/icon-6.png" alt="">
                <h3>Cavity Inspection</h3>
                <p>Lorem ipsum dolor sit amet </p>
            </div>






        </div>
    </section>

    <!-- process section starts  -->
    <section class="process">
        <h1 class="heading">work process</h1>
        <div class="box-container container">

            <div class="box">
                <img src="images/process-1.png" alt="">
                <h3>Cosmetic Dentistry</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eaque!</p>
            </div>

            <div class="box">
                <img src="images/process-2.png" alt="">
                <h3>Pediatric Dentistry</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eaque!</p>
            </div>

            <div class="box">
                <img src="images/process-3.png" alt="">
                <h3>Dental Implants</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, eaque!</p>
            </div>

        </div>
    </section>

    <!-- reviews section starts  -->
    <section class="reviews" id="reviews">
        <h1 class="heading"> satisfied clients</h1>

        <div class="box-container container">

            <div class="box">
                <img src="images/profile-1.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Omnis aliquid delectus inventore labore quidem odit, ipsam amet commodi dolorum dolore.</p>

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Metur</h3>
                <span>satisfied client</span>
            </div>

            <div class="box">
                <img src="images/profile-2.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Omnis aliquid delectus inventore labore quidem odit, ipsam amet commodi dolorum dolore.</p>

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Metur</h3>
                <span>satisfied client</span>
            </div>

            <div class="box">
                <img src="images/profile-3.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Omnis aliquid delectus inventore labore quidem odit, ipsam amet commodi dolorum dolore.</p>

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Metur</h3>
                <span>satisfied client</span>
            </div>


        </div>
    </section>

    <!-- contact section starts  -->
    <section class="contact" id="contact">

        <h1 class="heading">make appointment</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<p class="message">' . $message . '</p>';
                }
            }
            ?>
            <span>your name :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" required>
            <span>your email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" required>
            <span>your number :</span>
            <input type="number" name="number" placeholder="enter your number" class="box" required>
            <span>appointment date :</span>
            <input type="datetime-local" name="date" class="box" required>
            <input type="submit" value="make appointment" name="submit" class="link-btn">
        </form>

    </section>

    <!-- footer section starts  -->
    <section class="footer">

        <div class="box-container container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>+66 93-784-4133</p>
                <p>+111-222-3333</p>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>our address</h3>
                <p>Bangkok, Nakhon Pathom Thailand</p>
            </div>

            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>opening hours</h3>
                <p> Monday to Friday </p>
                <p>08:00 am to 17:00 pm</p>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <p>dentist@gmail.com</p>
            </div>

        </div>

        <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span> mr. Aphichet Sitthirid </span></div>

    </section>




    <!-- custom js file link  -->
    <script>
        let menu = document.querySelector("#menu-btn");
        let navbar = document.querySelector(".header .nav");
        let header = document.querySelector(".header")


        menu.onclick = () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');
        }

        window.onscroll = () => {
            menu.classList.remove('fa-times');
            navbar.classList.remove('active');

            if (window.scrollY > 0) {
                header.classList.add('active');
            } else {
                header.classList.remove('active');
            }


        }
    </script>

</body>

</html>