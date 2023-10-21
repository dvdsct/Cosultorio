<div>
    <div class="modal fade" id="modal-imagen" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="addd_lab">PEDIDO IMAGENES

                    <label for="">Eco Ginecologica</label><input type="checkbox" wire:model='eco_gin'>
                    <label for="">Eco Obstetrica</label><input type="checkbox" wire:model='eco_obs'>
                    <label for="">Eco Abdominal</label><input type="checkbox" wire:model='eco_abd'>
                    <label for="">Eco Tiroidea</label><input type="checkbox" wire:model='eco_tiro'>
                    <label for="">RMN Pelviana</label><input type="checkbox" wire:model='rmn_pelv'>
                    <label for="">TAC Abdominal</label><input type="checkbox" wire:model='tac_abd'>
                    <label for="">TAC Pelviana</label><input type="checkbox" wire:model='tac_pel'>

                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>

    </div></div>
