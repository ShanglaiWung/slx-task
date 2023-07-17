$(document).ready(function(){
    $("#fname, #lname").keydown(function (e) {
        // if (e.shiftKey || e.ctrlKey || e.altKey) {
        //     e.preventDefault();
        // } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        // }
    });

    $('#submit-btn').click( function(e) {
        // e.preventDefault();
        var email_id, ph_no, pass, is_valid_email, is_valid_phone, is_valid_pass;

        email_id = document.getElementById('email-id');
        ph_no = document.getElementById('ph_number');
        pass = document.getElementById('psw');

        is_valid_email = validateEmail(email_id);
        is_valid_phone = validatePhoneNo(ph_no);
        is_valid_pass = validatePassword(pass);

        if (false == is_valid_email) {
            alert("You have entered an invalid email address!");
            email_id.focus();
            return false;
        } else if ('empty' == is_valid_email) {
            alert("Please fill out email address");
            email_id.focus();
            return false;
        }

        if (false == is_valid_phone) {
            alert("The phone numbers don't appear to be valid.");
            ph_no.focus();
            return false;
        } else if ('empty' == is_valid_phone) {
            alert("Please fill out phone number");
            ph_no.focus();
            return false;
        }

        if (false == is_valid_pass) {
            alert("Your password must be at least 7 characters long");
            pass.focus();
            return false;
        } else if ('empty' == is_valid_pass) {
            alert("Please fill out password");
            pass.focus();
            return false;
        }

        if (true == is_valid_email && true == is_valid_phone && true == is_valid_pass) {
            $('form#regForm').submit();
        }
    });

    $('#update-btn').click( function(e) {
        // e.preventDefault();
        var email_id, ph_no, is_valid_email, is_valid_phone;

        email_id = document.getElementById('email-id');
        ph_no = document.getElementById('ph_number');

        is_valid_email = validateEmail(email_id);
        is_valid_phone = validatePhoneNo(ph_no);

        if (false == is_valid_email) {
            alert("You have entered an invalid email address!");
            email_id.focus();
            return false;
        } else if ('empty' == is_valid_email) {
            alert("Please fill out email address");
            email_id.focus();
            return false;
        }

        if (false == is_valid_phone) {
            alert("The phone numbers don't appear to be valid.");
            ph_no.focus();
            return false;
        } else if ('empty' == is_valid_phone) {
            alert("Please fill out phone number");
            ph_no.focus();
            return false;
        }

        if (true == is_valid_email && true == is_valid_phone) {
            $('form#updForm').submit();
        }
    });

    function validateEmail(email_id) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(email_id.value.match(mailformat)) {
            return true;
        } else {
            if (email_id.value == '') {
                return 'empty';
            } else {
                return false;
            }
        }
    }

    function validatePhoneNo(ph_no) {
        if(ph_no.value.length == 10) {
            return true;
        } else { 
            if (ph_no.value == '') {
                return 'empty';
            } else {
                return false;
            }
        }
    }

    function validatePassword(pass) {
        if (pass.value.length > 6) {
            return true;
        } else {
            if (pass.value == '') {
                return 'empty';
            } else {
                return false;
            }            
        }
    }
});

function onlyNumberKey(evt) {
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
    return true;
}