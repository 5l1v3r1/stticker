$("#my_address").change(function(){
    if($(this).val() != 0){
        $.ajax({
            url: $(this).data("url"),
            data: "id="+$(this).val(),
            dataType: "JSON",
            method: "POST"
        }).done(function(data) {
            if(data.status) {
                $("#city_id").val(data.address.city_id);
                $("#town").val(data.address.town);
                $("#zipcode").val(data.address.zipcode);
                $("#address").val(data.address.address);
            } else {
                swal("", data.error, "error");
            }
        });
    }
});

$("#remember").change(function(){
    if ($(this).is(":checked")) {
        $("#addressName").show(500);
    } else {
        $("#addressName").hide(500);
    }
});

$("input[name='payment']").change(function(){
    $("#bank").slideToggle();
    $("#paypal").slideToggle();
});