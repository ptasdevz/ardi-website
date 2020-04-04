$(document).ready(function () {
    $("#reading_assessment_content_text p").addClass("service_text");

    $("#remedial_classes_content_text p").addClass("service_text");

    $("#school_work_help_svc_content_text p").addClass("service_text");

    $("#printing_laminating_svc_content_text p").addClass("service_text");

    $("#study_buddy_svc_content_text p").addClass("service_text");

    //display read more button if necessary
    $(".svc_content").each(function () {

        excerpt_content = $(this).html();
        content_max_len = $(this).attr("data-content-length");
        excerpt_type = $(this).attr("data-excerpt-type");
        content_length = excerpt_content.split(" ").length;
        if (content_length < content_max_len && excerpt_type == "default") $(this).next().css("display", "none");
        //console.log(this);

    });

}); 