/*start brand*/
function brand(src) {
    let brand = document.getElementById("brand");
    brand.onclick = _ => open(src, "_self")
}
/*end brand*/

/*start book post*/
$("#open").click(function() {
    $(".page").css({
        transform: `translatex(50%)`,
        zIndex: 100
    }, 1000);
    $(".cover").css({
        transform: `translatex(50%) rotatey(-180deg)`,
        zIndex: 100
    }, 1000);

    $(".backface").css({
        pointerEvents: `all`
    }, 1000);
    $(".img").css({
        pointerEvents: `none`
    }, 1000);
})

$("#close").click(function() {
        $(".page").css({
            transform: `translatex(0)`,
            zIndex: 95
        }, 1000);
        $(".cover").css({
            transform: `translatex(0) rotatey(0)`,
            zIndex: 100
        }, 1000);
        $(".backface").css({
            pointerEvents: `none`
        }, 1000);
        $(".img").css({
            pointerEvents: `all`
        }, 1000);
    })
    /*end book post*/

/*window onload*/
brand("/")
    // $(".menu").click(function() {
    //         $(".navb").toggleClass("active")
    //         $(".navb").slideToggle(400)
    //     })
    /*window onload*/