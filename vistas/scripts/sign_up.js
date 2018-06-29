$(document).ready(function() {
/*$("#sign_up").submit(function (event) {
  if ((!$("#namesurname").length() < 4)) {
    return;
  }
});*/
$('#password').keyup(function() {
$('#result').html(checkStrength($('#password').val()))
var password = $('#password').val();
})
function checkStrength(password) {
var strength = 0
if (password.length > 7) {
$('#condicion1').removeClass('far fa-circle');
$('#condicion1').addClass('fas fa-check-circle');
}else{
  $('#condicion1').removeClass('fas fa-check-circle');
  $('#condicion1').addClass('far fa-circle');
}
if(password.match(/([a-z])/)){
  $('#condicion2').removeClass('far fa-circle');
  $('#condicion2').addClass('fas fa-check-circle');
}else {
  $('#condicion2').removeClass('fas fa-check-circle');
  $('#condicion2').addClass('far fa-circle');
}
if(password.match(/([A-Z])/)){
  $('#condicion3').removeClass('far fa-circle');
  $('#condicion3').addClass('fas fa-check-circle');
}else {
  $('#condicion3').removeClass('fas fa-check-circle');
  $('#condicion3').addClass('far fa-circle');
}
if(password.match(/([0-9])/)){
  $('#condicion4').removeClass('far fa-circle');
  $('#condicion4').addClass('fas fa-check-circle');
}else {
  $('#condicion4').removeClass('fas fa-check-circle');
  $('#condicion4').addClass('far fa-circle');
}
if(password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
  $('#condicion5').removeClass('far fa-circle');
  $('#condicion5').addClass('fas fa-check-circle');
}else {
  $('#condicion5').removeClass('fas fa-check-circle');
  $('#condicion5').addClass('far fa-circle');
}
if (password.length > 9) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result').removeClass()
$('#result').addClass('weak')
return 'Weak'
} else if (strength == 2) {
$('#result').removeClass()
$('#result').addClass('good')
return 'Good'
} else {
$('#result').removeClass()
$('#result').addClass('strong')
return 'Strong'
}
}
});
