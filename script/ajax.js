myLinksList = document.querySelectorAll('.listing li a');

for (links of myLinksList) {
  links.addEventListener('click', function(e){
    e.preventDefault();

    for (aLinkColor of myLinksList) {
      aLinkColor.classList.remove("current");
    }
    this.classList.add("current");

    myLinkHref = this.getAttribute("href");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200)) {

        myPerson = JSON.parse(xhr.responseText);

        fiche = document.querySelector("main");
        
        text = "<h1>Fiche :</h1>";
        text +=  "<h2>" + myPerson.nom + " " + myPerson.prenom  + "</h2>";
        sexe = (myPerson.genre == "M") ? "Née le " : "Né le ";
        text += (myPerson.ddn) ? "<p> " + sexe + myPerson.ddn +  " </p>" : "<p> " + sexe + "inconnu</p>";
        if(myPerson.email) {
          text += "<dt>Email :</dt>";
          text += "<dd>" + myPerson.email + "</dd>";
        }
        if(myPerson.telephone) {
          text += "<dt>Tel :</dt>";
          text += "<dd>" + myPerson.telephone + "</dd>";
        }

        fiche.innerHTML = text;

        //Pour que nos changements avec ajax soient pris en compte dans l'historique (ne marche pas avec tous les navigateurs).
        var stateObj = {titre: myPerson.nom};
        history.pushState(stateObj, myPerson.nom+ " " +myPerson.prenom, "listing.php?id_personnes="+myPerson.id_personnes);
      }
    }

    xhr.open("GET", myLinkHref + "&ajax", false);
    xhr.send(null);

  })
}

// ************************************************************************** //
// FORM SUBMIT

myForm = document.querySelector('form');

myForm.addEventListener('submit', function(e) {
  e.preventDefault();

  myFields = document.querySelectorAll("input");

  myDatas = {};

  for(myField of myFields){
    //Il faudra faire un contrôle pour prendre le bouton radio checked
    myDatas[myField.name] = myField.value;
  }
  //On converti la chaîne JSON en texte
  myDatasString = JSON.stringify(myDatas);
 //On fait une requête AJAX pour envoyée la chaîne obtenue au serveur;
 xhr = new XMLHttpRequest();

 //Au lieu du onreadystatechange, on peut utiliser onload
 xhr.onload= function() {
   console.log(this.responseText);
 };

 xhr.open('POST', 'listing.php?ajax', true);

 //Il faut envoyer une entête
 xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded')
 //La chaîne de caractères qu'on envoit
 xhr.send(myDatasString);
  
});
