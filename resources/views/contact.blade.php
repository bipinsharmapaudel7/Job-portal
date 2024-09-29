<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Add your CSS link here if you have a separate CSS file -->
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: red;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
@include('navbar.header')
<div class="container">
    <h1>Contact Us</h1><br>
    <form action="#" method="POST">
        <h2><label for="name">NewWorld</label>
        <!-- <input type="text" id="name" name="name" required> -->

        <label for="email">new@gmail.com</label>
        <!-- <input type="email" id="email" name="email" required> -->

        <!-- <label for="message">Thank You</label> -->
        <!-- <textarea id="message" name="message" required></textarea> -->

        <!-- <input type="submit" value="Submit"> -->
    </form>
</div>

</body>
</html>

@include('navbar.footer')