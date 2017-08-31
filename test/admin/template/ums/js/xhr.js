function getXMLHttpRequest(){
    var xhr = null;
    if(typeof XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
}