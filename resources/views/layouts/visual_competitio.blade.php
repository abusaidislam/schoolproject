<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Visual Competition')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/visual_flash_assets/bootstrap.min.css') }}">
    <script src="{{ asset('public/abacus_app_assets/visual_flash_assets/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('public/abacus_app_assets/jquery-3.6.0.min.js') }}"></script>
    {{-- <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault(); 
        });

        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && event.key === 'u') {
                event.preventDefault(); 
            }
        });
        document.addEventListener('keydown', function(event) {
            if (event.key === 'F12') {
                event.preventDefault(); 
            }
        });

        document.addEventListener('dragstart', function(event) {
            event.preventDefault();
        });
        document.addEventListener('selectstart', function(event) {
            event.preventDefault();
        });
    </script> --}}
<style>
body {
    background-color: #e0f7fa;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    margin: 0;
    padding: 0;
}

.container-fluid {
    position: relative;
    padding-top: 10px; /* Added space at the top to account for the info box */
}

/* Info section positioned at the top left */
.info {
    position: absolute;
    top: 50px;
    left: 50px;
    padding: 10px 20px;
    border-radius: 12px;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    font-size: 22px;
    color: #3b3b3b;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 10; 
    transition: transform 0.3s ease-in-out;
    max-width: 250px;
    white-space: normal;
    word-wrap: break-word;
   
}

.info:hover {
    transform: scale(1.05); 
}

.info-text {
    margin: 0;
    line-height: 1.5;
}

.timeshow {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 400px;
    position: relative;
    background-color: #fff;
    border-radius: 25px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    padding: 50px;
    margin: 0px auto;
    max-width: 600px;
}

#digitalClock {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 2em;
    font-weight: bold;
    color: #ff6f00;
}

.question-count {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #2cbf07fa;
}

#readyText {
    font-size: 3em;
    color: #ff4081;
    font-weight: bold;
    text-shadow: 2px 2px #ffeb3b;
    animation: bounce 1s infinite;
    text-align: center;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

#data p {
    font-size: 2.5em;
    font-weight: bolder;
    color: #0288d1;
    text-align: right;
    margin: 0;
    line-height: 1.2em; 
    transition: transform 0.3s ease;
}

#equalSign {
    font-size: 4em;
    margin-top: 20px;
    color: #ff7043;
    text-align: center;
}

#answerInput {
    display: none;
    width: 70%;
    margin-top: 20px;
    padding: 15px;
    font-size: 1.5em;
    border: 2px solid #0288d1;
    border-radius: 15px;
    text-align: center;
    transition: border-color 0.3s ease;
}

#answerInput:focus {
    border-color: #ff4081;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 64, 129, 0.5);
}

footer button {
    font-size: 1.2em;
    padding: 15px 30px;
    margin: 10px;
    border-radius: 15px;
    border: none;
    background-color: #03a9f4;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

footer button:hover {
    background-color: #0288d1;
}
.badge {
    font-size: 1.1em;
    padding: 0.5em 0em;
    border-radius: 0.5em;
}
/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    /* Adjusting the info section for mobile devices */
    .info {
        position: relative;
        top: auto;
        left: auto;
        margin: 10px auto;
        text-align: center;
        font-size: 18px;
        width: 90%;
        box-shadow: none; /* Remove box-shadow for mobile */
    }

    /* Adjusting the timeshow container */
    .timeshow {
        max-width: 90%;
        padding: 20px;
    }

    #digitalClock {
        font-size: 1.5em;
    }

    .question-count {
        font-size: 20px;
    }

    #readyText {
        font-size: 2em;
    }

    #equalSign {
        font-size: 3em;
    }

    #data p {
        font-size: 2em;
    }

    #answerInput {
        width: 90%;
        font-size: 1.2em;
    }

    footer button {
        padding: 10px 20px;
        font-size: 1em;
    }
}

    </style>
</head>

<body>
@yield('content')

</body>

</html>