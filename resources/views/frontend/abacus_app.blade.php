<!DOCTYPE html>
<html lang="en">
<head>
  <title>Abacus Math Bangladesh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- <link rel="stylesheet" href="{{asset('public/abacus_app_assets/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('public/abacus_app_assets/style.css')}}">
  {{-- <script src="{{ asset('public/abacus_app_assets/bootstrap.bundle.min.js') }}"></script> --}}
  <script src="{{ asset('public/abacus_app_assets/jquery-3.6.0.min.js') }}"></script>
  <style>
    .maincontent{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #data p {
        margin:0 auto;
        text-align: center;
        font-size: 40px;
        font-weight: bolder;
    }
    #readyText, #equalSign {
        display: none;
        text-align: center;
        font-size: 6em;
    }
    #readyText{
        color: hwb(276.92deg 12.4% 50.39%);
    }
    .abacus-frame {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            /* border: 2px solid black;  */
            padding: 10px;
            box-sizing: border-box;
        }
        .rod {
            content: "";
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 5px;
            /* height: 200px;  */
            position: relative;
        }
        .rod::before {
            content: "";
            width: 15%;
            height: 260px;
            background-color: #000000;
            position: absolute;
            top: 45%;
            transform: translateY(-50%);
           
        }
        .upper-beads {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            flex-grow: 1;
            /* background: rgb(167, 93, 93); */
            min-height: 55px;
            max-height: 55px;

        }
        .lower-beads {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            flex-grow: 1;
            /* background: gray; */
            min-height: 170px;
            max-height: 170px;
        }
        .beam {
            width: 125%;
            height: 8px;
            background-color: #000000;
            position: absolute;
            top: 18%; /* Center the beam vertically */
            /* transform: translateY(-18%); */
        }
        .bead {
            width: 45px;
            height: 30px;
            background-color: #165eda;
            /* background-color: #85B2FF; */
            /* box-shadow: 0px 1px 2px 0px #C4C4C4;  */
            margin: 1px 15px;
            border-radius: 60%;
            z-index:1;
        }
        .empty-bead {
            width: 45px;
            height: 30px;
            margin: 1px 15px;
            border-radius: 60%;
            }

</style>
</head>
<body>

<div class="container">
    <div class="maincontent" style="min-height: 520px">
        <h2 id="abacus"><span style="color: #2D318F">Abacus</span> <span style="color: #EF1A20">Math</span> <span style="color:#020202">Bangladesh</span></h2>
        <h3 id="readyText">READY ?</h3>
        <div id="data">
        </div>
        <h1 id="equalSign" style="display: none;">=</h1>
        <div id="abacusContainer" style="display: none;"></div> 
    </div>

