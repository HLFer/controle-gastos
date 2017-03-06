$(document).ready(function(){
    $('.cpf').inputmask({"mask": "999.999.999-99"});
    $('.date').inputmask("date", { "clearIncomplete": true, "placeholder": "dd/mm/aaaa" });
    $('.decimal').inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': '',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ",",
        'digitsOptional': false,
        'allowMinus': false,
        'placeholder': '0,00'
    });
    $('.phone').inputmask({
        "mask": ["(99) 9999-9999", "(99) 99999-9999"],
        "keepStatic": true
    });
});