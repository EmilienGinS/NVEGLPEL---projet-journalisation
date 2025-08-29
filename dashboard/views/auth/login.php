<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
        <h2 class="form-header text-center mb-4">Connexion</h2>
        <form id="loginForm" action="/" method="post">
            <div class="mb-3">
                <label for="form2Example1" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="text" id="form2Example1" class="form-control" placeholder="Entrez votre email" />
                </div>
            </div>

            <div class="mb-3">
                <label for="form2Example2" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" id="form2Example2" class="form-control" placeholder="Entrez votre mot de passe" />
                </div>
            </div>

            <div id="errorMsg" class="alert alert-danger d-none"></div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('form2Example1').value.trim();
    const pass  = document.getElementById('form2Example2').value.trim();
    const errorMsg = document.getElementById('errorMsg');

    if (email === '' || pass === '') {
        errorMsg.textContent = "Veuillez remplir les deux champs.";
        errorMsg.classList.remove('d-none');
        return;
    }

    if (email === 'Emilien' && pass === '1234') {
         
        window.location.href = "/accueil/index";
    } else {
        errorMsg.textContent = "Identifiants incorrects.";
        errorMsg.classList.remove('d-none');
    }
});
</script>
