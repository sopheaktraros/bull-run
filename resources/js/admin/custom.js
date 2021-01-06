

window.remove = function(url){
    $.confirm({
        title: 'Are you sure ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function(){
                    window.open(url,"_self");
                }
            },
            close: function () {
            }
        }
    });
}

window.paid = function(url){
    $.confirm({
        title: 'Are you sure ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function(){
                    window.open(url,"_self");
                }
            },
            close: function () {
            }
        }
    });
}

window.detail = function(url){
    window.open(url,"_self");
}

window.cancel = function(url){
    $.confirm({
        title: 'Are you sure ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function(){
                    window.open(url,"_self");
                }
            },
            close: function () {
            }
        }
    });
}

window.clear = function(url){
    $.confirm({
        title: 'Are you sure ?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function(){
                    window.open(url,"_self");
                }
            },
            close: function () {
            }
        }
    });
}

$('.number').keypress(function (event) {
    return isNumber(event, this)
});

function isNumber(evt, element) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (            
        (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
        (charCode < 48 || charCode > 57))
        return false;
        return true;
}


var n = 1;

window.checkValidation = function(){
    var isTrue = false;
    
    $('.wizard-content-active .required').each(function() {
        
        if($(this).val() == ""){
            isTrue = false;
            return false;
        }

        isTrue = true;
    });

    return isTrue;
}

// function checkValidation(){
//     var isTrue = false;
    
//     $('.wizard-content-active .required').each(function() {
        
//         if($(this).val() == ""){
//             isTrue = false;
//             return false;
//         }

//         isTrue = true;
//     });

//     return isTrue;
// }


function checkValidationStep2(){
    var isTrue = false;
    var rowCount = $('#tblbody tr').length;

    if(rowCount <= 0){
        isTrue = false;
        return false;
    }

    isTrue = true;
    return isTrue;
}

$("#nextStep").click(function(){
    var check = checkValidation();
    var step = $(this).attr('data-step');
    if(step == 2){
        check = checkValidationStep2();
    }
    
    step = parseInt(step) + 1;

    if(check){
        

        $("#previousStep").removeClass('hidden');
        $(this).attr('data-step',step);

        $(this).addClass('hidden');
        $("#save").removeClass('hidden');

        stepActive(step);
        n = step;
    }else{
        showErrorMsg('Please check the blank fields !');
    }
    
});

$("#previousStep").click(function(){
    n--;
    stepActive(n);
    $("#nextStep").attr('data-step',n);
    $("#nextStep").removeClass('hidden');
    $("#save").addClass('hidden');
    if(n==1){
        $(this).addClass('hidden');
    }
 
})

function stepActive(step){

    $(".wizard-steps .wizard-step").removeClass('wizard-step-active');
    $(".wizard-steps .step-"+step).addClass('wizard-step-active');

    $(".wizard-contents .wizard-content").removeClass('wizard-content-active');
    $(".wizard-contents .step-"+step).addClass('wizard-content-active');
 
}

function showErrorMsg(title){
    $.confirm({
        title: 'Encountered an error!',
        content: title,
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Close',
                btnClass: 'btn-red'
            }
        }
    });
}
