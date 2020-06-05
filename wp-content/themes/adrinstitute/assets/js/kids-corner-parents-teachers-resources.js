var is_yt_client_lib_loaded = false;
var is_blog_cat_loaded = false;
var is_reading_cat_loaded = false;
var is_worksheet_cat_loaded = false;
var is_first_sub_menu_link_loaded = false;
var post_list;
var curr_post_offset = Number(0);
var curr_page_offset = Number(0);
var curr_page_section = Number(-1);
var current_post_cat_id;
var curr_per_page_count;
var is_more_offset = false;
var num_of_link_displayed = 4;
var you_tube_pages = ["resources", "kids-corner"];


$(document).ready(function () {


    //===============================Helpful/Learning resource Links Content======================
    //get all other-links from backend.
    var other_links = [];
    //loading links
    $(".other_links_list").children().each(function () {
        other_links[other_links.length] = $(this).attr('id');
    });
    other_links.forEach(function (link_and_display_name, index) {
        if (link_and_display_name) {
            href = link_and_display_name.substr(0, link_and_display_name.indexOf("_"));
            display_name = link_and_display_name.substr(link_and_display_name.indexOf("_") + 1);
            href_lower = href.replace(/\s/g, '_').toLowerCase();
            display_name_capitalized = display_name.charAt(0).toUpperCase() + display_name.substr(1);
            display_name_joined = display_name.split(" ").join("_");
            $('#other_links_menu div').append(" <button data-btn-loc=tab data-link=" + display_name_joined + " class='other_links_sub_menu_btn " + display_name_joined + "' data-href='" + href_lower + "'>" + display_name_capitalized + "</button>");
            $('#other_links_side_sub_menu').append(" <button data-btn-loc=side_nav data-link=" + display_name_joined + " class='other_links_sub_menu_btn " + display_name_joined + "' data-href='" + href_lower + "'>" + display_name_capitalized + "</button>");
        }
    });
    $(".other_links_sub_menu_btn").click(function (e) {

        //showSpinnerWhileIFrameLoads();

        //close nav if btn is being accessed from side nav
        if ($(this).attr("data-btn-loc") == "side_nav") closeSideNav();

        //allow sub-menu button to switch tab when clicked
        //switchTabUsingSubMenu("other_links_tab_btn");

        //add visted css properites when category is clicked
        $("#other_links_menu .tab_submenu button").removeClass("btn_visited");
        $("#other_links_side_sub_menu button").removeClass("btn_visited");
        $("." + $(this).attr("data-link")).addClass("btn_visited"); //apply btn visited to the entier class

        //window.open($(this).attr("data-href"), "other_links_iframe")
        window.open($(this).attr("data-href"), "_blank");

    });
    //===============================End of Helpful/Learning resource Links Content======================

    //=================================Resources Content ============================

    /*get blog categories data*/
    $(".adri_blog_cat").click(function () {
        data_cat_id = $(this).attr("data-cat-id");
        if (data_cat_id != "cat_all") current_post_cat_id = data_cat_id.substr(data_cat_id.indexOf("_" + 1));
        else current_post_cat_id = data_cat_id;
        is_blog_cat_loaded = true;
        curr_per_page_count = Number($("#blogs_per_page").select().val());
        curr_post_offset = Number(0);
        curr_page_offset = Number(0);
        curr_page_section = Number(-1);

        load_categories();

        //close nav if btn is being accessed from side nav
        close_side_navigation_bar(this);

        //allow sub-menu button to switch tab when clicked
        switchTabUsingSubMenu("adri_blog_tab_btn");

        //add visted css properites when clicked
        $("#adri_blog_menu .tab_submenu button").removeClass("btn_visited");
        $("#adri_blog_side_sub_menu button").removeClass("btn_visited");
        $("." + data_cat_id).addClass("btn_visited"); //apply btn visited to the entier class
        // $("." + $(this).attr("class")).addClass("btn_visited"); //apply btn visited to the entier class


    });
    $("#blogs_per_page").change(function () {
        curr_per_page_count = Number($(this).select().val());
        curr_post_offset = Number(0);
        curr_page_offset = Number(0);
        curr_page_section = Number(-1);
        load_categories();

    });
    $("#blog_nav_right").click(function (e, param) {
        curr_post_offset += Number(curr_per_page_count);
        curr_page_offset++;
        if (param != "ignore") load_categories();

    });
    $("#blog_nav_left").click(function (e, param) {
        curr_post_offset -= Number(curr_per_page_count);
        curr_page_offset--;
        if (param != "ignore") load_categories();

    });
    /*end of getting blog categories data*/


    /*blog comments replies */
    //indent replies
    $(".comment").each(function ($idx, $ele) {

        classes = $(this).attr("class");
        if (classes.includes("depth-1") == false) {
            margin_left = $(this).prev().css("margin-left");
            margin_left = Number(margin_left.replace(/\D/g, ''));
            $(this).css("margin-left", margin_left + Number(3) + "rem");
            $(this).css("margin-top", Number(0.6) + "rem");
        }

    });

    //open and close comments
    $(".comments_header").click(function () {
        console.log("asfafaf");
        $(".comments_inner").toggleClass("active");
        $(".close_open_arrow").toggleClass("open");
    })
    /*end blog comments replies */

    /*handle errors when submitting  comments on posts*/
    $("#commentform").submit(function (e) {
        is_error_detected = false;
        vals = $(this).serializeArray();
        $(".error-label").remove();
        for (let i = 0; i < vals.length; i++) {
            element = vals[i];
            $form_ele = $("[name=" + element.name + "]");
            required_val = $form_ele.attr("required");
            if (required_val != undefined) {
                value = $form_ele.val();
                if (value == "") {
                    e.preventDefault();
                    $form_ele.css("border", "1px");
                    $form_ele.css("border-style", "solid");
                    $form_ele.css("border-color", "red");
                    $form_ele.parent().append("<p class='error-label' style='color:red;'>Required*</p>");
                    is_error_detected = true;
                } else {
                    $form_ele.css("border-color", "#c9c9c9");
                }
            }

        }
    })
    /*End of handling errors when submitting  comments on posts*/

    /*load popular posts */
    post_titles = [];
    $(".popular_posts ul li a").each(function () {
        post_titles[post_titles.length] = $(this).html();
    });
    if (post_titles.length > 0) {

        //get posts
        $.ajax({
            type: "post",
            dataType: "json",
            url: ajax.ajax_url,
            data: {
                action: "get_post_by_titles",
                call_type: "internal",
                post_titles: post_titles,
            },
            success: function (response) {
                if (response.type == "success") {
                    response.post_list.forEach(function (post, index) {

                        if (post.featured_img_url != "") {
                            $element = "<div class='popular_post'>" +
                                "<div class='popular_post_img_container'><img src='" + post.featured_img_url + "' alt='post_img'/></div>" +
                                "<div class='popular_post_text' ><h3><a href='" + post.guid + "'>" + post.post_title + " </a></h3></div>" +
                                "</div>";
                        } else {
                            $element = "<div class='popular_post'>" +
                                "<div class='popular_post_text' ><h3><a href='" + post.guid + "'>" + post.post_title + " </a></h3></div>" +
                                "</div>";
                        }


                        $(".popular_post_content").append($element)
                    });

                }
            }
        });
    }
    /*End of loading popular posts */


    //=================================End of Resources Content=================================

    //=====================================Instructional Videos Content =========================

    if (you_tube_pages.includes(ajax.page_name)) {

        /*Get unique items*/
        Array.prototype.unique = function () {
            return this.filter(function (value, index, self) {
                return self.indexOf(value) === index;
            });
        }
        /*End of getting unique items*/

        var all_video_ids = [];
        var video_ids = [];
        var video_cate = [];


        /*get all categories and ids from backend.*/
        $(".you_tube_video_list").children().each(function () {
            video_ids[video_ids.length] = $(this).attr('data-vid-id');
            video_cate_val = $(this).attr('data-vid-cat').toLowerCase();

            if (video_cate[video_cate_val] == undefined) {
                video_cate[video_cate_val] = video_cate_val;
                video_cate[video_cate.length] = video_cate_val;
            }
        });

        /*extract unique categories*/
        all_video_ids = video_ids;
        var ids_str = video_ids.join();
        video_cate.unshift("all videos");//add "All Videos" sub-menu as the first
        video_cate.forEach(function (cate_name, index) {
            //Adjust disply text
            if (cate_name) {
                cate_name_as_id = cate_name.replace(/\s/g, '_');// used underscore for spaced words
                cate_name_capitalized = titleCase(cate_name);

                //Append categories text to tab menu and side menu
                $('#instr_videos_menu div').append("<button data-btn-loc=tab data-cat-id=" + cate_name_as_id + " class=instr_video_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");
                $('#instr_videos_side_sub_menu').append("<button  data-btn-loc=side_nav data-cat-id=" + cate_name_as_id + " class=instr_video_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");


                //Setup callback on buttons for categories
                $(".instr_video_" + cate_name_as_id).click(function (e) {
                    e.preventDefault();
                    $cat_id = $(this).attr("data-cat-id");
                    if ($cat_id == "all_videos") {
                        ids_str = all_video_ids.join();

                    } else { //extract from video list only id's that is matching to category
                        video_ids = [];
                        $(".you_tube_video_list").children().each(function () {
                            category = $(this).attr('data-vid-cat');
                            category = category.replace(/\s/g, '_').toLowerCase();
                            if (category == $cat_id) {
                                video_ids[video_ids.length] = $(this).attr('data-vid-id');
                            }
                        });

                        ids_str = video_ids.join();
                    }
                    //close nav if btn is being accessed from side nav
                    close_side_navigation_bar(this);

                    //allow sub-menu button to switch tab when clicked
                    switchTabUsingSubMenu("instr_videos_tab_btn");
                    $(".video_links").remove();
                    $("#instr_videos_spinner").addClass("active");

                    //add visted css properites when category is clicked
                    $("#instr_videos_menu .tab_submenu button").removeClass("btn_visited");
                    $("#instr_videos_side_sub_menu button").removeClass("btn_visited");
                    $("." + $(this).attr("class")).addClass("btn_visited"); //apply btn visited to the entier class

                    if (is_yt_client_lib_loaded) load_videos();
                    else {
                        is_yt_client_lib_loaded = true;
                        gapi.load('client', load_videos);
                    }
                });

            }
        });

        /*load videos from youtube*/
        function load_videos() {

            // 1. show spinner icon
            $("#instr_videos_spinner").addClass("active");

            // 2. Initialize the JavaScript client library.
            gapi.client.init({
                'apiKey': 'AIzaSyCC30Z6foq0O0Bp4PtKIyw59_FAG6-HqkQ',
            }).then(function () {
                // 3. Initialize and make the API request.
                return gapi.client.request({
                    'params': {
                        //'id': 'g0F1hYzX0qc,BELlZKpi1Zs,saF3-f0XWAY,_MNETwHzwnE,36IBDpTRVNE,bp8arskkcXg,3zJJ1S6-rMc,sYmwStHMezc,mnanlcyRuuI,k-n_LHGseNk',
                        'part': 'snippet,contentDetails,status,statistics',
                        'id': ids_str
                    },
                    'path': 'https://www.googleapis.com/youtube/v3/videos',
                })
            }).then(function (response) {
                //4. remove spinner icon
                $("#instr_videos_spinner").removeClass("active");
                var items = response.result.items;

                //5. Extract content from response.
                items.forEach(function (element, index) {
                    var id = element.id;
                    var snippet = element.snippet;
                    var title = snippet.title;
                    var desc = snippet.description;
                    var medium_thumbnail = snippet.thumbnails.medium;
                    var url = medium_thumbnail.url;
                    var width = medium_thumbnail.width;
                    var height = medium_thumbnail.height;

                    //6.Generate and append thumbnail cards.
                    $(".videos").append(
                        "<div id='" + id + "'class='video_links'>" +
                        "<div class='video_link_wrapper'>" +
                        "<div class='video_content' style='background-image:url(" + url + ");  height:" + height + "px; '></div>" +
                        "<div class='info'>" +
                        "<h4 id=>" + title + "</h4>" +
                        "<p>Video</p>" +
                        "</div>" +
                        "</div>" +
                        "</div>");

                });
                //7. setup call back to play each video
                bindVideoLinks();

            }, function (reason) {
                console.log('Error: ' + reason.result.error.message);
            });
        };

        // 1. Load the JavaScript client library.
        //gapi.load('client', load_videos);

        /*Create and Manage YouTube Video Player*/
        $("#close_btn").click(function () {
            closePlayer();
        });

        $("#minimize_btn").click(function () {
            $(".player_class").addClass("minimize_player");
            $(".player_class").removeClass("restore_player");
            $(this).hide();
            $("#restore_btn").show();

        });
        $("#restore_btn").click(function () {
            $(".player_class").removeClass("minimize_player");
            $(".player_class").addClass("restore_player");
            $(this).hide();
            $("#minimize_btn").show();
        });
        /*End of creating and managing YouTube Video Player*/
    }
    //============================= End of Instructional Videos Content ======================

    //==================================Reading Activities Content===============================

    /*open card to document */
    $(".reading_activities_card").click(function () {
        window.open($(this).attr("data-reading-card-url"), "_blank");

    });

    /*generate reading activities category menu*/
    reading_category_list = [];
    reading_category_list[0] = "all reading activities";
    $(".reading_activities_card").each(function (index) {

        category = $(this).attr("data-reading-card-cat");
        if (reading_category_list[category] == undefined) {

            reading_category_list[category] = category;
            reading_category_list[reading_category_list.length] = category;
            cate_name_as_id = category.replace(/\s/g, '_');// used underscore for spaced words
            cate_name_capitalized = titleCase(category);

            //Append categories text to tab menu and side menu
            $('#reading_activities_menu  div').append("<button data-btn-loc=tab data-cat-id=" + cate_name_as_id + " class=reading_activity_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");
            $('#reading_activities_side_sub_menu').append("<button  data-btn-loc=side_nav data-cat-id=" + cate_name_as_id + " class=reading_activity_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");

            // call backs to filter category
            $(".reading_activity_" + cate_name_as_id + ":button").click(function () {
                cat_id = $(this).attr("data-cat-id");
                if (cat_id == "all_activities") $(".reading_activities_card").removeClass("inactive");
                else {
                    $(".reading_activities_card").addClass("inactive");
                    $("." + cat_id).removeClass("inactive");
                }

                //add visted css properites when category is clicked
                $("#reading_activities_menu .tab_submenu button").removeClass("btn_visited");
                $("#reading_activities_side_sub_menu button").removeClass("btn_visited");
                $("." + $(this).attr("class")).addClass("btn_visited"); //apply btn visited to the entier class

                //close nav if btn is being accessed from side nav
                close_side_navigation_bar(this);

                //allow sub-menu button to switch tab when clicked
                switchTabUsingSubMenu("reading_activities_tab_btn");
            });
        }
    });
    //==================================End of Reading Activities Content===============================

    //==================================Worksheets Content===============================

    /*open card to document */
    $(".worksheets_card").click(function () {
        window.open($(this).attr("data-worksheet-card-url"), "_blank");

    });

    /*generate worksheet category menu*/
    worksheet_category_list = [];
    worksheet_category_list[0] = "all worksheets";
    $(".worksheets_card").each(function (index) {

        category = $(this).attr("data-worksheet-card-cat");
        if (worksheet_category_list[category] == undefined) {

            worksheet_category_list[category] = category;
            worksheet_category_list[reading_category_list.length] = category;
            cate_name_as_id = category.replace(/\s/g, '_');// used underscore for spaced words
            cate_name_capitalized = titleCase(category);

            //Append categories text to tab menu and side menu
            $('#worksheets_menu  div').append("<button data-btn-loc=tab data-cat-id=" + cate_name_as_id + " class=worksheet_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");
            $('#worksheets_side_sub_menu').append("<button  data-btn-loc=side_nav data-cat-id=" + cate_name_as_id + " class=worksheet_" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");

            // call backs to filter category
            $(".worksheet_" + cate_name_as_id + ":button").click(function () {
                cat_id = $(this).attr("data-cat-id");
                if (cat_id == "all_worksheets") $(".worksheets_card").removeClass("inactive");
                else {
                    $(".worksheets_card").addClass("inactive");
                    $("." + cat_id).removeClass("inactive");
                }

                //add visted css properites when category is clicked
                $("#worksheets_menu .tab_submenu button").removeClass("btn_visited");
                $("#worksheets_side_sub_menu button").removeClass("btn_visited");
                $("." + $(this).attr("class")).addClass("btn_visited"); //apply btn visited to the entier class

                //close nav if btn is being accessed from side nav
                close_side_navigation_bar(this);

                //allow sub-menu button to switch tab when clicked
                switchTabUsingSubMenu("worksheets_tab_btn");
            });
        }
    });
    //==================================End of Reading Activities Content===============================

    //=====================================Tab and Side menu Management=======================================
    //Change currently viewing tab
    $(".tablinks").click(function () {
        tab_name = $(this).parent().parent().parent().attr("name");
        var name = $(this).attr("name");
        if (name != "other_links") {
            $(".tabcontent").css("display", "none");
            $(".tablinks").removeClass("active");
            $(this).addClass("active");
            $("#" + name).css("display", "block");
        }

        //Initial handle of tabs top menu buttons
        if (name != "instr_videos") {//clean any left over stuff on instructional tab when not visible
            //closePlayer();
        } else if (name == "instr_videos") { //load video content if not already loaded
            if (!is_yt_client_lib_loaded) {
                //gapi.load('client', load_videos);
                $("#instr_videos_menu .tab_submenu button").eq(0).trigger("click");
                is_yt_client_lib_loaded = true;

            }
            setDefaultTabForSession(tab_name, ".tab_wrapper #instr_videos_menu .tab_submenu .instr_video_all_videos");
        }
        // if (name == "other_links" && !is_first_sub_menu_link_loaded) {
        //     $("#other_links_menu .tab_submenu button").eq(0).trigger("click");
        //     is_first_sub_menu_link_loaded = true;
        // }

        if (name == "adri_blog") {

            if (!is_blog_cat_loaded) {
                $("#adri_blog_menu .tab_submenu button").eq(0).trigger("click");
                is_blog_cat_loaded = true;
            }
            setDefaultTabForSession(tab_name, ".tab_wrapper #adri_blog_menu .tab_submenu .cat_all");
        }

        if (name == "reading_activities") {
            if (!is_reading_cat_loaded) {
                $("#reading_activities_menu .tab_submenu button").eq(0).trigger("click");
                is_reading_cat_loaded = true;
            }
            setDefaultTabForSession(tab_name, ".tab_wrapper #reading_activities_menu .tab_submenu .reading_activity_all_activities")

        }

        if (name == "worksheets") {
            if (!is_worksheet_cat_loaded) {
                $("#worksheets_menu .tab_submenu button").eq(0).trigger("click");
                is_worksheet_cat_loaded = true;
            }
            setDefaultTabForSession(tab_name, ".tab_wrapper #worksheets_menu .tab_submenu .worksheet_all_worksheets")

        }

        if (name == "community") {
            setDefaultTabForSession(tab_name, ".tab_wrapper #community_menu #community_tab_btn");
        }

    });

    /*Auto-redirection to specific tabs */

    //initialize default menu-tab for sections
    var default_kids_corner = ".kids_corner_tab .tab_wrapper #instr_videos_menu .tab_submenu .instr_video_all_videos";
    //var default_resources = ".resources_tab .tab_wrapper #adri_blog_menu #adri_blog_tab_btn";
    var default_resources = ".resources_tab .tab_wrapper #adri_blog_menu .tab_submenu .cat_all";

    if (sessionStorage.kids_corner_tab == undefined) sessionStorage.kids_corner_tab = default_kids_corner;
    if (sessionStorage.resources_tab == undefined) sessionStorage.resources_tab = default_resources;
    if (sessionStorage.is_kids_corner_change == undefined) sessionStorage.is_kids_corner_change = false;
    if (sessionStorage.is_resources_change == undefined) sessionStorage.is_resources_change = false;

    //display the current menu-tab for the sections
    $(sessionStorage.kids_corner_tab).trigger("click");
    $(sessionStorage.resources_tab).trigger("click");

    //reset sections to initial values if temporarily changed
    // if (sessionStorage.is_kids_corner_change) {
    //     sessionStorage.kids_corner_tab = default_kids_corner;
    // }
    // if (sessionStorage.is_resources_change) {
    //     sessionStorage.resources_tab = default_resources;
    // }

    /*End of Auto-redirection to specific tabs */
    //=====================================End of Tab Management=======================================
});


//====================================Helper functions=====================================

function setDefaultTabForSession(tab_name, tab_btn) {
    if (tab_name == "resources_tab") {
        sessionStorage.resources_tab = ".resources_tab " + tab_btn;
    }
    else {
        sessionStorage.kids_corner_tab = ".kids_corner_tab " + tab_btn;
    }
}
function titleCase(str) {
    var splitStr = str.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
    }
    // Directly return the joined string
    return splitStr.join(' ');
}

