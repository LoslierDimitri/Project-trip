/*

The following script isn't absolutely necessary to the map functionalities.
It was added in order to enable the pointing to IDs INSIDE the HTML document (the smooth scrolling is a nice bonus).

For more information, please look at this pen's infos or ask me directly on Twitter : https://twitter.com/GyombGraphics
*/

// thanks to Geoffrey Crofte for this jquery smooth scroll script :
// http://www.creativejuiz.fr/blog/tutoriels/jquery-effet-smooth-scroll-defilement-fluide

// pointing from the svg object to fragments in the HTML doc.
$("#arrondissements a").click(function() {
    if ($(this).attr("xlink:href").substring(0, 1) == "#") {
        var the_id = $(this).attr("xlink:href");
        $("html, body").animate({
                scrollTop: $(the_id).offset().top
            },
            "slow"
        );
    }
    return false;
}); /**/

// Smoothscrolling for standards anchors
$('a[href^="#"]').click(function() {
    var the_id = $(this).attr("href");
    $("html, body").animate({
            scrollTop: $(the_id).offset().top
        },
        "slow"
    );
    return false;
});

function test(city_name) {
    alert("test " + city_name);
}

function display_panel(region_name) {
    let zone;

    for (let i = 0; i < 13; i++) {
        zone = document.getElementById("region_name_" + (i + 1) + "");
        zone.setAttribute("fill", "#ffffff")
    }

    zone = document.getElementById(region_name);
    zone.setAttribute("fill", "#0FABDF")
}