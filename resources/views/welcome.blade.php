
@extends('layaout.main')
@section("title")
سوبر داش
@endsection
@section("content")
    <div class="title-page">
        <h1>الرئيسية</h1>
    </div>
    <div class="add-new-site">
        <button>
            <span class="add">+</span>
            <a href="{{route("pages.addsite")}}"><span>اضف موقع</span></a>
        </button>
    </div>
    <div class="show-all-sites">
        @forelse($sites as $item)

            <div class="site">
                <div class="ditals-site flex j-bet">
                    <div class="info">
                        <div class='title-site'> <span>{{ $item->name_site }}</span></div>
                        <div class='url-site'><span>{{ $item->url_site }}</span></div>
                    </div>
                    <div class="actions flex  j-center algin-center ">
                        <a href="{{route('pages.editsite',$item->site_id)}}">  <button id="edit"><span>تعديل</span></button></a>
                        <a href="{{route('pages.showsite',$item->site_id)}}"><button id="show"><span>عرض</span></button></a>
                        <form action="{{route('pages.deletesite',$item->site_id)}}" method="post">@csrf <button id="delete"><span>حذف</span></button></form>
                    </div>
                </div>
            </div>
        @empty
            <p class="t-center">لا يوجد اي مواقع مضافة !</p>
        @endforelse

    </div>
@endsection
@section('footer')
    @if(Session::get('msg'))
    <script>
        Swal.fire(
            '{{Session::get('msg')}}',
            'مرحبا بك مرة اخرى ياباشا',
            'info'
        )

    </script>
    @endif
    @if(Session::get('msgSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'عمل رائع !',
                text: '{{Session::get('msgSuccess')}}!',
            })

        </script>
    @endif

@endsection
