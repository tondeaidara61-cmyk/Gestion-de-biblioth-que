const nomInput = document.getElementById("nom_auteur");
const prenomInput = document.getElementById("prenom_auteur");
const idAuteurInput = document.getElementById("id_auteur");
const statutDiv = document.getElementById("statutAuteur");
const nouveauFields = document.getElementById("nouvelAuteurFields");

async function verifierAuteur() {
  const nom = nomInput.value.trim();
  const prenom = prenomInput.value.trim();

  // On vérifie seulement si les deux champs sont remplis
  if (nom === "" || prenom === "") return;

  statutDiv.innerHTML = '<span class="text-muted small">Vérification...</span>';

  try {
    const response = await fetch(
      `livre.php?fonct=checkAuteur&nom=${encodeURIComponent(nom)}&prenom=${encodeURIComponent(prenom)}`,
    );
    const data = await response.json();

    if (data.exists) {
      idAuteurInput.value = data.id_auteur;
      statutDiv.innerHTML =
        '<span class="text-success small">✓ Auteur trouvé dans la base</span>';
      nouveauFields.classList.add("d-none");
    } else {
      idAuteurInput.value = "";
      statutDiv.innerHTML =
        '<span class="text-warning small">Nouvel auteur, à créer</span>';
      nouveauFields.classList.remove("d-none");
    }
  } catch (error) {
    statutDiv.innerHTML =
      '<span class="text-danger small">Erreur de vérification</span>';
  }
}

// On vérifie quand l'utilisateur quitte le champ prénom
prenomInput.addEventListener("blur", verifierAuteur);
