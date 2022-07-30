@extends('layaout.main')
@section("title")
   تعديل المباراة
@endsection
@section("content")
    <div class="title-page">
        <h1> تعديل ماتش : {{$match->name_one}}  Vs {{$match->name_two}}</h1>
    </div>

    <div class="edit-form">
        <form action="{{route('pages.updatematch',$match->data_id)}}" method="post">
            @csrf

            <div class="inputs flex j-bet">
                <input type="text" placeholder="الفريق الاول " name='name_one' value="{{$match->name_one}}">
                <input type="text" placeholder="الفريف الثاني " name='name_two' value="{{$match->name_two}}">
            </div>
            <div class="inputs flex j-bet">
                <input type="text" placeholder="لوجو الفريق الاول " name='logo_one' value="{{$match->logo_one}}">
                <input type="text" placeholder="لوحو الفريق الثاني" name='logo_two' value="{{$match->logo_two}}">
            </div>
            <div class="inputs flex j-bet">
                <input type="text" placeholder="اسم المعلق " name='voice_over' value="{{$match->voice_over}}">
                <input type="text" placeholder="البطولة" name='botola' value="{{$match->botola}}">
            </div>
            @foreach($sites as $item)


                    @if($item->user_id == session('logged'))
                        <div class="inputs oneInput">
                            <input type="text" placeholder="صورة المشاركة لموقع {{ $item->name_site }} " name='img_post_{{$item->site_id}}' data-site-id="{{$item->site_id}}"

                            @foreach($imgPsot as $itemImg)
                                @if($itemImg->site_id == $item->site_id)
                                    value="{{$itemImg->url_img}}"
                                    @endif
                            @endforeach

                            >
                        </div>
                    @endif

            @endforeach

            <div class="inputs flex j-bet">
                <input type="text" placeholder="توقيت المباراة" name='time_start_match' value="{{$match->time_start_match}}">
                <input type="text" placeholder="تاريخ المباراة" name='date_match' value="{{$match->date_match}}">
            </div>

            <div class="inputs flex j-bet">
                <input type="text" placeholder="القناة الناقلة" name='channel' value="{{$match->channel}}">
                <input type="text" placeholder="رابط القناة الناقلة" name='url_channel' value="{{$match->url_channel}}">
            </div>

            <div class="inputs oneInput">
                <input type="text" placeholder="رابط المباراة " name='url_match' value="{{$match->url_match}}">
            </div>
            <div class='save_change'><button><span>حفظ التغيرات</span></button></div>
        </form>
    </div>
@endsection
@section('footer')
    @if(Session::get('msgError'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'هناك خطأ ما !',
                text: '{{Session::get('msgError')}}!',
            })
        </script>
    @endif
@endsection
