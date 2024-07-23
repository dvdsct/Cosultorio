<?php

namespace App\Http\Controllers;

use App\Models\Colposcopia;
use App\Models\Consulta;
use App\Models\ObraSocialXPaciente;
use App\Models\Pap;
use App\Models\Turno;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Str;

Carbon::setLocale('es');

class PdfController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            abort(404); // consulta no encontrada
        }

        $consulta->update(['estado' => '5']);

        $medico = $consulta->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;
        $items = $consulta->recetas->chunk(2);

        $paciente = $consulta->pacientes;
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*', 'obra_socials.descripcion')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('paciente_id', $paciente->id)
            ->get();

        $osd = $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });
        $edad = Carbon::parse($paciente->perfiles->personasfecha_de_nacimiento)->age;

        // $pdf = Pdf::loadView('Consultorio.pdf.receta', [

        return view('Consultorio.pdf.receta', [


            'items' => $items,
            'os' => $os,
            'osd' => $osd,
            'paciente' => $nombrePaciente,
            'fecha' => $consulta->turnos->fecha_turno,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'especialidad' => $especialidad,
            'titulo' => $titulo,
            'edad' => $edad

        ]);

        // return $pdf->stream('consulta_' . $consulta->id . '.pdf');
    }


    // ____________________________________________________________________________________________________
    // ____________________________________________________________________________________________________
    // ____________________________________________________________________________________________________
    // PDF para compartir turnos por wp

    public function showTurno(string $id)
    {
        $turno  = Turno::find($id);

        $consulta = Consulta::where('turno_id', $turno->id)->get();
        if ($consulta->isEmpty()) {
            $consulta = Pap::where('turno_id', $turno->id)->get();
        }

        // $consulta->update(['estado' => '5']);

        $motivo = "";
        if ($turno->motivo == 2) {
            $motivo = "Consulta";
        } elseif ($turno->motivo == 1) {
            $motivo = "Pap-Colposcopia";
        } else {
            $motivo = "Otro"; // Asegúrate de manejar otros casos
        }
        $consulta = $consulta->first();

        $medico = $consulta->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;

        $paciente = $consulta->pacientes;
        $fecha = Carbon::parse($consulta->turnos->fecha_turno)->translatedFormat('d \d\e F, Y');
        $hora = Carbon::parse($consulta->turnos->fecha_turno)->format('H:i');
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $pdf = Pdf::loadView('Consultorio.pdf.turno', [
            'nombrePaciente' => $nombrePaciente,
            'fecha' => $fecha,
            'hora' => $hora,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'motivo' => $motivo,
            'especialidad' => $especialidad,
            'titulo' => $titulo
        ]);

        return $pdf->stream('turno_' . $consulta->id . '.pdf');
    }


    public function pdfImagn(string $id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            abort(404); // consulta no encontrada
        }

        $consulta->update(['estado' => '5']);

        $medico = $consulta->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;
        $items = $consulta->imagenes->chunk(2);

        $paciente = $consulta->pacientes;
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*', 'obra_socials.descripcion')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('paciente_id', $paciente->id)
            ->get();

        $osd = $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });
        $edad = Carbon::parse($paciente->perfiles->personasfecha_de_nacimiento)->age;

        $pdf = Pdf::loadView('Consultorio.pdf.imagen', [

        // return view('Consultorio.pdf.imagen', [


            'items' => $items,
            'os' => $os,
            'osd' => $osd,
            'paciente' => $nombrePaciente,
            'fecha' => $consulta->turnos->fecha_turno,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'especialidad' => $especialidad,
            'titulo' => $titulo,
            'edad' => $edad

        ]);

        return $pdf->stream('consulta_' . $consulta->id . '.pdf');

    }
    public function pdfLab(string $id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta) {
            abort(404); // consulta no encontrada
        }

        $consulta->update(['estado' => '5']);

        $medico = $consulta->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;
        $items = $consulta->laboratorios->chunk(2);

        $paciente = $consulta->pacientes;
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*', 'obra_socials.descripcion')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('paciente_id', $paciente->id)
            ->get();

        $osd = $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });
        $edad = Carbon::parse($paciente->perfiles->personasfecha_de_nacimiento)->age;

        // $pdf = Pdf::loadView('Consultorio.pdf.receta', [

        return view('Consultorio.pdf.labs', [


            'items' => $items,
            'os' => $os,
            'osd' => $osd,
            'paciente' => $nombrePaciente,
            'fecha' => $consulta->turnos->fecha_turno,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'especialidad' => $especialidad,
            'titulo' => $titulo,
            'edad' => $edad

        ]);

        // return $pdf->stream('consulta_' . $consulta->id . '.pdf');


    }



    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function showPap(string $id)
    {
        $pap = Pap::where('turno_id', $id)->first();

        if (!$pap) {
            abort(404); // pap no encontrada
        }

        // $pap->update(['estado' => '5']);

        $medico = $pap->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;

        $paciente = $pap->pacientes;
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*', 'obra_socials.descripcion')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('paciente_id', $paciente->id)
            ->get();

        $osd = $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });



        $pdf = Pdf::loadView('Consultorio.pdf.pap', [
            'os' => $os,
            'osd' => $osd,
            'paciente' => $nombrePaciente,
            'fecha' => $pap->turnos->fecha_turno,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'especialidad' => $especialidad,
            'titulo' => $titulo,
            'pap' => $pap
        ]);

        return $pdf->stream('pap_' . $pap->id . '.pdf');
    }




    public function showColpo(string $id)
    {
        $colpo = Colposcopia::where('turno_id', $id)->first();

        if (!$colpo) {
            abort(404); // pap no encontrada
        }

        // $pap->update(['estado' => '5']);

        $medico = $colpo->medicos->first();
        $matricula = $medico->matricula;
        $titulo = $medico->titulo;
        $especialidad = Str::upper($medico->especialidad);
        $nombreMedico = $medico->perfiles->personas->nombre . ' ' . $medico->perfiles->personas->apellido;

        $paciente = $colpo->pacientes;
        $nombrePaciente = $paciente->perfiles->personas->nombre . ' ' . $paciente->perfiles->personas->apellido . ' ' . $paciente->perfiles->personas->dni;

        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*', 'obra_socials.descripcion')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('paciente_id', $paciente->id)
            ->get();

        $osd = $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });



        $pdf = Pdf::loadView('Consultorio.pdf.colpo', [
            'os' => $os,
            'osd' => $osd,
            'paciente' => $nombrePaciente,
            'fecha' => $colpo->turnos->fecha_turno,
            'medico' => $nombreMedico,
            'matricula' => $matricula,
            'especialidad' => $especialidad,
            'titulo' => $titulo,
            'colpo' => $colpo
        ]);

        return $pdf->stream('pap_' . $colpo->id . '.pdf');
    }
}
