 //LOGIN  
$( document ).ready( function () {
    $( "#login_form" ).validate( {
        rules: {
            email: "required",
            password: "required"
        },
        messages: {
            email: "Please enter a valid Email Address",
            password: "Please enter a valid Password"
        },
        errorElement: "em",

        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );
            error.insertAfter(element.next(".pmd-textfield-focused"));
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    } );
    
    $(document).on("submit", "#login_form", function(e){ 
        e.preventDefault();
        if($('#login_form').validate()){
            
            customRequest( base_url+'/process-login', $("#login_form").serialize(), function(e) { 
              
              console.log(e);
             // $( ".swalDefaultError" ).trigger( "click" ).hide();
              if(e.status == 1){
                 pageRedirect(base_url+'/dashboard') ;  
              }
              else{
                 // alert(e.msg );
                error_alert(e.msg)
                  
              }
              
            });
        }
    } );
    
} );

//SIGNUP
$(function () {

  $('#register_form').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true
      },
      password: {
        required: true,
        minlength: 5
      },
      cpassword: {
        equalTo: "#password"
      },
      
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      name: " Enter a fullname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      cpassword: " Enter Confirm Password Same as Password",
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  
  $(document).on("submit", "#register_form", function(e){ 
        e.preventDefault();
        if($('#register_form').validate()){
            showDisableLayer();
            customRequest( base_url+'/process-signup', $("#register_form").serialize(), function() {
               pageRedirect(base_url+'/dashboard') ;
            });
        }
    } );
  
});

//AJAX
function customRequest(u,d,callback) {
   showDisableLayer();
   $('.submit').attr("disabled", true);
   $.ajax({
     type: "post",
     url: u,
     data:d,
     dataType:"json",
     success: function(data) {
        console.log(data); // predefined logic if any

        if(typeof callback == 'function') {
           callback(data);
           
        }
        
        $('.submit').attr("disabled", false);
     }
  });
}
//Redirect
function pageRedirect(url) {
    window.location.href = url;
}

function error_alert(msg){
    
  var div  = "<div class=\"alert alert-danger\">"+msg+".</div>"
  $(".alert, .alert-danger, .alert-info").remove();
  $("#login_form").before(div);
  $("#alertContainer").delay(1000).fadeOut(800);                                     
  hideDisableLayer(); // Hides the layer of glass.
 
}

var showDisableLayer = function() {
  $('<div id="loading" style="position:fixed; z-index: 2147483647; top:0; left:0; background-color: white; opacity:0.0;filter:alpha(opacity=0);"></div>').appendTo(document.body);
  $("#loading").height($(document).height());
  $("#loading").width($(document).width());
};

var hideDisableLayer = function() {
    $("#loading").remove();
};


//Mail
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })





