/**
 * Created by qdulery on 06/12/2017.
 */

(function($)
{
    $.fn.menu=function(options)
    {
        var defauts=
        {
            "vitesseSlideUp":"slow",
            "vitesseSlideDown":"fast",
            "nameSousListe":"sousListe"
        };

        var param=$.extend(defauts,options);


        return this.each(function(){

            $("."+param.nameSousListe).hide();
            $(this).find("a").mouseover(function(){
                $(this).parent().siblings().find('.'+param.nameSousListe+':visible')
                    .slideUp(param.vitesseSlideUp);
                $(this).parent().find('ul').slideDown(param.vitesseSlideDown);
            });

            if(param.callback)
            {
                param.callback("ok");
            }
        });


    };
})(jQuery);