$(document).ready(function() {
    let historyData = JSON.parse(localStorage.getItem('historyData')) || [];
    let isGameActive = false;
    let stopRequested = false;
    let lastNumberWasNegative = false;
    let isFirstNumber = true;
    let continueBackground = false; // Add this flag to continue generating data in the background

    function updateHistory() {
        let historyHtml = '';
        historyData.forEach((entry) => {
            let totalScoreWithDecimal = entry.numbers.reduce((acc, curr) => acc + parseFloat(curr), 0);
            let totalScoreFormatted = entry.decimalNumberValue === 'Yes' ? totalScoreWithDecimal.toFixed(2) : totalScoreWithDecimal.toFixed(0);

            historyHtml += `<p>Quiz Type: FLASH</p>
                            <p>Date: ${new Date(entry.date).toLocaleString()}</p>
                            <p>Total Score: ${totalScoreFormatted}</p>`;
            entry.numbers.forEach(number => {
                historyHtml += `${number}<br>`;
            });
            historyHtml += '<br>';
        });
        $('#historyContent_flash').html(historyHtml);
        localStorage.setItem('historyData', JSON.stringify(historyData));
    }

    function speak(text, callback) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text);
            utterance.onend = callback;
            speechSynthesis.speak(utterance);
        } else {
            callback();
        }
    }

    $('#startGame').on('click', function() {
        if (isGameActive) return;

        isGameActive = true;
        stopRequested = false;
        lastNumberWasNegative = false;
        isFirstNumber = true;
        continueBackground = true; // Reset this flag

        $('#data').show().empty();
        $('#resultScore').empty();
        $('#equalSign').hide();
        $('#abacus').hide();

        let dLength = $('#dlength').val();
        let nDisplay = $('#ndisplay').val();
        let nRow = $('#nrow').val();
        let gametimeValues = $('#gametime').val().split(',');
        let gametime = parseInt(gametimeValues[0]);
        let intervalTime = parseInt(gametimeValues[1]);
        let decimalDigit = $('#decimal').val();
        let fontSize = $('#fontSize').val();
        let Minus = $('input[name="minusNumber"]:checked').val();
        let decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
        let soundValue = $('input[name="soundSystem"]:checked').val();

        $('#equalSign').attr('style', 'font-size: ' + fontSize + 'px !important;');
        $('#startGame').prop('disabled', true);
        $('#startMultiplyGame').prop('disabled', true);
        $('#startDivisionGame').prop('disabled', true);
        $('#startBeadsGame').prop('disabled', true);
        $('#stop').prop('disabled', false);

        let sessionNumbers = [];
        let totalScore = 0;

        function generateRandomNumber(length, decimalLength, decimalNumberValue, Minus) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;

            if (isFirstNumber) {
                number = Math.abs(number);
                isFirstNumber = false;
            } else if (Minus === 'Yes' && Math.random() < 0.5 && !lastNumberWasNegative) {
                number *= -1;
                lastNumberWasNegative = true;
            } else {
                lastNumberWasNegative = false;
            }

            if (decimalNumberValue === 'Yes') {
                let decimalValue = '';
                for (let i = 0; i < decimalLength; i++) {
                    decimalValue += Math.floor(Math.random() * 10);
                }
                return `${number}.${decimalValue}`;
            }

            return number.toString().padStart(length, '0');
        }

        function FlashStartGame() {
            $('#readyText').show();
            $('#abacus').hide();
            $('#equalSign').hide();
            if (soundValue === 'Yes') {
                speak("Ready?", function() {
                    setTimeout(function() {
                        if (!stopRequested) {
                            $('#readyText').hide();
                            showNumbers(0);
                        }
                    }, gametime);
                });
            } else {
                setTimeout(function() {
                    if (!stopRequested) {
                        $('#readyText').hide();
                        showNumbers(0);
                    }
                }, gametime);
            }
        }

        function showNumbers(displayCount) {
            if (displayCount < nDisplay && !stopRequested) {
                $('#data').empty();
                let speakCount = 0;

                function speakNextNumber() {
                    if (speakCount < nRow && !stopRequested) {
                        let randomNumber = generateRandomNumber(dLength, decimalDigit, decimalNumberValue, Minus);
                        sessionNumbers.push(randomNumber);
                        totalScore += parseFloat(randomNumber);
                        let fontSizeValue = parseInt(fontSize);
                        let displayText = randomNumber.toString().replace('.', '.');

                        if (!stopRequested) {
                            $('#data').append('<p style="font-size: ' + fontSizeValue + 'px;">' + displayText + '</p>');
                        }

                        if (soundValue === 'Yes') {
                            let numberText = randomNumber < 0 ? `minus ${Math.abs(randomNumber)}` : `plus ${randomNumber}`;
                            speak(numberText, function() {
                                speakCount++;
                                speakNextNumber();
                            });
                        } else {
                            speakCount++;
                            speakNextNumber();
                        }
                    } else {
                        setTimeout(function() {
                            if (!stopRequested) {
                                $('#data').empty();
                                setTimeout(function() {
                                    showNumbers(displayCount + 1);
                                }, intervalTime);
                            } else if (continueBackground) {
                                // Continue in the background
                                for (let i = speakCount; i < nRow; i++) {
                                    let randomNumber = generateRandomNumber(dLength, decimalDigit, decimalNumberValue, Minus);
                                    sessionNumbers.push(randomNumber);
                                    totalScore += parseFloat(randomNumber);
                                }
                                completeGame();
                            }
                        }, gametime);
                    }
                }

                speakNextNumber();
            } else if (!stopRequested) {
                completeGame();
            }
        }

        function completeGame() {
            $('#equalSign').show();
            $('#abacus').hide();
            historyData.push({
                date: new Date(),
                numbers: sessionNumbers,
                score: totalScore,
                decimalNumberValue: decimalNumberValue
            });
            updateHistory();

            let totalScoreFormatted = decimalNumberValue === 'Yes' ? totalScore.toFixed(2) : totalScore.toFixed(0);
            $('#resultScore').html(`<p style="font-size: ${fontSize}px;">${totalScoreFormatted}</p>`);
            $('#startGame').prop('disabled', false);
            $('#startMultiplyGame').prop('disabled', false);
            $('#startDivisionGame').prop('disabled', false);
            $('#startBeadsGame').prop('disabled', false);
            $('#stop').prop('disabled', true);

            if (soundValue === 'Yes') {
                speak("equal");
            }

            isGameActive = false;
            continueBackground = false; // Reset the background continuation flag
        }

        FlashStartGame();
    });

    $('#flashClearData').on('click', function() {
        localStorage.removeItem('historyData');
        $('#historyContent_flash').empty();
        historyData = [];
    });

    $('#flashHistory').on('click', function() {
        updateHistory();
    });

    updateHistory();

    $('#stop').on('click', function() {
        if (isGameActive) {
            stopRequested = true;

            $('#startGame').prop('disabled', false);
            $('#startMultiplyGame').prop('disabled', false);
            $('#startDivisionGame').prop('disabled', false);
            $('#startBeadsGame').prop('disabled', false);
            $('#stop').prop('disabled', true);

            $('#data').hide();
            $('#abacusContainer').hide();
            $('#abacus').hide();
            $('#equalSign').show();

            if (window.speechSynthesis) {
                window.speechSynthesis.cancel();
            }

            isGameActive = false;

            // Complete the game to ensure history is saved
            completeGame();
        }
    });
});



