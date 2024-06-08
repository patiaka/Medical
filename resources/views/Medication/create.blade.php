<form action="{{ route('consultation.store') }}" method="POST">
    @csrf
    <!-- Champs de consultation -->
    <!-- Ajoutez vos champs de consultation ici -->

    <!-- Champs de médicaments -->
    <div id="medications">
        <div class="medication mb-3 border p-3">
            <div class="form-group">
                <label for="drugname_0">Drug Name</label>
                <input type="text" name="medications[0][drugname]" id="drugname_0" class="form-control">
            </div>
            <div class="form-group">
                <label for="prescription_0">Prescription</label>
                <input type="text" name="medications[0][prescription]" id="prescription_0" class="form-control">
            </div>
            <div class="form-group">
                <label for="stock_0">Stock</label>
                <input type="number" name="medications[0][stock]" id="stock_0" class="form-control">
            </div>
            <button type="button" class="btn btn-danger removeMedication mt-3">
                <i class="fas fa-trash-alt"></i> Remove
            </button>
        </div>
    </div>

    <!-- Bouton pour ajouter un autre médicament -->
    <button type="button" id="addMedication" class="btn btn-primary mt-3">
        <i class="fas fa-plus"></i> Add
    </button>

    <!-- Bouton pour soumettre le formulaire -->
    <button type="submit" class="btn btn-success  mt-3">Submit</button>
</form>

<!-- Inclure Font Awesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- JavaScript pour ajouter et supprimer des médicaments -->
<script>
    document.getElementById('addMedication').addEventListener('click', function() {
        var medicationCount = document.querySelectorAll('.medication').length;
        var newMedication = document.createElement('div');
        newMedication.classList.add('medication', 'mb-3', 'border', 'p-3');
        newMedication.innerHTML = `
            <div class="form-group">
                <label for="drugname_${medicationCount}">Drug Name</label>
                <input type="text" name="medications[${medicationCount}][drugname]" id="drugname_${medicationCount}" class="form-control">
            </div>
            <div class="form-group">
                <label for="prescription_${medicationCount}">Prescription</label>
                <input type="text" name="medications[${medicationCount}][prescription]" id="prescription_${medicationCount}" class="form-control">
            </div>
            <div class="form-group">
                <label for="stock_${medicationCount}">Stock</label>
                <input type="number" name="medications[${medicationCount}][stock]" id="stock_${medicationCount}" class="form-control">
            </div>
            <button type="button" class="btn btn-danger removeMedication mt-3">
                <i class="fas fa-trash-alt"></i> Remove
            </button>
        `;
        document.getElementById('medications').appendChild(newMedication);
    });

    document.getElementById('medications').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('removeMedication')) {
            e.target.closest('.medication').remove();
        }
    });
</script>
