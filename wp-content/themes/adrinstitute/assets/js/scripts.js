    $(document).ready(function () {

    // $("body").hide();
    //=======================Mobile Navigation Drawer=====================
    var hamburgerBtn = "☰";
    var times = "×";

    $("#nav_drawer_btn span").click(function () {

        var currVal = $("#nav_drawer_btn span").html();

        if (currVal == hamburgerBtn) {
            $("#nav_drawer_btn span").html(times);
            $("#nav_drawer_btn span").css("line-height","1.1");
            $("#nav_drawer_btn span").css("font-size","300%");
            $(".navigation").slideDown();
        }
        else {
            $("#nav_drawer_btn span").html(hamburgerBtn);
            $("#nav_drawer_btn span").css("line-height","2");
            $("#nav_drawer_btn span").css("font-size","200%");
            $(".navigation").slideUp();
        }

    });
    //======================= End Mobile Navigation Drawer=====================

    //=========================Testimonials Using Glide=====================
    var glide = new Glide('.glide', {
        type: 'carousel',
        perView: 2,
        focusAt: '1',
        breakpoints: {
          840: {
            perView: 1
          }
        }
      });
      glide.mount();
    //========================= End Glider Testimonials=====================

});

