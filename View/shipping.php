<?php
session_start();
?>

<html>
    <head>
        <title> Shipping </title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Anton|Oswald&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="all.css">
        <script src="https://kit.fontawesome.com/d0e6f5b54a.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>

        <style>

            .shipcontainer {
                width: 100%;
                margin: 150px auto 0 auto;

            }

            .container {
                width: 35%;
                margin: 0 auto 0 auto;
                text-align: center;
                border: 1px solid #dedede;
                
            }

            #containerTitle {
                text-align: center;
                background-color: #EEF2F4;
                width: 35%;
                margin: auto;
                padding: 10px;
                border: 1px solid #dedede;
                border-bottom: none;


            }

            #customerAddress, #productPrice {
                text-transform: capitalize;
                font-family: sans-serif;
                text-align: justify;
                margin-left: 15px;
                padding: 5px;
            }

            form {
                text-align: justify;
                margin-top: 10px;
            }

            /* The container */
            .inputContainer {
                display: block;
                position: relative;
                padding-bottom: 5px;
                padding-left: 35px;
                margin-bottom: 12px;
                margin-left: 18px;
                cursor: pointer;
                font-size: 22px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border-bottom: 1px solid #ccc;
            }

            /* Hide the browser's default radio button */
            .inputContainer input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 4;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */
            .inputContainer:hover input ~ .checkmark {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .inputContainer input:checked ~ .checkmark {
                background-color: #2196F3;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .inputContainer input:checked ~ .checkmark:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .inputContainer .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: white;
            }

            #paybtn {
                margin-left: 18px;
                padding: 10px;
                width: 35%;
                border: none;
                background-color: #54C7C3;
                border-radius: .25rem;
            }
        </style>
    </head>

<body>
    <div class="shipcontainer">        
        <div id="containerTitle">
            <h3>Choose shipment method</h3>
        </div>
        <div class="Container"> 
            <div id="customerAddress">
                &#x2713; Address1: <?php echo  $_SESSION['address'];?>
            </div>
            <div id="customerAddress">
                &#x2713; Address2: <?php echo  $_SESSION['address2'];?>
            </div>
            <div id="productPrice">
                &#x2713; Total price: <?php echo  $_SESSION['price']; ?>
            </div>

            <!--shipping form-->
            <form method="POST" action="../Controler/shippingAddress.php">
               <label class="inputContainer">Normal Delivery | One Week
                    <input type="radio" name="radio" value="normalDelivery">
                    <span class="checkmark"></span>
                </label>

                <label class="inputContainer">Fast Delivery | $5 Increase - 2 Days
                    <input type="radio" name="radio" value="fastDelivery">
                    <span class="checkmark"></span>
                </label>

                <div>
                    <input type="submit" name="pay" value="Submit" id="paybtn"/>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