<!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Option</h4>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#menu1">Flash Calculation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu2">Multiplication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu3">Division</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu4">Beads</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="menu1" class="container tab-pane active"><br>
                                <div class="row">
                         
                                    <label for="dlength" class="col-sm-5 col-form-label col-form-label-sm text-end">Digit Length</label>
                                    <div class="col-sm-5 mb-1">
                                        <input type="number" class="form-control form-control-sm"  name="dlength" id="dlength" required>
                                        <span id="dlengthError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 30.</span>
                                    </div> 
                                    <div class="col-sm-2"></div>
                                    <label for="ndisplay" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="ndisplay" id="ndisplay">
                                    <span id="ndisplayError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 50.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="nrow" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Rows</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="nrow" id="nrow">
                                    <span id="nrowError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 20.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                                    <div class="col-sm-5 mb-1">
                                        <select class="form-select gametime" name="gametime" id="gametime">
                                            <option class="a" value="d_slowest,i_slowest">Slowest</option>
                                            <option class="b" value="d_slow,i_slow">Slow</option>
                                            <option class="c" value="d_normal,i_normal">Normal</option>
                                            <option class="d" value="d_fast,i_fast">Fast</option>
                                            <option class="e" value="d_fastest,i_fastest">Fastest</option>
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
                                    <span id="decimalError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Font Size</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="fontSize" id="fontSize" placeholder="">
                                    <span id="fontSizeError" class="text-danger" style="display: none;">Minimum value is 8 and maximum is 72.</span>
                                    </div>

                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Sound</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="soundSystem" id="sound" value="Yes">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="soundSystem" id="sound2" value="No">
                                            <label class="form-check-label" for="soundSystem">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <div class="row">
                                    <label for="multiplier" class="col-sm-5 col-form-label col-form-label-sm text-end">Multiplier Digit Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multiplier" id="multiplier">
                                    <span id="multiplierError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="multiplicand" class="col-sm-5 col-form-label col-form-label-sm text-end">Multiplicand Digit Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multiplicand" id="multiplicand">
                                    <span id="multiplicandError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="multi_ndisplay" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multi_ndisplay" id="multi_ndisplay">
                                    <span id="multi_ndisplayError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 50.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="multiplay_nrow" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Rows</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multiplay_nrow" id="multiplay_nrow">
                                      <span id="multiplay_nrowError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 20.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                                    <div class="col-sm-5 mb-1">
                                        <select class="form-select gametime" name="gametime" id="gametime">
                                            <option class="a" value="d_slowest,i_slowest">Slowest</option>
                                            <option class="b" value="d_slow,i_slow">Slow</option>
                                            <option class="c" value="d_normal,i_normal">Normal</option>
                                            <option class="d" value="d_fast,i_fast">Fast</option>
                                            <option class="e" value="d_fastest,i_fastest">Fastest</option>
                                        </select>
                                                                    
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Decimal Numbers</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="multiply_decimalNumber" id="Radio1" value="Yes">
                                            <label class="form-check-label" for="Radio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="multiply_decimalNumber" id="Radio2" value="No">
                                            <label class="form-check-label" for="Radio2">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Decimal Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multiply_dlent" id="multiply_dlent" placeholder="">
                                    <span id="multiply_dlentError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Font Size</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="multiply_fontSize" id="multiply_fontSize" placeholder="">
                                    <span id="multiply_fontSizeError" class="text-danger" style="display: none;">Minimum value is 8 and maximum is 72.</span>
                                   </div>

                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Sound</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="multiply_soundSystem" id="sound1" value="Yes">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="multiply_soundSystem" id="sound2" value="No">
                                            <label class="form-check-label" for="soundSystem">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </div>
                            <div id="menu3" class="container tab-pane fade"><br>
                                <div class="row">
                                    <label for="DividendDlent" class="col-sm-5 col-form-label col-form-label-sm text-end">Dividend Digit Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="DividendDlent" id="DividendDlent">
                                    <span id="DividendDlentError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                </div>
                                    <div class="col-sm-2"></div>
                                    <label for="divisordlent" class="col-sm-5 col-form-label col-form-label-sm text-end">Divisor Digit Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="divisordlent" id="divisordlent">
                                    <span id="divisordlentError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="divi_ndisplay" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="divi_ndisplay" id="divi_ndisplay">
                                    <span id="divi_ndisplayError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 50.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="divi_nrow" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Rows</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="divi_nrow" id="divi_nrow">
                                    <span id="divi_nrowError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 20.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                                    <div class="col-sm-5 mb-1">
                                        <select class="form-select gametime" name="gametime" id="gametime">
                                            <option class="a" value="d_slowest,i_slowest">Slowest</option>
                                            <option class="b" value="d_slow,i_slow">Slow</option>
                                            <option class="c" value="d_normal,i_normal">Normal</option>
                                            <option class="d" value="d_fast,i_fast">Fast</option>
                                            <option class="e" value="d_fastest,i_fastest">Fastest</option>
                                        </select>
                                                                    
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Decimal Numbers</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="divi_decimalNumber" id="Radio1" value="Yes">
                                            <label class="form-check-label" for="Radio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="divi_decimalNumber" id="Radio2" value="No">
                                            <label class="form-check-label" for="Radio2">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Decimal Length</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="divi_dlent" id="divi_dlent" placeholder="">
                                    <span id="divi_dlentError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 10.</span>
                                    </div>
                                    <div class="col-sm-2"></div>

                                    <label for="remainderNumber" class="col-sm-5 col-form-label col-form-label-sm text-end">Showing Remainder Numbers</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="remainderNumber" id="Radio1" value="Yes">
                                            <label class="form-check-label" for="Radio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="remainderNumber" id="Radio2" value="No">
                                            <label class="form-check-label" for="Radio2">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Font Size</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="divi_fontSize" id="divi_fontSize" placeholder="">
                                    <span id="divi_fontSizeError" class="text-danger" style="display: none;">Minimum value is 8 and maximum is 72.</span>
                                    </div>

                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Sound</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="divi_soundSystem" id="sound1" value="Yes">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="divi_soundSystem" id="sound2" value="No">
                                            <label class="form-check-label" for="soundSystem">No</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </div>
                            <div id="menu4" class="container tab-pane fade"><br>
                                <div class="row">
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Number Of Display</label>
                                    <div class="col-sm-5 mb-1">
                                    <input type="number" class="form-control form-control-sm" name="bead_ndisplay" id="bead_ndisplay">
                                    <span id="bead_ndisplayError" class="text-danger" style="display: none;">Minimum value is 1 and maximum is 50.</span>
                                    </div>
                                    <div class="col-sm-2"></div>
                                
                                    <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Speed</label>
                                    <div class="col-sm-5 mb-1">
                                        <select class="form-select gametime" name="gametime" id="gametime">
                                            <option class="a" value="d_slowest,i_slowest">Slowest</option>
                                            <option class="b" value="d_slow,i_slow">Slow</option>
                                            <option class="c" value="d_normal,i_normal">Normal</option>
                                            <option class="d" value="d_fast,i_fast">Fast</option>
                                            <option class="e" value="d_fastest,i_fastest">Fastest</option>
                                        </select>
                                    </div> 
                                    <div class="col-sm-2"></div>
                                     <label for="" class="col-sm-5 col-form-label col-form-label-sm text-end">Group</label>
                                    <div class="col-sm-5 mb-1">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beadOptions" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">1 Beads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beadOptions" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">2 Beads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beadOptions" id="inlineRadio3" value="3">
                                            <label class="form-check-label" for="inlineRadio3">3 Beads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beadOptions" id="inlineRadio4" value="4">
                                            <label class="form-check-label" for="inlineRadio4">4 Beads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beadOptions" id="inlineRadio5" value="5">
                                            <label class="form-check-label" for="inlineRadio5">5 Beads</label>
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
                            <button type="button" class="btn btn-sm btn-success px-4 optionData" id="optionData" data-bs-dismiss="">Save</button>
                            <button type="button" class="btn btn-sm btn-danger px-4 optionClose" id="optionClose" data-bs-dismiss="modal">Close</button>
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
                                     <input type="number" class="form-control form-control-sm" name="d_slowest" id="d_slowest"  placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_slowest" id="i_slowest"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Slow</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_slow" id="d_slow"  placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_slow" id="i_slow"   placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Normal</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_normal" id="d_normal"   placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_normal" id="i_normal"    placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fast</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_fast" id="d_fast"  placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control form-control-sm" name="i_fast" id="i_fast"  placeholder="">
                                </div>
                                <label for="" class="col-sm-4 col-form-label col-form-label-sm text-end">Fastest</label>
                                <div class="col-sm-4 mb-1">
                                     <input type="number" class="form-control form-control-sm" name="d_fastest" id="d_fastest"  placeholder="">
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
                                    <button type="button" class="btn btn-sm btn-danger px-4" id="closeSpreed" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
            </div>
        </div>
    </div>
   <!-- Modal Result Show -->
    <div class="modal" id="resultModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Result</h4>
            <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="min-height: 300px">
                <p style="font-size:30px; text-align:center" id="resultScore">0</p>
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
    <div class="modal" id="historyModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">History</h4>
                    <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#flashHistory">Flash History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#multiplactionHistory">Multiply History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#divisionHistory">Division History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#beadsHistory">Beads History</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="flashHistory" class="container tab-pane active"><br>
                            <div class="row">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="historyContent_flash" class="scrollspy-example" style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <!-- Modal footer -->
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="flashClearData" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Flash Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="multiplactionHistory" class="container tab-pane fade"><br>
                            <div class="row">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="historyContent_multi" class="scrollspy-example" style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <!-- Modal footer -->
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="multiplyClearData" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Multiply Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="divisionHistory" class="container tab-pane fade"><br>
                            <div class="row">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="historyContent_division" class="scrollspy-example" style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <!-- Modal footer -->
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="divisionClearData" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Division Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="beadsHistory" class="container tab-pane fade"><br>
                            <div class="row">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="historyContent_beads" class="scrollspy-example" style="overflow-y: auto; max-height: 400px; box-sizing: border-box;"></div>
                                </div>
                                <!-- Modal footer -->
                                <div class="row p-3">
                                    <hr>
                                    <div class="col-md-12 col-sm-12 text-end">
                                        <button type="button" id="beadsClearData" class="btn btn-sm btn-success px-4" data-bs-dismiss="">Beads Data Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 px-3">
                    <hr>
                    <div class="col-md-12 col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-danger px-4" id="optionClose" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<footer class="" style="text-align: center">
    <button type="button" class="btn btn-primary px-4 mb-2" data-bs-toggle="modal" data-bs-target="#historyModal">History</button>
    <button type="button" class="btn btn-secondary px-4 mb-2" data-bs-toggle="modal" data-bs-target="#resultModal">Result</button>
    <button type="button" class="btn btn-success px-4 mb-2" id="startGame">Flash</button>
    <button type="button" class="btn btn-info px-4 mb-2" id="startBeadsGame">Beads</button>
    <button type="button" class="btn btn-success px-4 mb-2" id="startMultiplyGame">Multiply</button>
    <button type="button" class="btn btn-success px-4 mb-2" id="startDivisionGame">Division</button>
    <button type="button" class="btn btn-warning px-4 mb-2" id="stop" disabled>Stop</button>
    {{-- <button type="button" class="btn btn-warning px-4 mb-2" id=""><a href="{{url('/new_app')}}">new app</a></button> --}}
    {{-- <button type="button" class="btn btn-warning px-4 mb-2" id=""><a href="{{url('/compition')}}">Compition Game</a></button> --}}
    <button type="button" class="btn btn-dark px-4 mb-2" data-bs-toggle="modal" data-bs-target="#myModal">Option</button>
    <a href="{{url('/')}}"> <button type="button" class="btn btn-danger px-4 mb-2">Exit</button></a>
