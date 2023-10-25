<div>
    <div class="modal fade" id="modal-laboratorio" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit="add_lab">PEDIDOS LABORATORIO

                        <label for="">Todas</label><input type="checkbox" wire:model='todas' wire:click='selectAll'>












                        <div class="form-check">
                            <label for="">Hemograma</label><input type="checkbox" checked='' wire:model='hemo'>
                            </div>


                        <label for="">Hb</label><input type="checkbox" wire:model='hb'>
                        <label for="">Hto</label><input type="checkbox" wire:model='hto'>
                        <label for="">Glucemia</label><input type="checkbox" wire:model='glucem'>
                        <label for="">PTOG</label><input type="checkbox" wire:model='ptog'>
                        <label for="">Hb Glicosilada</label><input type="checkbox" wire:model='hb_glico'>
                        <label for="">Grupo</label><input type="checkbox" wire:model='grupo'>
                        <label for="">Factor RH</label><input type="checkbox" wire:model='factor_rh'>
                        <label for="">Orina</label><input type="checkbox" wire:model='orina'>
                        <label for="">Urocultivo</label><input type="checkbox" wire:model='urocult'>
                        <label for="">Fibrinogeno</label><input type="checkbox" wire:model='fibrino'>
                        <label for="">Flujo Vaginal</label><input type="checkbox" wire:model='flujo_vag'>
                        <label for="">Coagulograma</label><input type="checkbox" wire:model='coagulogram'>
                        <label for="">TSH</label><input type="checkbox" wire:model='tsh'>
                        <label for="">FSH</label><input type="checkbox" wire:model='fsh'>
                        <label for="">LH</label><input type="checkbox" wire:model='lh'>
                        <label for="">DHEA</label><input type="checkbox" wire:model='dhea'>
                        <label for="">Testost Libre</label><input type="checkbox" wire:model='testost_l'>
                        <label for="">Testost Biod</label><input type="checkbox" wire:model='testost_b'>
                        <label for="">H. Antimulleriana</label><input type="checkbox" wire:model='h_antimull'>
                        <label for="">Glucosuria</label><input type="checkbox" wire:model='glucosuria'>
                        <label for="">Ferritina</label><input type="checkbox" wire:model='ferritina'>
                        <label for="">Transferrina</label><input type="checkbox" wire:model='transferri'>
                        <label for="">Anti TTG</label><input type="checkbox" wire:model='anti_ttg'>
                        <label for="">Gliadina</label><input type="checkbox" wire:model='gliadina'>
                        <label for="">Chagas</label><input type="checkbox" wire:model='chagas'>
                        <label for="">Toxoplasm</label><input type="checkbox" wire:model='toxo'>
                        <label for="">VDRL Cual</label><input type="checkbox" wire:model='vdrl_cual'>
                        <label for="">HBsAg</label><input type="checkbox" wire:model='hbs_ag'>
                        <label for="">HIV</label><input type="checkbox" wire:model='hiv'>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>

        </div>

    </div>
</div>
