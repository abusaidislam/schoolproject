<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flash Competition Game</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/visual_flash_assets/bootstrap.min.css') }}">
    <script src="{{ asset('public/abacus_app_assets/visual_flash_assets/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/style.css') }}">
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
        container-fluid {
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
    max-width: 280px;
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

        #inputTimer {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 2em;
            font-weight: bold;
            color: #680426;
        }

        .question-count {
                position: absolute;
                top: 20px; /* Adjust as needed */
                left: 20px; /* Position to the left */
                font-size: 24px;
                font-weight: bold;
                color: #2cbf07fa;
            }

        #readyText {
            font-size: 3em;
            color: #680426;
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
            color: #0a141a;
            text-align: right;
            margin: 0;
            /* padding: 10px; */
            /* background-color: #e1f5fe; */
            /* border-radius: 15px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); */
            line-height: 1.2em; 
            /* transition: transform 0.3s ease; */
        }

        #data {
            /* margin-top: 20px; */
            /* padding: 20px; */
            /* border: 3px dashed #00bcd4; */
            border-radius: 15px;
            background-color: #ffffff;
        }

        #equalSign {
            font-size: 4em;
            margin-top: 20px;
            color: #680426;
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

        footer a button {
            background-color: #f44336;
        }

        footer a button:hover {
            background-color: #d32f2f;
        }
        .badge {
    font-size: 1.1em;
    padding: 0.5em 0em;
    border-radius: 0.5em;
}
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
    <div class="container-fluid mt-3">
        <div class="info">

            <p class="info-text">{{ $CompetionRegiInfo->student_fullName ?? '' }}<br>
               Group-C <br>
               @if ($CompetionResult === 1)
               <span class="badge badge-primary text-warning ">
                   Congratulations! <br> You are the <br>
                   <i class="fas fa-trophy"></i> Champion
               </span>
           @elseif ($CompetionResult === 2)
               <span class="badge badge-success text-warning">
                   Congratulations!<br> You are the <br>
                   <i class="fas fa-medal"></i> 1st Runner-Up
               </span>
           @elseif ($CompetionResult === 3)
               <span class="badge badge-info text-warning">
                   Congratulations! <br> You are the <br>
                   <i class="fas fa-award"></i> 2nd Runner-Up
               </span>
           @elseif ($CompetionResult === 4)
               <span class="badge badge-warning text-warning">
                   Well done! <br> You are the <br>
                   <i class="fas fa-star"></i> Merit
               </span>
           @else
               {{-- <span class="badge badge-secondary text-muted">
                   Participation is the first step to success!
               </span> --}}
           @endif

           <br>
           <span class="message"></span>
           <br>
           <p class="text-danger">
            {!!$gameMessage->longDetails??''!!}
           </p>
            </p> 
        </div>
        <div class="timeshow">
            <div id="questionCount" class="question-count">Question: 0</div>
     
            <h3 id="readyText">Ready??</h3>
            <div id="data">
            </div>
            <h1 id="equalSign">=</h1>
            <input class="center-input text-center" type="number" id="answerInput" placeholder="Enter Result Here" />
            <p id="inputTimer"></p>
        </div>
    </div>
    <div class="container">

        <div class="modal fade" id="specialHistory" tabindex="-1" aria-labelledby="specialHistoryLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">History Group-C</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div id="specialHistoryData" class="container tab-pane active"><br>
                                <div class="row">
                                    <div id="historyContent_flash2" class="scrollspy-example"
                                        style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="Flash2ClearData"
                                            class="btn btn-sm btn-success px-4">History Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3 px-3">
                        <hr>
                        <div class="col-md-12 col-sm-12 text-end">
                            <button type="button" class="btn btn-sm btn-danger px-4"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <footer class="d-flex justify-content-center align-items-center" style="min-height: 100px; margin-top:10px">
            @if ($CompetitioButton->status == 1)
                <button type="button" class="btn btn-primary me-2 FlashHistory2 historybutton" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                <button type="button" class="btn btn-secondary me-2 startbutton" id="startGame">Start Game</button>
            @else
                <button type="button" class="btn btn-primary me-2 disabled FlashHistory2" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                <button type="button" class="btn btn-secondary me-2 disabled" id="startGame">Start Game</button>
            @endif
            <a href="{{ url('/') }}"><button type="button" class="btn btn-danger">Exit</button></a>
        </footer>
    </div>
    
    


<script>

