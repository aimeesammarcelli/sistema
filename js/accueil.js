let posidate= document.getElementById("date");
let date= new Date();
let jour= date.getDay();
let jourmois= date.getDate();

let posimois= document.getElementById("mois");
let mois= date.getMonth();


switch(jour){
  case 0: posidate.innerText= "Dimanche " + jourmois; break;
  case 1: posidate.innerText= "Lundi " + jourmois; break;
  case 2: posidate.innerText= "Mardi "+ jourmois; break;
  case 3: posidate.innerText= "Mercredi " + jourmois; break;
  case 4: posidate.innerText ="Jeudi " + jourmois; break;
  case 5: posidate.innerText ="Vendredi " + jourmois; break;
  case 6: posidate.innerText= "Samedi " + jourmois; break;
  default: posidate.innerText= "Cette journée n'existe pas";
}

switch(mois){
    case 0: posimois.innerText="janvier";break;
    case 1: posimois.innerText="février";break;
    case 2: posimois.innerText="mars";break;
    case 3: posimois.innerText="avril";break;
    case 4: posimois.innerText="mai";break;
    case 5: posimois.innerText="juin";break;
    case 6: posimois.innerText="juillet";break;
    case 7: posimois.innerText="août";break;
    case 8: posimois.innerText="septembre";break;
    case 9: posimois.innerText="otobre";break;
    case 10: posimois.innerText="novembre";break;
    case 11: posimois.innerText="décembre";break;
    default : posimois.innerText = "Désolé, ce mois n'existe pas."; break;
           }