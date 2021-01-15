//Grab the Functions File
$.getScript("public/js/functions.js");

//Resend Confirmation Email
$('#resend-account-confirmation-mail').click(function () {
    //Go into Loading State
    $(this).html('<i class="fas fa-spinner fa-spin ml-3"></i> اعادة ارسال رمز التأكيد')
    //Setup Vars
    var ActionRoute = $(this).data('action');
    var UserId = $(this).data('id');
    var That = $(this);
    $.ajax({
        method: 'post',
        url: ActionRoute,
        data: {
            'user_id': UserId
        },
        success: function (response) {
            That.html('<i class="fas fa-check ml-3"></i> اعادة ارسال رمز التأكيد');
            ShowSuccessNoto(response);
        },
        error: function (response) {
            That.html('<i class="fas fa-times ml-3"></i> اعادة ارسال رمز التأكيد');
            ShowErrorNoto(response.responseText);
        }
    });
});


//The Report Form
$('#account-report-form-submit').click(function (e) {
    e.preventDefault();
    //Go into Loading State
    $(this).html('<i class="fas fa-spinner fa-spin ml-3"></i>');
    //Setup Vars
    var ActionRoute = $(this).data('action');
    var FormData = $(this).parent().serialize();
    var That = $(this);
    $.ajax({
        method: 'post',
        url: ActionRoute,
        data: FormData,
        success: function (response) {
            That.html('ارسال');
            ShowSuccessNoto(response);
        },
        error: function (response) {
            That.html('ارسال');
            ShowErrorNoto(response.responseText);
        }
    });
});
