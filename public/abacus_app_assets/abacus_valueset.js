$(document).ready(function() {
    // Retrieve the initial values from local storage
    let DlengthValue = localStorage.getItem('dlength') || '2';
    let nDisplayValue = localStorage.getItem('ndisplay') || '2';
    let nRowValue = localStorage.getItem('nrow') || '2';
    let decimalValue = localStorage.getItem('decimal') || '2';
    let fontSizeValue = localStorage.getItem('fontSize') || '40';
    let minusNumberValue = localStorage.getItem('minusNumber') || 'No';
    let decimalNumberValue = localStorage.getItem('decimalNumber') || 'No';
    let soundValue = localStorage.getItem('soundSystem') || 'No';

    // Edit Speed
    let d_slowestValue = localStorage.getItem('d_slowest') || '5000';
    let i_slowestValue = localStorage.getItem('i_slowest') || '5000';
    let d_slowValue = localStorage.getItem('d_slow') || '4000';
    let i_slowValue = localStorage.getItem('i_slow') || '4000';
    let d_normalValue = localStorage.getItem('d_normal') || '3000';
    let i_normalValue = localStorage.getItem('i_normal') || '3000';
    let d_fastValue = localStorage.getItem('d_fast') || '2000';
    let i_fastValue = localStorage.getItem('i_fast') || '2000';
    let d_fastestValue = localStorage.getItem('d_fastest') || '1000';
    let i_fastestValue = localStorage.getItem('i_fastest') || '1000';

    // Set the initial value to the input fields
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
    if (soundValue) {
        $(`input[name="soundSystem"][value="${soundValue}"]`).prop('checked', true);
    }

    // Set the options in the select dropdown
    function updateGametimeOptions() {
        $('#gametime .a').val(`${d_slowestValue},${i_slowestValue}`).text('Slowest');
        $('#gametime .b').val(`${d_slowValue},${i_slowValue}`).text('Slow');
        $('#gametime .c').val(`${d_normalValue},${i_normalValue}`).text('Normal');
        $('#gametime .d').val(`${d_fastValue},${i_fastValue}`).text('Fast');
        $('#gametime .e').val(`${d_fastestValue},${i_fastestValue}`).text('Fastest');
    }

    updateGametimeOptions();

    // Set the selected option from local storage
    let selectedGameTime = localStorage.getItem('selectedGameTime');
    if (selectedGameTime) {
        $('#gametime').val(selectedGameTime);
    }

    // Save the selected option to local storage when it changes
    $('#gametime').on('change', function() {
        localStorage.setItem('selectedGameTime', $(this).val());
    });

    // Set the values in the edit speed modal
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

    // Event handler for the Save button in the speed modal
    $('#editSpreedSave').on('click', function() {
        // Save the current value to local storage
        let new_d_slowestValue = $('#d_slowest').val();
        let new_i_slowestValue = $('#i_slowest').val();
        let new_d_slowValue = $('#d_slow').val();
        let new_i_slowValue = $('#i_slow').val();
        let new_d_normalValue = $('#d_normal').val();
        let new_i_normalValue = $('#i_normal').val();
        let new_d_fastValue = $('#d_fast').val();
        let new_i_fastValue = $('#i_fast').val();
        let new_d_fastestValue = $('#d_fastest').val();
        let new_i_fastestValue = $('#i_fastest').val();
    
        localStorage.setItem('d_slowest', new_d_slowestValue);
        localStorage.setItem('i_slowest', new_i_slowestValue);
        localStorage.setItem('d_slow', new_d_slowValue);
        localStorage.setItem('i_slow', new_i_slowValue);
        localStorage.setItem('d_normal', new_d_normalValue);
        localStorage.setItem('i_normal', new_i_normalValue);
        localStorage.setItem('d_fast', new_d_fastValue);
        localStorage.setItem('i_fast', new_i_fastValue);
        localStorage.setItem('d_fastest', new_d_fastestValue);
        localStorage.setItem('i_fastest', new_i_fastestValue);
    
        // Update the variables
        d_slowestValue = new_d_slowestValue;
        i_slowestValue = new_i_slowestValue;
        d_slowValue = new_d_slowValue;
        i_slowValue = new_i_slowValue;
        d_normalValue = new_d_normalValue;
        i_normalValue = new_i_normalValue;
        d_fastValue = new_d_fastValue;
        i_fastValue = new_i_fastValue;
        d_fastestValue = new_d_fastestValue;
        i_fastestValue = new_i_fastestValue;
    
        // Update the gametime options
        updateGametimeOptions();
    
        // Set the selected option based on updated values
        let newSelectedValue = $('#gametime').val();
        localStorage.setItem('selectedGameTime', newSelectedValue);
        $('#gametime').val(newSelectedValue);
    
        // Close the modal
        $('#editModal').modal('hide');
    });
    
    // Event handler for the Save button in the option data modal
    $('#optionData').on('click', function() {
        // Save the current value to local storage
        localStorage.setItem('dlength', $('#dlength').val());
        localStorage.setItem('ndisplay', $('#ndisplay').val());
        localStorage.setItem('nrow', $('#nrow').val());
        localStorage.setItem('decimal', $('#decimal').val());
        localStorage.setItem('fontSize', $('#fontSize').val());
        localStorage.setItem('minusNumber', $('input[name="minusNumber"]:checked').val());
        localStorage.setItem('decimalNumber', $('input[name="decimalNumber"]:checked').val());
        localStorage.setItem('soundSystem', $('input[name="soundSystem"]:checked').val());

        // Update the gametime options
        updateGametimeOptions();

        // Close the modal
        $('#myModal').modal('hide');
    });

    // Event handler for the Close button in the option modal
    $('#optionClose').on('click', function() {
        // Reset values to the last saved state
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
        if (soundValue) {
            $(`input[name="soundSystem"][value="${soundValue}"]`).prop('checked', true);
        }
       
        
    });
    
    // Event handler for the Close button in the Edit Sepreed option 
    $('#closeSpreed').on('click', function() {
        // Reset values to the last saved state
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

    });

    $('#optionData').click(function() {
        $('#myModal').modal('hide');
    });
    $('#editSpreedSave').click(function() {
        $('#editModal').modal('hide');
    });

});


