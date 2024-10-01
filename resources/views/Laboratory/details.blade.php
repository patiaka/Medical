@if ($consultation->laboratory && $consultation->laboratory->isNotEmpty())
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Laboratory Details</div>
        <div class="card-body">
            <div class="laboratory-details">
                @foreach ($consultation->laboratory as $laboratory)
                    <div class="card mb-3">
                        <div class="card-body">
                            <dl class="row">
                                <div class="col-sm-4">
                                    <dt>Hemoglobin:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->hemoglobin }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Malaria Thick:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->malariaThick }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Malaria Thin:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->malariaThin }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Malaria Quicktest:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->malariaQuicktest }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Blood Glucose:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->bloodGlucose }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>GOT:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->got }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>GPT:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->gpt }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>GGT:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->ggt }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Urea:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->urea }}</dd>
                                </div>

                                <div class="col-sm-4">
                                    <dt>Potassium K:</dt>
                                </div>
                                <div class="col-sm-8">
                                    <dd>{{ $laboratory->potasiumK }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <p>No laboratory details available.</p>
@endif
