@extends('layaout.main')
@section("title")
    تعديل صورة موقع - {{$site->name_site }}
@endsection
@section("content")
    <?php
        if($setting != null){
            $lOne = json_decode($setting->stng_log_one,true);
            $lTwo = json_decode($setting->stng_logo_two,true);
            $nOne = json_decode($setting->stng_name_one,true);
            $nTwo  = json_decode($setting->stng_name_two,true);
        }
    ?>
    <form action="{{$isEmpty ? route('pages.postsetting',$id) : route('pages.editsetting',$id)}}" method="post">
        @csrf
        <div class="title-page flex j-bet algin-center">
            <h1> تعديل صورة موقع : {{$site->name_site}}</h1>

                <button class="saveSetting">
                    <span>حفظ التغيرات</span>
                </button>

        </div>

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
                        background-image: url({{asset('img/football-club.png')}});
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
                        الاسم الاول
                    </div>
                </div>
                <div class="infoClube two">
                    <div id="logoTwo" class="logoClube flex j-center algin-center drag" style="
                        background-image: url({{asset('img/football-club.png')}});
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
                        الاسم الثاني
                    </div>
                </div>
            </div>
        </div>
        <div class="title-page">
            <h1> الاعدادات :  </h1>
        </div>
        <div class="setting">

            @if(!$isEmpty)
                <table>
                    <thead>
                    <th>اللوجول الاول</th>
                    <th>اللوجول الثاني</th>
                    <th>الاسم الاول</th>
                    <th>الاسم الثاني</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_logo_one_top" name="stng_logo_one_top" placeholder="المقدار من الاعلى" value="{{$lOne['top']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_logo_two_top" name="stng_logo_two_top" placeholder="المقدار من الاعلى" value="{{$lTwo['left']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_name_one_top" name="stng_name_one_top" placeholder="المقدار من الاعلى" value="{{$nOne['top']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_name_two_top" name="stng_name_two_top" placeholder="المقدار من الاعلى" value="{{$nTwo['top']}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_logo_one_right" name="stng_logo_one_right" placeholder="المقدار من اليسار" value="{{$lOne['left']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_logo_two_right" name="stng_logo_two_right" placeholder="المقدار من اليسار" value="{{$lTwo['left']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_name_one_right" name="stng_name_one_right" placeholder="المقدار من اليسار" value="{{$nOne['left']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_name_two_right" name="stng_name_two_right" placeholder="المقدار من اليسار" value="{{$nTwo['left']}}">
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="inputSetting">
                                <span>خلفية الصورة</span>
                                <input type="text"  id="backg_img" name="backg_img" placeholder="ضع هنا رابط الصورة التي تود ان تكون خلفية  " style=" width: 76%; " value="{{$setting->backg_img}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون النص</span>
                                <input type="color" id="stng_name_one_color" name="stng_name_one_color" placeholder="لون النص" value="{{$nOne['color']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون النص</span>
                                <input type="color" id="stng_name_two_color" name="stng_name_two_color" placeholder="لون النص" value="{{$nTwo['color']}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">

                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون الخلفية</span>
                                <input type="color"  id="stng_name_one_backg_color" name="stng_name_one_backg_color" placeholder="لون الخلفية" value="{{$nOne['backg']}}">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون الخلفية</span>
                                <input type="color" id="stng_name_two_backg_color" name="stng_name_two_backg_color" placeholder="لون الخلفية" value="{{$nTwo['backg']}}">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @else
                <table>
                <thead>
                    <th>اللوجول الاول</th>
                    <th>اللوجول الثاني</th>
                    <th>الاسم الاول</th>
                    <th>الاسم الثاني</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_logo_one_top" name="stng_logo_one_top" placeholder="المقدار من الاعلى" >
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_logo_two_top" name="stng_logo_two_top" placeholder="المقدار من الاعلى">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_name_one_top" name="stng_name_one_top" placeholder="المقدار من الاعلى">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من الاعلى</span>
                                <input type="number" id="stng_name_two_top" name="stng_name_two_top" placeholder="المقدار من الاعلى">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_logo_one_right" name="stng_logo_one_right" placeholder="المقدار من اليسار">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_logo_two_right" name="stng_logo_two_right" placeholder="المقدار من اليسار">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_name_one_right" name="stng_name_one_right" placeholder="المقدار من اليسار">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>من اليسار</span>
                                <input type="number" id="stng_name_two_right" name="stng_name_two_right" placeholder="المقدار من اليسار">
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="inputSetting">
                                <span>خلفية الصورة</span>
                                <input type="text"  id="backg_img" name="backg_img" placeholder="ضع هنا رابط الصورة التي تود ان تكون خلفية  " style=" width: 76%; ">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون النص</span>
                                <input type="color" id="stng_name_one_color" name="stng_name_one_color" placeholder="لون النص">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون النص</span>
                                <input type="color" id="stng_name_two_color" name="stng_name_two_color" placeholder="لون النص">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">

                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون الخلفية</span>
                                <input type="color"  id="stng_name_one_backg_color" name="stng_name_one_backg_color" placeholder="لون الخلفية">
                            </div>
                        </td>
                        <td>
                            <div class="inputSetting">
                                <span>لون الخلفية</span>
                                <input type="color" id="stng_name_two_backg_color" name="stng_name_two_backg_color" placeholder="لون الخلفية">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </form>
    <div class="notes">
        <h3>ملاحطة هامة : </h3>
        <p>يمكنك استعمال السحب والافلات لتعديل مكان الصورة لتسهيل عليك في تحديد الاتجاهات والوصول لتصميمك المميز !</p>
    </div>
@endsection
@section('footer')
    <script src="{{asset('js/main.js')}}"></script>
@endsection
