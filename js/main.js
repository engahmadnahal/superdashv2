let logoOne = document.getElementById('logoOne'),
    logoTwo = document.getElementById('logoTwo'),
    nameOne = document.getElementById('nameOne'),
    nameTwo = document.getElementById('nameTwo'),
    preview = document.getElementById('preview');

let stng_logo_one_top = document.getElementById('stng_logo_one_top'),
    stng_logo_two_top = document.getElementById('stng_logo_two_top'),
    stng_name_one_top = document.getElementById('stng_name_one_top'),
    stng_name_two_top = document.getElementById('stng_name_two_top'),
    stng_logo_one_right = document.getElementById('stng_logo_one_right'),
    stng_logo_two_right = document.getElementById('stng_logo_two_right'),
    stng_name_one_right = document.getElementById('stng_name_one_right'),
    stng_name_two_right = document.getElementById('stng_name_two_right'),

    stng_name_one_color = document.getElementById('stng_name_one_color'),
    stng_name_two_color = document.getElementById('stng_name_two_color'),
    stng_name_one_backg_color = document.getElementById('stng_name_one_backg_color'),
    stng_name_two_backg_color = document.getElementById('stng_name_two_backg_color'),
    backg_img = document.getElementById('backg_img');


let inpust = Array.from(document.getElementsByTagName('input'));
let elemDrag = Array.from(document.getElementsByClassName('drag'));
getDataInput(inpust);
elemDrag.forEach(e => {
    move(document.getElementById(e.id));
});


function move(div){
    let mousePosition,
        offset = [0,0],
        isDown = false,
        left,top;


    div.addEventListener('mousedown', function(e) {
        isDown = true;
        offset = [
            div.offsetLeft - e.clientX,
            div.offsetTop - e.clientY
        ];

        div.style.cursor = "grabbing";
    }, true);

    document.addEventListener('mouseup', function() {
        isDown = false;
        div.style.cursor = "grab";

    }, true);

    document.addEventListener('mousemove', function(event) {
        event.preventDefault();
        if (isDown) {
            mousePosition = {
                x : event.clientX,
                y : event.clientY
            };

            left = (mousePosition.x + offset[0]),
            top = (mousePosition.y + offset[1]);

            div.style.left =  left+ 'px';
            div.style.top  =  top+ 'px';

            switch (div.id){
                case "nameOne" :
                    stng_name_one_top.value = top;
                    stng_name_one_right.value = left;
                    break;
                case "nameTwo" :
                    stng_name_two_top.value = top;
                    stng_name_two_right.value = left;
                    break;
                case "logoOne" :
                    stng_logo_one_top.value = top;
                    stng_logo_one_right.value = left;
                    break;
                case "logoTwo" :
                    stng_logo_two_top.value = top;
                    stng_logo_two_right.value = left;
                    break;
            }

        }
    }, true);
}
function getDataInput(inpust){
    inpust.forEach((e)=>{
        e.addEventListener('click',function (){
            let elem = document.getElementById(e.id);
            elem.addEventListener('input',function (ele){
                console.log(e.id);
                let value = elem.value+"px";
                switch (e.id){
                    case 'stng_logo_one_top':
                        logoOne.style.top = value;
                        break;
                    case 'stng_logo_two_top':
                        logoTwo.style.top = value;
                        break;
                    case 'stng_name_one_top':
                        nameOne.style.top = value;
                        break;
                    case 'stng_name_two_top':
                        nameTwo.style.top = value;
                        break;
                    case 'stng_logo_one_right':
                        logoOne.style.left = value;
                        break;
                    case 'stng_logo_two_right':
                        logoTwo.style.left = value;
                        break;
                    case 'stng_name_one_right':
                        nameOne.style.left = value;
                        break;
                    case 'stng_name_two_right':
                        nameTwo.style.left = value;
                        break;
                    case 'stng_name_one_color':
                        nameOne.style.color = elem.value;
                        break;
                    case 'stng_name_two_color':
                        nameTwo.style.color = elem.value;
                        break;
                    case 'stng_name_one_backg_color':
                        nameOne.style.background = elem.value;
                        break;
                    case 'stng_name_two_backg_color':
                        nameTwo.style.background = elem.value;
                        break;
                    case 'backg_img':
                        preview.style.background = "url("+elem.value+") center no-repeat";
                        break;

                }
            });

        });
    });
}

// add tag [imgTag] , and replace <img> tag name
let postSite = document.getElementById('post_site');
let tableSite = document.getElementById('table_site');

postSite.addEventListener('change',function (){
    let valueAfterReplacee = postSite.value.replace('<img',"[iTag]");
    postSite.value = valueAfterReplacee.replace('style',"[stTag]").replace('src','[srTag]');
});

tableSite.addEventListener('change',function (){
    let valueAfterReplace = tableSite.value.replace('src','[srTag]');
    tableSite.value = valueAfterReplace.replace('<img',"[iTag]");
});