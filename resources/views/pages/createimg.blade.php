@extends('layaout.main')
@section("title")
    انشاء صورة لموقعك
@endsection
@section("content")
    <div class="title-page flex j-bet algin-center">
        <h1>مولد صور للمواقع</h1>

    </div>

    @forelse($sites as $item)
        <div class="site">
            <div class="ditals-site flex j-bet">
                <div class="info">
                    <div class='title-site'> <span>{{ $item->name_site }}</span></div>
                    <div class='url-site'><span>{{ $item->url_site }}</span></div>
                </div>
                <div class="actions flex  j-center algin-center ">
                    <a href="{{route('pages.editimgsite',$item->site_id)}}">  <button id="edit"><span>تعديل</span></button></a>
                    <a href="{{route('pages.showimgsite',$item->site_id)}}"><button id="show"><span>عرض</span></button></a>
                </div>
            </div>
        </div>
    @empty
    <p class="t-center">لا يوجد مواقع مضافة !</p>
    @endforelse
@endsection

@section('footer')
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
