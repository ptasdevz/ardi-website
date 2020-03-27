$(document).ready(function () {

    $(".contact_form_request_options input").prop("checked", false); //clear options

    $(".contact_form_message textarea").attr("disabled",true);
    $(".contact_form_request_options input").click(function () {
        
        var elementLabel = $(this).next().html();
        $(".contact_form_dynamic").removeClass("contact_form_dynamic_active");
        $(".contact_form_dynamic input").attr("required",false)
        $(".contact_form_dynamic select").attr("required",false)
        if (elementLabel == "Topics") {
            $(".contact_form_topic").addClass("contact_form_dynamic_active");
            $(".contact_form_topic input").attr("required","");
            $(".contact_form_topic input").removeClass("wpforms-error");
            $(".contact_form_topic input").val("");
            $(".contact_form_topic input").next().remove();

        } else {
            $(".contact_form_service").addClass("contact_form_dynamic_active");
            $(".contact_form_service select").attr("required","");
            $(".contact_form_service select").removeClass("wpforms-error");
            $(".contact_form_service select").val("");
            $(".contact_form_service select").next().remove();
        }
        $(".contact_form_message textarea").attr("disabled",false);

    });

});
