/**
 * Created by admin on 7/23/2017.
 */



function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }

    return true;


}
function isDecimal(evt, element) {

    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode != 45 || $(element).val().indexOf('-') != -1) && // â€œ-â€ CHECK MINUS, AND ONLY ONE.
        (charCode != 46 || $(element).val().indexOf('.') != -1) && // â€œ.â€ CHECK DOT, AND ONLY ONE.
        charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;

}

function isCharacter(evt) {

    var c = evt.which || evt.keyCode;
    if((c > 31 && c < 65) || (c > 90 && c < 97) ||
        (c > 122 && c !== 127))
        return false;

    return true;

}

$('.isCharacter').attr('onkeypress', 'return isCharacter(event)');
$('.isNumber').attr('onkeypress', 'return isNumber(event)');
$('.isDecimal').attr('onkeypress', 'return isDecimal(event,this)');