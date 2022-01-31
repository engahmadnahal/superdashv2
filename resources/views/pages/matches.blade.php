
@extends('layaout.main')
@section("title")
   مباريات اليوم
@endsection
@section("content")
    <div class="title-page flex j-bet algin-center">

        <h1>مباريات اليوم</h1>
        @if($userTyp == "admin")
        <form action="{{route('pages.deleteall')}}" method="post">
            @csrf
            <button class="saveSetting">
                <span>حذف كل المباريات</span>
            </button>
        </form>
            @endif
    </div>
    <div class="show-all-matches">

            @forelse($matches as $item)
            <div class="match">
                <div class="ditals-match flex j-bet">
                    <div class="info flex j-bet algin-center">
                        <div class="club-one flex j-aru algin-center">
                            <div class="club_logo">
                                <img src="{{$item->logo_one}}" alt="{{$item->name_one}}">
                            </div>
                            <div class="name"><span>{{$item->name_one}}</span></div>
                        </div>
                        <div class="date">
                            <span>{{$item->date_match}}</span>
                        </div>
                        <div class="club-two flex j-aru algin-center">
                            <div class="name"><span>{{$item->name_two}}</span></div>

                            <div class="club_logo">
                                <img src="{{$item->logo_two}}" alt="{{$item->name_two}}">
                            </div>
                        </div>
                    </div>
                    <div class="actions flex j-center algin-center">
                        <form action="{{route('pages.addmatch',$item->data_id)}}" method="post">@csrf  <button id="addMatch"><span>اضافة المباراة</span></button></form>
                    </div>
                </div>
            </div>
        @empty
            <p class="t-center">لا يوجد مباريات  !</p>
        @endforelse

            <div class="title-page">
                <h1>المباريات المضافة :</h1>
            </div>
        @forelse($matchesOfUser as $item)

                <div class="match">
                    <div class="ditals-match flex j-bet">
                        <div class="info flex j-bet algin-center">
                            <div class="club-one flex j-aru algin-center">
                                <div class="club_logo">
                                    <img src="{{$item->logo_one}}" alt="{{$item->name_one}}">
                                </div>
                                <div class="name"><span>{{$item->name_one}}</span></div>
                            </div>
                            <div class="date">
                                <span>{{$item->date_match}}</span>
                            </div>
                            <div class="club-two flex j-aru algin-center">
                                <div class="name"><span>{{$item->name_two}}</span></div>

                                <div class="club_logo">
                                    <img src="{{$item->logo_two}}" alt="{{$item->name_two}}">
                                </div>
                            </div>
                        </div>
                        <div class="actions flex j-center algin-center">
                               <a href="{{route('pages.editmatch',$item->data_id)}}"> <button id="edit"><span>تعديل</span></button></a>
                              <form action="{{route('pages.deletematch',$item->data_id)}}" method="post"> @csrf<button id="edit"><span>حذف</span></button></form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="t-center">لا يوجد مباريات مضافة !</p>
            @endforelse
    </div>
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
