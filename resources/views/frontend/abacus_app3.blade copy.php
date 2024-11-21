<!DOCTYPE html>
<html lang="en">
<head>
  <title>Abacus Math Bangladesh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{asset('public/abacus_app_assets/style.css')}}">
  <script src="{{ asset('public/abacus_app_assets/jquery-3.6.0.min.js') }}"></script>
  <style>
    #data p {
        margin:0 auto;
        text-align: center;
        font-size: 40px;
        font-weight: bolder;
    }
    #readyText, #equalSign {
        display: none;
        text-align: center;
        font-size: 5em;
        margin-top: 20px;
    }
</style>
</head>
<body>

<div class="container mt-3">
    <div style="min-height: 520px">
        <h2><span class="text-danger">Abacus</span> Math <span class="text-info">Game</span></h2>
        
        <div id="data">
            <h3 id="readyText">Ready??</h3>
            <h3 id="equalSign">=</h3>
        </div>
   
    </div>
<!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">logo</h4>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                        <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Flash Calculation</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Beads</a>
                    </li>
                
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="menu1" class="container tab-pane active"><br>
                <p>
                    <div class="row">
                        <label for="dlength" class="col-sm-5 col-form-label col-form-label-sm text-end">Digit Length</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="dlength" id="dlength">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="ndisplay" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="ndisplay" id="ndisplay">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="nrow" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Rows</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="nrow" id="nrow">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                        <div class="col-sm-5 mb-1">
                        <select class="form-select gametime" name="gametime" id="gametime">
                            <option id="a" value="">Slowest</option>
                            <option id="b" value="" >Slow</option>
                            <option id="c" value="">Normal</option>
                            <option id="d" value="">Fast</option>
                            <option id="e" value="">Fastest</option>
                        </select>
                        </div>
                        <div class="col-sm-2"></div>

                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Minus Numbers</label>
                        <div class="col-sm-5 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="minusNumber" id="inlineRadio1" value="Yes">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="minusNumber" id="inlineRadio2" value="No">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Decimal Numbers</label>
                        <div class="col-sm-5 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="decimalNumber" id="inlineRadio1" value="Yes">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="decimalNumber" id="inlineRadio2" value="No">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Decimal Length</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="decimal" id="decimal" placeholder="">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Font Size</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="fontSize" id="fontSize" placeholder="">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    </div>
                </p>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <div class="row">
                            <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                            <div class="col-sm-5 mb-1">
                            <input type="number" class="form-control form-control-sm" name="" id="" placeholder="">
                            </div>
                            <div class="col-sm-2"></div>
                        
                            <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                            <div class="col-sm-5 mb-1">
                            <select class="form-select">
                                <option value="1">Slowest</option>
                                <option value="2">Slow</option>
                                <option value="3">Normal</option>
                                <option value="4">Fast</option>
                                <option value="5">Fastest</option>
                            </select>
                            </div> 
                            <div class="col-sm-2"></div>
                                <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Group</label>
                            <div class="col-sm-5 mb-1">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">1 Beads</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">2 Beads</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">3 Beads</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">4 Beads</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">5 Beads</label>
                                </div>

                            </div>
                            <div class="col-sm-2"></div>
                            
                        </div>
                        </div>
                
                    </div>
                </div>

        
                <!-- Modal footer -->
            
                    <div class="row p-3">
                        <hr>
                        <div class="col-md-4 col-sm-4">
                        <button type="button" class="btn btn-sm btn-primary px-4" data-bs-toggle="modal" data-bs-target="#editModal">Edit Speed</button>
                        </div>
                        <div class="col-md-8 col-sm-8 text-end">
                            <button type="button" class="btn btn-sm btn-success px-4" id="optionData" data-bs-dismiss="">Save</button>
                            <button type="button" class="btn btn-sm btn-danger px-4" id="optionClose" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                
        
            </div>
        </div>
  </div>
    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Edit Speed</h4>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm text-end"></label>
                                <div class="col-sm-4 ">
                                  <p>Display Time</p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Interval Time</p>
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Slowest</label>
                                
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_slowest" id="d_slowest" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_slowest" id="i_slowest" placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Slow</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_slow" id="d_slow" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_slow" id="i_slow"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Normal</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_normal" id="d_normal"  value="500" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_normal" id="i_normal"  value="500"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fast</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_fast" id="d_fast" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_fast" id="i_fast"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fastest</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_fastest" id="d_fastest" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_fastest" id="i_fastest"  placeholder="">
                                </div>
                               
                            </div>
                        </div>
                    
                        <!-- Modal footer -->
                    
                            <div class="row p-3">
                                <hr>
                            
                                <div class="col-md-12 col-sm-12 text-end">
                                    <button type="button" class="btn btn-sm btn-success px-4" id="editSpreedSave" data-bs-dismiss="">Save</button>
                                    <button type="button" class="btn btn-sm btn-danger px-4" id="closeSpredd" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
            </div>
        </div>
    </div>
   <!-- Modal Result Show -->
    <div class="modal" id="resultModal" >
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Result</h4>
            <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="max-height: 300px">
                <h1>250</h1>
            </div>
            <!-- Modal footer -->
                <div class="row p-3">
                    <hr>
                    <div class="col-md-12 col-sm-12 text-end">
                        {{-- <button type="button" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Save</button> --}}
                        <button type="button" class="btn btn-sm btn-danger px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
        </div>
    </div>
   <!-- Modal History Show -->
    <div class="modal" id="historyModal" >
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">History</h4>
            <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="historyContent" style="overflow-y: scroll;"></div> <!-- Container for dynamic content -->
            </div>
            <!-- Modal footer -->
                <div class="row p-3">
                    <hr>
                    <div class="col-md-12 col-sm-12 text-end">
                        <button type="button" id="clearData" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Clear</button>
                        <button type="button" class="btn btn-sm btn-danger px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
        </div>
    </div>
