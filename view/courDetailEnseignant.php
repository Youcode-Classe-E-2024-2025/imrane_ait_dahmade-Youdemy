<?php

require_once "../controller/controllerCour.php";
require_once "../model/CourModal.php";
require_once "../model/TagsModal.php";
require_once "../controller/controllerTags.php";
require_once "../model/CategorieModal.php";
require_once "../entities/Categorie.php";
require_once "../controller/controllerCategorie.php";

$tags = new TagControlleur(new TagsModal);


$tags = new TagControlleur(new TagsModal);
$tags = $tags->AfficherTags($_GET['IdCour']);
$categories = new controllerCategorie(new CategorieModal);
$categoriesArray = $categories->GetAllCategories();


$cour = new CourContrller(new CourModal);
$cour = $cour->AfficheCour($_GET['IdCour']);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours</title>
    <?php include_once "./link.php"; ?>

</head>
<body  style="background-color:rgb(52, 26, 41)">

    <!-- Container principal -->
    <div class="container mx-auto mt-10 max-w-4xl">
        <!-- Card de détail -->
        <div class="card shadow-lg rounded-lg overflow-hidden bg-white">
            <!-- Image du cours -->
            <img src="../<?= htmlspecialchars($cour['image']) ?>" 
                 alt="Image du cours" 
                 class="card-img-top w-full h-64 object-cover">
            
            <!-- Contenu du cours -->
            <div class="card-body p-6">
                <!-- Titre du cours -->
                <h2 class="card-title text-2xl font-bold text-gray-800 mb-4">
                    <?= htmlspecialchars($cour['NomCour']) ?>
                </h2>

                <!-- Description -->
                <p class="card-text text-lg text-gray-600 mb-4">
                    <?= htmlspecialchars($cour['Description']) ?>
                </p>

                <!-- Catégorie -->
                <p class="text-md text-blue-500 font-semibold">
                    Catégorie : <a href="#" class="hover:underline"><?= htmlspecialchars($cour['Categorie']) ?></a>
                </p>

                <div class="flex justify-center my-6">
    <video 
        src="../<?= htmlspecialchars($cour['Video']) ?>" 
        controls 
        class="rounded-lg shadow-lg w-full max-w-3xl h-auto border border-gray-300"
    >
        Votre navigateur ne supporte pas les vidéos HTML5.
    </video>
    
</div>
    <div class="flex flex-wrap gap-2 p-4 bg-gray-100 rounded-md shadow-md">
    <?php foreach($tags as $tag): ?>
        <span class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-full">
            <?= htmlspecialchars($tag['NomTag']) ?>
        </span>
    <?php endforeach; ?>
</div>




                <!-- Boutons d'action -->
                <div class="flex justify-between items-center mt-6">
                    <!-- Voir Plus -->
                    <form action="./courDetailEnseignant.php" method="GET" class="w-full">
                        <button 
                            name="IdCour" 
                            value="<?= htmlspecialchars($cour['IdCour']) ?>" 
                            class="btn btn-primary w-full py-2 bg-purple-100 text-white font-semibold rounded-lg hover:bg-purple-700">
                        </button>
                    </form>
                </div>

                <!-- Modifier et Supprimer -->
                <div class="flex justify-between items-center mt-4">
                    <!-- Modifier -->
                    
                        <button 
                        id="openModal"
                            
                            value="<?= htmlspecialchars($cour['IdCour']) ?>" 
                            class="btn btn-warning w-full py-2 text-white font-semibold rounded-lg hover:bg-yellow-600">
                            Modifier
                        </button>
                    <!-- Supprimer -->
                    <form action="../index.php" method="POST" class="ml-4">
                        <input type="hidden" name="IdCour" value="<?= $cour['IdCour'] ?>">
                        <button
                        name="SuprimerCour" 
                            type="submit" 
                            class="btn btn-danger w-full py-2 text-white font-semibold rounded-lg hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="relative bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
        <!-- Bouton pour fermer la pop-up -->
        <button
            id="closeModal"
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            &times;
        </button>

        <h2 class="text-2xl font-bold mb-4">Modifier un Cours</h2>

        <!-- Formulaire -->
        <form action="modifierCour.php" method="POST" enctype="multipart/form-data">
            <!-- ID caché -->
            <input type="hidden" name="IdCour" value="<?= htmlspecialchars($cour['IdCour']) ?>">

            <!-- Nom du Cours -->
            <div class="mb-4">
                <label for="NomCour" class="block text-gray-700 font-semibold mb-2">Nom du Cours</label>
                <input
                    type="text"
                    id="NomCour"
                    name="NomCour"
                    value="<?= htmlspecialchars($cour['NomCour']) ?>"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="Description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea
                    id="Description"
                    name="Description"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"><?= htmlspecialchars($cour['Description']) ?></textarea>
            </div>

            <!-- Vidéo -->
            <div class="mb-4">
                <label for="Video" class="block text-gray-700 font-semibold mb-2">Vidéo</label>
                <input
                    type="file"
                    id="Video"
                    name="Video"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <p class="text-sm text-gray-500 mt-2">Vidéo actuelle : <?= htmlspecialchars($cour['Video']) ?></p>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="Image" class="block text-gray-700 font-semibold mb-2">Image</label>
                <input
                    type="file"
                    id="Image"
                    name="Image"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <p class="text-sm text-gray-500 mt-2">Image actuelle : <?= htmlspecialchars($cour['image']) ?></p>
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="Categorie" class="block text-gray-700 font-semibold mb-2">Catégorie</label>
                <select
                    id="Categorie"
                    name="Categorie"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <?php foreach ($categoriesArray as $categorie): ?>
                        <option value="<?= htmlspecialchars($categorie['NomCategorie']) ?>" <?= $cour['Categorie'] === $categorie['NomCategorie'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categorie['NomCategorie']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end gap-4">
                <button
                    type="submit"
                    name="ModifierCour"
                    class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600">
                    Enregistrer
                </button>
                <button
                    id="closeModal2"
                    type="button"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow-md hover:bg-gray-400">
                    Annuler
                </button>
            </div>
        </form>
        <script>
    // Sélection des éléments
    const modal = document.getElementById('modal');
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const closeModal2 = document.getElementById('closeModal2');

    // Ouvrir la pop-up
    openModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    // Fermer la pop-up
    const closePopup = () => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    };

    closeModal.addEventListener('click', closePopup);
    closeModal2.addEventListener('click', closePopup);
</script>
    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
