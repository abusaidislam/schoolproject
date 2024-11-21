@extends('layouts.visual_competitio')
@section('title', 'Category A1 Special Category')
@section('content')
    <div class="container-fluid mt-3">
        <div class="info">
            <p class="info-text">{{ $CompetionRegiInfo->student_fullName ?? '' }}<br>
                Category A1 Special Category <br>                                                  
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
            @endif
            <br>
            <span class="message"></span>
            <br>
            <!-- View Button -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#messageModal" id="viewMessageButton">
                <i class="fas fa-eye"></i> Notice View
            </button>
            </p> 
        </div>
        <div class="timeshow">
            <!-- Question count display -->
            <div id="questionCount" class="question-count">Question: 0</div>
            <!-- Digital clock -->
            <div id="digitalClock">{{ $GameTimeInfo->game_time ?? '5' }}:00</div>

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
                        <h4 class="modal-title">History Category A1 Special Category</h4>
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
                                    <div id="historyContent_speciala1" class="scrollspy-example"
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
        <footer class="d-flex justify-content-center align-items-center" style="min-height: 100px; margin-top:10px">

            @if ($CompetitioButton->status == 1)

                    <button type="button" class="btn btn-primary me-2 competionHistory historybutton" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                    <button type="button" class="btn btn-secondary me-2 startbutton" id="startGame">Start Game</button>
              
            @else
                <button type="button" class="btn btn-primary me-2 competionHistory disabled" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen" disabled>History</button>
                <button type="button" class="btn btn-secondary me-2 disabled" id="startGame" disabled>Start Game</button>
            @endif
            <a href="{{ url('/') }}"><button type="button" class="btn btn-danger">Exit</button></a>
        </footer>
        
    </div>
    
    

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Notice Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger" id="modalMessageContent" style="text-align: justify"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closebuttonmessage"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
 

