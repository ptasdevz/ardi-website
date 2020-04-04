var isNavClicked = true;
var drawer_open_width = 280;
if (sessionStorage.hasNavDrawerRunOnce == undefined) sessionStorage.hasNavDrawerRunOnce = false;

$(document).ready(function () {

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

  //initially show and close side navigation bar for mobile devices 
  if ($('header').width() <= 840) {
    // console.log(sessionStorage.hasNavDrawerRunOnce);
    if (sessionStorage.hasNavDrawerRunOnce == "false") {

      $("#page_side_nav").css("width", drawer_open_width + "px");

      setTimeout(function () {
        $("#page_side_nav").css("width", "0");
      }, 500);
      sessionStorage.hasNavDrawerRunOnce = true;
    }


    $("#close_nav").click(closeSideNav);

    $(document).click(function () {

      // console.log("doc clicked " + isNavClicked);


      if (isNavClicked === false) {
        closeSideNav();
      }
      isNavClicked = false;


      $("#page_side_nav").click(function () {
        isNavClicked = true;
        // console.log("nav clicked " + isNavClicked);

      });

    });

  }

  /*slide in and out side menu */
  var nav_bar = document.getElementById("nav_touch");
  if (nav_bar != undefined) {
    setUpSlideOutInNavBar(document.getElementById("page_side_nav"), nav_bar, drawer_open_width, 0.5);
  }

  /*Side menu accordian style - only open one menu at any given point in time   */
  $(".side_menu").click(function () {

    var $btn_clicked = $(this);
    var $menu_arrow_icon = $btn_clicked.children().first();

    $(".side_menu").each(function () {

      if ($(this).html() === $btn_clicked.html()) {
        $btn_clicked.next().toggleClass("open_side_sub_menu");
        $menu_arrow_icon.toggleClass("rotate_arrow_icon");

      }
      else {
        $(this).next().removeClass("open_side_sub_menu");
        $(this).children().first().removeClass("rotate_arrow_icon");
      }
    });

  });
   //enable side navigation bar on specific pages
   page_title = $("#nav_touch").attr("data-page-title");
   switch (page_title) {
       case "kids-corner":
       case "resources":
           break;
       default:
           $("#nav_touch").css("display", "none");
   }
  //============================End Side Nav============================

  //============================Load Page Template Pieces======================
  /*
  $("").click(function (e) {
    // console.log("test");
    e.preventDefault();
    nonce = $(this).attr("data-nonce");

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajax.ajax_url,
      data: { action: "", nonce: nonce },
      success: function (response) {
        if (response.type == "success") {
          $("#page_main").html(response.vote_count)
        }
        else {
          //  alert("Your vote could not be added")
        }
      }
    });

  });
  */
  //============================End of Load Page Templates Pieces======================




});
//===========================Helper Functions=========================
function setUpSlideOutInNavBar(element, element_touch, max_width, opacity_max) {
  var curr_nav_width = 0;
  var overlay = document.getElementById("overlay");

  /*start move process when touch is pressed*/
  element_touch.ontouchstart = dragTouchStart;

  function dragTouchStart(e) {
    e = e || window.event;
    document.ontouchend = closeDragElement;
    document.ontouchmove = elementDrag;
    overlay.style.display = "block";

  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    /*update width of drawer when touch event is moved */
    curr_nav_width = e.touches[0].clientX;
    if (curr_nav_width < max_width) {

      element.style.width = curr_nav_width + "px";
      var val = (curr_nav_width / max_width) * opacity_max;
      overlay.style.backgroundColor = "rgba(0,0,0," + val + ")";

    }
  }

  function closeDragElement() {
    if (curr_nav_width < max_width / 2) {
      element.style.width = "0px";
      overlay.style.backgroundColor = "rgba(0,0,0,0)";
      overlay.style.display = "none";

    }
    else {
      element.style.width = max_width + "px";
      overlay.style.backgroundColor = "rgba(0,0,0," + opacity_max + ")";
    }
    /* stop moving when touch is released:*/
    document.ontouchend = null;
    document.ontouchmove = null;
  }

}

function closeSideNav() {
  $("#page_side_nav").css("width", "0");
  $("#overlay").css("display", "none");
  $("#overlay").css("backgroundColor", "rgba(0,0,0,0)");
}

