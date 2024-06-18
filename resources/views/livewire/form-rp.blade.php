<div class="col-12">
    <div class="col-5 px-2">
        <div class="card card-info" >
            <div class="card-header">
                <h3 class="card-title"> <span style="font-style: italic;"> R/p </span> </h3>
                <button type="button" class="close" wire:click="close({{ $rp->id }})" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <h4>{{ $rp->vademecums->droga }}</h4>
                <div class="form-group">
                    <label for="exampleInputBorder">{{ $rp->vademecums->nombre }}<code>
                            {{ $rp->vademecums->presentacion }}</code></label>
                </div>

                {{ $rp->estado }}

                @if ($rp->estado == '1')
                <div class="form-group">
                    <label for="exampleSelectRounded0">Diagnostico cie10</label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model='cie10'>
                        @foreach ($cie10s as $cc)
                        <option value="{{ $cc->id }}"> {{ $cc->descripcion }}</option>
                        @endforeach
                    </select>
                    <div class="text-red" style="font-weight: bold;">
                        @error('cie10')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">Indicaciones </label>
                    <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="3 comprimidos c/ 8 hs" wire:model='indicacion' wire:keydown.enter='recetar'>
                    <div class="text-red" style="font-weight: bold;">
                        @error('indicacion')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label for="exampleSelectRounded0">Diagnostico cie10</label>
                    <select class="custom-select rounded-0" disabled id="exampleSelectRounded0" wire:model='cie10'>
                        @foreach ($cie10s as $cc)
                        <option value="{{ $cc->id }}"> {{ $cc->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputRounded0">Indicacion </label>
                    <input type="text" disabled class="form-control rounded-0" id="exampleInputRounded0" placeholder="3 comprimidos c/ 8 hs" wire:model='indicacion' wire:keydown.enter='recetar'>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
