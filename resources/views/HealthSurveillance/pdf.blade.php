<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Surveillance Details</title>
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
        <h1>Health Surveillance Details</h1>
    </div>
    <div class="content">
        <div class="details">
            <h2>Employee Information</h2>
            <table>
                <tr>
                    <th colspan="4" class="section-title">General Information</th>
                </tr>
                <tr>
                    <th>Employee Name:</th>
                    <td>{{ $healthSurveillance->employee->firstName }} {{ $healthSurveillance->employee->lastName }}
                    </td>
                    <th>Employee ID:</th>
                    <td>{{ $healthSurveillance->employee->staffId }}</td>
                </tr>
                <tr>
                    <th>Surveillance Type:</th>
                    <td>{{ $healthSurveillance->surveillanceType }}</td>
                    <th>Hazards:</th>
                    <td>{{ $healthSurveillance->hazards }}</td>
                </tr>
                <tr>
                    <th>ECG:</th>
                    <td>{{ $healthSurveillance->ecg }}</td>
                    <th>Spirometry:</th>
                    <td>{{ $healthSurveillance->spirometry }}</td>
                </tr>
                <tr>
                    <th>Audiometry:</th>
                    <td>{{ $healthSurveillance->audiometry }}</td>
                    <th>Follow Up Date:</th>
                    <td>{{ $healthSurveillance->followUp }}</td>
                </tr>
                <tr>
                    <th>General:</th>
                    <td>{{ $healthSurveillance->general }}</td>
                </tr>
                <tr>
                    <th colspan="4" class="section-title">Laboratory Data</th>
                </tr>
                @php
                    $labData = $healthSurveillance->laboratory->toArray();
                    $keys = array_keys($labData);
                    $half = ceil(count($keys) / 2);
                @endphp
                <tr>
                    <th>Hemoglobin:</th>
                    <td>{{ $labData['hemoglobin'] ?? '' }}</td>
                    <th>Malaria Thick:</th>
                    <td>{{ $labData['malariaThick'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Malaria Thin:</th>
                    <td>{{ $labData['malariaThin'] ?? '' }}</td>
                    <th>Malaria Quicktest:</th>
                    <td>{{ $labData['malariaQuicktest'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Blood Glucose:</th>
                    <td>{{ $labData['bloodGlucose'] ?? '' }}</td>
                    <th>GOT:</th>
                    <td>{{ $labData['got'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>GPT:</th>
                    <td>{{ $labData['gpt'] ?? '' }}</td>
                    <th>GGT:</th>
                    <td>{{ $labData['ggt'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Creatinine:</th>
                    <td>{{ $labData['creatinine'] ?? '' }}</td>
                    <th>Urea:</th>
                    <td>{{ $labData['urea'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Potassium K:</th>
                    <td>{{ $labData['potasiumK'] ?? '' }}</td>
                    <th>Uric Acid:</th>
                    <td>{{ $labData['uricAcid'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Creatinine Kinase:</th>
                    <td>{{ $labData['creatinineKinase'] ?? '' }}</td>
                    <th>Troponin T:</th>
                    <td>{{ $labData['troponinT'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Urine Dipstick:</th>
                    <td>{{ $labData['urineDipstick'] ?? '' }}</td>
                    <th>Urine Microscopy:</th>
                    <td>{{ $labData['urineMicroscopy'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Stool Microscopy:</th>
                    <td>{{ $labData['stoolMicroscopy'] ?? '' }}</td>
                    <th>Sputum Microscopy:</th>
                    <td>{{ $labData['sputumMicroscopy'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Gamma GT:</th>
                    <td>{{ $labData['gammaGt'] ?? '' }}</td>
                    <th>Cholesterol:</th>
                    <td>{{ $labData['cholesterol'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>{{ $labData['total'] ?? '' }}</td>
                    <th>LDH:</th>
                    <td>{{ $labData['ldh'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>LDL:</th>
                    <td>{{ $labData['ldl'] ?? '' }}</td>
                    <th>Triglyceride:</th>
                    <td>{{ $labData['triglyceride'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>T Bilirubine:</th>
                    <td>{{ $labData['tBilirubine'] ?? '' }}</td>
                    <th>D Bilirubine:</th>
                    <td>{{ $labData['dBilirubine'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>I Bilirubine:</th>
                    <td>{{ $labData['iBilirubine'] ?? '' }}</td>
                    <th>Fasting Glucose:</th>
                    <td>{{ $labData['fastingGlucose'] ?? '' }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }}. All rights reserved.</p>
    </div>
</body>

</html>