/// Multiply Game Start /////
$(document).ready(function() {
    let historyDataMulti = JSON.parse(localStorage.getItem('historyDataMulti')) || [];
    let isGameActive = false; // Track if the game is active or not

    function updateHistoryMulti() {
        let historyHtmlMulti = '';
        historyDataMulti.forEach((entry) => {
            let totalScoreWithDecimal = entry.numbers.reduce((acc, curr) => acc + parseFloat(curr.product), 0);
            let totalScoreFormatted = entry.multiplydecimalNumberValue === 'Yes' ? totalScoreWithDecimal.toFixed(2) : totalScoreWithDecimal.toFixed(0);

            historyHtmlMulti += `<p>Quiz Type: MULTIPLICATION</p>
                            <p>Date: ${new Date(entry.date).toLocaleString()}</p>`;
            entry.numbers.forEach(number => {
                let formattedProduct = parseFloat(number.product).toString().match(/^-?\d+(?:\.\d{0,5})?/)[0];
                historyHtmlMulti += `${number.multiplier} x ${number.multiplicand} = ${formattedProduct}<br>`;
            });
            historyHtmlMulti += '<br>';
        });
        $('#historyContent_multi').html(historyHtmlMulti);
        localStorage.setItem('historyDataMulti', JSON.stringify(historyDataMulti));
    }

    function speak(text, callback) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text.replace(" x ", " multiply "));
            utterance.onend = callback;
            speechSynthesis.speak(utterance);
        } else {
            callback();
        }
    }

    $('#startMultiplyGame').on('click', function() {
        if (isGameActive) return; // Prevent starting a new game if one is already active

        isGameActive = true; // Mark the game as active

        // Reset UI elements
        $('#data').show().empty(); // Ensure #data is visible and empty
        $('#resultScore').empty();
        $('#equalSign').hide();
        $('#abacus').hide();

        let dLength1 = $('#multiplier').val();
        let dLength2 = $('#multiplicand').val();
        let nDisplay = $('#multi_ndisplay').val();
        let multiplynRow = $('#multiplay_nrow').val();
        let multiplyGametimeValues = $('#gametime').val().split(',');
        let multiplyGametime = parseInt(multiplyGametimeValues[0]);
        let multiplyintervalTime = parseInt(multiplyGametimeValues[1]);
        let multiplydecimalDigit = $('#multiply_dlent').val();
        let multiplyfontSize = $('#multiply_fontSize').val();
        let multiplydecimalNumberValue = $('input[name="multiply_decimalNumber"]:checked').val();
        let multiplaysoundValue = $('input[name="multiply_soundSystem"]:checked').val();

        $('#equalSign').attr('style', 'font-size: ' + fontSize + 'px !important;');
        $('#startGame').prop('disabled', true);
        $('#startMultiplyGame').prop('disabled', true);
        $('#startDivisionGame').prop('disabled', true);
        $('#startBeadsGame').prop('disabled', true);
        $('#stop').prop('disabled', false);

        let sessionNumbers = [];
        let totalScore = 0;

        function generateRandomNumber(length, decimalLength, multiplydecimalNumberValue) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;

            if (multiplydecimalNumberValue === 'Yes') {
                let decimalValue = '';
                for (let i = 0; i < decimalLength; i++) {
                    decimalValue += Math.floor(Math.random() * 10);
                }
                return `${number}.${decimalValue}`;
            }

            return number.toString();
        }

        function startGame() {
            $('#readyText').show();
            $('#abacus').hide();
            $('#equalSign').hide();
            if (multiplaysoundValue === 'Yes') {
                speak("Ready?", function() {
                    setTimeout(function() {
                        $('#readyText').hide();
                        showNumbers(0);
                    }, 2000);
                });
            } else {
                setTimeout(function() {
                    $('#readyText').hide();
                    showNumbers(0);
                }, 2000);
            }
        }

        function showNumbers(displayCount) {
            if (displayCount < nDisplay) {
                $('#data').empty();
                let speakCount = 0;

                function speakNextNumber() {
                    if (speakCount < multiplynRow) {
                        let randomNumber1 = generateRandomNumber(dLength1, multiplydecimalDigit, multiplydecimalNumberValue);
                        let randomNumber2 = generateRandomNumber(dLength2, multiplydecimalDigit, multiplydecimalNumberValue);
                        let product = parseFloat(randomNumber1) * parseFloat(randomNumber2);
                        sessionNumbers.push({ multiplier: randomNumber1, multiplicand: randomNumber2, product: product.toString().match(/^-?\d+(?:\.\d{0,5})?/)[0] });
                        totalScore += product;

                        let displayText = `${randomNumber1} x ${randomNumber2} =`;
                        $('#data').append('<p style="font-size: ' + parseInt(multiplyfontSize) + 'px;">' + displayText + '</p>');
                        if (multiplaysoundValue === 'Yes') {
                            speak(displayText, function() {
                                speakCount++;
                                speakNextNumber();
                            });
                        } else {
                            speakCount++;
                            speakNextNumber();
                        }
                    } else {
                        setTimeout(function() {
                            $('#data').empty();
                            setTimeout(function() {
                                showNumbers(displayCount + 1);
                            }, multiplyintervalTime);
                        }, multiplyGametime);
                    }
                }

                speakNextNumber();

            } else {
                $('#equalSign').show();
                $('#abacus').hide();
                historyDataMulti.push({
                    date: new Date(),
                    numbers: sessionNumbers,
                    score: totalScore,
                    multiplydecimalNumberValue: multiplydecimalNumberValue
                });
                updateHistoryMulti();

                let resultHtml = '';
                sessionNumbers.forEach(number => {
                    resultHtml += `<p style="font-size: ${fontSize}px!important;"> ${number.multiplier} x ${number.multiplicand} = ${number.product}<br>`;
                });

                $('#resultScore').html(resultHtml);

                $('#startGame').prop('disabled', false);
                $('#startMultiplyGame').prop('disabled', false);
                $('#startDivisionGame').prop('disabled', false);
                $('#startBeadsGame').prop('disabled', false);
                $('#stop').prop('disabled', true);

                if (multiplaysoundValue === 'Yes') {
                    // speak("Equal");// sound a last a Equal bolbe na
                }

                isGameActive = false; // Mark the game as inactive
            }
        }

        startGame();
    });

    $('#multiplyClearData').on('click', function() {
        localStorage.removeItem('historyDataMulti');
        $('#historyContent_multi').empty();
        historyDataMulti = [];
    });

    $('#historyButton').on('click', function() {
        updateHistoryMulti();
    });

    updateHistoryMulti();

    $('#stop').on('click', function() {
        if (isGameActive) {
            $('#startGame').prop('disabled', false);
            $('#startMultiplyGame').prop('disabled', false);
            $('#startDivisionGame').prop('disabled', false);
            $('#startBeadsGame').prop('disabled', false);
            $('#stop').prop('disabled', true);

            $('#data').hide(); // Ensure #data is hidden when stopped
            $('#abacusContainer').hide();
            $('#abacus').hide();
            $('#equalSign').show();

            isGameActive = false; // Mark the game as inactive
        }
    });
});
/// Multiply Game End /////

