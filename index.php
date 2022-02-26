<html>
    <head>
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    </head>
    <header></header>
    <body>
	<div style="width:50%;margin-left: 389px;margin-top: 80px">
	<form name="myform" method="post" action="" id="dataform">	 
  <div class="form-row">
    <div class="form-group col-md-6" style="padding-left: 0px;">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="fname" name="firstname" placeholder="Fist Name">
    </div>
    <div class="form-group col-md-6" style="padding-right: 0px;">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
    </div>
  </div>
  <div class="form-group">
    <label for="email">E-mail<span>(required)</span></label>
    <input type="email" class="form-control" name="email" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" name="phone" placeholder="Phone">
  </div>
  <div class="form-group">
    <label for="comments">Comments</label>
    <textarea class="form-control" name="comments" rows="3" placeholder="comments" type="text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</div>
<div id="success"></div>
</form>

<script>
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='myform']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      phone: {
        required: true,
        maxlength: 10
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      phone: {
        required: true,
        number: true,
      },
     
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      phone: {
        required: "Please provide your contact no",
        maxlength: "must be 10 number"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      //form.submit()
     
      //var myusername = $("#dataform").val();
      $.ajax({
  type: "POST",
  url: "ajax.php",
  data: $('form').serialize(), 
  success: function(data) {
                if(data==0)
                { 
                  jQuery('#success').html('Signup successful!');
                }
                else if(data==1)
                {
                  jQuery('#success').html('Signup not successful!');
                }
                else{
                  jQuery('#success').html('database not connected!');
                }
  }
});
    }
  });
});


</script>

<!--<script>
var myusername = $("#dataform").val();
$.ajax({
  type: "GET",
  url: "ajax.php",
  data: myusername,
  dataType: "html",
  success: function(data){
     $("#resultarea").text(data);
  }
});
</script>
-->

</body>
</html>