function highlightPageLink() {
    $(".page_links a").removeClass("active");
    $("[data-offset-val=" + curr_post_offset + "]").addClass("active");
    // if ($("[data-offset-val=" + curr_post_offset + "]").attr("id") == "link_more") {
    //     $("[data-offset-val=" + curr_post_offset + "]").trigger("click");
    // }
    // $(".page_links a").each(function (element, index) {
    //     offset_val = $(this).attr("data-offset-val");
    //     if (offset_val == undefined) $(this).css("visibility", "hidden");
    // })
}

function load_categories() {

    $(".adri_blog_content").remove();
    $("#adri_blog_spinner").addClass("active");
    //$(".page_links a").removeAttr("data-offset-val");

    $.ajax({
        type: "post",
        dataType: "json",
        url: ajax.ajax_url,
        data: {
            action: "get_blog_by_category",
            call_type: "internal",
            cat_id: current_post_cat_id,
            offset: curr_post_offset,
            per_page_count: curr_per_page_count
        },
        success: function (response) {
            if (response.type == "success") {
                post_count = response.post_count;
                /*remove/display prev btn if necessary */
                if ((curr_post_offset - curr_per_page_count) < 0) {
                    $("#blog_nav_left").css("visibility", "hidden");
                } else $("#blog_nav_left").css("visibility", "visible");

                /*remove/display next btn if necessary */
                if ((curr_post_offset + curr_per_page_count) >= post_count) {
                    $("#blog_nav_right").css("visibility", "hidden");
                } else $("#blog_nav_right").css("visibility", "visible");

                /*append page links */
                // offset = 0;
                // $("#more_blog_page_link").attr("data-offset-val");

                page_count = Math.ceil(post_count / curr_per_page_count);
                page_section = Math.floor(curr_page_offset / num_of_link_displayed);
                start_idx = page_section * num_of_link_displayed;
                offset = start_idx;
                length = (page_section + Number(1)) * num_of_link_displayed;
                if (length > page_count) length = page_count;

                if (page_section != curr_page_section) {

                    curr_page_section = page_section;
                    $(".blog_page_links").remove();

                    //add "more" links indication to left if neccessary
                    if (start_idx > 0) {
                        $(".page_links").append("<a id='more_blog_page_link_left' class='blog_page_links'>...</a>");

                    }
                    //add dispay links
                    for (let i = start_idx; i < length; i++) {
                        $(".page_links").append("<a class='blog_page_links' data-offset-val='" + offset + "' >" + Number(i + 1) + "</a>");
                        offset += curr_per_page_count;
                    }


                    //determine if "more" links indication should be dispayed.
                    has_more_links = false;
                    if (page_count > (Number(start_idx) + Number(num_of_link_displayed))) has_more_links = true;

                    //add "more" links indication to right if neccessary
                    if (has_more_links) {
                        $(".page_links").append("<a id='more_blog_page_link_right' class='blog_page_links'>...</a>");

                    }
                    //setup callback on "numbered" links
                    $(".blog_page_links").click(function () {


                        //go to page
                        id = $(this).attr("id");
                        if (id == "more_blog_page_link_right") {
                            this_page_offset = Number($(this).prev().html());
                            diff_to_page_offset = this_page_offset - curr_page_offset;
                            $("#foo").trigger("custom", ["Custom", "Event"]);
                            for (let i = 0; i < diff_to_page_offset; i++) {
                                if (Number(i + 1) == diff_to_page_offset) $("#blog_nav_right").trigger("click");
                                else $("#blog_nav_right").trigger("click", ["ignore"]);

                            }

                        } else if (id == "more_blog_page_link_left") {

                            this_page_offset = Number($(this).next().html()) - 2;
                            diff_to_page_offset = this_page_offset - curr_page_offset;
                            for (let i = diff_to_page_offset; i < 0; i++) {
                                if (Number(i + 1) == 0) $("#blog_nav_left").trigger("click");
                                else $("#blog_nav_left").trigger("click", ["ignore"]);
                            }
                        }
                        else {
                            this_page_offset = Number($(this).html()) - 1;
                            diff_to_page_offset = this_page_offset - curr_page_offset;
                            if (diff_to_page_offset > 0) {// go to right
                                for (let i = 0; i < diff_to_page_offset; i++) {
                                    if (Number(i + 1) == diff_to_page_offset) $("#blog_nav_right").trigger("click");
                                    else $("#blog_nav_right").trigger("click", ["ignore"]);
                                }
                            } else {//go left
                                for (let i = diff_to_page_offset; i < 0; i++) {
                                    if (Number(i + 1) == 0) $("#blog_nav_left").trigger("click");
                                    else $("#blog_nav_left").trigger("click", ["ignore"]);
                                }
                            }
                        }

                    });

                }
                highlightPageLink();
                append_blog(response);
            }
            else {
                console.log(response);
            }
        }
    });
    //append_blog(post_list, curr_per_page_count);
}

