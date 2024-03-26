<div class="card mt-4">
    <div class="card-header bg-primary text-white">Medication Details</div>
    <div class="card-body">
        <div class="medication-details">
            @foreach ($consultation->medications as $medication)
                <div class="card mb-3">
                    <div class="card-body">
                        <dl class="row">
                            <div class="col-sm-4">
                                <dt>Drug Name:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $medication->drugname }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Prescription:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $medication->prescription }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Stock:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $medication->stock }}</dd>
                            </div>

                            <!-- Ajoutez les autres champs de Medication ici... -->
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