/// Divison Game End /////
$(document).ready(function() {
    let historyDataDivision = JSON.parse(localStorage.getItem('historyDataDivision')) || [];
    let isGameActive = false; // Track if the game is active or not

    function updateHistoryDivision() {
        let historyHtmlDivision = '';
        historyDataDivision.forEach((entry) => {
            let totalScoreWithDecimal = entry.numbers.reduce((acc, curr) => acc + parseFloat(curr.product), 0);
            let totalScoreFormatted = entry.decimalNumberValue === 'Yes' ? totalScoreWithDecimal.toFixed(2) : totalScoreWithDecimal.toFixed(0);
    
            historyHtmlDivision += `<p>Quiz Type: DIVISION</p>
                                    <p>Date: ${new Date(entry.date).toLocaleString()}</p>`;
            entry.numbers.forEach(number => {
                let productFormatted;
                if (entry.remainderNumberValue === 'Yes') {
                    // No decimal places when remainderNumberValue is 'Yes'
                    productFormatted = parseFloat(number.product).toFixed(0);
                } else {
                    // Display decimal places when remainderNumberValue is 'No'
                    productFormatted = parseFloat(number.product).toString().match(/^-?\d+(?:\.\d{0,5})?/)[0];
                }
                
                historyHtmlDivision += `${parseFloat(number.dividend)} ÷ ${parseFloat(number.divisor)} = ${productFormatted}`;
                
                if (entry.remainderNumberValue === 'Yes') {
                    historyHtmlDivision += ` ---- Remainder: ${parseFloat(number.remainder).toString().match(/^-?\d+(?:\.\d{0,5})?/)[0]}`;
                }
                
                historyHtmlDivision += '<br>';
            });
            historyHtmlDivision += '<br>';
        });
        $('#historyContent_division').html(historyHtmlDivision);
        localStorage.setItem('historyDataDivision', JSON.stringify(historyDataDivision));
    }
    

    function speak(text, callback) {
        if (window.speechSynthesis) {
            let utterance = new SpeechSynthesisUtterance(text.replace(" ÷ ", " Division "));
            utterance.onend = callback;
            speechSynthesis.speak(utterance);
        } else {
            callback();
        }
    }

    $('#startDivisionGame').on('click', function() {
        if (isGameActive) return; // Prevent starting a new game if one is already active

        isGameActive = true; // Mark the game as active

        // Reset UI elements
        $('#data').show().empty(); // Ensure #data is visible and empty
        $('#resultScore').empty();
        $('#equalSign').hide();
        $('#abacus').hide();

        let dLength1 = parseInt($('#DividendDlent').val());
        let dLength2 = parseInt($('#divisordlent').val());
        let nDisplay = parseInt($('#divi_ndisplay').val());
        let nRow = parseInt($('#divi_nrow').val());
        let DivisionGametimeValues = $('#gametime').val().split(',');
        let DivisionSetTime = parseInt(DivisionGametimeValues[0]);
        let DivisionintervalTime = parseInt(DivisionGametimeValues[1]);
        let decimalDigit = parseInt($('#divi_dlent').val());
        let fontSize = parseInt($('#divi_fontSize').val());
        let decimalNumberValue = $('input[name="divi_decimalNumber"]:checked').val();
        let soundValue = $('input[name="divi_soundSystem"]:checked').val();
        let remainderNumberValue = $('input[name="remainderNumber"]:checked').val();

        $('#equalSign').attr('style', 'font-size: ' + fontSize + 'px !important;');
        $('#startGame').prop('disabled', true);
        $('#startMultiplyGame').prop('disabled', true);
        $('#startDivisionGame').prop('disabled', true);
        $('#startBeadsGame').prop('disabled', true);
        $('#stop').prop('disabled', false);

        let sessionNumbers = [];
        let totalScore = 0;

        function generateRandomNumber(length, decimalLength, decimalNumberValue) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;

            if (decimalNumberValue === 'Yes') {
                let decimalValue = '';
                for (let i = 0; i < decimalLength; i++) {
                    decimalValue += Math.floor(Math.random() * 10);
                }
                return `${number}.${decimalValue}`;
            }

            return number.toString();
        }

        function DivisionStartGame() {
            $('#readyText').show();
            $('#abacus').hide();
            $('#equalSign').hide();
            if (soundValue === 'Yes') {
                speak("Ready?", function() {
                    setTimeout(function() {
                        $('#readyText').hide();
                        showNumbers(0);
                    }, 2000);
                });
            } else {
                setTimeout(function() {
                    $('#readyText').hide();
                    showNumbers(0);
                }, 2000);
            }
        }

        function showNumbers(displayCount) {
            if (displayCount < nDisplay) {
                $('#data').empty();
                let speakCount = 0;

                function speakNextNumber() {
                    if (speakCount < nRow) {
                        let randomNumber1 = generateRandomNumber(dLength1, decimalDigit, decimalNumberValue);
                        let randomNumber2 = generateRandomNumber(dLength2, decimalDigit, decimalNumberValue);

                        if (parseFloat(randomNumber2) === 0) {
                            randomNumber2 = "1"; // Avoid division by zero
                        }

                        let product = parseFloat(randomNumber1) / parseFloat(randomNumber2);
                        let remainder = parseFloat(randomNumber1) % parseFloat(randomNumber2);
                        let productToDisplay;

                        if (remainderNumberValue === 'Yes') {
                            productToDisplay = Math.floor(product);
                        } else {
                            productToDisplay = product.toString().match(/^-?\d+(?:\.\d{0,5})?/)[0]
                        }
                        sessionNumbers.push({
                            dividend: parseFloat(randomNumber1),
                            divisor: parseFloat(randomNumber2),
                            product: productToDisplay,
                            // product: product.toFixed(5),
                            
                            remainder: remainder.toString().match(/^-?\d+(?:\.\d{0,5})?/)[0]
                        });
                        totalScore += product;

                        let displayText = `${randomNumber1} ÷ ${randomNumber2} =`;
                        $('#data').append('<p style="font-size: ' + fontSize + 'px;">' + displayText + '</p>');
                        if (soundValue === 'Yes') {
                            speak(displayText, function() {
                                speakCount++;
                                speakNextNumber();
                            });
                        } else {
                            speakCount++;
                            speakNextNumber();
                        }
                    } else {
                        setTimeout(function() {
                            $('#data').empty();
                            setTimeout(function() {
                                showNumbers(displayCount + 1);
                            }, DivisionintervalTime);
                        }, DivisionSetTime);
                    }
                }

                speakNextNumber();

            } else {
                $('#equalSign').show();
                $('#abacus').hide();
                historyDataDivision.push({
                    date: new Date(),
                    numbers: sessionNumbers,
                    score: totalScore,
                    decimalNumberValue: decimalNumberValue,
                    remainderNumberValue: remainderNumberValue // Add remainderNumberValue to history entry
                });
                updateHistoryDivision();

                let resultHtml = '';
                sessionNumbers.forEach(number => {
                    resultHtml += `<p style="font-size: ${fontSize}px!important;">${number.dividend} ÷ ${number.divisor} = ${number.product}`;
                    if (remainderNumberValue === 'Yes') {
                        resultHtml += ` ---- Remainder: ${number.remainder}`;
                    }
                    resultHtml += '<br>';
                });
              
                $('#resultScore').html(resultHtml);

                $('#startGame').prop('disabled', false);
                $('#startMultiplyGame').prop('disabled', false);
                $('#startDivisionGame').prop('disabled', false);
                $('#startBeadsGame').prop('disabled', false);

                if (soundValue === 'Yes') {
                    // speak("Equal"); //sound a last a Equal bolbe na
                }

                isGameActive = false; // Mark the game as inactive
            }
        }

        DivisionStartGame();
    });

    $('#divisionClearData').on('click', function() {
        localStorage.removeItem('historyDataDivision');
        $('#historyContent_division').empty();
        historyDataDivision = [];
    });

    $('#historyButton').on('click', function() {
        updateHistoryDivision();
    });

    // Ensure history is updated on page load
    updateHistoryDivision();

    $('#stop').on('click', function() {
        if (isGameActive) {
            $('#startGame').prop('disabled', false);
            $('#startMultiplyGame').prop('disabled', false);
            $('#startDivisionGame').prop('disabled', false);
            $('#startBeadsGame').prop('disabled', false);
            $('#stop').prop('disabled', true);

            $('#data').hide(); // Ensure #data is hidden when stopped
            $('#abacusContainer').hide();
            $('#abacus').hide();
            $('#equalSign').show();

            isGameActive = false; // Mark the game as inactive
        }
    });
});




