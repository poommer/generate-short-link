<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>POOMMER</h1>
    </header>

    <main>
        <div class="box-form">
            <h2 style="text-align: center;">Paste the URL to be shortened</h2>
            <p id="msg"></p>
            <form style="width: 100%;">
                <div class="inp-group">
                    <input type="url" name="URL" id="URL" placeholder="enter your URL here">
                    <button type="button" id="genURL" >generate now!</button>
                </div>
            </form>

            <p>ShortURL is a free tool to shorten URLs and generate short links
                URL shortener allows to create a shortened link making it easy to share</p>
        </div>


        <div class="box">
            <h2 style="color: #003e6e;">your Short link URL:</h2>
            <div class="group">
            
                <div class="show-newUrl">
                    <a href="http://localhost/generate-short-link/Xzbs" ID="newUrl">http://localhost/generate-short-link/Xzbs</a>
                    <div class="group-copy">
                    <button id="copyURL"><img src="copy_all_FILL0_wght400_GRAD0_opsz24.svg" alt="" id='bg-btnCopy'></button>
                    </div>
                                    
                </div>
                <p class="under-tip">long URL: <a id="longUrl" href="https://www.php.net/manual/en/image.installation.php">https://www.php.net/manual/en/image.installation.php</a></p>

            </div>
            <div></div>
        </div>


    </main>

    <footer>
        <p>developed by <a href="https://poommer.github.io/portfolio/">poommer lime.</a></p>
    </footer>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>

</html>