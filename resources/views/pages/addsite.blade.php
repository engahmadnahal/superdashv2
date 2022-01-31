@extends('layaout.main')
@section("title")
    أضف موقع
@endsection
@section("content")
    <div class="title-page">
        <h1>أضف موقع جديد</h1>
    </div>

    <div class="edit-form">
        <form action="{{route('pages.setnewsite')}}" method="post">
            @csrf
            <div class="inputs flex j-bet">
                <input type="text" placeholder="اسم الموقع " name='name_site' required>
                @error('name_site') {{$message}} @enderror
                <input type="text" placeholder="رابط الموقع " name='url_site' required>
                @error('url_site') {{$message}}@enderror
            </div>
            <div class="inputs flex j-bet">
                <textarea name="post_site" class='post_site' cols="30" rows="10" placeholder="مقالة الموقع" required></textarea>
                @error('post_site') {{$message}}@enderror
                <textarea name="table_site" class='table_site' cols="30" rows="10" placeholder="جدول الموقع" required></textarea>
                @error('table_site') {{$message}}@enderror
            </div>
            <div class='save_change'><button type="submit"><span>حفظ التغيرات</span></button></div>
        </form>
    </div>

    <div class="notes">
        <h3>ملاحطة هامة : </h3>
        <p>يجب على المقالة ان تستوفي بعض الشروط لكي تعمل بنجاح بدون أي مشكلات تواجهك
            في محتوى المقالة او سياق الكلام . <a href=""><span>شروط المقالة</span></a></p>
    </div>
@endsection
