<!DOCTYPE html>
<html lang="ar" dir='rtl'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go - SuperDash</title>
    <link href='../index.html' rel='canonical'/>
    <link href='favicon.ico' rel='icon' type='image/x-icon'/>
    <style>
        @font-face {
            font-family: 'tjwal';
            src: url('https://fonts.gstatic.com/s/tajawal/v4/Iura6YBj_oCad4k1nzSBC45I.woff2');
        }
        *{
            font-family: 'tjwal';
        }

        :root{
            --primaryColor : #343a40;
            --primaryColorHover : #46515c;
            --secondColor : #fff;

        }
        *{
            transition: .2s;
        }
        ul{
            margin: 0;
        }
        a{
            color: #fff;
        }
        img{
            width: 100%;
            height: 100%;
        }
        a:hover{
            color: #9c9c9c;
        }
        ul,li,a{
            text-decoration: none;
            list-style:none;


        }
        .none {
            display: none !important;
        }
        .flex {
            display: flex;
            flex-direction: row;
        }
        .tap{
            margin-bottom: 10px;
        }
        .taps {
            padding: 7px;
            margin-left: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #032f70;
            cursor: pointer;
            transition : 0s;
        }
        .taps.active{
            border-bottom: 2px solid #032f70;
        }
        .contentTap {
            display: none;
            margin: 25px 0;
        }
        .contentTap.open{
            display: block;
        }
        .navTop .mb-3 form .cont { text-align: center; margin-top: 30px;display: flex; justify-content: space-evenly;     align-items: center;}
        .navTop input { width: 40%; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #212529; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; -webkit-appearance: none; -moz-appearance: none; appearance: none; border-radius: 0.25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
        .addMore { cursor : pointer ;width: 30px; height: 30px; border: 1px solid #108910; border-radius: 25px; display: flex; align-items: center; justify-content: center; color: #108910; }
        .navTop span {
            font-size: 28px;
            font-weight: bold;
        }
        .navTop .title {
            display: flex;
            justify-content: space-between;
        }
        .navTop .mb-3 {
            height: 300px;
            overflow-y: auto;
        }
        /* ========== login page =========*/
        .contentForm {
            width: 500px;
        }
        .formLogin {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;

        }
        main#wrap-main {
            margin-right: 20%;
            width: 100%;
            height: auto;
        }
        .contentForm form {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        .contentForm input {
            padding: 10px;
            margin: 10px 0;
            outline: none;
            border: 0;
            border-bottom: 1px solid #b9b9b9;
        }
        .contentForm input:focus {
            border-bottom-color: #0a459d;
        }.actions {
             display: flex;
             justify-content: space-between;
         }
        .forget a {
            color: var(--primaryColor);
        }
        .forget a:hover{
            color: #0a459d;
        }
        .tabs {
            width: 100%;
            margin-bottom: 25px;

        }
        .tabs button{
            border: 1px solid #0d6efd;
            padding: 10px;
            color: #0a459d;
            background: transparent;
            border-radius:10px

        }
        .activeTap{
            background: #0d6efd !important;
            color: #fff !important;
        }
        .tabs button:hover{
            background: #0d6efd;
            color: #fff;
        }

        .btnGo button{
            border: 1px solid #0d6efd;
            padding: 10px;
            color: #0a459d;
            background: #0d6efd;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="formLogin">

        <div class="contentForm">
            <div class="tabs">
                <button id="login" onclick="window.location.href = 'auth'">تسجيل الدخول</button>
                <button id="signUp" class="activeTap">التسجيل</button>
            </div>

            <form action="{{route("auth.registered")}}" id="formSignUp" method="POST">
                @csrf

                <input type="text" name="fname" placeholder="الاسم الأول" value="{{old('fname')}}">
                @error('fname') {{$message}} @enderror
                <input type="text" name="lname" placeholder="الأسم الثاني" value="{{old('lname')}}">
                @error('lname') {{$message}} @enderror
                <input type="text" name="email" placeholder="أدخل الايميل الخاص بك " value="{{old('email')}}">
                @error('email') {{$message}} @enderror
                <input type="password" name="password" placeholder="أدخل كلمة المرور ">
                @error('password') {{$message}} @enderror
                <div class="actions">
                    <div class="btnGo">
                        <button type="submit" class="btn btn-primary">التسجيل</button>
                    </div>
                    <div class="forget">
                        <span>مرحباً بك معنا ! </span>
                    </div>

                </div>
            </form>



        </div>


    </div>
</div>


</body>
</html>
