
// mouse hover menu dropdown
$(".navbar-nav li").mouseenter( function () {
    $(this).find(".hide-menu").css({display: 'block', 'z-index': 999});
    $(this).find(".hide-menu").addClass( 'menu-dropdown' );
});
$(".navbar-nav li").mouseleave( function () {
    $(this).find(".hide-menu").hide();
});