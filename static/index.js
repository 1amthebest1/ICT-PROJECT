function changeLocation(image){
    let x = document.getElementsByClassName(image)[0].href;
    let id = x.indexOf("?");
    let ID=image.slice(3);
    if(id==-1){
    let imageToPass=x.slice(38);
    window.location="http://shaban.com:8000/phpFiles/buy.php?id="+ID+"&fileToRead="+imageToPass;
    }
    else{
    let imageToPass=x.slice(39, id);
    window.location="http://shaban.com:8000/phpFiles/buy.php?id="+ID+"&fileToRead="+imageToPass;
    }
}

function viewContent(image){
    // let image=document.getElementById(image);
    window.location=image;
}