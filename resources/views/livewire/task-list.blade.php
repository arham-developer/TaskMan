<div class="main-content">
  <div class="container-fluid py-4">
    
    @include('components.pagination-search')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">

            <button type="button" class="btn btn-md bg-gradient-dark" data-bs-toggle="modal" data-bs-target="#formModal">
              Create Task
            </button>

            <div class="row">
              @foreach($data as $item)
              <div class="col-md-4">
                @livewire('task-item', ['item' => $item])
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>

    @include('components.modals', ['formComponent' => 'task-form', 'modalSize' => '', 'delete' => true])

  </div>
</div>