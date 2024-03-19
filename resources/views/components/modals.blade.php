<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog {!! $modalSize !!} modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
			@livewire($formComponent, ['currentModelId' => $currentModelId ?? null])
			</div>
		</div>
	</div>
</div>

@if($delete)
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete ?</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
				<button type="button" wire:click="destroy()" class="btn bg-gradient-primary btn-sm">Delete</button>
			</div>
		</div>
	</div>
</div>
@endif