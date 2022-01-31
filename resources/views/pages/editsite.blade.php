@extends('layaout.main')
@section("title")
    تعديل الموقع
@endsection
@section("content")

    <div class="title-page">
        <h1>التعديل</h1>
    </div>

    <div class="edit-form">
        <form action="{{route('pages.updatesite',$dataSite->site_id)}}" method="post">
            @csrf
            <div class="inputs flex j-bet">
                <input type="text" placeholder="اسم الموقع " name='name_site' value="{{$dataSite->name_site}}">
                @error('name_site') {{$message}} @enderror
                <input type="text" placeholder="رابط الموقع " name='url_site' value="{{$dataSite->url_site}}">
                @error('url_site') {{$message}} @enderror
            </div>
            <div class="inputs flex j-bet">
                <textarea name="post_site" id="post_site" class='post_site' cols="30" rows="10" placeholder="مقالة الموقع">{{$dataSite->post_site}}</textarea>
                @error('post_site') {{$message}}@enderror
                <textarea name="table_site" id="table_site" class='table_site' cols="30" rows="10" placeholder="جدول الموقع" required>{{$dataSite->table}}</textarea>
                @error('table_site') {{$message}}@enderror
            </div>
            @error('post_site') {{$message}} @enderror
            <div class='save_change'><button><span>حفظ التغيرات</span></button></div>
        </form>
    </div>

    <div class="notes">
        <h3>ملاحطة هامة : </h3>لهف
        <p>يجب على المقالة ان تستوفي بعض الشروط لكي تعمل بنجاح بدون أي مشكلات تواجهك
            في محتوى المقالة او سياق الكلام . <a href=""><span>شروط المقالة</span></a></p>
    </div>

@endsection

@section('footer')
    <script src="{{asset('js/main.js')}}"></script>
@endsection
