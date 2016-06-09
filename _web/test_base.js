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
			       	var label = document.getElementById("sortie");
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			           label.innerHTML = valeur; 
			           //console.log(ligne.value);

			           //
			           
			       	}
			        else{
			            label.innerText ="Error code " + xhr.status;
			        }
		        }
		    }; 
		 
		   
		 
			   	xhr.open("GET", "http://pluviodic2.moussadiallo.net/testClient.php",  true); 
			   	xhr.setRequestHeader("Access-Control-Allow-Methods", "REQUEST,GET,HEAD,OPTIONS,POST,PUT");
		   		xhr.setRequestHeader("Access-Control-Allow-Headers","Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Origin, Authorization, X-Requested-With, Access-Control-Allow-Methods");
				xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			    xhr.send("donnees=8"); 
