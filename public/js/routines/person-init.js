$(document).ready(function () {
    $("#form1").validate({
        rules: {
            name: {
                required: true,
            },
            value: {
                required: true,
                numberBR: true,
            },
            birthday: {
                required: true,
                dateBR: true,
            },
        },
    });
    $("#birthday").inputmask("99/99/9999");
    $("#value")
        .maskMoney({ thousands: ".", decimal: ",", allowZero: true })
        .maskMoney("mask");
});
