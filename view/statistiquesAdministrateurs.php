 <?php

require_once "../controller/controllerCour.php";
require_once "../model/CourModal.php";
require_once "../model/TagsModal.php";
require_once "../controller/controllerTags.php";
require_once "../model/CategorieModal.php";
require_once "../entities/Categorie.php";
require_once "../controller/controllerCategorie.php";

$static = new CourContrller(new CourModal);
$NomCour = $static->StatistiqueNombreCour();
$categories = new controllerCategorie(new CategorieModal);
$categoriesArray = $categories->GetAllCategories();
$categoriesName = [];
$categoriesName = [];

foreach ($categoriesArray as $categorie) {
    $categoriesName[] = $categorie['NomCategorie'];
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Globales</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Statistiques Globales</h1>

        <!-- Statistiques Cards -->
        <div class="row g-4 mb-6">
            <div class="col-lg-3 col-md-6">
                <div  class="card shadow bg-white text-center p-4">
                    <h2 class="text-2xl font-semibold">Nombre Total de Cours</h2>
                    <p  class="text-4xl text-indigo-600" id="totalCours">0</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow bg-white text-center p-4">
                    <h2 class="text-2xl font-semibold">Catégorie Principale</h2>
                    <p class="text-xl text-green-600" id="categoriePrincipale">Aucune</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow bg-white text-center p-4">
                    <h2 class="text-2xl font-semibold">Cours le Plus Populaire</h2>
                    <p class="text-lg text-purple-600" id="coursPopulaire">Aucun</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow bg-white text-center p-4">
                    <h2 class="text-2xl font-semibold">Top Enseignant</h2>
                    <p class="text-lg text-blue-600" id="topEnseignant">Aucun</p>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="bg-white shadow p-6 rounded-lg w-[40%]">
            <h2 class="text-2xl font-bold mb-4">Répartition par Catégorie</h2>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

    <script>
        var totalCours = <?php echo  json_encode($NomCour) ?>
        var Categories = <?php echo json_encode($categoriesName);?>
        // Données simulées pour les statistiques
        const stats = {
            totalCours: totalCours,
            repartitionCategories: {
                "Développement Web": 50,
                "Design Graphique": 30,
                "Marketing Digital": 20,
                "Autres": 20
            },
            coursPopulaire: "Développement React",
            topEnseignant: "John Doe",
        };

      
        document.getElementById("totalCours").textContent = stats.totalCours;
        document.getElementById("categoriePrincipale").textContent = Object.keys(stats.repartitionCategories)[0];
        document.getElementById("coursPopulaire").textContent = stats.coursPopulaire;
        document.getElementById("topEnseignant").textContent = stats.topEnseignant;

        // Configuration du graphique de répartition par catégorie
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(stats.repartitionCategories),
                datasets: [{
                    label: 'Répartition des Catégories',
                    data: Object.values(stats.repartitionCategories),
                    backgroundColor: ['#6366F1', '#22C55E', '#F97316', '#E11D48'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>
