$(document).ready(function () {

    $('#myform').validate({
        rules: {
            field1: {
                required: true
            },
            field2: {
                required: true
            }
        },
        submitHandler: function (form) { // for demo
            alert('valid form');
            return false;
        }
    });

    // programmatically check any element using the `.valid()` method.
    $('#event1').on('click', function () {
        $('input[name="field1"]').valid();
    });

    // programmatically check the entire form using the `.valid()` method.

    $('#event2').on('click', function () {
        $('#myform').valid();
    });

});