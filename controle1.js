function verif01(){

	email=f.email.value;
	mdp1=f.mdp1.value;
	mdp=f.mdp.value;
	
if(email=="")  {
	alert("Verifer Votre Email !!!")
		return false;
	}

if(mdp1=="")  {
	alert("Verifer Votre Ancienne Mot de Passe !!!")
		return false;
	}

if(mdp=="")  {
	alert("Verifer Votre Nouveau Mot de Passe !!!")
		return false;
	}

	
}

function verif0(){

	userad=f.userad.value;
	mdpad=f.mdpad.value;

	user=f.user.value;
	mdp=f.mdp.value;
	
	
if(userad=="")  {
	alert("Verifer Votre User Admin !!!")
		return false;
	}

if(mdpad=="")  {
	alert("Verifer Votre Mot de Passe Admin !!!")
		return false;
	}

if(user=="")  {
	alert("Verifer Votre Nom User !!!")
		return false;
	}

if(mdp=="")  {
	alert("Verifer Votre Mot de Passe !!!")
		return false;
	}
	
}


function verif(){
	
	msg=f.msg.value;
	
if(msg==="")  {
	alert("Verifer Votre Message !!!")
		return false;
	}

if(f.env.options.selectedIndex<1){
	alert("Selectionnez un Utilisateur !!! ")
	return false;
}
	
}

function verif1(){

if(f.env.options.selectedIndex<1){
	alert("Selectionnez un Utilisateur !!! ")
	return false;
}
	
}

