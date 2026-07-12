function verification_livre() {
  const inputTitre = document.getElementById("titre_livre").value;
  const reponse = document.getElementById("reponse");
  const button = document.getElementById("enregistrer");

  if (inputTitre === "") {
    reponse.innerHTML = "";
    button.disabled = false;
  } else {
    fetch("exemplaire.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        action: "EnvoyerTitreDuLibre",
        input: inputTitre,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.status == true) {
          reponse.innerHTML = "";
          button.disabled = false;
        } else {
          reponse.style.color = "red";
          reponse.style.fontSize = "18px";
          reponse.innerHTML = `
  <div class="alert alert-danger d-flex justify-content-between align-items-center mt-2 mb-0 py-2">
    <span>Ce livre n'est pas enregistré !</span>
    <a href="livre.php?titre=${encodeURIComponent(inputTitre)}" class="btn btn-sm btn-primary">
      Enregistrer ce livre
    </a>
  </div>
`;
          button.disabled = true;
        }
      });
  }
}
