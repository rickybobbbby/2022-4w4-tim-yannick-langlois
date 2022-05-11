(function(){
    console.log("vive la boîte modale")  
    
    let boite__modale = document.querySelector(".boite__modale")
    let cours__desc__bouton = document.querySelectorAll('.cours__desc__bouton')
    let boite__modale__ferme = document.querySelector(".boite__modale__ferme")
    let boite__modale__texte = document.querySelector(".boite__modale__texte")
    
    boite__modale__ferme.addEventListener('mousedown', function(){
      boite__modale.classList.remove('boite__modale--ouvrir')
    })
  
    console.log(cours__desc__bouton.length)  
  
    for (const bout of cours__desc__bouton) {
        bout.addEventListener('mousedown',function(){
          boite__modale.classList.add('boite__modale--ouvrir')
          console.log(this.parentNode.parentNode.children[0].innerHTML)
          boite__modale__texte.innerHTML = this.parentNode.parentNode.children[3].innerHTML
        })
    }

  
  
    /*
  this.parentNode
  this.parentNode.children(2)
    */
  
  })()