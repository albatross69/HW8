$(document).ready(function(){
    var arr, i;

    $(".accordion h3:first").addClass("active");
    $(".accordion p:not(:first)").hide();

    $(".accordion h3").click(function(){
        $("#table_body").empty();
        $(this).next("p").slideToggle("slow")
            .siblings("p:visible").slideUp("slow");
        $(this).toggleClass("active");
        $(this).siblings("h3").removeClass("active");
        $.ajax({
            type : 'GET',
            url : '/product_info',
            dataType : 'json',
            success : function (data) {
                arr = data;
                console.log(arr);

                $(arr).each(function (e) {
                    $("#table_body")
                        .append("<tr>" +
                            " <td>" + arr[e].product_id +"</td>" +
                            " <td>" + arr[e].product_name +"</td>" +
                            " <td>" + arr[e].price +"</td>" +
                            " <td>" + arr[e].quantity +"</td>" +
                            " <td>" + arr[e].description +"</td>" +
                            " <td>" + arr[e].category +"</td>" +
                            " </tr>")
                });
            }
        });
    });

});
