$(document).ready(function(){


    //=======================Mobile Navigation Drawer=====================
    var hamburgerBtn = "☰";
    var times = "×";

    $("#nav_drawer_btn span").click(function(){

        var currVal = $("#nav_drawer_btn span").html();

        if (currVal == hamburgerBtn){
            $("#nav_drawer_btn span").html(times);
            $(".navigation").slideDown();
        }
        else{
            $("#nav_drawer_btn span").html(hamburgerBtn);
            $(".navigation").slideUp();
        } 
        
    });
    //======================= End Mobile Navigation Drawer=====================

    //=========================Testimonials Using Glide=====================
    new Glide('.glide',{
        type: 'carousel',
        perview: 1,
    }).mount()
    //========================= End Glider Testimonials=====================

});

            