<footer>
    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#historyModal">History</button>
    <button type="button" class="btn btn-secondary px-5" data-bs-toggle="modal" data-bs-target="#resultModal">Result</button>
    <button type="button" class="btn btn-success px-5" id="startGame">Flash</button>
    <button type="button" class="btn btn-info px-5">Beads</button>
    <button type="button" class="btn btn-warning px-5" id="stop">Stop</button>
    <button type="button" class="btn btn-dark px-5" data-bs-toggle="modal" data-bs-target="#myModal">Option</button>
    <a href="{{url('/')}}"> <button type="button" class="btn btn-danger px-5">Exit</button></a>
</footer>

</div>
<script>

$(document).ready(function() {
    // Retrieve the initial value from local storage
    let DlengthValue = localStorage.getItem('dlength') || '';
    let nDisplayValue = localStorage.getItem('ndisplay') || '';
    let nRowValue = localStorage.getItem('nrow') || '';
    let decimalValue = localStorage.getItem('decimal') || '';
    let fontSizeValue = localStorage.getItem('fontSize') || '';
    let minusNumberValue = localStorage.getItem('minusNumber') || '';
    let decimalNumberValue = localStorage.getItem('decimalNumber') || '';
    let gametimeValue = localStorage.getItem('gametime') || '';

    //Edit Spreed 
    let d_slowestValue = localStorage.getItem('d_slowest') || '';
    let i_slowestValue = localStorage.getItem('i_slowest') || '';
    let d_slowValue = localStorage.getItem('d_slow') || '';
    let i_slowValue = localStorage.getItem('i_slow') || '';
    let d_normalValue = localStorage.getItem('d_normal') || '';
    let i_normalValue = localStorage.getItem('i_normal') || '';
    let d_fastValue = localStorage.getItem('d_fast') || '';
    let i_fastValue = localStorage.getItem('i_fast') || '';
    let d_fastestValue = localStorage.getItem('d_fastest') || '';
    let i_fastestValue = localStorage.getItem('i_fastest') || '';

    // Set the initial value to the input field
    $('#dlength').val(DlengthValue);
    $('#ndisplay').val(nDisplayValue);
    $('#nrow').val(nRowValue);
    $('#decimal').val(decimalValue);
    $('#fontSize').val(fontSizeValue);
    if (minusNumberValue) {
        $(`input[name="minusNumber"][value="${minusNumberValue}"]`).prop('checked', true);
    }
    if (decimalNumberValue) {
        $(`input[name="decimalNumber"][value="${decimalNumberValue}"]`).prop('checked', true);
    }
    $('#gametime').val(gametimeValue);

    //Edit Spreed
    $('#d_slowest').val(d_slowestValue);
    $('#i_slowest').val(i_slowestValue);
    $('#d_slow').val(d_slowValue);
    $('#i_slow').val(i_slowValue);
    $('#d_normal').val(d_normalValue);
    $('#i_normal').val(i_normalValue);
    $('#d_fast').val(d_fastValue);
    $('#i_fast').val(i_fastValue);
    $('#d_fastest').val(d_fastestValue);
    $('#i_fastest').val(i_fastestValue);



        // Edit Spreed Event handler for the Save button
        $('#editSpreedSave').on('click', function() {
        // Save the current value to local storage
        d_slowestValue = $('#d_slowest').val();
        i_slowestValue = $('#i_slowest').val();
        d_slowValue = $('#d_slow').val();
        i_slowValue = $('#i_slow').val();
        d_normalValue = $('#d_normal').val();
        i_normalValue = $('#i_normal').val();
        d_fastValue = $('#d_fast').val();
        i_fastValue = $('#i_fast').val();
        d_fastestValue = $('#d_fastest').val();
        i_fastestValue = $('#i_fastest').val();
        localStorage.setItem('d_slowest', d_slowestValue);
        localStorage.setItem('i_slowest', i_slowestValue);
        localStorage.setItem('d_slow', d_slowValue);
        localStorage.setItem('i_slow', i_slowValue);
        localStorage.setItem('d_normal', d_normalValue);
        localStorage.setItem('i_normal', i_normalValue);
        localStorage.setItem('d_fast', d_fastValue);
        localStorage.setItem('i_fast', i_fastValue);
        localStorage.setItem('d_fastest', d_fastestValue);
        localStorage.setItem('i_fastest', i_fastestValue);

       
        });

    //Edit Spreed Event handler for the Close button
    $('#closeSpredd').on('click', function() {
        $('#d_slowest').val(d_slowestValue);
        $('#i_slowest').val(i_slowestValue);
        $('#d_slow').val(d_slowValue);
        $('#i_slow').val(i_slowValue);
        $('#d_normal').val(d_normalValue);
        $('#i_normal').val(i_normalValue);
        $('#d_fast').val(d_fastValue);
        $('#i_fast').val(i_fastValue);
        $('#d_fastest').val(d_fastestValue);
        $('#i_fastest').val(i_fastestValue);
      
    });

    //Edit Spreed Optional: Reset the form or input field when the modal is shown
    $('#editModal').on('show.bs.modal', function () {
        $('#d_slowest').val(d_slowestValue);
        $('#i_slowest').val(i_slowestValue);
        $('#d_slow').val(d_slowValue);
        $('#i_slow').val(i_slowValue);
        $('#d_normal').val(d_normalValue);
        $('#i_normal').val(i_normalValue);
        $('#d_fast').val(d_fastValue);
        $('#i_fast').val(i_fastValue);
        $('#d_fastest').val(d_fastestValue);
        $('#i_fastest').val(i_fastestValue);
    
        
    });
    // Store the values in local storage
   


    // Event handler for the Save button
    $('#optionData').on('click', function() {
        // Save the current value to local storage
        DlengthValue = $('#dlength').val();
        nDisplayValue = $('#ndisplay').val();
        nRowValue = $('#nrow').val();
        decimalValue = $('#decimal').val();
        fontSizeValue = $('#fontSize').val();
        minusNumberValue = $('input[name="minusNumber"]:checked').val();
        decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
        gametimeValue = $('#gametime').val();
        localStorage.setItem('dlength', DlengthValue);
        localStorage.setItem('ndisplay', nDisplayValue);
        localStorage.setItem('nrow', nRowValue);
        localStorage.setItem('decimal', decimalValue);
        localStorage.setItem('fontSize', fontSizeValue);
        localStorage.setItem('minusNumber', minusNumberValue);
        localStorage.setItem('decimalNumber', decimalNumberValue);
        localStorage.setItem('gametime', gametimeValue);


       
           
    });

    // Event handler for the Close button
    $('#optionClose').on('click', function() {
        $('#dlength').val(DlengthValue);
        $('#ndisplay').val(nDisplayValue);
        $('#nrow').val(nRowValue);
        $('#decimal').val(decimalValue);
        $('#fontSize').val(fontSizeValue);
        if (minusNumberValue) {
            $(`input[name="minusNumber"][value="${minusNumberValue}"]`).prop('checked', true);
        }
        if (decimalNumberValue) {
            $(`input[name="decimalNumber"][value="${decimalNumberValue}"]`).prop('checked', true);
        }
        $('#gametime').val(gametimeValue);
    });

    // Optional: Reset the form or input field when the modal is shown
    $('#yourModalId').on('show.bs.modal', function () {
        $('#dlength').val(DlengthValue);
        $('#ndisplay').val(nDisplayValue);
        $('#nrow').val(nRowValue);
        $('#decimal').val(decimalValue);
        $('#fontSize').val(fontSizeValue);
        if (minusNumberValue) {
            $(`input[name="minusNumber"][value="${minusNumberValue}"]`).prop('checked', true);
        }
        if (decimalNumberValue) {
            $(`input[name="decimalNumber"][value="${decimalNumberValue}"]`).prop('checked', true);
        }
        $('#gametime').val(gametimeValue);
    });
    



    $('#optionData').click(function() {
            $('#myModal').modal('hide');
    });
    $('#editSpreedSave').click(function() {
            $('#editModal').modal('hide');
    });
});

