<div class="card mt-4">
    <div class="card-header bg-primary text-white">Health Surveillance Details</div>
    <div class="card-body">
        <div class="health-surveillance-details">
            @foreach ($consultation->healthSurveillance as $healthSurveillance)
                <div class="card mb-3">
                    <div class="card-body">
                        <dl class="row">
                            <div class="col-sm-4">
                                <dt>Surveillance Type:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->surveillanceType }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Occupation:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->occupation }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Hazards:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->hazards }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>ECG:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->ecg }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Spirometry:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->spirometry }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Audiometry:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->audiometry }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>General:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->general }}</dd>
                            </div>

                            <div class="col-sm-4">
                                <dt>Follow Up:</dt>
                            </div>
                            <div class="col-sm-8">
                                <dd>{{ $healthSurveillance->followUp }}</dd>
                            </div>

                            <!-- Ajoutez les autres champs de HealthSurveillance ici... -->
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
