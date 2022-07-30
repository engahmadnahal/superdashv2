@extends('layaout.main')
@section("title")
    تعديل صورة موقع - {{$site->name_site }}
@endsection
@section("content")
    <style>
        div#preview {
            margin-bottom: 25px;
        }
    </style>
    <?php
    if($setting != null){
        $lOne = json_decode($setting->stng_log_one,true);
        $lTwo = json_decode($setting->stng_logo_two,true);
        $nOne = json_decode($setting->stng_name_one,true);
        $nTwo  = json_decode($setting->stng_name_two,true);
    }
    ?>



        <div class="title-page flex j-bet algin-center">
            <h1>  صورة موقع : {{$site->name_site}}</h1>

        </div>
    @forelse($match as $item)
        <div id="preview" class="preview flex j-center"
             @if(!$isEmpty)
             style="
                 background: url('{{$setting->backg_img}}')  center no-repeat;
                 "
            @endif
        >
            <div class="cardView flex j-aru algin-center">
                <div class="infoClube one">
                    <div id="logoOne" class="logoClube flex j-center algin-center drag" style="
                        background-image: url('{{$item->logo_one}}');
                        background-size: cover;
                        left: @if(!$isEmpty) {{$lOne['left'].'px'}}@endif;
                        top: @if(!$isEmpty) {{$lOne['top'].'px'}}@endif;
                        ">

                    </div>
                    <div id="nameOne" class="name one drag" style="
                        left: @if(!$isEmpty) {{$nOne['left'].'px'}}@endif;
                        top: @if(!$isEmpty) {{$nOne['top'].'px'}}@endif;
                        color: @if(!$isEmpty) {{$nOne['color']}}@endif;
                        background: @if(!$isEmpty) {{$nOne['backg']}}@endif;
                        ">
                        {{$item->name_one}}
                    </div>
                </div>
                <div class="infoClube two">
                    <div id="logoTwo" class="logoClube flex j-center algin-center drag" style="
                        background-image: url('{{$item->logo_two}}');
                        background-size: cover;
                        left: @if(!$isEmpty) {{$lTwo['left'].'px'}}@endif;
                        top: @if(!$isEmpty) {{$lTwo['top'].'px'}}@endif;
                        ">

                    </div>
                    <div id="nameTwo" class="name one drag" style="
                        left: @if(!$isEmpty) {{$nTwo['left'].'px'}}@endif;
                        top: @if(!$isEmpty) {{$nTwo['top'].'px'}}@endif;
                        color: @if(!$isEmpty) {{$nTwo['color']}}@endif;
                        background: @if(!$isEmpty) {{$nTwo['backg']}}@endif;
                        ">
                        {{$item->name_two}}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="t-center">لا يوجد مباريات مضافة</p>
    @endforelse




@endsection

