<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Details - {{ $consultation->employee->firstName }} {{ $consultation->employee->lastName }}
    </title>
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
            padding: 20px;
            background-color: #007bff;
            color: white;
            border-bottom: 2px solid #0056b3;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            max-width: 1000px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details {
            margin-bottom: 20px;
        }

        .details h2 {
            font-size: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .details th,
        .details td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word;
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
            font-size: 16px;
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f7f7f7;
            border-top: 1px solid #ddd;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 12px;
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
                    <th colspan="2" class="section-title">General Information</th>
                </tr>
                <tr>
                    <th>Consultation ID:</th>
                    <td>{{ $consultation->id }}</td>
                </tr>
                <tr>
                    <th>Patient Number:</th>
                    <td>{{ $consultation->employee->employeeNumber }}</td>
                </tr>
                <tr>
                    <th>Consultation Date:</th>
                    <td>{{ $consultation->created_at }}</td>
                </tr>
                <tr>
                    <th>Patient Name:</th>
                    <td>{{ $consultation->employee->firstName }} {{ $consultation->employee->lastName }}</td>
                </tr>
                <tr>
                    <th>National/Expat:</th>
                    <td>{{ $consultation->employee->employeeType }}</td>
                </tr>
                <tr>
                    <th>Staff ID:</th>
                    <td>{{ $consultation->employee->staffId }}</td>
                </tr>
                <tr>
                    <th>Company:</th>
                    <td>{{ $consultation->employee->company }}</td>
                </tr>
                <tr>
                    <th>Department:</th>
                    <td>{{ $consultation->employee->department->name }}</td>
                </tr>
                <tr>
                    <th>Seen by:</th>
                    <td>{{ $consultation->user->name }}</td>
                </tr>
                <tr>
                    <th>Injury Type:</th>
                    <td>{{ $consultation->injurie->name }}</td>
                </tr>
                <tr>
                    <th>Staff/Family:</th>
                    <td>{{ $consultation->staffType }}</td>
                </tr>
                <tr>
                    <th>Referral:</th>
                    <td>{{ $consultation->referral }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="section-title">Medical Information</th>
                </tr>
                <tr>
                    <th>Diagnosis:</th>
                    <td>{{ $consultation->diagnosis }}</td>
                </tr>
                <tr>
                    <th>History:</th>
                    <td>{{ $consultation->history }}</td>
                </tr>
                <tr>
                    <th>BP:</th>
                    <td>{{ $consultation->bp }}</td>
                </tr>
                <tr>
                    <th>Pulse:</th>
                    <td>{{ $consultation->pulse }}</td>
                </tr>
                <tr>
                    <th>Temperature:</th>
                    <td>{{ $consultation->temperature }}</td>
                </tr>
                <tr>
                    <th>Observation:</th>
                    <td>{{ $consultation->observation }}</td>
                </tr>
                <tr>
                    <th>Comments:</th>
                    <td>{{ $consultation->comments }}</td>
                </tr>
                <tr>
                    <th>Malaria:</th>
                    <td>{{ $consultation->malaria }}</td>
                </tr>
                <tr>
                    <th>Days Off:</th>
                    <td>{{ $consultation->daysOff }}</td>
                </tr>
                <tr>
                    <th>Diagnosis Specific:</th>
                    <td>{{ $consultation->diagnosispec }}</td>
                </tr>
                <tr>
                    <th>Diagnosis Mali:</th>
                    <td>{{ $consultation->diagnosiMali }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="section-title">Medications</th>
                </tr>
                @foreach ($consultation->medications as $medication)
                    <tr>
                        <th>Drug Name:</th>
                        <td>{{ $medication->drugname }}</td>
                    </tr>
                    <tr>
                        <th>Prescription:</th>
                        <td>{{ $medication->prescription }}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>{{ $medication->stock }}</td>
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
