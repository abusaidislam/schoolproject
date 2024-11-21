<!DOCTYPE html>
<html lang="en">

<head>
    <title>Abacus Math Bangladesh Competition Game</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{--
    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('public/abacus_app_assets/style.css') }}">
    <script src="{{ asset('public/abacus_app_assets/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('public/abacus_app_assets/bootstrap.bundle.min.js') }}"></script> --}}
    <style>
        body {
            background-color: #e0f7fa;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
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
            margin: 50px auto;
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
            transition: transform 0.3s ease;
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

        .modal-header,
        .modal-body,
        .modal-footer {
            background-color: #f0f4c3;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="timeshow">
            <!-- Question count display -->
            <div id="questionCount" class="question-count">Question: 0</div>
            <!-- Digital clock -->
            <div id="inputTimer"></div>
            {{-- <div id="inputTimer"></div> --}}


            <!-- Ready text with animation -->
            <h3 id="readyText">Ready??</h3>

            <!-- Numbers display section -->
            <div id="data">
                <!-- Numbers will be dynamically added here -->

            </div>

            <!-- Equal sign -->
            <h1 id="equalSign">=</h1>

            <!-- Answer input box -->
            <input class="center-input text-center" type="number" id="answerInput" placeholder="Enter Result Here" />
        </div>
    </div>
    <div class="container">

        <div class="modal fade" id="specialHistory" tabindex="-1" aria-labelledby="specialHistoryLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">History Group-A</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Nav tabs -->
              
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="specialHistoryData" class="container tab-pane active"><br>
                                <div class="row">
                                    <!-- Modal Body -->
                                    <div id="historyContent_special" class="scrollspy-example"
                                        style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="specialClearData"
                                            class="btn btn-sm btn-success px-4">History Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Close Button -->
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
        <footer class="d-flex justify-content-center align-items-center" style="min-height: 100px; margin-top:-40px">
            @if ($CompetitioButton->status == 1)
                <button type="button" class="btn btn-primary me-2 competionHistory" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                <button type="button" class="btn btn-secondary me-2" id="startGame">Start Game</button>
            @else
                <button type="button" class="btn btn-primary me-2 disabled competionHistory" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
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

    let FlashLevel1 = @json($FlashLevel1); // Make sure this is outputting a valid JSON array
    let specialIndex = 0;
    let decimalDigit = 2;
    let fontSize = 100;
    let countdownTimer;
    // let gameDuration = 5 * 60 * 1000; // 5 minutes
    // let currentTime = gameDuration; // To store current countdown time
    let timeBetweenNumbers = 500; // Time interval between showing numbers (in ms)

    function startGame() {
        let Minus = 'Yes';
        let decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
        let soundValue = $('input[name="soundSystem"]:checked').val();

        $('#startGame').prop('disabled', true);
        $('#stop').prop('disabled', false);

        let sessionNumbers = [];
        userResults = []; // Reinitialize the array each time the game starts
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

        let questionCounter = 0; // Initialize question counter


        function showNumbers(displayCount) {
                 questionCounter++; // Increment the question counter
                    $('#questionCount').text('Question: ' + questionCounter);
            if (specialIndex < FlashLevel1.length ) {
                let currentSettings = FlashLevel1[specialIndex];
                let dLength = currentSettings.num_length;
                let nDisplay = currentSettings.num_display - 1;
                let nRow = currentSettings.num_row;

                $('#data').empty();
                let loopSum = 0;
                let loopNumbers = [];
                let displayTextArray = [];
                let inputTimer; // Declare a variable to hold the input timer

                pauseTimer(); // Pause the timer before showing the next set of random numbers

                function displayNumber(i) {
                   
                    if (i < nRow) {
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
                        // Fade in the display text
                        $('#data').html('<p style="font-size: ' + fontSizeValue + 'px;">' + displayText + '</p>').hide().fadeIn(500);

                        if (soundValue === 'Yes') {
                            speak(displayText);
                        }

                        displayTextArray.push(displayText);

                        // Fade out the text after 1.5 seconds, then show the next number
                        setTimeout(() => {
                            $('#data').fadeOut(200, function() {
                                $('#data').empty(); // Clear the text after fading out
                                displayNumber(i + 1); // Show the next number
                            });
                        }, 1500); // Display each number for 1.5 seconds before fading out
                    } else {
                        $('#answerInput').show().focus(); // After all numbers are shown, display the input box
                        $('#inputTimer').show(); // Show the input timer
                        startInputCountdown(); // Start the countdown timer for the input box
                    }
                }

                function startInputCountdown() {
               
                    let timeLeft = 60; // 1 minute countdown for user input
                    inputTimer = setInterval(function() {
                        if (timeLeft <= 0) {
                            clearInterval(inputTimer); // Clear the timer when it reaches 0
                            // alert('Time is up! The game will now end.'); // Alert the user
                            $('#answerInput').hide(); // Hide input box after time is up
                            $('#inputTimer').text('');
                            $('#inputTimer').hide(); // Hide the timer
                            $('#equalSign').show(); // Show equal sign after game ends
                            $('#readyText').show(); // Show ready text after game ends
                            $('#startGame').prop('disabled', false); // Enable "Start Game" button
                            // Additional game over logic can be placed here, if needed
                            return; // Exit the timer function
                        } else {
                            let minutes = Math.floor(timeLeft / 60);
                            let seconds = timeLeft % 60;
                            $('#inputTimer').text(` ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`); // Update timer display
                            timeLeft--;
                        }
                    }, 1000); // Update the countdown every second

                    function storeHistory(randomNumbers, loopSum, userAnswer) {
                        let storedHistory = JSON.parse(localStorage.getItem('gameHistory')) || [];
                        storedHistory.push({
                            numbers: randomNumbers,  // Array of random numbers
                            sum: loopSum,  // Sum of the numbers
                            userAnswer: userAnswer  // User's answer
                        });
                        localStorage.setItem('gameHistory', JSON.stringify(storedHistory));

                        // console.log('History Stored:', storedHistory); // Add this to verify storage
                    }

                    $('#answerInput').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            clearInterval(inputTimer); // Clear the input timer
                            let userAnswer = $('#answerInput').val();
                            $('#answerInput').hide().val(''); // Clear the input box
                            $('#inputTimer').text('');
                            $('#inputTimer').hide(); // Hide the timer after answer submission
                            storeHistory(displayTextArray, loopSum, userAnswer); // Store history after the user answers

                            let allarrydata = JSON.stringify(displayTextArray) + ' sum = ' + loopSum + ' user input ==> ' + userAnswer;
                            let rightans = (loopSum == userAnswer) ? 1 : null;
                            let wrongans = (loopSum == userAnswer) ? null : 1;

                            var specialA2ExamDataUrl = "{{ route('update.examdataA2') }}";
                            if (conditionOfCompetition == 0) {
                                $.ajax({
                                    url: specialA2ExamDataUrl,
                                    type: 'POST',
                                    data: {
                                        _token: $('meta[name="csrf-token"]').attr('content'),
                                        allarrydata: allarrydata,
                                        rightans: rightans,
                                        wrongans: wrongans,
                                        userId: userId,
                                        catId: 1,
                                    },
                                    success: function(response) {
                                        // Handle success
                                    },
                                    error: function(xhr) {
                                        // Handle error
                                    }
                                });
                            }

                            if (displayCount >= nDisplay) {
                                specialIndex++;
                                // questionCounter++; // Increment the question counter when all numbers are processed
                                // console.log('Question Count:', questionCounter); // Log the question counter
                                showNumbers(0); // Reset for a new round
                            } else {
                                showNumbers(displayCount + 1); // Move to the next set of numbers
                                timeLeft = 60; // Reset the countdown for the next input round
                            }
                        }
                    });
                }


                displayNumber(0); // Start showing numbers from the first one
            } else {
                endGame();
            }
        }





        function pauseTimer() {
            clearInterval(countdownTimer); // Stop the current timer
        }

        function endGame() {
            clearInterval(countdownTimer);
            $('#equalSign').show();
            $('#abacus').show();
            $('#answerInput').hide();
            $('#data').empty(); // Clear data container
            $('#resultInput').show().focus();

            $('#startGame').prop('disabled', false); // Enable "Start Game" button
            $('#stop').prop('disabled', true);

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

        // Initial setup before game starts
        $('#readyText').show();
        $('#abacus').hide();
        $('#equalSign').hide();
        if (soundValue === 'Yes') {
            speak("Ready?");
        }

        // let endTime = Date.now() + gameDuration;
        // countdownTimer = setInterval(function() {
        //     let timeLeft = endTime - Date.now();
        //     if (timeLeft <= 0) {
        //         clearInterval(countdownTimer);
        //         endGame();
        //     } else {
        //         let minutes = Math.floor(timeLeft / 60000);
        //         let seconds = Math.floor((timeLeft % 60000) / 1000);
        //         $('#digitalClock').text(`${minutes}:${seconds < 10 ? '0' : ''}${seconds}`);
        //     }
        // }, 500);

        setTimeout(function() {
            $('#readyText').hide();
            showNumbers(0);
        }, 500);
    }
    $('#startGame').on('click', function() {
        specialIndex = 0;
        $('#historyContent_special').empty();
        // currentTime = gameDuration;
        startGame();
    });
    $('#startGame').prop('disabled', false);
    $('#specialClearData').on('click', function() {
        localStorage.removeItem('gameHistory');
        $('#historyContent_special').empty();
        historyData = [];
        alert('History cleared!');
    });

    $('.competionHistory').on('click', function() {
    let storedHistory = JSON.parse(localStorage.getItem('gameHistory')) || [];

    // Clear previous history content
    // $('#historyContent_special').empty();

    if (storedHistory.length === 0) {
        $('#historyContent_special').append('<p>No history found.</p>');
    } else {
    storedHistory.forEach((entry, index) => {
        $('#historyContent_special').append('<p><strong>Question ' + (index + 1) + ':</strong></p>');
        
        if (Array.isArray(entry.numbers)) {
            entry.numbers.forEach(num => {
                $('#historyContent_special').append('<p> ' + num + '</p>');
            });
        } else {
            $('#historyContent_special').append('<p>Random Number data is not available.</p>');
        }
        
        $('#historyContent_special').append('<p><strong>Sum:</strong> ' + entry.sum + '</p>');
        $('#historyContent_special').append('<p><strong>Your Answer:</strong> ' + entry.userAnswer + '</p><hr>');
    });
}


    $('#historyModal').modal('show');
});


});


</script>
</body>

</html>