</footer>

</div>

<script src="{{ asset('public/abacus_app_assets/abacus_valueset.js') }}"></script>
<script src="{{ asset('public/abacus_app_assets/abacus_sumgame.js') }}"></script>

<script>
    
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function validateNumberField(fieldId, min, max, errorId) {
        $(fieldId).on('input', function() {
            var value = $(this).val();
            var errorMessage = $(errorId);

            // Check if value is not a number or outside the specified range
            if (value < min || value > max || value === '' || value === '-') {
                errorMessage.show();
                $(this).val(''); // Clear the input if invalid
            } else {
                errorMessage.hide();
            }
        });
    }

    // Apply validation for each field
    validateNumberField('#dlength', 1, 30, '#dlengthError');
    validateNumberField('#ndisplay', 1, 50, '#ndisplayError');
    validateNumberField('#nrow', 1, 30, '#nrowError');
    validateNumberField('#decimal', 1, 5, '#decimalError');
    validateNumberField('#fontSize', 10, 100, '#fontSizeError');

    // New fields
    validateNumberField('#multiplier', 1, 10, '#multiplierError');
    validateNumberField('#multiplicand', 1, 10, '#multiplicandError');
    validateNumberField('#multi_ndisplay', 1, 50, '#multi_ndisplayError');
    validateNumberField('#multiplay_nrow', 1, 30, '#multiplay_nrowError');
    validateNumberField('#multiply_dlent', 1, 5, '#multiply_dlentError');
    validateNumberField('#multiply_fontSize', 10, 100, '#multiply_fontSizeError');

    // Additional fields
    validateNumberField('#DividendDlent', 1, 10, '#DividendDlentError');
    validateNumberField('#divisordlent', 1, 10, '#divisordlentError');
    validateNumberField('#divi_ndisplay', 1, 50, '#divi_ndisplayError');
    validateNumberField('#divi_nrow', 1, 20, '#divi_nrowError');
    validateNumberField('#divi_dlent', 1, 5, '#divi_dlentError');
    validateNumberField('#divi_fontSize', 10, 100, '#divi_fontSizeError');
    validateNumberField('#bead_ndisplay', 1, 50, '#bead_ndisplayError');
});


</script>
</body>
</html>





