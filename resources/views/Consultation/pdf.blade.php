<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .header {
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-bottom: 2px solid #0056b3;
        }

        .header img {
            max-width: 100px;
            margin-bottom: 5px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .content {
            padding: 10px;
            background-color: white;
            margin: 10px auto;
            max-width: 1000px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .details {
            margin-bottom: 10px;
        }

        .details h2 {
            font-size: 18px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        .details th,
        .details td {
            padding: 5px;
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word;
            font-size: 14px;
        }

        .details th {
            background-color: #f7f7f7;
            color: #007bff;
            font-weight: bold;
        }

        .details tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        .details .section-title {
            background-color: #007bff;
            color: white;
            font-size: 14px;
            padding: 5px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .footer {
            text-align: center;
            padding: 5px;
            background-color: #f7f7f7;
            border-top: 1px solid #ddd;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('logo/Resolute.png') }}" alt="Company Logo">
        <h1>OCH Consultation Details</h1>
    </div>
    <div class="content">
        <div class="details">
            <h2>Patient Information</h2>
            <table>
                <tr>
                    <th colspan="4" class="section-title">General Information</th>
                </tr>
                <tr>
                    <th>Consultation ID:</th>
                    <td>{{ $consultation->id }}</td>
                    <th>Patient Number:</th>
                    <td>{{ $consultation->employee->employeeNumber }}</td>
                </tr>
                <tr>
                    <th>Consultation Date:</th>
                    <td>{{ $consultation->created_at }}</td>
                    <th>Patient Name:</th>
                    <td>{{ $consultation->employee->firstName }} {{ $consultation->employee->lastName }}</td>
                </tr>
                <tr>
                    <th>National/Expat:</th>
                    <td>{{ $consultation->employee->employeeType }}</td>
                    <th>Staff ID:</th>
                    <td>{{ $consultation->employee->staffId }}</td>
                </tr>
                <tr>
                    <th>Company:</th>
                    <td>{{ $consultation->employee->company->name }}</td>
                    <th>Department:</th>
                    <td>{{ $consultation->employee->department->name }}</td>
                </tr>
                <tr>
                    <th>Seen by:</th>
                    <td>{{ $consultation->user->name }}</td>
                    <th>Injury Type:</th>
                    <td>{{ $consultation->injurie->name }}</td>
                </tr>
                <tr>
                    <th>Staff/Family:</th>
                    <td>{{ $consultation->staffType }}</td>
                    <th>Referral:</th>
                    <td>{{ $consultation->referral }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="section-title">Medical Information</th>
                </tr>
                <tr>
                    <th>Diagnosis:</th>
                    <td colspan="3">{{ $consultation->diagnosis }}</td>
                </tr>
                <tr>
                    <th>History:</th>
                    <td colspan="3">{{ $consultation->history }}</td>
                </tr>
                <tr>
                    <th>BP:</th>
                    <td>{{ $consultation->bp }}</td>
                    <th>Pulse:</th>
                    <td>{{ $consultation->pulse }}</td>
                </tr>
                <tr>
                    <th>Temperature:</th>
                    <td>{{ $consultation->temperature }}</td>
                    <th>Observation:</th>
                    <td>{{ $consultation->observation }}</td>
                </tr>
                <tr>
                    <th>Comments:</th>
                    <td colspan="3">{{ $consultation->comments }}</td>
                </tr>
                <tr>
                    <th>Malaria:</th>
                    <td>{{ $consultation->malaria }}</td>
                    <th>Days Off:</th>
                    <td>{{ $consultation->daysOff }}</td>
                </tr>
                <tr>
                    <th>Diagnosis Specific:</th>
                    <td>{{ $consultation->diagnosispec }}</td>
                    <th>Diagnosis Mali:</th>
                    <td>{{ $consultation->diagnosiMali }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="section-title">Laboratory Information</th>
                </tr>
                @foreach ($consultation->laboratory as $laboratory)
                    <tr>
                        <th>Hemoglobin:</th>
                        <td>{{ $laboratory->hemoglobin }}</td>
                        <th>Malaria Thick:</th>
                        <td>{{ $laboratory->malariaThick }}</td>
                    </tr>
                    <tr>
                        <th>Malaria Thin:</th>
                        <td>{{ $laboratory->malariaThin }}</td>
                        <th>Malaria Quicktest:</th>
                        <td>{{ $laboratory->malariaQuicktest }}</td>
                    </tr>
                    <tr>
                        <th>Blood Glucose:</th>
                        <td>{{ $laboratory->bloodGlucose }}</td>
                        <th>GOT:</th>
                        <td>{{ $laboratory->got }}</td>
                    </tr>
                    <tr>
                        <th>GPT:</th>
                        <td>{{ $laboratory->gpt }}</td>
                        <th>GGT:</th>
                        <td>{{ $laboratory->ggt }}</td>
                    </tr>
                    <tr>
                        <th>Creatinine:</th>
                        <td>{{ $laboratory->creatinine }}</td>
                        <th>Urea:</th>
                        <td>{{ $laboratory->urea }}</td>
                    </tr>
                    <tr>
                        <th>Potassium K:</th>
                        <td>{{ $laboratory->potasiumK }}</td>
                        <th>Uric Acid:</th>
                        <td>{{ $laboratory->uricAcid }}</td>
                    </tr>
                    <tr>
                        <th>Creatinine Kinase:</th>
                        <td>{{ $laboratory->creatinineKinase }}</td>
                        <th>Troponin T:</th>
                        <td>{{ $laboratory->troponinT }}</td>
                    </tr>
                    <tr>
                        <th>Urine Dipstick:</th>
                        <td>{{ $laboratory->urineDipstick }}</td>
                        <th>Urine Microscopy:</th>
                        <td>{{ $laboratory->urineMicroscopy }}</td>
                    </tr>
                    <tr>
                        <th>Stool Microscopy:</th>
                        <td>{{ $laboratory->stoolMicroscopy }}</td>
                        <th>Sputum Microscopy:</th>
                        <td>{{ $laboratory->sputumMicroscopy }}</td>
                    </tr>
                    <tr>
                        <th>Gamma GT:</th>
                        <td>{{ $laboratory->gammaGt }}</td>
                        <th>Cholesterol:</th>
                        <td>{{ $laboratory->cholesterol }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>{{ $laboratory->total }}</td>
                        <th>LDH:</th>
                        <td>{{ $laboratory->ldh }}</td>
                    </tr>
                    <tr>
                        <th>LDL:</th>
                        <td>{{ $laboratory->ldl }}</td>
                        <th>Triglyceride:</th>
                        <td>{{ $laboratory->triglyceride }}</td>
                    </tr>
                    <tr>
                        <th>TBilirubine:</th>
                        <td>{{ $laboratory->tBilirubine }}</td>
                        <th>DBilirubine:</th>
                        <td>{{ $laboratory->dBilirubine }}</td>
                    </tr>
                    <tr>
                        <th>IBilirubine:</th>
                        <td>{{ $laboratory->iBilirubine }}</td>
                        <th>Fasting Glucose:</th>
                        <td>{{ $laboratory->fastingGlucose }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="section-title">Medications</th>
                </tr>
                @foreach ($consultation->medications as $medication)
                    <tr>
                        <th>Drug Name:</th>
                        <td>{{ $medication->drugname }}</td>
                        <th>Prescription:</th>
                        <td>{{ $medication->prescription }}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td colspan="3">{{ $medication->stock }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }}. All rights reserved.</p>
    </div>
</body>

</html>
