<header class='header'>
    <div class="logo">
        <span>سوبر داش</span>
    </div>

    <nav class="navbar">
        <ul>
            

            <li class="{{$_SERVER['REQUEST_URI'] == "/" ? "active" : ""}}"><a href="{{route('pages.index')}}">الرئيسية</a></li>
            <li class="{{$_SERVER['REQUEST_URI'] == "/addsite" ? "active" : ""}}"><a href="{{route('pages.addsite')}}">اضف موقع جديد</a></li>
            <li class="{{$_SERVER['REQUEST_URI'] == "/matches" ? "active" : ""}}"><a href="{{route('pages.matches')}}">مباريات اليوم</a></li>
            <li class="{{$_SERVER['REQUEST_URI'] == "/createimg" ? "active" : ""}}"><a href="{{route('pages.createimg')}}">مولد صور المشاركات</a></li>

        </ul>
    </nav>
</header>

