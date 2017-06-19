$(function(){
$("form[name='form']").validate({
rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
mobile: {
        required: true,
        minlength: 7
      },
model: "required",
rating: {
        required: true,

         },
comments: {
        required: true,
        
         minlength: 10
      },
},
messages:{
name: "*Enter ur name",
email: "Email is invalid or empty",
mobile:{ 
    required: "Enter Mobile number",
    minlength: "Please check mobile Number"
},
model:"enter Model Name correctly",
rating:"*Enetr Rating between 1-5",
comments:"please fill the comments",
},
  
     
});
});

