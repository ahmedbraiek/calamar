
/*function edition(){
    window.open( "builltein.php", "edition") ;
   }*/

   function verif0(){
	qt=f.qt.value;
	p=f.p.value;
	d=f.details.value;


	if((qt=="") || (isNaN(qt)) || (qt>40) || (qt<0)){
		alert("Verifier la quantite !!!");
		return false;
	}
	
	if((p=="") || (isNaN(p)) || (p>20000) || (p<0)){
		alert("Verifier le poids !!!");
		return false;
	}
	
	if(f.e.options.selectedIndex<1){
		alert("Selectionnez Etat de Mer !!! ")
		return false;
	}	
	
	if(f.v.options.selectedIndex<1){
		alert("Selectionnez Le Vent !!! ")
		return false;
	}

	if(f.c.options.selectedIndex<1){
		alert("Selectionnez Le Courant !!! ")
		return false;
	}

	if(f.fr.options.selectedIndex<1){
		alert("Selectionnez Elmed w Jazr !!! ")
		return false;
	}

	if(f.L.options.selectedIndex<1){
		alert("Selectionnez la Lune !!! ")
		return false;
	}
	
	
	

}


function verif(){
	
	email=f.email.value;
	pass=f.pass.value;
	
if (email==""){
	alert("Verifer Le Nom Utilisateur !!!")
		return false;
	}

	if (pass==""){
		alert("Verifer Le Mot de Passe !!!")
			return false;
		}
	
	
}
function verif2(){
	qt=f.qt.value;
	p=f.p.value;
	prix=f.prix.value;
	


	if((qt=="") || (isNaN(qt)) || (qt>40) || (qt<0)){
		alert("Verifier la quantite !!!");
		return false;
	}
	
	if((p=="") || (isNaN(p)) || (p>20000) || (p<0)){
		alert("Verifier le poids !!!");
		return false;
	}

	if((prix=="") || (isNaN(prix)) || (prix>300000) || (prix<0)){
		alert("Verifier le Prix !!!");
		return false;
	}


}

