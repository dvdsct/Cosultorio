<?php

namespace App\Livewire;

use App\Models\Abono;
use App\Models\AbonoXTurno;
use App\Models\Consulta;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ObraSocial;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Perfil;
use App\Models\ObraSocialXPerfil;
use App\Models\Pap;
use App\Models\Colposcopia;
use App\Models\Turno;
use App\Events\NewMeet;
use App\Models\ConsultasXMedico;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\ObraSocialXPaciente;
use App\Models\PacienteXMedico;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;



class Agenda extends Component
{
    public $turnos;
    public $turno;
    public $fecha;
    public $perfil;
    public $dni;
    public $nombre;
    public $oss = [];
    public $modal = false;
    public $modalclass = '';


    public $os = '1';
    public $abono;
    public $apellido;
    public $persona;
    public $personas;
    public $horario;
    public $motivo = '1';
    public $onOff;
    public $onOffedit;
    public $t;
    public $medicos;
    public $medico;
    public $medicoC;
    public $paciente;


    public function redirectFormColp($turnoId)
    {
        return redirect()->route('form-colp', ['turno_id' => $turnoId]);
    }

    public function mount()
    {
        $this->oss = ObraSocial::all();
        $this->medicos = Medico::all();

        $this->fecha = Carbon::now()->format('Y-m-d');
    }


    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->resetValidation(); // Limpiar errores de validación
        $this->modal = false;
        $this->onOff = '';
        $this->onOffedit = '';

