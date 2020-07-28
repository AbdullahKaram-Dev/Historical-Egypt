/*start brand*/
function brand(src) {
let brand = document.getElementById("brand");
brand.onclick = _ => open(src,"_self")
}
/*end brand*/

/*global fun*/
brand("/")
$(".menu").click(function () {
    $(".navb").toggleClass("active")
    $(".navb").slideToggle(400)
})
/*global fun*/

/*start grid*/
$("document").ready(function () {
    $("#grid").pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 991
    })
})
/*end grid*/