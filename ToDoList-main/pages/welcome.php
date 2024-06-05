<!DOCTYPE html>
<html>
<head>
    <title>Welcome to FHToDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap"
        rel="stylesheet"
    />
</head>
<body>
<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);

    .welcome-text {
        font-family: "MyCustomFont", sans-serif; /* Fallback to sans-serif */
    }

    .welcome-screen {
        background-image: url('../Images/bg_image.jpg');
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-size: cover; /* or 'contain' depending on your needs */
        background-position: center; /* centers the image */
        background-repeat: no-repeat; /* prevents the image from repeating */
    }

    .welcome-text {
        color: black;
        margin-top: 20px; /* Adjust as needed */
        font-size: 26px; /* Adjust as needed */
    }

    header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
        position: fixed; /* Fixiert die Navbar am oberen Rand des Viewports */
        width: 100%; /* Die Navbar erstreckt sich über die volle Breite */
        font-family: Calibri;
        font-size:20px;
        top: 0;
        left: 0;
        z-index: 1000; /* Stellt sicher, dass die Navbar über anderen Inhalten liegt */
    }

    header a {
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        font-weight: bold;
    }

    header a:hover {
        background-color: #ddd;
        color: black;
    }

    body,
    html {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f4f4f4;
        display: grid;
        place-items: center;
        height: 100vh;
    }


    @keyframes pulsate {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.15); /* Adjust the scale to control the intensity of the pulsate */
            opacity: 0.7;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .logo {
        animation: pulsate 2s infinite ease-in-out;
        cursor: pointer;
        width: 100px;
        height: 96px;
        transition: all 0.3s ease-in-out;
    }

    .logo:hover {
        border-color: #fff; /* Existing border-color change */
        box-shadow: 0 0 10px #fff;  /* Add a white box-shadow */
        border-radius: 50%;
    }

    @media (max-width: 768px) {
        /* Adjust this value based on your requirements */

        @keyframes pulsate {
            0% {
                transform: scale(1);
                opacity: 1;
                box-shadow: 0 0 5px white;
            }
            50% {
                transform: scale(1.25);
                opacity: 0.7;
                box-shadow: 0 0 15px white;
            }
            100% {
                transform: scale(1);
                opacity: 1;
                box-shadow: 0 0 5px white;
            }
        }

        .logo {
            animation: pulsate 2s infinite ease-in-out;
            cursor: pointer;
            width: 100px;
            height: 96px;
            border-radius: 50%;
            transition: all 0.3s ease-in-out;
        }

        .welcome-text {
            font-size: 18px;
        }
    }

    /*Potentiell unnötig*/
    .additional-text {
        color: white; /* Adjust color as needed */
        margin-top: 10px;
        text-align: justify; /* Justify the text */
        max-width: 60%; /* Maximum width */
        margin-left: auto; /* Centering the div */
        margin-right: auto; /* Centering the div */
        padding: 0 15px; /* Add some padding */
        font-family: "Bad Script", cursive; /* Using Bad Script with cursive as a fallback */
        font-size: 26px;
    }


    .gay {
        text-align: center;
    }

    .gay1 {
        text-align: center;
        font-size: 16px;
    }



    .customreg-text {
        font-family: "MyCustomFontRegular", sans-serif;
    }

    .customroundhand-text {
        font-family: "Snell-Roundhand", sans-serif; /* Fallback to sans-serif */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .additional-text {
            font-size: 16px;
            max-width: 90%;
            margin-top: 10vh;
        }
        .bottom-right-text {
            font-size: 14px; /* Larger font for larger screens */
        }
    }

    /* Add more styles as needed */
</style>
<div class="welcome-screen">
    <img
        src="../Images/to-do.svg"
        class="logo"
        alt="Logo"
        id="welcomeImage"
        width="100"
        height="96"
    />
    <div class="welcome-text customreg-text">
        <p class="gay">Welcome to our FHTW To-Do List</p>
        <p class="gay1">By Nichita, Tobias, Samuel, Leon und Nico</p>
    </div>


</div>

<script>
    document
        .getElementById("welcomeImage")
        .addEventListener("click", function () {
            sessionStorage.setItem("welcomeShown", "true");
            window.location.href = "index.php"; // Replace 'main.html' with the path to your main content page
        });
</script>
</body>
</html>
