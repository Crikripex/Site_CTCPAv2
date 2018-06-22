var a = document.getElementById('dataExtracted').children.length;
a+=1;
for(i = 1; i < a; i++) {
    buffer = i + 1;
    document.getElementById("contain_" + i).innerHTML = "<i class='fa "+document.getElementById(i+'_icon').innerHTML+"'></i>"+document.getElementById(i + "_titre").innerHTML;
    document.getElementById("contain_" + i).onclick = function(event){
        event.preventDefault();
        document.getElementsByClassName("focused")[0].classList.remove("active");
        document.getElementsByClassName("focused")[0].classList.remove("focused");
        document.getElementById(this.id).classList.add("active");
        document.getElementById(this.id).classList.add("focused");
        //console.log('a');
        refresh_contents();
    }
    document.getElementById("mobileTitle" + i).onclick = function(event){
        event.preventDefault();
        /*if(document.getElementsByClassName("show")[0] != document.getElementById(this.id)) {
            return -1;
        }*/
        document.getElementsByClassName("mobFocused")[0].classList.remove("active");
        document.getElementsByClassName("mobFocused")[0].classList.remove("mobFocused");
        document.getElementById(this.id).classList.add("active");
        document.getElementById(this.id).classList.add("mobFocused");
        document.getElementsByClassName("show")[0].classList.remove("show");
        document.getElementById(this.id).classList.add("show");

        //refresh_contents();
    }
    document.getElementById("mobileTitle" + i).innerHTML = "<i class='fa "+document.getElementById(i+'_icon').innerHTML+"'></i>"+document.getElementById(i + "_titre").innerHTML;
    document.getElementById("mobileContain" + i).innerHTML = document.getElementById(i + "_content").innerHTML;
}
refresh_contents();
function refresh_contents() {
    if(document.getElementById("display_titre").innerHTML != document.getElementsByClassName("focused")[0].innerHTML) {
        document.getElementById("display_titre").innerHTML = document.getElementsByClassName("focused")[0].innerHTML;
        let a = document.getElementById('dataExtracted').children.length;
        let expression = new RegExp(" |\n","g");
        for (i = 1; i < a; i++) {
            buffer = i + 1;
            if (document.getElementById("display_titre").innerText.replace(expression,"") == document.getElementById(i+"_titre").innerText.replace(expression,"")){
                document.getElementById("display_content").innerHTML = document.getElementById(i + "_content").innerHTML;
                console.log(document.getElementById(i + "_content").innerHTML);

            }
        }
    }
}

/*
function refresh_contents() {
    if(document.getElementById("display_titre").innerText != document.getElementsByClassName("focused")[0].innerText) {
        document.getElementById("display_titre").innerHTML = document.getElementsByClassName("focused")[0].innerHTML;
        let a = document.getElementById('dataExtracted').children.length;
        let expression = new RegExp(" |\n","g");
        for (i = 0; i < a; i++) {
            buffer = i + 1;
            console.log(document.getElementById("display_titre").innerText.replace(new RegExp(" |\n","g"),""));
            console.log(document.getElementById(i+"_titre").innerText.replace(new RegExp(" |\n","g"),""));
            console.log(document.getElementById("display_titre").innerText == "<i class='fa'></i>"+document.getElementById(i + "_titre").innerText);
            if (document.getElementById("display_titre").innerText.replace(expression,"") == document.getElementById(i+"_titre").innerText.replace(expression,""))
                document.getElementById("display_content").innerHTML = document.getElementById(i + "_content").innerHTML;
        }
    }
}
*/