$(document).ready(function() {
    let userId = {{ $CompetionRegiInfo->id ?? 'null' }};
    let conditionOfCompetition = {{ $CompetitioDatatable->status ?? 'null' }};
    let historyData = [];
    function speak(text) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        }
    }
    let FlashLevel6 = @json($FlashLevel6); 
    let specialIndex = 0;
    let decimalDigit = 2;
    let fontSize = 100;
    let countdownTimer;
    let timeLeft = 60; // in seconds
    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;
    let timeBetweenNumbers = 500; // Time interval between showing numbers (in ms)
    let sumRight = 0;
    let sumWrongs = 0;
    function startGame() {
        startCountdown();
        let Minus = 'Yes';
        let decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
        let soundValue = $('input[name="soundSystem"]:checked').val();
        $('#startGame').prop('disabled', true);
        $('#stop').prop('disabled', false);
        let sessionNumbers = [];
        userResults = []; 
        let totalScore = 0;

        function generateRandomNumber(dLength, decimalDigit, decimalNumberValue, Minus) {
            let min = Math.pow(10, dLength - 1);
            let max = Math.pow(10, dLength) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;

            if (Minus === 'Yes' && Math.random() < 0.5) {
                number *= -1;
            }

            if (decimalNumberValue === 'Yes') {
                let decimalValue = '';
                for (let i = 0; i < decimalDigit; i++) {
                    decimalValue += Math.floor(Math.random() * 10);
                }
                return `${number}.${decimalValue}`;
            }

            return number.toString().padStart(dLength, '0');
        }

        let questionCounter = 0;

        let inputTimer;
        let timeLeft = 60; 
        let timerPaused = false; 
        let currentTime = timeLeft; // To store current countdown time
        let remainingTime = currentTime; 
        function showNumbers(displayCount) {
            questionCounter++;
            $('#questionCount').text('Question: ' + questionCounter);

            if (specialIndex < FlashLevel6.length && timeLeft > 0) {
                let currentSettings = FlashLevel6[specialIndex];
                let dLength = currentSettings.num_length;
                let nDisplay = currentSettings.num_display - 1;
                let nRow = currentSettings.num_row;

                $('#data').empty();
                let loopSum = 0;
                let loopNumbers = [];
                let displayTextArray = [];

                pauseTimer(); 

                function displayNumber(i) {
                    if (i < nRow && timeLeft > 0) { 
                        let randomNumber;
                        let numDigits;

                        if (dLength == 1 - 2) {
                            numDigits = Math.random() < 0.5 ? 1 : 2; 
                        } else {
                            numDigits = dLength;
                        }

                        randomNumber = generateRandomNumber(numDigits, decimalDigit, decimalNumberValue, (i === 0 ? 'No' : Minus));
                        let numericValue = parseFloat(randomNumber);
                        if (loopSum + numericValue < 0) {
                            numericValue = Math.abs(numericValue);
                            randomNumber = numericValue.toString();
                        }

                        if (i > 0 && numericValue < 0 && (loopSum - Math.abs(numericValue)) < loopNumbers[loopNumbers.length - 1]) {
                            numericValue = Math.abs(numericValue);
                            randomNumber = numericValue.toString();
                        }

                        sessionNumbers.push(randomNumber);
                        loopSum += numericValue;
                        loopNumbers.push(numericValue);

                        let fontSizeValue = parseInt(fontSize);
                        let displayText = randomNumber.toString().replace('.', ' point ');
                        $('#data').html('<p style="font-size: ' + fontSizeValue + 'px;">' + displayText + '</p>').hide().fadeIn(100);

                        if (soundValue === 'Yes') {
                            speak(displayText);
                        }

                        displayTextArray.push(displayText);

                        setTimeout(() => {
                            $('#data').empty();
                            setTimeout(() => {
                                displayNumber(i + 1);
                            }, 800);
                        }, 800);

                    } else {
                        let minutes = Math.floor(timeLeft / 60);
                        let seconds = timeLeft % 60;
                        $('#inputTimer').text(` ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`); 
                        $('#inputTimer').show(); 
                        resumeTimer(); 
                        $('#answerInput').show().focus();
                        startInputCountdown(); 
                    }
                }

                function storeHistory(randomNumbers, loopSum, userAnswer) {
                    let storedHistory = JSON.parse(localStorage.getItem('gameHistoryFlash2')) || [];
                    storedHistory.push({
                        numbers: randomNumbers,
                        sum: loopSum,
                        userAnswer: userAnswer
                    });
                    localStorage.setItem('gameHistoryFlash2', JSON.stringify(storedHistory));
                }

                function startInputCountdown() {
                    clearInterval(inputTimer); 

                    inputTimer = setInterval(function () {
                        if (timerPaused) return; 
                        
                        if (timeLeft <= -1) {
                            clearInterval(inputTimer);
                            endGame(); 
                            return;
                        } else {
                            let minutes = Math.floor(timeLeft / 60);
                            let seconds = timeLeft % 60;
                            $('#inputTimer').text(` ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`); 
                            timeLeft--;
                        }
                    }, 1000);

                    $('#answerInput').off('keypress').on('keypress', function (e) {
                        if (e.which === 13) {
                            clearInterval(inputTimer); 
                            pauseTimer(); 
                            $('#inputTimer').text('');
                            
                            let userAnswer = $('#answerInput').val();
                            $('#answerInput').hide().val('');

                            storeHistory(displayTextArray, loopSum, userAnswer);
                            let rightans = (loopSum == userAnswer) ? 1 : 0;
                            let wrongans = (loopSum == userAnswer) ? 0 : 1;

                            sumRight += rightans;
                            sumWrongs += wrongans;

                         
                          

                            if (displayCount >= nDisplay) {
                                specialIndex++;
                                if (specialIndex < FlashLevel6.length) {
                                    showNumbers(0); // Move to the next row
                                } else {
                                    endGame(); // All rows are complete
                                }
                            } else if (timeLeft > 0) { 
                                showNumbers(displayCount + 1);
                                resumeTimer(); 
                            } else {
                                endGame(); 
                            }
                        }
                    });
                }

                displayNumber(0); 
            } else {
                endGame(); 
            }
        }


        function pauseTimer() {
            timerPaused = true; 
            clearInterval(inputTimer); 
        }

        function resumeTimer() {
            timerPaused = false; 
        }
        function startCountdown() {
      
     }


        function endGame() {
            clearInterval(countdownTimer);
            $('#equalSign').show();
            $('#abacus').show();
            $('#answerInput').hide();
            $('#readyText').show(); 
            $('#inputTimer').text('');
            $('#data').empty();
            $('#resultInput').show().focus();

            $('#startGame').prop('disabled', false); 
            $('#stop').prop('disabled', true);
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            let formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            let specialA2ExamDataUrl = "{{ route('update.flashexamdataA2') }}";

                            if (conditionOfCompetition == 0) {
                                $.ajax({
                                    url: specialA2ExamDataUrl,
                                    type: 'POST',
                                    data: {
                                        _token: $('meta[name="csrf-token"]').attr('content'),
                                        sumRight: sumRight,
                                        sumWrongs: sumWrongs,
                                        userId: userId,
                                        catId: 3,
                                        remainingTime: formattedTime
                                    },
                                    success: function (response) {
                                        localStorage.setItem('successMessage', response.message);
                                        location.reload();
                                    },
                                    error: function (xhr) {
                                        // Handle error
                                    }
                                });
                            }


            $('#resultInput').off('keypress').on('keypress', function(e) {
                if (e.which === 13) {
                    let userResult = parseFloat($('#resultInput').val());
                    $('#resultInput').hide().val('');
                    let totalScoreFormatted = decimalNumberValue === 'Yes' ? totalScore.toFixed(2) : totalScore.toFixed(0);
                    $('#resultScore').text(`Total Score: ${totalScoreFormatted}`);

                    if (soundValue === 'Yes') {
                        speak("equal");
                    }
                }
            });
        }

        $('#readyText').show();
        $('#abacus').hide();
        $('#equalSign').hide();
        if (soundValue === 'Yes') {
            speak("Ready?");
        }

        setTimeout(function() {
            $('#readyText').hide();
            showNumbers(0);
        }, 500);
    }
    $('#startGame').on('click', function() {
        specialIndex = 0;
        $('#historyContent_flash2').empty();
        timeLeft = 60; // Reset timeLeft for a new game
        startGame();
    });
    $('#startGame').prop('disabled', false);
    $('#Flash2ClearData').on('click', function() {
        if (confirm('Are you sure you want to clear the history data?')) {
        localStorage.removeItem('gameHistoryFlash2');
        $('#historyContent_flash2').empty();
        historyData = [];
        } else {
        }
    });
  
    $('.FlashHistory2').on('click', function() {
    let storedHistory = JSON.parse(localStorage.getItem('gameHistoryFlash2')) || [];

    if (storedHistory.length === 0) {
        // $('#historyContent_flash2').append('<p>No history found.</p>');
    } else {
    storedHistory.forEach((entry, index) => {
        $('#historyContent_flash2').append('<p><strong>Question ' + (index + 1) + ':</strong></p>');
        
        if (Array.isArray(entry.numbers)) {
            entry.numbers.forEach(num => {
                $('#historyContent_flash2').append('<p> ' + num + '</p>');
            });
        } else {
            $('#historyContent_flash2').append('<p>Random Number data is not available.</p>');
        }
        
        $('#historyContent_flash2').append('<p><strong>Sum:</strong> ' + entry.sum + '</p>');
        $('#historyContent_flash2').append('<p><strong>Your Answer:</strong> ' + entry.userAnswer + '</p><hr>');
    });
}


    $('#historyModal').modal('show');
});


});


$(document).ready(function() {
    let statusData = {{ $CompetionResult ?? 'null' }};
    if (statusData === 0 || statusData === 1 || statusData === 2 || statusData === 3 || statusData === 4) {
        // Disable the buttons
        $(".historybutton").prop("disabled", true);
        $(".startbutton").prop("disabled", true);
    }
});

$(document).ready(function() {
    let successMessage = localStorage.getItem('successMessage');
    if (successMessage) {
        $('.message').text(successMessage);
        // Clear the message from localStorage
        localStorage.removeItem('successMessage');
    }
});
</script>
</body>

</html>