function append_blog(response) {

    
    $("#adri_blog_spinner").removeClass("active");
    $(".adri_blog_navigation").show();
    post_list = response.post_list;
    cat_url = response.category_url;
    cat_name = response.category_name;
    

    for (let i = 0; i < post_list.length; i++) {
        post = post_list[i];
        no_img_class = "";
    if (!post.featured_img_url) no_img_class ="adri_blog_content_no_img";
        $element = "<div class='adri_blog_content "+no_img_class+"' >" +
            "<div class='img_container'>" +
            "<img src='" + post.featured_img_url + "'></div>" +
            "<div class='content_container'>" +
            "<h3>" + cat_name + "</h3>" +
            "<h1>" + post.post_title + "</h1>" +
            "<p>" + post.post_excerpt + "</p>" +
            "<button onclick='window.location=\"" + post.guid + "\"'>Read More</button>" +
            "<p class='adri_blog_meta_data'><span class='author'><i class='fa fa-user' aria-hidden='true'></i>&nbsp" +
            "</span>" + post.author_name + "&nbsp;&nbsp;<span class='comment_count'><i class='fa fa-comments' aria-hidden='true'></i>&nbsp" +
            "</span>" + post.comment_count + "&nbsp;&nbsp;<span class='date'><i class='fa fa-calendar-alt' aria-hidden='true'></i> </span>" + post.date_formatted + "</p>" +
            "</div>" +
            "</div>";
        $(".adri_blog_tab_content").append($element);

    }
}

