var isNavClicked = true;
$(document).ready(function () {

  // $("body").hide();
  //=======================Mobile Navigation Drawer=====================
  var hamburgerBtn = "☰";
  var times = "×";

  $("#nav_drawer_btn span").click(function () {

    var currVal = $("#nav_drawer_btn span").html();

    if (currVal == hamburgerBtn) {
      $("#nav_drawer_btn span").html(times);
      $("#nav_drawer_btn span").css("line-height", "1.1");
      $("#nav_drawer_btn span").css("font-size", "300%");
      $(".navigation").css("height", "100%");
    }
    else {
      $("#nav_drawer_btn span").html(hamburgerBtn);
      $("#nav_drawer_btn span").css("line-height", "2");
      $("#nav_drawer_btn span").css("font-size", "200%");
      $(".navigation").css("height", "0");

    }

  });

  //======================= End Mobile Navigation Drawer=====================

  //=========================Testimonials Using Glide=====================
  if ($('.glide').length) {
    var glide = new Glide('.glide', {
      type: 'carousel',
      startAt: 1,
      perView: 2,
      focusAt: '1',
      breakpoints: {
        840: {
          perView: 1
        }
      }
    });
    glide.mount();
  }
  //========================= End Glider Testimonials=====================

  //============================Side Nav============================

  //initially show an close side navigation bar for mobile devices 
  if ($('header').width() <= 840) {

    setTimeout(function () {
      $("#page_side_nav").css("width", "0");
    }, 500);



    $("#close_nav").click(function () {
      $("#page_side_nav").css("width", "0");

    });
    $(document).click(function () {

      // console.log("doc clicked " + isNavClicked);


      if (isNavClicked === false) $("#page_side_nav").css("width", "0");
      isNavClicked = false;


      $("#page_side_nav").click(function () {
        isNavClicked = true;
        // console.log("nav clicked " + isNavClicked);

      });

    });
  }

  /*slide in and out side menu */
  slideOutNav(document.getElementById("page_side_nav"), document.getElementById("nav_touch"));

  function slideOutNav(element, element_touch) {

    /*start move process when touch is pressed*/
    element_touch.ontouchstart = dragTouchStart;

    function dragTouchStart(e) {
      e = e || window.event;
      document.ontouchend = closeDragElement;
      document.ontouchmove = elementDrag;
    }

    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      /*update width of drawer when touch event is moved */
      element.style.width = e.touches[0].clientX + "px";
    }

    function closeDragElement() {
      /* stop moving when touc is released:*/
      document.ontouchend = null;
      document.ontouchmove = null;
    }

  }

  /*Side menu accordian style - only open one menu at any given point in time   */
  $(".side_menu").click(function () {

    var $btn_clicked = $(this);
    var $menu_arrow_icon = $btn_clicked.children().first();

    $(".side_menu").each(function () {

      if ($(this).html() === $btn_clicked.html()) {
        $btn_clicked.next().toggleClass("open_sub_menu");
        $menu_arrow_icon.toggleClass("rotate_arrow_icon");

      }
      else {
        $(this).next().removeClass("open_sub_menu");
        $(this).children().first().removeClass("rotate_arrow_icon");
      }
    });

  });
  //============================EndSide Nav============================

  //============================Load Page Template Pieces======================
  $("").click( function(e) {
    // console.log("test");
    e.preventDefault(); 
    nonce = $(this).attr("data-nonce")

    $.ajax({
       type : "post",
       dataType : "json",
       url : ajax.ajax_url,
       data : {action: "", nonce: nonce},
       success: function(response) {
          if(response.type == "success") {
             $("#page_main").html(response.vote_count)
          }
          else {
            //  alert("Your vote could not be added")
          }
       }
    });   

 });
  //============================End of Load Page Templates Pieces======================



});

