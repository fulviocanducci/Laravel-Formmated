moment().locale("pt-br");
$.validator.setDefaults({
    ignore: [],
});
$.validator.addMethod(
    "dateBR",
    function (value, element) {
        return (
            this.optional(element) ||
            (value &&
                value.length === 10 &&
                moment(value, "DD-MM-YYYY").isValid())
        );
    },
    "Date Brazil is invalid"
);

$.validator.addMethod(
    "numberBR",
    function (value, element) {
        return (
            this.optional(element) ||
            (value &&
                value.length > 0 &&
                /^(?:-?\d+|-?\d{1,3}(?:.\d{3})+)?(?:\,\d+)?$/.test(value))
        );
    },
    "Number Brazil is invalid"
);

$.extend($.validator.messages, {
    dateBR: "Data inválida",
    numberBR: "Valor inválido",
});
