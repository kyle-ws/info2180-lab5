window.onload= function(){

    let lookupBtn= document.getElementById('lookup');
    let input=document.getElementById('country');
    let city=document.getElementById('button');
    let result = document.getElementById("result");
    


    lookupBtn.addEventListener("click", function(e){
        
        httpReq= new XMLHttpRequest();
        let url ="http://localhost/info2180-lab5/world.php?country="+input.value+"&lookup=";
        httpReq.open('GET',url);
        httpReq.send();
        httpReq.onreadystatechange= reply;
    });

    city.addEventListener("click", function(e){
        
        httpReq= new XMLHttpRequest();
        let url ="http://localhost/info2180-lab5/world.php?country="+input.value+"&lookup=cities";
        httpReq.open('GET',url);
        httpReq.send();
        httpReq.onreadystatechange= reply;
    });
    
    
    function reply(){
        if(httpReq.readyState=== XMLHttpRequest.DONE){
            if(httpReq.status===200){
                result.innerHTML=httpReq.responseText;
            }else{
                alert('There was an Error')
                }
            }
            
    }
}

