<div>
<button wire:click="setStep(1)"> patrá</button>
<button wire:click="setStep(2)"> palante</button>

    @if ($step == 1)
    @livewire('parametros',['consulta' => $consulta])

    @livewire('enfermedad-actual',['consulta' => $consulta])

    @livewire('consultas',['consulta' => $consulta])


    @endif
    @if ($step == 2)
    @livewire('pedidos',['consulta' => $consulta])
    @endif

  
</div>