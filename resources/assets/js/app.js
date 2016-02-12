$("#brand h2 span").typed({
    strings: [
        "En Özel Stickerlar ^1000 ",
        "En Güzel Stickerlar ^1000 ",
        "En Canlı Stickerlar ^1000 ",
        "En Kaliteli Stickerlar ^1000 "
    ],
    typeSpeed: 0
});

$(":file").filestyle({
    input: false,
    buttonText: "Çalışmanız",
    buttonName: "btn-danger",
    size: "lg",
    iconName: "fa fa-cloud-upload",
    badge: false
});

$(":file").change(function(){
    $(":file").filestyle('buttonText', $(this).val().split('\\').pop());
});

$("#quantity").change(function(){
    var price = $(this).find(":selected").data("price");
    var total = price;
    $("#send").html(total + ' <i class="fa fa-try"></i> Siparişi Oluştur');
});

$(".select2").select2({
    placeholder: "Boyut Seçin",
});