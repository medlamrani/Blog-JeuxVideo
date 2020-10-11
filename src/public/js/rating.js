$( ".rateButton" ).click(function() {
    if($(this).hasClass('star-grey')) {
        $(this).removeClass('star-grey').addClass('star-highlight star-selected');
        $(this).prevAll('.rateButton').removeClass('star-grey').addClass('star-highlight star-selected');
        $(this).nextAll('.rateButton').removeClass('star-highlight star-selected').addClass('star-grey');
    } else {
        $(this).nextAll('.rateButton').removeClass('star-highlight star-selected').addClass('star-grey');
    }
    $("#rating").val($('.star-selected').length);  //count the num of star selected
});

  