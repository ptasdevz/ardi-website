var isNavClicked = true;
var isNavBtnClicked = true;
var drawer_open_width = 280;
var curr_nav_width = 0;
if (sessionStorage.hasNavDrawerRunOnce == undefined) sessionStorage.hasNavDrawerRunOnce = false;

$(document).ready(function () {

  //=======================Mobile Navigation Drawer=====================

  $("#nav_drawer_btn span").click(function () {

    var currVal = $("#nav_drawer_btn span").html();
    if (currVal === "☰") openSideNav();
    else closeSideNav();

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

    $(".main_nav a").click(function(){
        closeSideNav();
    });

    //$("#close_nav").click(closeSideNav);

    // $(document).click(function (event) {

    //   var text = $(event.target).attr("data-ele-name");
    //   console.log(text);

    //   // console.log("doc clicked " + isNavClicked);


    //   if (isNavClicked === true || isNavBtnClicked === true) {
    //     //do nothing
    //   }else closeSideNav();
    //   isNavClicked = false;
    //   isNavBtnClicked = false;

    //   //$("#page_side_nav").unbind();
    //   $("#page_side_nav").click(function () {
    //     isNavClicked = true;

    //   });
    //   //$("#nav_drawer_btn").unbind();
    //   $("#nav_drawer_btn").click(function () {
    //     isNavBtnClicked = true;

    //   });

    // });

    $("#overlay").click(function(){
      closeSideNav();
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
  //  page_title = $("#nav_touch").attr("data-page-title");
  //  switch (page_title) {
  //      case "kids-corner":
  //      case "resources":
  //          break;
  //      default:
  //          $("#nav_touch").css("display", "none");
  //  }
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
  var isDragging = false;
  var overlay = document.getElementById("overlay");
  var nav_drawer_btn = document.getElementById("nav_drawer_btn");

  /*start move process when touch is pressed*/
  element_touch.ontouchstart = dragTouchStart;

  function dragTouchStart(e) {
    e = e || window.event;
    isDragging = true;
    document.ontouchend = closeDragElement;
    document.ontouchmove = elementDrag;
    overlay.style.display = "block";
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();

    /*update width of drawer when touch event is moved */
    curr_nav_width = e.touches[0].clientX;

    /*control manual dragging of drawer */
    if (curr_nav_width < max_width) {
      element.style.width = curr_nav_width + "px";
      var val = (curr_nav_width / max_width) * opacity_max;
      overlay.style.backgroundColor = "rgba(0,0,0," + val + ")";

    }
  }

  function closeDragElement() {
    if (curr_nav_width < (max_width / 2) && isDragging) {
      closeSideNav();
    }
    else {
      openSideNav();
    }
    /* stop moving when touch is released:*/
    document.ontouchend = null;
    document.ontouchmove = null;
    isDragging = false;
  }

}

function closeSideNav() {
  setMobileNavBtnToOpenIcon();
  $("#page_side_nav").css("width", "0");
  $("#overlay").css("display", "none");
  $("#overlay").css("backgroundColor", "rgba(0,0,0,0)");
  curr_nav_width = 0;
}

function openSideNav() {
  $("#page_side_nav").css("width", drawer_open_width + "px");
  $("#overlay").css("backgroundColor", "rgba(0,0,0,0.5)");
  $("#overlay").css("display", "block");
  setMobileNavBtnToCloseIcon();
  curr_nav_width = drawer_open_width;
}

function setMobileNavBtnToOpenIcon() {

  $("#nav_drawer_btn span").html("☰");
  $("#nav_drawer_btn span").css("line-height", "2");
  $("#nav_drawer_btn span").css("font-size", "200%");
}
function setMobileNavBtnToCloseIcon() {

  $("#nav_drawer_btn span").html("×");
  $("#nav_drawer_btn span").css("line-height", "1.1");
  $("#nav_drawer_btn span").css("font-size", "300%");
}
