
    <?php get_header(); ?>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Fredoka+One&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }
        
        .page-container {
            width: 1440px;
            height: 1024px;
            position: relative;
            background-color: rgba(255, 255, 255, 1.0);
            margin: 0 auto;
        }
        
        .image-1 {
            position: absolute;
            left: 2px;
            top: 0;
            width: 1436px;
            height: 309px;
            background-color: rgba(255, 255, 255, 1.0);
            background-image: url('https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/9eec4f78-c19c-4850-99fc-bfb77f1ef066');
            background-size: cover;
            background-position: center;
        }
        
        .home-page-text {
            position: absolute;
            left: 320px;
            top: 32px;
            width: 800px;
            height: 200px;
            font-family: 'Racing Sans One', sans-serif;
            font-size: 96px;
            font-weight: 400;
            text-align: center;
            color: rgba(0, 0, 0, 1.0);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .description-text {
            position: absolute;
            left: 755px;
            top: 419px;
            width: 579px;
            height: 291px;
            font-family: 'Adamina', serif;
            font-size: 36px;
            font-weight: 400;
            text-align: left;
            color: rgba(0, 0, 0, 1.0);
        }
        
        .ok-button {
            position: absolute;
            left: 826px;
            top: 761px;
            width: 145px;
            height: 88px;
            background-color: rgba(189, 213, 240, 1.0);
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .ok-button-text {
            font-family: 'Fredoka One', sans-serif;
            font-size: 40px;
            font-weight: 400;
            text-align: center;
            color: rgba(0, 0, 0, 1.0);
        }
        
        .quit-button {
            position: absolute;
            left: 1045px;
            top: 761px;
            width: 205px;
            height: 88px;
            background-color: rgba(255, 138, 111, 1.0);
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .quit-button-text {
            font-family: 'Fredoka One', sans-serif;
            font-size: 40px;
            font-weight: 400;
            text-align: center;
            color: rgba(0, 0, 0, 1.0);
        }
        
        .image-2 {
            position: absolute;
            left: 80px;
            top: 433px;
            width: 550px;
            height: 393px;
            background-color: rgba(255, 255, 255, 1.0);
            border-radius: 40px;
            background-image: url('https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/c77f94a0-9f24-49c7-a555-79f5b2492bb4');
            background-size: cover;
            background-position: center;
        }
        
        .image-3 {
            position: absolute;
            left: 971px;
            top: 32px;
            width: 405px;
            height: 213px;
            background-color: rgba(255, 255, 255, 1.0);
            background-image: url('https://figma-alpha-api.s3.us-west-2.amazonaws.com/images/db651d20-b4da-40ca-aa17-9098703301f7');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="image-1"></div>
        <div class="home-page-text">Home Page</div>
        <div class="description-text">
            This is a demo website to test transferring UI from Figma to Wordpress. This website contains elements including text, image and button.
        </div>
        <div class="ok-button">
            <div class="ok-button-text">OK</div>
        </div>
        <div class="quit-button">
            <div class="quit-button-text">QUIT</div>
        </div>
        <div class="image-2"></div>
        <div class="image-3"></div>
    </div>
</body>
</html>
    <?php get_footer(); ?>
    