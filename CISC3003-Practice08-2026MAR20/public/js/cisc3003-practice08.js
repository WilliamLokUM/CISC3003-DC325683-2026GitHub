$(document).ready(function(){
    var img=$('#imgManipulated img'),cap=$('#imgManipulated figcaption'),thumbs=$('#thumbBox img');
    var op=$('#sliderOpacity'),sat=$('#sliderSaturation'),bri=$('#sliderBrightness'),hue=$('#sliderHue'),gray=$('#sliderGray'),blur=$('#sliderBlur');
    function update(){
        var f=[];
        var o=op.val()/100;if(o!==1)f.push('opacity('+o+')');
        var s=sat.val()/100;if(s!==1)f.push('saturate('+s+')');
        var b=bri.val()/100;if(b!==1)f.push('brightness('+b+')');
        var h=hue.val();if(h!==0)f.push('hue-rotate('+h+'deg)');
        var g=gray.val()/100;if(g!==0)f.push('grayscale('+g+')');
        var u=blur.val();if(u!==0)f.push('blur('+u+'px)');
        img.css({filter:f.join(' ')||'none',WebkitFilter:f.join(' ')||'none'});
        $('#numOpacity').text(op.val());$('#numSaturation').text(sat.val());$('#numBrightness').text(bri.val());
        $('#numHue').text(hue.val());$('#numGray').text(gray.val());$('#numBlur').text(blur.val());
    }
    op.add(sat).add(bri).add(hue).add(gray).add(blur).on('input',update);
    $('#resetFilters').click(function(){
        op.val(100);sat.val(100);bri.val(100);hue.val(0);gray.val(0);blur.val(0);update();
    });
    thumbs.click(function(){
        img.attr('src',$(this).attr('src').replace('/small/','/medium/'));
        cap.html($(this).attr('alt')+'<br>'+$(this).attr('title'));
        update();
    });
    thumbs.first().trigger('click');
});