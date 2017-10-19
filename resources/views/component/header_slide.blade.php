<?php

$height = globalConfig('幻灯图片高度');
?>

<style type="text/css">
    #MainPromotionBanner ,
    #MainPromotionBanner .Slides,
    #MainPromotionBanner .Slides IMG{
        height: {{$height}}px !important;
    }
</style>


<div class="slider " id="MainPromotionBanner">

    <div id="SlidePlayer" style="height: {{$height}}px">
        <ul class="Slides" style="height: {{$height}}px">
            @foreach($header_slide as $item)
                <li><a href="#" target="_blank">
                        <img class='img-responsive' style="height: {{$height}}px"   border="0" alt="" src="{{showPic($item['thumb'])}}">
                    </a></li>
            @endforeach
            {{--<li><a href="#" target="_blank">
                    <img class='img-responsive' border="0" alt="" src="http://image.youzhan.org/3/af/2693eb70cb7f2fd18e70dd70ffd3a.png!thumb">
                </a></li>
            <li><a href="#">
                    <img class='img-responsive' border="0" alt="#" src="http://www.ysgxf.com/image/img_74.jpg">
                </a></li>
            <li><a href="#">
                    <img class='img-responsive' border="0" alt="" src="http://www.ysgxf.com/image/img_75.jpg"></a>
            </li>--}}
        </ul>

        <ul class="SlideTriggers">
            {{--<li class="Current">2</li><li class="">3</li>--}}

        </ul></div>
</div>