function close_side_navigation_bar($this) {
    if ($($this).attr("data-btn-loc") == "side_nav");
    closeSideNav();
}
/*bind youtube links for call backs*/
function bindVideoLinks() {
    $(".video_links").on("click", function () {

        $(".player_class").css("display", "inline-block");
        var vid_id = $(this).attr('id');
        $("#player").remove();
        $(".player_class").append("<div id='player'></div>");
        onYouTubeIframeAPIReady(vid_id);
        $("#player").css("width", "100%");
        $("#player").css("height", "100%");
    });
}

function closePlayer() {
    $("#player").remove();

    //desktop media query
    if ($('header').width() > 840) { $("#minimize_btn").show(); }

    $("#restore_btn").hide();
    $(".player_class").removeClass("minimize_player");
    $(".player_class").removeClass("restore_player");
    $(".player_class").css("display", "none");
}
var player;
function onYouTubeIframeAPIReady(vid_id) {
    player = new YT.Player('player', {
        // height: 'auto',
        // width: 'auto',
        videoId: vid_id,
        playerVars: {
            end: 0, autoplay: 1, loop: 0, controls: 1, showinfo: 0, modestbranding: 1, fs: 1, cc_load_policty: 0, iv_load_policy: 3, autohide: 0
        },
        events: {
            'onReady': onPlayerReady,
        }
    });
}

/*The API will call this function when the video player is ready.*/
function onPlayerReady(event) {
    event.target.playVideo();
}

/*The API calls this function when the player's state changes.
The function indicates that when playing a video (state=1),
the player should play for six seconds and then stop. */
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        setTimeout(stopVideo, 6000);
        done = true;
    }
}

function stopVideo() {
    player.stopVideo();
}

function redirectToAResourcesTab($this) {
    sessionStorage.resources_tab = $($this).attr("data-value");
    sessionStorage.is_resources_change = true;
    window.location = $($this).attr("data-link");
}

function switchTabUsingSubMenu(btn_tab_id) {
    $(".tabcontent").css("display", "none");
    $(".tablinks").removeClass("active");
    $("#" + btn_tab_id).addClass("active");
    $("#" + $("#" + btn_tab_id).attr("name")).css("display", "block");
}

function showSpinnerWhileIFrameLoads() {
    var iframe = $('iframe');
    if (iframe.length) {
        $("#other_links_spinner").addClass("active");
        $(iframe).on('load', function () {
            $("#other_links_spinner").removeClass("active");
        });
    }
}
//====================================End of Helper functions=====================================

