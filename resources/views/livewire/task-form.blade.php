<form wire:submit.prevent="submit">
	<div class="row">
		<div class="col-md-12">

			@include('components.errors')

			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="false" wire:model="model.is_public">
			  <label class="form-check-label" for="flexSwitchCheckDefault">Public</label>
			</div>
			<div class="form-group">
				<label for="title">Title</label>
				<input class="form-control form-control-sm @error('model.title')is-invalid @enderror" type="text" wire:model="model.title" placeholder="title" required>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea wire:model="model.description" class="form-control form-control-sm @error('model.description')is-invalid @enderror" id="description" rows="2"></textarea>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label for="priority">Priority</label>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1" value="3" wire:model="model.priority">
						  <label class="custom-control-label" for="customRadio1">Low</label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2" value="2" wire:model="model.priority">
						  <label class="custom-control-label" for="customRadio2">Medium</label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio3" value="1" wire:model="model.priority">
						  <label class="custom-control-label" for="customRadio3">High</label>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="unit-id">Unit or Division</label>
						<select class="form-control form-control-sm" wire:model="model.unit_id" id="unit-id">
							<option value="">-- Select --</option>
							@foreach($units as $item)
								<option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="assignation">Assign to</label>
				<select class="form-control form-control-sm" wire:model="model.user_id" id="assignation">
					<option value="">-- Select --</option>
					@foreach($users as $item)
						<option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
					@endforeach
				</select>
			</div>


			<button type="submit" class="btn bg-gradient-primary btn-sm w-100">Submit</button>
		</div>
	</div>
</form>