$(document).ready(function() {
    let historyData = JSON.parse(localStorage.getItem('historyData')) || []; // Retrieve history data from localStorage or initialize an empty array if not present

    // Function to update the history modal and total score
    function updateHistory() {
        let historyHtml = '';
        historyData.forEach((entry) => {
            let totalScoreWithDecimal = entry.numbers.reduce((acc, curr) => acc + parseFloat(curr), 0);
            historyHtml += `<p>Quiz Type: BLITZ</p>
                            <p>Date: ${entry.date.toLocaleString()}</p>
                            <p>Total Score: ${totalScoreWithDecimal.toFixed(2)}</p>`;
            entry.numbers.forEach(number => {
                historyHtml += `${number}<br>`;
            });
            historyHtml += '<br>';
        });
        $('#historyContent').html(historyHtml);
        localStorage.setItem('historyData', JSON.stringify(historyData)); // Save history data to localStorage
    }

    $('#startGame').on('click', function() {
        let dLength = $('#dlength').val();
        let nDisplay = $('#ndisplay').val();
        let nRow = $('#nrow').val();
        let gametime = $('#gametime').val();
        let decimalDigit = $('#decimal').val();
        let fontSize = $('#fontSize').val();
        let Minus = $('input[name="minusNumber"]:checked').val();
        let decimalNumberValue = $('input[name="decimalNumber"]:checked').val();
       
        // Disable the start button
        $('#startGame').prop('disabled', true);

        // Array to store numbers for the current session
        let sessionNumbers = [];
        let totalScore = 0;

        // Function to generate and display random numbers
        function generateRandomNumber(length, decimalLength, decimalNumberValue, Minus) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;

            // Check if Minus is 'Yes' and generate a negative number with 50% probability
            if (Minus === 'Yes' && Math.random() < 0.5) {
                number *= -1;
            }

            // Check if decimalNumberValue is 'Yes'
            if (decimalNumberValue === 'Yes') {
                let decimalValue = '';
                for (let i = 0; i < decimalLength; i++) {
                    decimalValue += Math.floor(Math.random() * 10); // Generate random digit for each decimal place
                }
                return `${number}.${decimalValue}`;
            }

            return number.toString().padStart(length, '0');
        }

        // Function to display "Ready??" text and then start the game
        function startGame() {
            $('#readyText').show();
            setTimeout(function() {
                $('#readyText').hide();
                showNumbers(0);
            }, gametime);
        }

        // Function to show numbers and handle the display logic
        function showNumbers(displayCount) {
            if (displayCount < nDisplay) {
                $('#data').empty();
                for (let i = 0; i < nRow; i++) {
                    let randomNumber = generateRandomNumber(dLength, decimalDigit, decimalNumberValue, Minus);
                    sessionNumbers.push(randomNumber);
                    totalScore += parseFloat(randomNumber); // Parse float to consider decimal values
                    //fontsize dynamic
                    let fontSizeValue = parseInt(fontSize);
                    $('#data').append('<p style="font-size: ' + fontSizeValue + 'px;">' + randomNumber + '</p>');
                }

                setTimeout(function() {
                    $('#data').empty();
                    showNumbers(displayCount + 1);
                }, gametime);
            } else {
                historyData.push({
                    date: new Date(),
                    numbers: sessionNumbers,
                    score: totalScore
                });
                updateHistory();
                $('#startGame').prop('disabled', false);
            }
        }

        // Start the game
        startGame();
    });

    // Clear the historyData from localStorage
    $('#clearData').on('click', function() {
        localStorage.removeItem('historyData'); 
        $('#historyContent').empty();
        historyData = []; // Reset historyData array
    });

    $('#historyButton').on('click', function() {
        updateHistory();
    });
});



    </script>
</body>
</html>
