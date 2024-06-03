<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turno - {{ $nombrePaciente }} dddd</title>
</head>

<body>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            padding: 20px;
            text-align: center;
            color: #333;
        }

        .card h2 {
            margin-top: 0;
            color: #0056b3;
            margin-bottom: 0;
        }

        .card h3 {
            margin: 0px;
            color: #666;
            font-weight: normal;
        }

        .card-content {
            border-top: 2px solid #0056b3;
            padding-top: 10px;
            margin-top: 10px;
        }

        .patient-info p {
            margin: 10px 0;
            color: #555;
            font-size: 16px;
        }

        .patient-info strong {
            color: #000;
        }

        .note {
            margin-top: 20px;
            padding: 10px;
            background-color: #e3f2fd;
            border-left: 4px solid #0056b3;
            border-radius: 8px;
        }

        .note p {
            margin: 0;
            color: #0056b3;
            font-style: italic;
            font-size: 14px;
        }
    </style>

    <div class="card">
        <h2>Turno de Ginecología</h2>
        <h3 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' . $medico }}</h3>
        <div class="card-content">
            <div class="patient-info">
                <p><strong>Paciente:</strong> {{ $nombrePaciente }}</p>
                <p><strong>Motivo:</strong> {{ $motivo }} </p>
                <p><strong>Fecha del Turno:</strong> {{ $fecha }}</p>
                <p><strong>Horario:</strong> {{ $hora }} Hs.</p>
                <p><strong>Lugar:</strong> Moreno (S) 266</p>
            </div>
            <div class="note">
                <p><em>Por favor presentarse 15 min antes del horario de su turno con el carnet de su obra social.</em></p>
            </div>
        </div>
    </div>
</body>

</html>
