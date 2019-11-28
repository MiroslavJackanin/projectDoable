function changeCSS(value) {
    if (value===0){
        document.querySelector("link[href='_assets/css/themes/bootstrap.min(0).css']").href = "_assets/css/themes/bootstrap.min(4).css";
    }else{
        document.querySelector("link[href='_assets/css/themes/bootstrap.min(4).css']").href = "_assets/css/themes/bootstrap.min(0).css";
    }
}