///// Multiplier value set /////////////
/////                      /////////////



$(document).ready(function() {
    // Retrieve the initial value from local storage
    let multiplierDlenValue = localStorage.getItem('multiplier') || '2';
    let multiplicandDlenValue = localStorage.getItem('multiplicand') || '2';
    let multinDisplayValue = localStorage.getItem('multi_ndisplay') || '2';
    let multiply_nRowValue = localStorage.getItem('multiplay_nrow') || '1';
    let multiplydlentValue = localStorage.getItem('multiply_dlent') || '2';
    let multiplyfontSizeValue = localStorage.getItem('multiply_fontSize') || '40';
    let multiplydNumberValue = localStorage.getItem('multiply_decimalNumber') || 'No';
    let multiplySoundValue = localStorage.getItem('multiply_soundSystem') || 'No';
    // let gametimeValue = localStorage.getItem('gametime') || '';

    // Set the initial value to the input field
    $('#multiplier').val(multiplierDlenValue);
    $('#multiplicand').val(multiplicandDlenValue);
    $('#multi_ndisplay').val(multinDisplayValue);
    $('#multiplay_nrow').val(multiply_nRowValue);
    $('#multiply_dlent').val(multiplydlentValue);
    $('#multiply_fontSize').val(multiplyfontSizeValue);
    if (multiplydNumberValue) {
        $(`input[name="multiply_decimalNumber"][value="${multiplydNumberValue}"]`).prop('checked', true);
    }
    if (multiplySoundValue) {
        $(`input[name="multiply_soundSystem"][value="${multiplySoundValue}"]`).prop('checked', true);
    }
  
    // $('#gametime').val(gametimeValue);

    // Event handler for the Save button
    $('#optionData').on('click', function() {
        // Save the current value to local storage
        multiplierDlenValue = $('#multiplier').val();
        multiplicandDlenValue = $('#multiplicand').val();
        multinDisplayValue = $('#multi_ndisplay').val();
        multiply_nRowValue = $('#multiplay_nrow').val();
        multiplydlentValue = $('#multiply_dlent').val();
        multiplyfontSizeValue = $('#multiply_fontSize').val();
        multiplydNumberValue = $('input[name="multiply_decimalNumber"]:checked').val();
        multiplySoundValue = $('input[name="multiply_soundSystem"]:checked').val();
      
        // gametimeValue = $('#gametime').val();
        localStorage.setItem('multiplier', multiplierDlenValue);
        localStorage.setItem('multiplicand', multiplicandDlenValue);
        localStorage.setItem('multi_ndisplay', multinDisplayValue);
        localStorage.setItem('multiplay_nrow', multiply_nRowValue);
        localStorage.setItem('multiply_dlent', multiplydlentValue);
        localStorage.setItem('multiply_fontSize', multiplyfontSizeValue);
        localStorage.setItem('multiply_decimalNumber', multiplydNumberValue);
        localStorage.setItem('multiply_soundSystem', multiplySoundValue);

    });

    // Event handler for the Close button
    $('#optionClose').on('click', function() {
        $('#multiplier').val(multiplierDlenValue);
        $('#multiplicand').val(multiplicandDlenValue);
        $('#multi_ndisplay').val(multinDisplayValue);
        $('#multiplay_nrow').val(multiply_nRowValue);
        $('#multiply_dlent').val(multiplydlentValue);
        $('#multiply_fontSize').val(multiplyfontSizeValue);
        if (multiplydNumberValue) {
            $(`input[name="multiply_decimalNumber"][value="${multiplydNumberValue}"]`).prop('checked', true);
        }
        if (multiplySoundValue) {
            $(`input[name="multiply_soundSystem"][value="${multiplySoundValue}"]`).prop('checked', true);
        }
        // $('#gametime').val(gametimeValue);
    });

    // Optional: Reset the form or input field when the modal is shown
    $('#yourModalId').on('show.bs.modal', function () {
        $('#multiplier').val(multiplierDlenValue);
        $('#multiplicand').val(multiplicandDlenValue);
        $('#multi_ndisplay').val(multinDisplayValue);
        $('#multiplay_nrow').val(multiply_nRowValue);
        $('#multiply_dlent').val(multiplydlentValue);
        $('#multiply_fontSize').val(multiplyfontSizeValue);
        if (multiplydNumberValue) {
            $(`input[name="multiply_decimalNumber"][value="${multiplydNumberValue}"]`).prop('checked', true);
        }
        // $('#gametime').val(gametimeValue);
    });
    
    $('#optionData').click(function() {
            $('#myModal').modal('hide');
    });
   
});



