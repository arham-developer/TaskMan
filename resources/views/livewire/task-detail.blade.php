<div class="main-content">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">

            <button type="button" class="btn btn-md bg-gradient-dark" data-bs-toggle="modal" data-bs-target="#formModal">
              Create Sub Task
            </button>

            <button wire:click="trydelete" type="button" class="btn btn-sm float-end">
              Delete this
            </button>

            <div class="row">
                <div class="col-6">
                    @livewire('task-item', ['item' => $currentModel, 'isDetail' => true])
                </div>
                <div class="col-6">
                    @livewire('task-item-tracks', ['item' => $currentModel])
                </div>
            </div>
            <div class="row">
              @foreach($data as $item)
              <div class="col-4">
                @livewire('task-item', ['item' => $item])
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>

    @include('components.modals', ['formComponent' => 'task-form', 'modalSize' => '', 'delete' => true, 'currentModelId' => $currentModel->uuid])

  </div>
</div>