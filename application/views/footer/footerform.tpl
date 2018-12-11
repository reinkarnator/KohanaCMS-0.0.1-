<form id="sendform" method="POST">
    <div class="form-group">
        <input type="text" name="name" placeholder="Name" class="form-control formType">
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Email" class="form-control formType">
    </div>
    <div class="form-group" style="position: relative;">
        <textarea placeholder="Message" name="message" class="form-control formType" style="resize: none;height: 128px;width: calc(100% - 50px);"></textarea>
        <div class="addon-textarea"></div>
        <button type="submit" class="roundSubmit" id="sendbtn">
            <span>{__("Send",NULL)}</span>
        </button>
    </div>
</form>
<script>
{literal}
$('#sendbtn').click(function(event){
event.preventDefault();
var err = '';
if($('#sendform input[name=email]').val() == '') {
  $('#sendform input[name=email]').css('border','2px solid red');
  err = 'Email is not filled!';
} else if (!isValidEmailAddress($('#sendform input[name=email]').val())) { 
  $('#sendform input[name=email]').css('border','2px solid red');
  err = 'Email is incorrect!';
}

if (!err) {
var url = "{/literal}{URL::base(TRUE)}{literal}";
var url2 = "/formvalid";
var lang = "{/literal}{$lang}{literal}";
var sent = "{/literal}{__('Message sent',NULL)}{literal}!";

console.log(url+lang+url2);
$.ajax({
   url: url+lang+url2,
   type: "POST",
   data: $('#sendform').serialize(),
   success: function() {
        alert(sent);
   },
   error: function(response) {
        alert('error');
   }
 });
} else {
  $('<span style="color:red;">'+err+'</span>').insertAfter('#sendform input[name=email]');
}
});
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};  
{/literal}   
</script>