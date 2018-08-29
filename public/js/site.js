// Menü building select nav for mobile width only
$(function(){

    $('nav ul li a').each(function(){
        var target = $(this);

        $('<option />', {
            'value' : target.attr('href'),
            'text': target.text()
        }).appendTo('nav select');

    });

    // on clicking on link
    $('nav select').on('change',function(){
        window.location = $(this).find('option:selected').val();
    });
});
//end

// show and hide sub menu
$(function(){
    $('nav ul li').hover(
        function () {
            //show its submenu
            $('ul', this).slideDown(150);
        },
        function () {
            //hide its submenu
            $('ul', this).slideUp(150);
        }
    );
});
//end