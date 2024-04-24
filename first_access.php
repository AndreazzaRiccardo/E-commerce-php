<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link href="https://bootswatch.com/5/lux/bootstrap.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css" rel="stylesheet">
    <style>
        .hidden {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out, visibility 1s ease-in-out;
            visibility: hidden;
            position: absolute;
            z-index: 1;
            font-size: 3rem;
        }
        .visible {
            font-size: 3rem;
            opacity: 1;
            transform: scale(1);
            transition: opacity 2s ease-in-out, transform 1s ease-in-out;
            z-index: 2;
        }

        #subtitle {
            font-size: 3rem;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        .pulsing {
            animation: pulse 5s infinite;
        }

        #backgroundContainer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/imgs/background.jpg');
            background-size: cover;
            opacity: 0.2;
            z-index: -1;
            animation: backgroundScroll 10s ease-in-out infinite;
        }
        @keyframes backgroundScroll {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }
    </style>
</head>
<div id="backgroundContainer"></div>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <h1 id="intro" class="visible">Benvenuti sul mio sito portfolio</h1>
    <div id="content" class="d-flex flex-column justify-content-center align-items-center hidden">
        <h2 id="subtitle">Clicca qui per continuare</h2>
        <a class="btn btn-primary" href="public">VAI</a>
    </div>

    <script>
        const intro = document.getElementById('intro');
        const content = document.getElementById('content');
        const subtitle = document.getElementById('subtitle');

        setTimeout(() => {
            intro.classList.remove('visible');
            intro.classList.add('hidden');

            content.classList.remove('hidden');
            content.classList.add('visible');

            content.classList.add('pulsing');
        }, 2000);
    </script>
</body>

</html>