/// Beads Game start /////
/// Beads Game start /////
$(document).ready(function() {
    let beadsHistory = JSON.parse(localStorage.getItem('beadsHistory')) || [];
    let isGameActive = false;
    let stopRequested = false;
    let sessionNumbers = [];
    let totalScore = 0;

    function updateHistory() {
        let historyHtml = '';
        beadsHistory.forEach((entry) => {
            let totalScore = entry.numbers.reduce((acc, curr) => acc + parseFloat(curr), 0);
            historyHtml += `<p>Quiz Type: Beads</p>
                            <p>Date: ${new Date(entry.date).toLocaleString()}</p>
                            <p>Total Score: ${totalScore}</p>`;
            entry.numbers.forEach(number => {
                historyHtml += `${number}<br>`;
            });
            historyHtml += '<br>';
        });
        $('#historyContent_beads').html(historyHtml);
        localStorage.setItem('beadsHistory', JSON.stringify(beadsHistory));
    }

    $('#startBeadsGame').on('click', function() {
        if (isGameActive) return; // Prevent starting a new game if one is already active

        isGameActive = true; // Mark the game as active
        stopRequested = false; // Reset stopRequested flag

        $('#data').show().empty(); // Ensure #data is visible and empty
        $('#resultScore').empty();
        $('#equalSign').hide();
        $('#abacus').hide();

        dLength = $('input[name="beadOptions"]:checked').val();
        nDisplay = $('#bead_ndisplay').val();
        nRow = $('#nrow').val();
        beadsGametimeValues = $('#gametime').val().split(',');
        gametime = parseInt(beadsGametimeValues[0]);
        beadsIntervalTime = parseInt(beadsGametimeValues[1]);
        fontSize = $('#fontSize').val();

        $('#startGame').prop('disabled', true);
        $('#startMultiplyGame').prop('disabled', true);
        $('#startDivisionGame').prop('disabled', true);
        $('#startBeadsGame').prop('disabled', true);
        $('#stop').prop('disabled', false);

        // Reset session numbers and total score
        sessionNumbers = [];
        totalScore = 0;

        function generateRandomNumber(length) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function startBeadGame() {
            $('#readyText').show();
            $('#abacus').hide();
            $('#equalSign').hide();
            setTimeout(function() {
                if (!stopRequested) {
                    $('#readyText').hide();
                    showNumbers(0);
                }
            }, 1100);
        }

        function showNumbers(displayCount) {
            if (displayCount < nDisplay && !stopRequested) {
                $('#data').empty();
                $('#abacusContainer').show();
                for (let i = 0; i < nRow; i++) {
                    let randomNumber = generateRandomNumber(dLength);
                    sessionNumbers.push(randomNumber);
                    totalScore += parseFloat(randomNumber);

                    displayAbacusFrame(randomNumber);
                }

                setTimeout(function() {
                    if (!stopRequested) {
                        $('#abacusContainer').hide();
                        setTimeout(function() {
                            if (!stopRequested) {
                                $('#abacusContainer').show();
                                showNumbers(displayCount + 1);
                            }
                        }, beadsIntervalTime);
                    }
                }, gametime);

            } else if (!stopRequested) {
                $('#equalSign').show();
                $('#abacus').hide();
                $('#abacusContainer').hide();
                beadsHistory.push({
                    date: new Date(),
                    numbers: sessionNumbers,
                    score: totalScore
                });
                updateHistory();

                $('#resultScore').text(totalScore);

                $('#startGame').prop('disabled', false);
                $('#startMultiplyGame').prop('disabled', false);
                $('#startDivisionGame').prop('disabled', false);
                $('#startBeadsGame').prop('disabled', false);
                $('#stop').prop('disabled', true);

                isGameActive = false; // Mark the game as inactive
            }
        }

        function displayAbacusFrame(number) {
            let abacusHtml = '<div class="abacus-frame">';
            let numberString = number.toString();

            while (numberString.length < dLength) {
                numberString = '0' + numberString;
            }

            for (let i = 0; i < dLength; i++) {
                let digit = parseInt(numberString[i]);
                let upperBeads = Math.floor(digit / 5);
                let lowerBeads = digit % 5;

                abacusHtml += `<div class="rod">`;
                abacusHtml += `<div class="beam"></div>`;
                abacusHtml += `<div class="upper-beads">`;
                for (let j = 0; j < upperBeads; j++) {
                    abacusHtml += `<div class="bead"></div>`;
                }
                abacusHtml += `</div>`;
                abacusHtml += `<div class="lower-beads">`;
                for (let j = 0; j < lowerBeads; j++) {
                    abacusHtml += `<div class="bead"></div>`;
                }
                for (let j = lowerBeads; j < 5; j++) {
                    abacusHtml += `<div class="empty-bead"></div>`;
                }
                abacusHtml += `</div>`;
                abacusHtml += `</div>`;
            }

            abacusHtml += '</div>';
            document.getElementById('abacusContainer').innerHTML = abacusHtml;
        }

        startBeadGame();
    });

    $('#beadsClearData').on('click', function() {
        localStorage.removeItem('beadsHistory');
        $('#historyContent_beads').empty();
        beadsHistory = [];
    });

    $('#beadsHistory').on('click', function() {
        updateHistory();
    });

    updateHistory();

    $('#stop').on('click', function() {
        if (isGameActive) {
            stopRequested = true; // Set stopRequested flag to true

            $('#startGame').prop('disabled', false);
            $('#startMultiplyGame').prop('disabled', false);
            $('#startDivisionGame').prop('disabled', false);
            $('#startBeadsGame').prop('disabled', false);
            $('#stop').prop('disabled', true);

            $('#data').hide(); // Ensure #data is hidden when stopped
            $('#abacusContainer').hide();
            $('#abacus').hide();
            $('#equalSign').show();

            // Push the data to history and update the result score
            beadsHistory.push({
                date: new Date(),
                numbers: sessionNumbers,
                score: totalScore
            });
            updateHistory();

            $('#resultScore').text(totalScore);// Display the total score

            isGameActive = false; // Mark the game as inactive
        }
    });
});