        $this->reset('dni', 'nombre', 'apellido', 'abono', 'horario');
    }


    //
    public function change_day($day)
    {
        if ($day == 'yes') {
            $this->fecha = Carbon::parse($this->fecha)->subDay()->format('Y-m-d');
        }
        if ($day == 'tmw') {
            $this->fecha = Carbon::parse($this->fecha)->addDay()->format('Y-m-d');
        }
    }


    public function eliminar($turno)
    {
        $this->t = Turno::find($turno);
        $this->dispatch('eliminar?');
    }
    public function eliminarElemento()
    {
        // $t = Turno::find($turno);
        $this->dispatch('mostrar');

        $this->t->delete();
    }


    public function editTurn($turno)
    {
        $this->personas = ['1'];
        $this->turno = Turno::find($turno);
        $this->paciente =  $this->turno->paciente_id;
        $this->motivo = $this->turno->motivo;
        $this->horario =  \Carbon\Carbon::parse($this->turno->fecha_turno)->format('H:i');
        $this->nombre = $this->turno->pacientes->perfiles->personas->nombre;
        $this->dni = $this->turno->pacientes->perfiles->personas->dni;
        $this->abono = $this->turno->abonos->first()->monto;
        $this->apellido = $this->turno->pacientes->perfiles->personas->apellido;
        $this->oss =  ObraSocial::all();
        $this->medicoC = ConsultasXMedico::where('consulta_id',$this->turno->consultas->id)->get();
        $this->medico = $this->medicoC->first()->id;

        $this->onOff = 'disabled';
        $this->onOffedit = 'disabled';

        $this->openModal();
    }



    public function addTurno()
    {
        $rules = [
            'fecha' => 'required|min:3',
            'horario' => 'required|min:3',
            'dni' => 'required_if:persona,null|min:3',
            'nombre' => 'required_if:persona,null|min:3',
            'apellido' => 'required_if:persona,null|min:3',
        ];

        $messages = [
            'nombre.required_if' => 'El nombre es obligatorio.',
            'apellido.required_if' => 'El apellido es obligatorio.',
            'horario.required' => 'El horario es obligatorio.',
            'dni.required_if' => 'El DNI es obligatorio.',
        ];

        $this->validate($rules, $messages);

        // Verificar si ya existe un turno en el mismo horario
        /*     if (Turno::where('fecha_turno', $this->fecha . ' ' . $this->horario)->exists()) {
        $this->addError('horario', 'Ya existe un turno registrado en este horario.');
        return;
    }
 */



        // EDIT
        if ($this->turno !== null) {
            $this->turno->update([
                'motivo' => $this->motivo,
                'fecha_turno' => $this->fecha . ' ' . $this->horario,
            ]);

            $this->medicoC->first()->update([
                'medico_id' => $this->medico
            ]);

            // Actualizar obra social en el perfil
            // $this->paciente = Paciente::find($this->paciente);

            $osxp = ObraSocialXPaciente::firstOrCreate([
                    'obra_social_id' => $this->os,
                    'paciente_id' => $this->paciente,
                    'estado' => '1'

            ]);


            if ($this->motivo == '1') {
                Pap::create([
                    'perfil_id' => $this->perfil,
                    'turno_id' => $this->turno->id,
                ]);
            }

            if ($this->motivo == '3') {
                Consulta::create([
                    'perfil_id' => $this->perfil,
                    'turno_id' => $this->turno->id,
                ]);
            }

            $axc = AbonoXTurno::where('turno_id', $this->turno->id)->first();
            $abono = Abono::find($axc->abono_id);
            $abono->update([
                'monto' => $this->abono ?? 0,
            ]);

            // event(new NewMeet(''));

        } else {


            // Crea Turno

            if (Turno::where('fecha_turno', $this->fecha . ' ' . $this->horario)->first()) {
                $this->addError('horario', 'Ya existe un turno registrado en este horario.');
                return;
            } else {

                //  Verificacion de la existencia del paciente
                if (count($this->personas) >= 1) {

                    if ($this->paciente == null) {
                        // $this->perfil =  $this->persona->perfils->first()->id;
                        $this->paciente = $this->persona->perfiles->first()->pacientes->first();

                        //Crea Turno con paciente existente
                        $this->turno =  Turno::create([
                            'paciente_id' => $this->paciente->id,
                            'motivo' => $this->motivo,
                            'fecha_turno' =>  $this->fecha . ' ' . $this->horario,
                            'estado' => '1'
                        ]);
                    }
                } else {

                    // Crea Paciente (Persona-perfil-paciente)
                    $persona = new Persona;

                    $persona->nombre = $this->nombre;
                    $persona->apellido = $this->apellido;
                    $persona->dni = $this->dni;
                    $persona->tipo = 'fisica';
                    $persona->estado = '1';
                    $persona->save();

                    $this->persona = $persona;

                    $p = new Perfil;

                    $p->persona_id = $this->persona->id;
                    $p->descripcion = 'paciente';
                    $p->estado = '1';
                    $p->save();
                    $this->perfil = $p->id;




                    $this->paciente = Paciente::create([
                        'perfil_id' => $this->perfil,
                        'estado' => '1'
                    ]);

                    $osxp = ObraSocialXPaciente::where('estado', '1')
                        ->where('obra_social_id', $this->os)
                        ->get();


                    $osxp = ObraSocialXPaciente::firstOrCreate([
                        'paciente_id' => $this->paciente->id,
                        'obra_social_id' => $this->os,
                        'plan' => ''
                    ]);

                    PacienteXMedico::firstOrCreate([
                        'medico_id' => $this->medico,
                        'paciente_id' => $this->paciente->id,
                        'estado' => '1'
                    ]);
                }
                if ($this->turno !== null) {
                    $this->turno->update([
                        'paciente_id' => $this->paciente->id,
                        'motivo' => $this->motivo,
                        'fecha_turno' =>  $this->fecha . ' ' . $this->horario,
                        'estado' => '1'
                    ]);
                } else {
                    $this->turno =  Turno::create([
                        'paciente_id' => $this->paciente->id,
                        'motivo' => $this->motivo,
                        'fecha_turno' =>  $this->fecha . ' ' . $this->horario,
                        'estado' => '1'
                    ]);
                }


                if ($this->motivo == '1') {
                    Pap::create(
                        [
                            'paciente_id' => $this->paciente->id,
                            'turno_id' => $this->turno->id
                        ]
                    );
                    Colposcopia::create(
                        [
                            'paciente_id' => $this->paciente->id,
                            'turno_id' => $this->turno->id
                        ]
                    );
                }

                if ($this->motivo == '2') {
                    $c = Consulta::create(
                        [
                            'paciente_id' => $this->paciente->id,
                            'turno_id' => $this->turno->id
                        ]
                    );

                    ConsultasXMedico::create([
                        'medico_id' => $this->medico,
                        'consulta_id' => $c->id,
                        'estado' => '1'
                    ]);
                }


                $abono = new Abono;
                $abono->monto = $this->abono ?? 0; // Si no se ingresa monto, se establece como 0
                $abono->tipo = 'plus';
                $abono->estado = '1';
                $abono->save();

                $axc = new AbonoXTurno;
                $axc->turno_id = $this->turno->id;
                $axc->abono_id = $abono->id;
                $axc->save();
            }
        }

        $this->reset('turno');
        $this->closeModal();
        event(new NewMeet(''));
    }

    public function upPaciente()
    {
        if (strlen($this->dni) > 7) {


            $this->personas = Persona::where('dni', 'LIKE', $this->dni . '%')->get();

            $this->persona = $this->personas->first();

            if (count($this->personas) >= 1) {

                $this->nombre = $this->persona->nombre;
                $this->apellido = $this->persona->apellido;
                $this->oss = $this->persona->perfiles->first()->pacientes->first()->obrasociales;

                $this->onOff = 'disabled';
            } else {
                $this->nombre = '';
                $this->apellido = '';
                $this->oss =  ObraSocial::all();
                $this->onOff = '';
            }
        } else {
            $this->nombre = '';
            $this->apellido = '';
            $this->onOff = '';

            $this->oss =  ObraSocial::all();
        }
    }


    #[On('refresh-turn')]
    public function render()
    {
        $this->turnos = Turno::whereDate('turnos.fecha_turno', '=', $this->fecha)


            ->where('motivo', '!=', '40')




            ->get()
            ->sortBy(function ($turno) {
                return Carbon::parse($turno->fecha_turno)->format('H:i');
            });

        return view(
            'livewire.agenda',
            ['fecha' => $this->fecha]
        );
    }


    /* Mensajes de validacion para nombre, apellido y hora */
    public function messages()
    {
        return [
            'nombre.required_if' => 'Debe ingresar el nombre.',
            'apellido.required_if' => 'Debe ingresar el apellido.',
            'horario.required' => 'Debe ingresar el horario.',
            'dni.required_if' => "Debe ingresar el DNI."
        ];
    }
}
