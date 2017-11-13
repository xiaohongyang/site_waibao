<?php

$height = globalConfig('幻灯图片高度');
?>




<div class="slider " id="MainPromotionBanner">

    <div id="SlidePlayer" style="height: {{$height}}px">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($header_slide as $item)
                    <div class="swiper-slide">
                        <span href="javascript:void(0)" target="_blank">
                            <img class='img-responsive' style="height: {{$height}}px"   border="0" alt="" src="{{showPic($item['thumb'])}}">
                        </span>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

     </div>
</div>

