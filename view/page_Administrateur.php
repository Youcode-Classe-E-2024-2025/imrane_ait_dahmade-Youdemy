<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "./link.php"; ?>
</head>

<body>
    <nav class=" flex sm:flex-row flex-col justify-between items-center px-4 py-2 border-b-4   gap-2   ">
        <div>
            <img src="../images/logo.png" class="img-fluid w-36" alt="">
        </div>
        <div class="input-group rounded  sm:w-[20%] w-1/2  ">
            <input type="search" class="form-control rounded-3xl" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            </span>
        </div>
       <a href=""><img src="../images/admin.jpg " class="rounded-circle " style="width: 60px;"
       alt="Avatar" /></a>
    </nav>
    <main>
    <div class="flex flex-row gap-2 w-1/2 pt-2 justify-self-center">
            <a  class="btn btn-primary rounded-3xl shadow-sm lg:py-1 w-1/2 sm:text-lg text-sm  " style ="background-color: #8AC9C5; border:none">
                Liste des etudiants
            </a>
            <button class="btn btn-primary rounded-3xl shadow-sm w-1/2 sm:text-lg" style ="background-color:  #6F0B46; border:none ;">
        Liste des Enseignants
            </button>
        </div>
    <div class="container mt-5 hidden" id="afficherListeDese">
  
  <h2 class="text-center mb-4">Liste des etudiant</h2>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Statut</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Jean Dupont</td>
        <td>jean.dupont@example.com</td>
        <td><span id="status-label-1" class="fw-bold text-secondary">Désactivé</span></td>
        <td>
          <button 
            id="toggle-button-1" 
            class="btn btn-danger btn-sm"
            onclick="toggleStatus(1)">
            Activer
          </button>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Marie Curie</td>
        <td>marie.curie@example.com</td>
        <td><span id="status-label-2" class="fw-bold text-secondary">Désactivé</span></td>
        <td>
          <button 
            id="toggle-button-2" 
            class="btn btn-danger btn-sm"
            onclick="toggleStatus(2)">
            Activer
          </button>
        </td>
      </tr>
      <tr>
       
    </tbody>
  </table>
</div>

<script>
  function toggleStatus(userId) {
    const statusLabel = document.getElementById(`status-label-${userId}`);
    const toggleButton = document.getElementById(`toggle-button-${userId}`);
    const isActive = statusLabel.textContent === 'Activé';

    // Met à jour le statut et le bouton
    if (isActive) {
      statusLabel.textContent = 'Désactivé';
      statusLabel.classList.remove('text-success');
      statusLabel.classList.add('text-secondary');
      toggleButton.textContent = 'Activer';
      toggleButton.classList.remove('btn-success');
      toggleButton.classList.add('btn-danger');
    } else {
      statusLabel.textContent = 'Activé';
      statusLabel.classList.remove('text-secondary');
      statusLabel.classList.add('text-success');
      toggleButton.textContent = 'Désactiver';
      toggleButton.classList.remove('btn-danger');
      toggleButton.classList.add('btn-success');
    }
  }
</script>
    </main>
</body>

</html>