///// Division  value set /////////////
/////                      /////////////

$(document).ready(function() {
    // Retrieve the initial value from local storage
    let DivisordDlenValue = localStorage.getItem('divisordlent') || '2';
    let DividendDlentDlenValue = localStorage.getItem('DividendDlent') || '2';
    let DiviDisplayValue = localStorage.getItem('divi_ndisplay') || '2';
    let Divi_nRowValue = localStorage.getItem('divi_nrow') || '1';
    let DividlentValue = localStorage.getItem('divi_dlent') || '2';
    let DivifontSizeValue = localStorage.getItem('divi_fontSize') || '40';
    let DividNumberValue = localStorage.getItem('divi_decimalNumber') || 'No';
    let DiviSoundValue = localStorage.getItem('divi_soundSystem') || 'No';
    let remainderNumberValue = localStorage.getItem('remainderNumber') || 'No';
    // let gametimeValue = localStorage.getItem('gametime') || '';

    // Set the initial value to the input field
    $('#divisordlent').val(DivisordDlenValue);
    $('#DividendDlent').val(DividendDlentDlenValue);
    $('#divi_ndisplay').val(DiviDisplayValue);
    $('#divi_nrow').val(Divi_nRowValue);
    $('#divi_dlent').val(DividlentValue);
    $('#divi_fontSize').val(DivifontSizeValue);
    if (DividNumberValue) {
        $(`input[name="divi_decimalNumber"][value="${DividNumberValue}"]`).prop('checked', true);
    }
    if (DiviSoundValue) {
        $(`input[name="divi_soundSystem"][value="${DiviSoundValue}"]`).prop('checked', true);
    }
    if (remainderNumberValue) {
        $(`input[name="remainderNumber"][value="${remainderNumberValue}"]`).prop('checked', true);
    }
  
    // $('#gametime').val(gametimeValue);

    // Event handler for the Save button
    $('#optionData').on('click', function() {
        // Save the current value to local storage
        DivisordDlenValue = $('#divisordlent').val();
        DividendDlenValue = $('#DividendDlent').val();
        DiviDisplayValue = $('#divi_ndisplay').val();
        Divi_nRowValue = $('#divi_nrow').val();
        DividlentValue = $('#divi_dlent').val();
        DivifontSizeValue = $('#divi_fontSize').val();
        DividNumberValue = $('input[name="divi_decimalNumber"]:checked').val();
        DiviSoundValue = $('input[name="divi_soundSystem"]:checked').val();
        remainderNumberValue = $('input[name="remainderNumber"]:checked').val();
      
        // gametimeValue = $('#gametime').val();
        localStorage.setItem('divisordlent', DivisordDlenValue);
        localStorage.setItem('DividendDlent', DividendDlenValue);
        localStorage.setItem('divi_ndisplay', DiviDisplayValue);
        localStorage.setItem('divi_nrow', Divi_nRowValue);
        localStorage.setItem('divi_dlent', DividlentValue);
        localStorage.setItem('divi_fontSize', DivifontSizeValue);
        localStorage.setItem('divi_decimalNumber', DividNumberValue);
        localStorage.setItem('divi_soundSystem', DiviSoundValue);
        localStorage.setItem('remainderNumber', remainderNumberValue);

    });

    // Event handler for the Close button
    $('#optionClose').on('click', function() {
        $('#divisordlent').val(DivisordDlenValue);
        $('#DividendDlent').val(DividendDlenValue);
        $('#divi_ndisplay').val(DiviDisplayValue);
        $('#divi_nrow').val(Divi_nRowValue);
        $('#divi_dlent').val(DividlentValue);
        $('#divi_fontSize').val(DivifontSizeValue);
        if (DividNumberValue) {
            $(`input[name="divi_decimalNumber"][value="${DividNumberValue}"]`).prop('checked', true);
        }
        if (DiviSoundValue) {
            $(`input[name="divi_soundSystem"][value="${DiviSoundValue}"]`).prop('checked', true);
        }
        if (remainderNumberValue) {
            $(`input[name="remainderNumber"][value="${remainderNumberValue}"]`).prop('checked', true);
        }
        // $('#gametime').val(gametimeValue);
    });

    // Optional: Reset the form or input field when the modal is shown
    $('#yourModalId').on('show.bs.modal', function () {
        $('#multiplier').val(multiplierDlenValue);
        $('#DividendDlent').val(DividendDlenValue);
        $('#divi_ndisplay').val(DiviDisplayValue);
        $('#divi_nrow').val(Divi_nRowValue);
        $('#divi_dlent').val(DividlentValue);
        $('#divi_fontSize').val(DivifontSizeValue);
        if (DividNumberValue) {
            $(`input[name="divi_decimalNumber"][value="${DividNumberValue}"]`).prop('checked', true);
        }
        if (remainderNumberValue) {
            $(`input[name="remainderNumber"][value="${remainderNumberValue}"]`).prop('checked', true);
        }
        // $('#gametime').val(gametimeValue);
    });
    
    $('#optionData').click(function() {
            $('#myModal').modal('hide');
    });
   
});


