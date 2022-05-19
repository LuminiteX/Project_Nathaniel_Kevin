$(document).ready(function(){
    let images = $('.slider-item');
    let dots = $('.dot')
    let counter = $('#counter');
    let index = 0;
    counter.html(index);
    images.hide();
    images.eq(index).show();
    dots.eq(index).css('color','grey')
    $('#prev').click(function(){
        images.eq(index).animate({
            left: '-100px',
            opacity: 0
        }, function (){
            images.eq(index).hide();
            dots.eq(index).css('color','white')
            if(index == 0)
                index = images.length-1;
            else
                index -= 1;
            counter.html(index);
            //show updated image
            images.eq(index).show();
            images.eq(index).css('left','100px');
            images.eq(index).css('opacity','0');
            images.eq(index).animate({
                left: '0px',
                opacity: 1
            });
            dots.eq(index).css('color','grey')
        });
    });

    $('#next').click(function(){
        images.eq(index).animate({
            left: '100px',
            opacity: 0
        }, function (){
            images.eq(index).hide();
            dots.eq(index).css('color','white')
            if(index == images.length-1)
                index = 0;
            else
                index += 1;
            counter.html(index);
            //show updated image
            images.eq(index).show();
            images.eq(index).css('left','-100px');
            images.eq(index).css('opacity','0');
            images.eq(index).animate({
                left: '0px',
                opacity: 1
            });
            dots.eq(index).css('color','grey')
        });
    });
})