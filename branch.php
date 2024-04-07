<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>FoodMaster</title>

    <!--CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        .font {
            font-family: 'Changa One', cursive;
        }

        header {
            padding: 30px;
            border: 1px solid lightgray;
            background-color: whitesmoke;
            border-radius: 10px;
        }

        .containers {
            border: 1px solid lightgray;
            background-color: whitesmoke;
            margin: 50px auto;
            border-radius: 10px;
            width: 600px;
        }

        .review-container {
            border: 1px solid lightgray;
            background-color: whitesmoke;
            margin: 50px auto;
            border-radius: 10px;
            width: 600px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            grid-template-columns: 1fr 2fr;
            gap: px;
            padding: 5px;
            align-items: center;
            width: 500px;
        }

        .review {
            margin-top: 30px;
            margin-left: 20px;
            font-family: "Mitr", sans-serif;
        }

        .grid-container>div {
            text-align: left;
            padding: 20px 20px;
            font-size: 20px;

        }

        .item1 {
            grid-row: 1 / 5;
            display: flex;
            align-items: center;
        }

        .container {
            display: flex;
            align-items: center;
        }

        h3,
        h1,
        h2 {
            margin: 0;
            text-align: center;
        }

        .item1>h1 {
            padding: 20px;
            background-color: lightgray;
            border-radius: 10px;
            overflow: visible;

        }

        input {
            background-color: white;
            color: black;
        }

        textarea {
            margin: 20px auto;
        }

        textarea {
            padding: 10px;
            display: block;
            width: 300px;
            margin: 20px auto;
            /* background-color: rgba(0, 0, 0, 0.46); */
            border-radius: 5px;
        }

        .button-3 {
            background-color: #ffffff00;
            border: 1px solid black;
            color: white;
            border-radius: 8px;
            color: black;
            cursor: pointer;
            font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto,
                "Helvetica Neue", sans-serif;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            display: block;
            width: 100px;
            margin: 20px auto;
            outline: none;
            padding: 7px 20px;
            /* position: relative; */
            text-align: center;
            text-decoration: none;
            touch-action: manipulation;
            transition: box-shadow 0.2s, -ms-transform 0.1s, -webkit-transform 0.1s,
                transform 0.1s;
            user-select: none;
            -webkit-user-select: none;

            position: relative;
        }

        .button-3:active {
            transform: scale(0.96);
        }
    </style>

</head>

<body>

    <nav>
        <div class="logo" id="logo">
            <span>FoodMaster
        </div>
        <ul>
            <li><a href="web.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="browse.html">Browse</a></li>

            <div class="buttons">
                <a class="button-1" href="login.html">Log in</a>
                <a class="button-2" href="signup.html">Sign Up</a>
            </div>
        </ul>
    </nav>


    <div class="font">


        <?php
        // Connect to the database
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'restaurant_review';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Get the branch details from the database
        $restaurant_name = $_GET['restaurant_name'] ?? '';
        $branch_location = $_GET['branch_location'] ?? '';
        $branch_id = $_GET['branch_id'] ?? '';
        echo "<header>
        <h1><strong>$restaurant_name , $branch_location</strong></h1>
    </header>";
        $query = "SELECT average_rating FROM branch WHERE branch.branch_id='$branch_id'";
        // Execute the query and store the result in a variable
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $average_rating = $row['average_rating'];

        echo " <br> <br> <h2><strong>Average Rating : $average_rating </strong></h2> <br> <br>";
        // Close the database connection
        mysqli_close($conn);
        ?>




        <br>
        <hr><br> <br><br>
        <h1><strong>User Ratings</strong></h1>



        <div class="containers">
            <div class="review">
                <p><strong> #reviewer_email: </strong>This is a sample of what a review would look like</p>
            </div>
            <div class="grid-container">
                <div class="item1">
                    <h1>overall_rating</h1>
                </div>
                <div class="item3">Food quality: #r_food_quality</div>
                <div class="item3">Customer service: r_customer_service</div>
                <div class="item3">Ambience: r_ambience</div>
                <div class="item3">Pricing: r_pricing</div>
            </div>

        </div>
        <!-- <div class="containers">

            <div class="review">
                <p><strong> USER456: </strong>Another sample</p>
                <p> <strong>BRANCH: </strong> Peshawar
            </div>
            <div class="grid-container">
                <div class="item1">
                    <h1>4.5/5</h1>
                </div>
                <div class="item3">Food quality: 4.5/5</div>
                <div class="item3">Customer service: 4.5/5</div>
                <div class="item3">Ambience: 4.5/5</div>
                <div class="item3">Pricing: 4.5/5</div>
            </div>

        </div> -->

        <hr>
        <div class="review-container">
            <div class="review">
                <h3>Write your own review!</h3> <br> <br>
                <p>BRANCH:</strong> <input type="text" id="branch-input"></p>
                <div>Food quality: <input type="number" id="food-quality-input" min="1" max="5"></div>
                <div>Customer service: <input type="number" id="customer-service-input" min="1" max="5">
                </div>
                <div>Ambience: <input type="number" id="ambience-input" min="1" max="5"></div>
                <div>Pricing: <input type="number" id="pricing-input" min="1" max="5"></div>
                <div>Write your review: <br> <textarea id="review-input" rows="4" cols="50"></textarea></div>
                <a class="button-3" href="#">Submit</a>
            </div>
        </div>

    </div>


</body>

</html>