<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase</title>
    <style>
        /* Your existing CSS styles here */
        @import url('https://fonts.googleapis.com/css?family=Arimo');

        :root {
            --coral: #eb9478;
            --maroon: #8e2807;
            --title: #493b76;
        }

        body {
            display: flex;
            justify-content: center;
        }

        .wrapper {
            margin-top: 5%;
            width: 60%;
            display: flex;
            justify-content: center;
            font-family: "Arimo";
            background-color: var(--coral);
            -webkit-box-shadow: 9px 13px 25px 0px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 9px 13px 25px 0px rgba(0, 0, 0, 0.18);
            box-shadow: 9px 13px 25px 0px rgba(0, 0, 0, 0.18);
            animation: slideUp 2000ms ease;
        }

        @keyframes slideUp {
            0% {
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
                visibility: visible;
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        .container {
            width: 65%;
            padding: 5% 10%;
        }

        h1 {
            align-self: center;
        }

        form {
            width: 100%;
        }

        form>* {
            margin-top: 20px;
        }

        input {
            width: 100%;
            min-height: 25px;
            border: 0;
            font-size: 1rem;
            letter-spacing: .15rem;
            font-family: "Arimo";
            margin-top: 5px;
            color: var(--maroon);
            border-radius: 4px;
        }

        label {
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 2px;
            color: var(--maroon);
        }

        h1 {
            font-size: 24px;
            line-height: 10px;
            color: var(--title);
            letter-spacing: 1px;
        }

        h1:nth-of-type(2) {
            margin-top: 10%;
        }

        .name {
            justify-content: space-between;
            display: flex;
            width: 100%;
        }

        .name div {
            width: 45%;
        }

        .address-info {
            display: flex;
            justify-content: space-between;
        }

        .address-info div {
            width: 30%;
        }


        .btns {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        button {
            margin: 3px 0;
            height: 30px;
            width: 40%;
            color: #cfc9e1;
            background-color: #4a3b76;
            text-transform: uppercase;
            border: 0;
            border-radius: .3rem;
            letter-spacing: 2px;
        }

        button:hover {
            animation-name: btn-hov;
            animation-duration: 550ms;
            animation-fill-mode: forwards;
        }

        @keyframes btn-hov {
            100% {
                background-color: #cfc9e1;
                color: #4a3b76;
                transform: scale(1.05);
            }
        }

        input:focus,
        button:focus {
            outline: none;
        }

        @media (max-width: 736px) {
            .wrapper {
                width: 100%;
            }

            .container {
                width: 100%;
            }

            .btns {
                align-items: center;
            }

            a button {
                width: 50%;
            }

            form h1 {
                text-align: center;
            }

            .name,
            .address-info {
                flex-direction: column;
                width: 100%;
                justify-content: space-between;
            }

            .name div,
            .address-info div {
                align-items: center;
                flex-direction: column;
                width: 100%;
                display: flex;
            }

            .street {
                text-align: center;
            }

            input {
                margin: 5px 0;
                min-height: 30px;
            }
        }

        /* Additional styles for the download message */
        .download-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: var(--title);
        }

        .download-link {
            text-decoration: none;
            color: #4a3b76;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <!-- Your existing form and content here -->

            <!-- After successful purchase, display the download message -->
            @foreach($orders as $prod)
            
            <div class="download-message">
                <p>Thank you for your purchase! You can download your product <a class="download-link" href="{{asset($prod->book)}}" target="_blank"><i class="fa-regular fa-file-pdf fa-lg"></i></a>.</p>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>
