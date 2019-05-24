$(document).ready(function(){
//     $("[data-toggle=popover]").popover({html:true})  
    
//     var showPopover = function () {
//         $(this).popover('show');
//     }
//     , hidePopover = function () {
//         $(this).popover('hide');
//     };
// $('#ex1').popover({
//         content: 'An Example1 popover',
//         trigger: 'hover',
//         placement:'top'
//     })
// $('#ex2').popover({
//         content: 'An Example2 popover',
//         trigger: 'hover',
//         placement:'top'
//     }) 

// $('#ex3').popover({
//         content: 'An Example3 popover',
//         trigger: 'hover',
//         placement:'top'
//     })  

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 600) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
  });
  $('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
  }); 
//login shake when it's user wrong usernam or password
$(".alert").effect("shake");

//profil setting logout
  var arrowdown = $('.fa-caret-up');
  var form = $('.logoutform');
  var status = false;
  $('#down').click(function(event){
      event.preventDefault();
      if (status == false) {
        form.fadeIn();
        arrowdown.fadeIn();
        status = true;
      }else{
        arrowdown.fadeOut();
        form.fadeOut();
        status = false;
      }
  });
});