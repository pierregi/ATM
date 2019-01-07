

$("#bouton").click(function(e){
  e.preventDefault();
  $("#ville").hide();
});

$(document).ready(function() {
    alert("coucou");
    $('#password, #password2').on('keyup', function(e) {
 
     if($('#password').val() != '' && $('#password2').val() != '' && $('#password').val() != $('#password2').val())
            {
               $('#passwordStrength').removeClass().addClass('alert alert-error').html('Passwords do not match!');
 
            return false;
           }
 
        // Must have capital letter, numbers and lowercase letters
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
 
        // Must have either capitals and lowercase letters or lowercase and numbers
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
 
        // Must be at least 6 characters long
        var okRegex = new RegExp("(?=.{4,}).*", "g");
 
        if (okRegex.test($(this).val()) === false) {
            // If ok regex doesn't match the password
               $('#passwordStrength').removeClass().addClass('alert alert-error').html('Password must be 6 characters long.');
 
        } else if (strongRegex.test($(this).val())) {
            // If reg ex matches strong password
            $('#passwordStrength').removeClass().addClass('alert alert-success').html('Good Password!');
        } else if (mediumRegex.test($(this).val())) {
            // If medium password matches the reg ex
            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Make your password stronger with more capital letters, more numbers and special characters!');
        } else {
            // If password is ok
            $('#passwordStrength').removeClass().addClass('alert alert-error').html('Weak Password, try using numbers and capital letters.');
        }
 
        return true;
    });