$(document).ready(function() {

    let userId = {{ $CompetionRegiInfo->id ?? 'null' }};
    let GameTimeMinute = {{ $GameTimeInfo->game_time ?? '5' }};
    let conditionOfCompetition = {{ $CompetitioDatatable->status ?? 'null' }};
    let historyData = [];

    function speak(text) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        }
    }

    let SpacialCategoryA1 = @json($SpacialCategoryA1); // Make sure this is outputting a valid JSON array
    let specialIndex = 0;
    let decimalDigit = 2;
    let fontSize = 40;
    let countdownTimer;
    let gameDuration = GameTimeMinute * 60 * 1000; // 5 minutes
    let currentTime = gameDuration; // To store current countdown time
    let remainingTime = currentTime; 
    let timeBetweenNumbers = 500; // Time interval between showing numbers (in ms)
    let sumRight = 0;
    let sumWrongs = 0;
    function startGame() {

        let Minus = 'No';
        let decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
        let soundValue = $('input[name="soundSystem"]:checked').val();

 
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
            if (specialIndex < SpacialCategoryA1.length && currentTime > 0) {
                let currentSettings = SpacialCategoryA1[specialIndex];
                let dLength = currentSettings.num_length;
                let nDisplay = currentSettings.num_display;
                let nRow = currentSettings.num_row;

                
                if (displayCount === 0) {
                    displayCount = 1;
                }

                $('#data').empty();
                let loopSum = 0;
                let loopNumbers = [];
                let displayTextArray = [];

                pauseTimer(); // Pause the timer before showing the next set of random numbers

                setTimeout(() => {
                    questionCounter++; // Increment the question counter
                    $('#questionCount').text('Question: ' + questionCounter); // Update the question count on the left side

                    for (let i = 0; i < nRow; i++) {
                        let randomNumber;
                        let numDigits;

                        if (dLength == 1-2) {
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

                        $('#data').append('<p style="font-size: ' + fontSizeValue + 'px;">' + displayText + '</p>');
                        if (soundValue === 'Yes') {
                            speak(displayText);
                        }

                        displayTextArray.push(displayText);
                        // $('#historyContent_speciala1').append('<p> random ' + displayText + '</p>');
                    }

                    // $('#historyContent_speciala1').append('<p>sum = : ' + loopSum + '</p><hr>');
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


             

                    $('#answerInput').show().focus();

                    $('#answerInput').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            let userAnswer = $('#answerInput').val();
                            $('#answerInput').hide().val('');
                            storeHistory(displayTextArray, loopSum, userAnswer);

                            let rightans = (loopSum == userAnswer) ? 1 : 0;
                            let wrongans = (loopSum == userAnswer) ? 0 : 1;

                            sumRight += rightans;
                            sumWrongs += wrongans;

                            if (displayCount >= nDisplay) {
                                specialIndex++;
                                showNumbers(0);
                            } else {
                                showNumbers(displayCount + 1);
                            }
                        }
                    });

                    resumeTimer();
                }, timeBetweenNumbers);
            } else {
                endGame();
            }
        }



        function pauseTimer() {
            clearInterval(countdownTimer); // Stop the current timer
        }

        function resumeTimer() {
            let endTime = Date.now() + currentTime;
            countdownTimer = setInterval(function() {
                let timeLeft = endTime - Date.now();
                currentTime = timeLeft; // Update the current time left

                if (timeLeft <= 0) {
                    clearInterval(countdownTimer);
                    endGame();
                } else {
                    let minutes = Math.floor(timeLeft / 60000);
                    let seconds = Math.floor((timeLeft % 60000) / 1000);
                    $('#digitalClock').text(`${minutes}:${seconds < 10 ? '0' : ''}${seconds}`);
                }
            }, 500);
        }

        function endGame() {
            clearInterval(countdownTimer);
            $('#equalSign').show();
            $('#abacus').show();
            $('#answerInput').hide();
            $('#data').empty(); // Clear the data container to stop showing random numbers
            $('#resultInput').show().focus();
            $('#startGame').prop('disabled', false);

         
            //         // Calculate the elapsed time
            // let elapsedTime = gameDuration - remainingTime; 

            // // Calculate remaining minutes and seconds
            let gameMinit = Math.floor(gameDuration / 60000);
            let gameSecond = Math.floor((gameDuration % 60000) / 1000);

            let remainingTime = currentTime; // Capture remaining time in milliseconds
            let remainingMinutes = Math.floor(remainingTime / 60000);
            let remainingSeconds = Math.floor((remainingTime % 60000) / 1000);

           // Calculate the difference between game time and remaining time
            let totalMinutes = gameMinit - remainingMinutes;
            let totalSeconds = gameSecond - remainingSeconds;

            // Adjust for cases where seconds go negative
            if (totalSeconds < 0) {
                totalMinutes -= 1;
                totalSeconds += 60;
            }

            var specialA2ExamDataUrl = "{{ route('update.examdataA2') }}";
            if (conditionOfCompetition == 0) {
                $.ajax({
                    url: specialA2ExamDataUrl,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        sumRight: sumRight,
                        sumWrongs: sumWrongs,
                        userId: userId,
                        catId: 1,
                        remainingTime: `${totalMinutes}:${totalSeconds < 10 ? '0' : ''}${totalSeconds}` // Send formatted remaining time
                    },
                    success: function(response) {
                        localStorage.setItem('successMessage', response.message);
                        location.reload();
                    },
                    error: function(xhr) {
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

                    $('#startGame').prop('disabled', false);
                    $('#stop').prop('disabled', true);

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

        let endTime = Date.now() + gameDuration;
        countdownTimer = setInterval(function() {
            let timeLeft = endTime - Date.now();
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                endGame();
            } else {
                let minutes = Math.floor(timeLeft / 60000);
                let seconds = Math.floor((timeLeft % 60000) / 1000);
                $('#digitalClock').text(`${minutes}:${seconds < 10 ? '0' : ''}${seconds}`);
            }
        }, 500);

        setTimeout(function() {
            $('#readyText').hide();
            showNumbers(0);
        }, 500);
    }
    $('#startGame').on('click', function() {
        specialIndex = 0;
        $('#historyContent_speciala1').empty();
        currentTime = gameDuration;
        startGame();
    });

    $('#specialClearData').on('click', function() {
        localStorage.removeItem('gameHistory');
        $('#historyContent_speciala1').empty();
        historyData = [];
        alert('History cleared!');
    });

    $('.competionHistory').on('click', function() {
    let storedHistory = JSON.parse(localStorage.getItem('gameHistory')) || [];

    // Clear previous history content
    // $('#historyContent_speciala1').empty();

    if (storedHistory.length === 0) {
        $('#historyContent_speciala1').append('<p>No history found.</p>');
    } else {
    storedHistory.forEach((entry, index) => {
        $('#historyContent_speciala1').append('<p><strong>Question ' + (index + 1) + ':</strong></p>');
        
        if (Array.isArray(entry.numbers)) {
            entry.numbers.forEach(num => {
                $('#historyContent_speciala1').append('<p> ' + num + '</p>');
            });
        } else {
            $('#historyContent_speciala1').append('<p>Random Number data is not available.</p>');
        }
        
        $('#historyContent_speciala1').append('<p><strong>Sum:</strong> ' + entry.sum + '</p>');
        $('#historyContent_speciala1').append('<p><strong>Your Answer:</strong> ' + entry.userAnswer + '</p><hr>');
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
document.addEventListener("DOMContentLoaded", function () {
    const viewMessageButton = document.getElementById("viewMessageButton");
    const modalMessageContent = document.getElementById("modalMessageContent");
    const gameMessage = `{!! $gameMessage->longDetails ?? '' !!}`;
    viewMessageButton.addEventListener("click", function () {
        modalMessageContent.innerHTML = gameMessage;
    });
    const closeButton = document.getElementById("closebuttonmessage");
    closeButton.addEventListener("click", function () {
        const modal = bootstrap.Modal.getInstance(document.getElementById("messageModal"));
        modal.hide();
    });
});
</script>
@endsection
