//Additional Functions
function ShowSuccessNoto(text) {
    $('body').append(`
        <div class="notification success-notification">
            <div class="notification-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="notification-content">
                <b>تم بنجاح !</b>
                <p>${text}</p>
            </div>
    </div>
    `);

}

function ShowErrorNoto(text) {
    $('body').append(`
    <div class="notification error-notification">
        <div class="notification-icon">
            <i class="fas fa-times"></i>
        </div>
        <div class="notification-content">
            <b>خطأ</b>
            <p>${text}</p>
        </div>
    </div>
    `);
}
