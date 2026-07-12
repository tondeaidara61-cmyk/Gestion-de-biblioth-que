function verification_email() {
  const InputEmail = document.getElementById("email").value;
  const Button = document.getElementById("enregistrer");
  const reponse = document.getElementById("reponse2");

  fetch("emprunt.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      action: "EnvoyerEmail",
      InputEmail: InputEmail,
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "email invalide") {
        reponse.innerHTML = `
        <div class="alert alert-danger py-2 mt-2 mb-0">
            Email invalide !
        </div>
    `;
        Button.disabled = true;
      } else if (data.status === false) {
        reponse.innerHTML = `
        <div class="alert alert-danger py-2 mt-2 mb-0">
            Cet email n'est inscrit !
        </div>
    `;
        Button.disabled = true;
      } else {
        reponse.innerHTML = "";
        Button.disabled = false;
      }
    });
}
