function submitForm()
{ 
    var xhr; 
    try {  
    	xhr = new ActiveXObject('Msxml2.XMLHTTP');   
    }catch (e) {
        try {   
        	xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
        }
        catch (e2) {
           try {  
           	xhr = new XMLHttpRequest();  
           }
           catch(e3) {  
           	xhr = false;
           }
         }
    }
  
    xhr.onreadystatechange  = function() { 
       if(xhr.readyState  == 4){
        if(xhr.status  == 200) 
            document.ajax.dyn="Received:"  + xhr.responseText; 
        else
            document.ajax.dyn="Error code " + xhr.status;
        }
    }; 
 
   xhr.open("POST", "data.xml",  true); 
   xhr.send(null); 
} 