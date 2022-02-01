@extends('layaout.main')
@section("title")
    ارشادات
@endsection
@section("content")
    <div class="title-page">
        <h1>ارشادات</h1>
    </div>
    <div class="support-table">
        <div class="table">
            <table>
                <thead>
                <th>
                    اسم التاج
                </th>
                <th>
                    الوظيفة
                </th>
                <th>
                    انسخ
                </th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span class="tag-name">[nameOne]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها باسم الفريق الاول في المقالة .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[nameTwo]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها باسم الفريق الثاني في المقالة .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[dateMatch]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها بتاريخ المباراة .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[botola]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها باسم البطولة .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[urlPost]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها برابط المقالة (اختيارية) .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>


                <tr>
                    <td>
                        <span class="tag-name">[imgPost]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها برابط او مكان وضع صورة المقالة .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>


                <tr>
                    <td>
                        <span class="tag-name">[beasTime]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها بتوقيت المباراة الاساسي بتوقيت السعودية .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[beasTimeMinusOne]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها بتوقيت المباراة باقل من ساعة من التوقيت الاساسي مثلا بتوقيت مصر .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[beasTimeMinusTwo]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها بالتوقيت الاقل ساعنين من التوقيت الاساسي مثلا بتوقيت المغرب العربي  .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[voiceOver]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها باسم المعلق  .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[timeStartMatch]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها بتوقيت بداية المباراة مثال عليها (2022-02-01T17:00:00+02:00)  .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[urlChannel]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها برابط صفحة البث المباشر   .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[timeDate]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">بتم استبدالها بتوقيت بداية المباارة مثال (	9:00 مساءً بتوقيت مكة المكرمة) .</span>
                    </td>
                    <td>
                        <span class="tag-copy">انسخ</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="tag-name">[channel]</span>
                    </td>
                    <td>
                        <span class="tag-descrption">يتم استبدالها باسم القناة العارضة للمباراة</span>
                    </td>
                    <td>
                        <span  class="tag-copy">انسخ</span>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    <input type="text" style="display : none" id="copyText">
@endsection
@section('footer')
    <script src="http://localhost/superDash/js/sweetalert2.js"></script>
    <script>
        // Support page
        let tagName = Array.from(document.getElementsByClassName('tag-name'));
        let textCopy = Array.from(document.getElementsByClassName('tag-copy'));
        tagName.forEach(element => {
            let tag = element.innerHTML.replace("[","").replace("]","");
            element.setAttribute('id',tag);
        });

        for(let i = 0 ; i < textCopy.length ; i++){
            textCopy[i].setAttribute('onclick','copyTag("'+tagName[i].id+'")');
        }

        function copyTag(id){
            let inputCopy = document.getElementById('copyText');
            inputCopy.value = document.getElementById(id).innerHTML;
            inputCopy.select();
            inputCopy.setSelectionRange(0, 99999); // For mobile devices
            navigator.clipboard.writeText(inputCopy.value);
            Swal.fire({
                icon: 'success',
                title: 'عمل رائع !',
                text: 'تم النسخ بنجاح!',
            });
        }
    </script>
@endsection
