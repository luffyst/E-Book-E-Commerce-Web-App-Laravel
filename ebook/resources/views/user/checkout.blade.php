<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <form method="POST" action="{{route('storeorder')}}">
            @csrf
                <h1>
                    <i class="fas fa-shipping-fast"></i>
                    Shipping Details
                </h1>
                <div class="name">
                    <div>
                        <label for="f-name">First</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="l-name">Email</label>
                        <input type="email" name="email">
                    </div>
                </div>
                <div class="street">
                    <label for="name">Address</label>
                    <input type="text" name="address">
                </div>
                <h1>
                    <i class="far fa-credit-card"></i> Payment Information
                </h1>
                <div class="cc-num">
                    <input type="radio" name="payment" id="creditCard">
                    <label for="creditCard">Credit Card</label>
                </div>
                <div class="cc-info">
                    <div>
                        <input type="radio" name="payment" id="paypal">
                        <label for="paypal">PayPal</label>
                    </div>
                    <div>
                        <input type="radio" name="payment" id="cod">
                        <label for="cod">Cash On Delivery</label>
                    </div>
                </div>
                <div class="btns">
                <a> <button type="submit">Purchase</button></a>
                   <a href="{{route('show.cart')}}"> <button>Back to cart</button></a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>