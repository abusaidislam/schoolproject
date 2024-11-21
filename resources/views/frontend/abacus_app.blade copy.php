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
                        <input type="number" class="form-control form-control-sm" name="dlength" id="dlength" value="2">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="ndisplay" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="ndisplay" id="ndisplay" value="5">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="nrow" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Rows</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="nrow" id="nrow" value="2">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                        <div class="col-sm-5 mb-1">
                        <select class="form-select" name="gametime" id="gametime">
                            <option value="1000">Slowest</option>
                            <option value="2000">Slow</option>
                            <option value="3000">Normal</option>
                            <option value="4000">Fast</option>
                            <option value="5000">Fastest</option>
                        </select>
                        </div>
                        <div class="col-sm-2"></div>

                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Minus Numbers</label>
                        <div class="col-sm-5 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Decimal Numbers</label>
                        <div class="col-sm-5 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Decimal Length</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="" id="" placeholder="">
                        </div>
                        <div class="col-sm-2"></div>
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Font Size</label>
                        <div class="col-sm-5 mb-1">
                        <input type="number" class="form-control form-control-sm" name="" id="" placeholder="">
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
                            <button type="button" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Save</button>
                            <button type="button" class="btn btn-sm btn-danger px-4" data-bs-dismiss="modal">Close</button>
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
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm text-end">Slowest</label>
                                
                                <div class="col-sm-4 mb-1">
                                  
                                     <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm" value="1000" placeholder="">
                                </div>
                                <div class="col-sm-4">
                              
                                    <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm"  value="1000" placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Slow</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="" id=""  value="800" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm"  value="800"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Normal</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="" id=""  value="500" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm"  value="500"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fast</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="" id=""  value="300" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm"  value="300"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fastest</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="" id=""  value="100" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="" id="colFormLabelSm"  value="100"  placeholder="">
                                </div>
                               
                            </div>
                        </div>
                    
                        <!-- Modal footer -->
                    
                            <div class="row p-3">
                                <hr>
                            
                                <div class="col-md-12 col-sm-12 text-end">
                                    <button type="button" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Save</button>
                                    <button type="button" class="btn btn-sm btn-danger px-4" data-bs-dismiss="modal">Close</button>
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
            <div class="modal-body" style="max-height: 400px" id="historyContent">
                {{-- <div id="historyContent" style="overflow-y: scroll;"></div> <!-- Container for dynamic content --> --}}
            </div>
            <!-- Modal footer -->
                <div class="row p-3">
                    <hr>
                    <div class="col-md-12 col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Clear</button>
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
    //   $(document).ready(function() {
    //     $('#startGame').on('click', function() {
    //         let dLength = $('#dlength').val();
    //         let nDisplay = $('#ndisplay').val();
    //         let nRow = $('#nrow').val();
    //         let gametime = $('#gametime').val();

    //         $('#data').empty();
    //         for (let i = 0; i < nRow; i++) {
    //             let randomNumber = generateRandomNumber(dLength);
    //             console.log("Random Number: ", randomNumber);
    //             $('#data').append('<p>' + randomNumber + '</p>');
    //         }
    //         });

    //       function generateRandomNumber(length) {
    //         let min = Math.pow(10, length - 1);
    //         let max = Math.pow(10, length) - 1;
    //         let number = Math.floor(Math.random() * (max - min + 1)) + min;
    //         // Convert to string and pad with leading zeros if necessary
    //         return number.toString().padStart(length, '0');
    //     }
    //     });

//   $(document).ready(function() {
//             $('#startGame').on('click', function() {
//                 let dLength = $('#dlength').val();
//                 let nDisplay = $('#ndisplay').val();
//                 let nRow = $('#nrow').val();
//                 let gametime = $('#gametime').val();

//                 // Disable the start button
//                 $('#startGame').prop('disabled', true);

//                 // Function to generate and display random numbers
//                 function generateRandomNumber(length) {
//                     let min = Math.pow(10, length - 1);
//                     let max = Math.pow(10, length) - 1;
//                     let number = Math.floor(Math.random() * (max - min + 1)) + min;
//                     return number.toString().padStart(length, '0');
//                 }

//                 // Function to display "Ready??" text and then start the game
//                 function startGame() {
//                     $('#readyText').show();
//                     setTimeout(function() {
//                         $('#readyText').hide();
//                         showNumbers(0);
//                     }, gametime);
//                 }

//                 // Function to show numbers and handle the display logic
//                 function showNumbers(displayCount) {
//                     if (displayCount < nDisplay) {
//                         $('#data').empty();
//                         for (let i = 0; i < nRow; i++) {
//                             let randomNumber = generateRandomNumber(dLength);
//                             console.log("Random Number: ", randomNumber);
//                             $('#data').append('<p>' + randomNumber + '</p>');
//                         }

//                         setTimeout(function() {
//                             $('#data').empty();
//                             showNumbers(displayCount + 1);
//                         }, gametime);
//                     } else {
//                         $('#equalSign').show();
//                         setTimeout(function() {
//                             $('#equalSign').hide();
//                             $('#startGame').prop('disabled', false);
//                         }, gametime);
//                     }
//                 }

//                 // Start the game
//                 startGame();
//             });
//         });
$(document).ready(function() {
    let historyData = []; // Array to store history data for each session

    $('#startGame').on('click', function() {
        let dLength = $('#dlength').val();
        let nDisplay = $('#ndisplay').val();
        let nRow = $('#nrow').val();
        let gametime = $('#gametime').val();

        // Disable the start button
        $('#startGame').prop('disabled', true);

        // Array to store numbers for the current session
        let sessionNumbers = [];
        let totalScore = 0;

        // Function to generate and display random numbers
        function generateRandomNumber(length) {
            let min = Math.pow(10, length - 1);
            let max = Math.pow(10, length) - 1;
            let number = Math.floor(Math.random() * (max - min + 1)) + min;
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
                    let randomNumber = generateRandomNumber(dLength);
                    sessionNumbers.push(randomNumber);
                    totalScore += parseInt(randomNumber);
                    console.log("Random Number: ", randomNumber);
                    $('#data').append('<p>' + randomNumber + '</p>');
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

        // Function to update the history modal and total score
        function updateHistory() {
            let historyHtml = '';
            historyData.forEach((entry) => {
                historyHtml += `<p>Quiz Type: BLITZ</p>
                                <p>Date: ${entry.date.toLocaleString()}</p>
                                <p>Total Score: ${entry.score}</p>`;
                entry.numbers.forEach(number => {
                    historyHtml += `${number}<br>`;
                });
                historyHtml += '<br>';
            });
            $('#historyContent').html(historyHtml);
        }

        // Start the game
        startGame();
    });

    // Clear history data
    $('#clearHistory').on('click', function() {
        historyData = [];
        $('#historyContent').empty();
    });
});



    </script>
</body>
</html>

{{-- 
Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

82
79

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

31
59

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

53
13

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

97
74

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

64
18

ai vabe show na hoye 

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 570

82
79
31
59
53
13
97
74
64
18

ai vabe show hobe

Quiz Type: BLITZ

Date: 5/30/2024, 1:24:01 PM

Total Score: 610
12
69
36
59
53
40
97
90
64
90 --}}