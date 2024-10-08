<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Connexion</h2>

        <span id="error-message" class="alert alert-danger" style="display: none;"></span>

        <form method="post" action="../fonction.php">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" required>
            </div>

            <div class="form-group">
                <label for="mdp">Password</label>
                <input type="password" class="form-control" name="mdp" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select class="form-control" name="role" required>
                    <option value="administrateur">Administrateur</option>
                    <option value="réceptionniste">Réceptionniste</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
        </form>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_SESSION['error'])): ?>
            let errorMessage = "<?= htmlspecialchars($_SESSION['error']) ?>";
            let errorDiv = document.getElementById('error-message');
            errorDiv.innerHTML = errorMessage;
            errorDiv.style.display = 'block';
        <?php endif; ?>
    });
    </script>
</body>
</html>
