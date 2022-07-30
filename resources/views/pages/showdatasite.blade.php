@extends('layaout.main')
@section("title")
    معلومات الموقع - مشاركة - جدول مباريات
@endsection
@section("content")
    <div class="title-page">
        <h1>العرض</h1>
    </div>
    <div class="add-new-site flex j-bet algin-center">

        <h1>اسم الموقع :
            {{$infoSite->name_site}}
        </h1>
        <button>
            <span class="add">+</span>
            <a href="{{route("pages.addsite")}}"><span>اضف موقع</span></a>
        </button>
    </div>
    <div class="options-data flex algin-center j-center" style=" margin-bottom: 30px; height: auto; ">
        <a href="{{route('pages.showimgsite',$id)}}"><div class="options table"><span>صور المشاركات</span></div></a>
    </div>
    <div class="options-data flex algin-center j-aru">
        <a href="{{route('pages.getpost',$id)}}"><div class="options post"><span>المشاركات</span></div></a>
        <a href="{{route('pages.gettable',$id)}}"><div class="options table"><span>الجدول</span></div></a>
    </div>
@endsection
