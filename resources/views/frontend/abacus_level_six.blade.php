@extends('layouts.visual_competitio')
@section('title', 'Category G Level 6')
@section('content')
    <div class="container-fluid mt-3">
        <div class="info">
            <p class="info-text">{{ $CompetionRegiInfo->student_fullName ?? '' }}<br>
                Category G Level 6 <br>
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
            <div id="digitalClock">05:00</div>

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
                        <h4 class="modal-title">History Category G Level 6</h4>
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
                                    <div id="historyContent_Level6" class="scrollspy-example"
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
                <button type="button" class="btn btn-primary me-2 competionHistoryLevel6 historybutton" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                <button type="button" class="btn btn-secondary me-2 startbutton" id="startGame">Start Game</button>
            @else
                <button type="button" class="btn btn-primary me-2 disabled competionHistoryLevel6" data-bs-toggle="modal" data-bs-target="#specialHistory" id="modalOpen">History</button>
                <button type="button" class="btn btn-secondary me-2 disabled" id="startGame">Start Game</button>
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
    let allarrydata = [];

    function speak(text) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(utterance);
        }
    }

    let CompetitionLevel6 = @json($CompetitionLevel6); 
    let specialIndex = 0;
    let decimalDigit = 2;
    let fontSize = 40;
    let countdownTimer;
    let gameDuration = GameTimeMinute * 60 * 1000;
    let currentTime = gameDuration; // To store current countdown time
    let remainingTime = currentTime; 
    let timeBetweenNumbers = 500; 
    let sumRight = 0;
    let sumWrongs = 0;
    function startGame() {
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

        function showNumbers(displayCount) {
            if (specialIndex < CompetitionLevel6.length && currentTime > 0) {
                let currentSettings = CompetitionLevel6[specialIndex];
                let dLength = currentSettings.num_length1;
                let dLength2 = currentSettings.num_length2; // Divider length
                let nRow = currentSettings.num_row;
                let nDisplay = currentSettings.num_display;
                let type = currentSettings.type;
                // let conditionNum = 2;
                let conditionNum = currentSettings.num_condition;
                if (displayCount === 0) {
                    displayCount = 1;
                }
                // Generate the index for the extra digit number
                let extraDigitIndex = -1;
                if (conditionNum == 2) {
                    extraDigitIndex = Math.floor(Math.random() * nRow);
                }
                $('#data').empty();
                let loopSum = 0;
                let loopNumbers = [];
                let displayTextArray = [];
                let totalResult;

                pauseTimer(); // Pause the timer before showing the next set of random numbers

                setTimeout(() => {
                    questionCounter++; // Increment the question counter
                    $('#questionCount').text('Question: ' + questionCounter); // Update the question count on the left side

                    switch (type) {
                        case 'plus':
                            totalResult = 0; // Initialize sum for addition

                            for (let i = 0; i < nRow; i++) {
                                let randomNumber;
                                let numDigits;

                                // Determine the number of digits
                                if (dLength == '1-2') {
                                    numDigits = Math.random() < 0.5 ? 1 : 2;
                                } else {
                                    numDigits = parseInt(dLength);
                                }

                                // Increase numDigits by 1 if conditionNum == 2 and i == extraDigitIndex
                                if (conditionNum == 2 && i == extraDigitIndex) {
                                    numDigits += 1;
                                }

                                randomNumber = generateRandomNumber(numDigits, decimalDigit, decimalNumberValue, (i === 0 ? 'No' : Minus));
                                let numericValue = parseFloat(randomNumber);

                                // Ensure the sum does not become negative
                                if (totalResult + numericValue < 0) {
                                    numericValue = Math.abs(numericValue);
                                    randomNumber = numericValue.toString();
                                }

                                if (i > 0 && numericValue < 0 && (totalResult - Math.abs(numericValue)) < loopNumbers[loopNumbers.length - 1]) {
                                    numericValue = Math.abs(numericValue);
                                    randomNumber = numericValue.toString();
                                }

                                sessionNumbers.push(randomNumber);
                                totalResult += numericValue;
                                loopNumbers.push(numericValue);

                                let fontSizeValue = parseInt(fontSize);
                                let displayText = randomNumber.toString().replace('.', ' point ');

                                $('#data').append('<p style="font-size: ' + fontSizeValue + 'px;">' + displayText + '</p>');
                                if (soundValue === 'Yes') {
                                    speak(displayText);
                                }

                                displayTextArray.push(displayText);
                            }

                            function storeHistory(displayTextArray, totalResult, userAnswer) {
                                let storedHistory = JSON.parse(localStorage.getItem('gameHistoryLevel6')) || [];
                                storedHistory.push({
                                    numbers: displayTextArray,  // Array of random numbers
                                    sum: totalResult,  // Sum of the numbers
                                    userAnswer: userAnswer  // User's answer
                                });
                                localStorage.setItem('gameHistoryLevel6', JSON.stringify(storedHistory));

                                // console.log('History Stored:', storedHistory); // Add this to verify storage
                            }

                            // Store in local storage
                            // storeHistory(type,  totalResult, null, displayTextArray); // user answer will be added later
                            break;

                        case 'multiply':
                            totalResult = 1; // Initialize product for multiplication

                            for (let i = 0; i < nRow; i++) {
                                let randomNumber1 = generateRandomNumber(dLength, decimalDigit, decimalNumberValue, 'No');
                                let randomNumber2 = generateRandomNumber(dLength2, decimalDigit, decimalNumberValue, 'No');

                                let numericValue1 = parseFloat(randomNumber1);
                                let numericValue2 = parseFloat(randomNumber2);

                                let product = numericValue1 * numericValue2;
                                totalResult *= product; // Accumulate product

                                let displayText = `${randomNumber1} x ${randomNumber2} = `;
                                $('#data').append('<p style="font-size: ' + parseInt(fontSize) + 'px;">' + displayText + '</p>');

                                displayTextArray.push(displayText);
                            }
                            function formatResult(result) {
                                return (result % 1 === 0) ? result : result.toFixed(2);
                            }

                            function storeHistory(displayTextArray, totalResult, userAnswer) {
                                    let storedHistory = JSON.parse(localStorage.getItem('gameHistoryLevel6')) || [];
                                    storedHistory.push({
                                        numbers: displayTextArray,  // Array of random numbers
                                        sum: formatResult(totalResult),  // Sum of the numbers
                                        userAnswer: userAnswer,  // User's answer
                                    });
                                    localStorage.setItem('gameHistoryLevel6', JSON.stringify(storedHistory));

                                    // console.log('History Stored:', storedHistory); // Add this to verify storage
                                }

                            // Store in local storage
                            // storeHistory(type,  totalResult, null, displayTextArray); // user answer will be added later
                            break;

                        case 'divide':
                            totalResult = 0; // Initialize result for division

                            for (let i = 0; i < nRow; i++) {
                                let randomNumber1 = generateRandomNumber(dLength, decimalDigit, decimalNumberValue, 'No');
                                let randomNumber2 = generateRandomNumber(dLength2, decimalDigit, decimalNumberValue, 'No');

                                let numericValue1 = parseFloat(randomNumber1);
                                let numericValue2 = parseFloat(randomNumber2);

                                if (numericValue2 === 0) {
                                    numericValue2 = 1; // Prevent division by zero
                                }

                                let divisionResult = numericValue1 / numericValue2;
                                 totalResult += divisionResult; 

                                let displayText = `${randomNumber1} ÷ ${randomNumber2} = `;
                                $('#data').append('<p style="font-size: ' + parseInt(fontSize) + 'px;">' + displayText + '</p>');

                                displayTextArray.push(displayText);
                            }
                            function formatResult(result) {
                                return (result % 1 === 0) ? result : result.toFixed(2);
                            }

                            function storeHistory(displayTextArray, totalResult, userAnswer){
                                    let storedHistory = JSON.parse(localStorage.getItem('gameHistoryLevel6')) || [];
                                    storedHistory.push({
                                        numbers: displayTextArray,  // Array of random numbers
                                        sum: formatResult(totalResult),  // Sum of the numbers
                                        userAnswer: userAnswer,  // User's answer
                                    });
                                    localStorage.setItem('gameHistoryLevel6', JSON.stringify(storedHistory));

                                    // console.log('History Stored:', storedHistory); // Add this to verify storage
                                }

                            // Store in local storage
                            // storeHistory(type,  totalResult, null,displayTextArray); // user answer will be added later
                            break;

                        default:
                            // console.error('Invalid operation type');
                            return;
                    }

                    $('#answerInput').show().focus();

                    $('#answerInput').off('keypress').on('keypress', function(e) {
                        if (e.which === 13) {
                            let userAnswer = $('#answerInput').val();
                            $('#answerInput').hide().val('');
                            // $('#historyContent_special').append('<p>User Input: ' + userAnswer + '</p><hr>');
                            // storeHistory(totalResult,loopSum, userAnswer,displayTextArray,type)
                            storeHistory(displayTextArray, totalResult, userAnswer);
                            // Update history entry with user answer
                            // updateLastHistoryEntry(userAnswer);
                            let rightans = (totalResult == userAnswer) ? 1 : 0;
                            let wrongans = (totalResult == userAnswer) ? 0 : 1;

                            sumRight += rightans;
                            sumWrongs += wrongans;
                            // let allarrydata = JSON.stringify(displayTextArray) + ' Result = ' + totalResult + ' User Input ==> ' + userAnswer;
                            // let rightans = (totalResult == userAnswer) ? 1 : null;
                            // let wrongans = (totalResult == userAnswer) ? null : 1;

                           
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
            clearInterval(countdownTimer); 
        }

        function resumeTimer() {
            let endTime = Date.now() + currentTime;
            countdownTimer = setInterval(function() {
                let timeLeft = endTime - Date.now();
                currentTime = timeLeft;

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
            $('#data').empty();
            $('#resultInput').show().focus();
            $('#startGame').prop('disabled', false);

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

            if (conditionOfCompetition == 0) {
                                $.ajax({
                                    url: "{{ route('update.examdataA2') }}", // Route to handle the update
                                    type: 'POST',
                                    data: {
                                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for security
                                        sumRight: sumRight,
                                        sumWrongs: sumWrongs,
                                        userId: userId,
                                        catId: 9,
                                        remainingTime: `${totalMinutes}:${totalSeconds < 10 ? '0' : ''}${totalSeconds}` // Send formatted remaining time
                                    },
                                    success: function(response) {
                                        localStorage.setItem('successMessage', response.message);
                                        location.reload();
                                    },
                                    error: function(xhr) {
                                        // console.error('Error sending data:', xhr.responseText); // Log error response
                                    }
                                });
                            } else {
                                // console.log('Competition status is not 1, data will not be sent.');
                            }

            $('#resultInput').off('keypress').on('keypress', function(e) {
                if (e.which === 13) {
                    let userResult = parseFloat($('#resultInput').val());
                    $('#resultInput').hide().val('');

                    $('#resultScore').text(`Total Score: ${totalScore}`);

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
        // $('#historyContent_special').empty();
        currentTime = gameDuration; 
        startGame();
    });

    $('#specialClearData').on('click', function() {
        localStorage.removeItem('gameHistoryLevel6');
        $('#historyContent_Level6').empty();
        historyData = [];
        alert('History cleared!');
    });
    $('.competionHistoryLevel6').on('click', function() {
    let storedHistory = JSON.parse(localStorage.getItem('gameHistoryLevel6')) || [];

    // Clear previous history content
    // $('#historyContent_Level6').empty();

    if (storedHistory.length === 0) {
        // $('#historyContent_Level6').append('<p>No history found.</p>');
    } else {
    storedHistory.forEach((entry, index) => {
        $('#historyContent_Level6').append('<p><strong>Question ' + (index + 1) + ':</strong></p>');
        
        if (Array.isArray(entry.numbers)) {
            entry.numbers.forEach(numbers => {
                $('#historyContent_Level6').append('<p> ' + numbers + '</p>');
            });
        } else {
            $('#historyContent_Level6').append('<p>Random Number data is not available.</p>');
        }
        
        $('#historyContent_Level6').append('<p><strong>Result:</strong> ' + entry.sum + '</p>');
        $('#historyContent_Level6').append('<p><strong>Your Answer:</strong> ' + entry.userAnswer + '</p><hr>');
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