$(document).ready(function () {


    //manage tabs apperances
    $(".tablinks").click(function () {

        var name = $(this).attr("name");
        if (name != "other_links") {
            $(".tabcontent").css("display", "none");
            $(".tablinks").removeClass("active");
            $(this).addClass("active");
            $("#" + name).css("display", "block");
        }

        //clean any stuff on instructional tab
        if (name != "instr_videos") {
            closePlayer();
        }

    });
    //===============================Get Data on Other Links ======================
    //get all other-links from backend.
    var other_links = [];
    $(".other_links_list").children().each(function () {
        other_links[other_links.length] = $(this).attr('id');
    });
    other_links.forEach(function (link_and_display_name, index) {
        if (link_and_display_name) {
            href = link_and_display_name.substr(0, link_and_display_name.indexOf("_"));
            display_name = link_and_display_name.substr(link_and_display_name.indexOf("_") + 1);
            href_lower = href.replace(/\s/g, '_').toLowerCase();
            display_name_capitalized = display_name.charAt(0).toUpperCase() + display_name.substr(1);
            $('#other_links_menu div').append(" <button><a href='" + href_lower + "' target='_blank'>" + display_name_capitalized + "</a></button>");

        }
    });
    //===============================End of Get Data Other Links =============  =========

    //=============================Get YouTube Data on Videos ======================

    // prototype function used to get unique items
    Array.prototype.unique = function () {
        return this.filter(function (value, index, self) {
            return self.indexOf(value) === index;
        });
    }

    var all_video_ids = [];
    var video_ids = [];
    var video_cate = [];


    //get all categories and ids from backend.
    $(".you_tube_video_list").children().each(function () {
        video_ids[video_ids.length] = $(this).attr('id');
        video_cate[video_cate.length] = $(this).attr('class');
    });

    //extract unique categories
    all_video_ids = video_ids;
    //let unique_categories = [... new Set(video_cate)];
    unique_categories = video_cate.unique();
    var ids_str = video_ids.join();
    unique_categories.unshift("All Videos");//add All Videos as the first item in the list

    unique_categories.forEach(function (cate_name, index) {
        //Adjust disply text
        if (cate_name) {
            cate_name_as_id = cate_name.replace(/\s/g, '_').toLowerCase();
            cate_name_capitalized = cate_name.charAt(0).toUpperCase() + cate_name.substr(1);

            //Append categories text to markup
            $('#instr_videos_menu div').append("<button id=" + cate_name_as_id + ">" + cate_name_capitalized + "</button>");

            //Setup callback on buttons for categories
            $("#" + cate_name_as_id).click(function (e) {
                e.preventDefault();
                $buttonId = $(this).attr("id");
                if ($buttonId == "all_videos") {
                    ids_str = all_video_ids.join();
                } else {
                    video_ids = [];
                    $(".you_tube_video_list").children().each(function () {
                        category = $(this).attr('class');
                        category = category.replace(/\s/g, '_').toLowerCase();
                        if (category == $buttonId) {
                            video_ids[video_ids.length] = $(this).attr('id');
                        }
                    });

                    ids_str = video_ids.join();
                }

                //allow sub-menu button to switch tab when clicked
                var name = $("#instr_videos_tab_btn").attr("name");
                $(".tabcontent").css("display", "none");
                $(".tablinks").removeClass("active");
                $("#instr_videos_tab_btn").addClass("active");
                $("#" + name).css("display", "block");
                $(".video_links").remove();

                //add visted css properites when clicked
                $(".tab_submenu button").removeClass("btn_visted");
                $(this).addClass("btn_visted");

                start();
            });

        }
    });

    //submenu button defaults
    $("#all_videos").addClass("btn_visted");


    function start() {
        // 2. Initialize the JavaScript client library.
        gapi.client.init({
            'apiKey': 'AIzaSyDzoGK07J5qwgLJMp_KppKQuxbTgUF1x28',
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
            var items = response.result.items;

            //4. Extract content from response.
            items.forEach(function (element, index) {
                var id = element.id;
                var snippet = element.snippet;
                var title = snippet.title;
                var desc = snippet.description;
                var medium_thumbnail = snippet.thumbnails.medium;
                var url = medium_thumbnail.url;
                var width = medium_thumbnail.width;
                var height = medium_thumbnail.height;

                //5.Generate and append thumbnail cards.
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
            bindVideoLinks();

        }, function (reason) {
            console.log('Error: ' + reason.result.error.message);
        });
    };

    //bind youtube links for call backs
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
    // 1. Load the JavaScript client library.
    gapi.load('client', start);
    //=============================End of Getting YouTube Data on Videos ======================

    //================================Create and Manage YouTube Video Player ============================
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
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
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

    //================================End of Creating YouTube Video Player ===========================

    //load all videos
    // $.ajax({
    //     type: "post",
    //     dataType: "json",
    //     url: ajax.ajax_url,
    //     data: { action: "get_youtube_videos", call_type: "internal" },
    //     success: function (response) {
    //         if (response.type == "success") {
    //             console.log(response);
    //         }
    //         else {
    //             //  alert("Your vote could not be added")
    //         }
    //     }
    // });

});