///// Beads  value set /////////////
/////                      /////////////

// $(document).ready(function() {
//     // Retrieve the initial value from local storage
//     let BeadsDisplayValue = localStorage.getItem('bead_ndisplay') || '5';
//     let BeadsValue = localStorage.getItem('beadOptions') || 'option5';

//     // let gametimeValue = localStorage.getItem('gametime') || '';

//     // Set the initial value to the input field
//     $('#bead_ndisplay').val(BeadsDisplayValue);
//     if (BeadsValue) {
//         $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
//     }
 
  
//     // $('#gametime').val(gametimeValue);

//     // Event handler for the Save button
//     $('#optionData').on('click', function() {
//         // Save the current value to local storage
//         BeadsDisplayValue = $('#bead_ndisplay').val();
//         BeadsValue = $('input[name="beadOptions"]:checked').val();

      
//         // gametimeValue = $('#gametime').val();
//         localStorage.setItem('bead_ndisplay', BeadsDisplayValue);
//         localStorage.setItem('beadOptions', BeadsValue);


//     });

//     // Event handler for the Close button
//     $('#optionClose').on('click', function() {
//         $('#bead_ndisplay').val(BeadsDisplayValue);
//         if (BeadsValue) {
//             $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
//         }
    
//         // $('#gametime').val(gametimeValue);
//     });

//     // Optional: Reset the form or input field when the modal is shown
//     $('#yourModalId').on('show.bs.modal', function () {
//         $('#bead_ndisplay').val(BeadsDisplayValue);
//         if (BeadsValue) {
//             $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
//         }
      
//         // $('#gametime').val(gametimeValue);
//     });
    
//     $('#optionData').click(function() {
//             $('#myModal').modal('hide');
//     });
   
// });
$(document).ready(function() {
    // Retrieve the initial value from local storage or set a default value
    let BeadsDisplayValue = localStorage.getItem('bead_ndisplay') || '5';
    let BeadsValue = localStorage.getItem('beadOptions') || '5'; // Default value set to '5'

    // Set the initial value to the input field
    $('#bead_ndisplay').val(BeadsDisplayValue);
    $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
  
    // Event handler for the Save button
    $('#optionData').on('click', function() {
        // Save the current value to local storage
        BeadsDisplayValue = $('#bead_ndisplay').val();
        BeadsValue = $('input[name="beadOptions"]:checked').val();

        localStorage.setItem('bead_ndisplay', BeadsDisplayValue);
        localStorage.setItem('beadOptions', BeadsValue);
    });

    // Event handler for the Close button
    $('#optionClose').on('click', function() {
        $('#bead_ndisplay').val(BeadsDisplayValue);
        $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
    });

    // Optional: Reset the form or input field when the modal is shown
    $('#yourModalId').on('show.bs.modal', function () {
        $('#bead_ndisplay').val(BeadsDisplayValue);
        $(`input[name="beadOptions"][value="${BeadsValue}"]`).prop('checked', true);
    });

    $('#optionData').click(function() {
        $('#myModal').modal('hide');
    });
});
