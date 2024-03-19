<div class="card shadow-none border {{ empty($item) ? 'move-on-hover' : ''}} mb-4">
  <div class="card-header text-left pt-3 pb-3 px-4">
    <h5 class="mb-1">{{ ucfirst($item->title) }}</h5>
    <p class="mb-3 text-sm">{{ $item->description }}</p>

    <div class="row">
      <div class="col-6">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="switchCheck-{{$item->uuid}}" {{ $item->is_public ? 'checked' : '' }}>
          <label class="form-check-label" for="switchCheck-{{$item->uuid}}">Public</label>
        </div>
      </div>
      <div class="col-6">
        <p>Timetracks : {{ $item->timetracks->count() }}</p>
      </div>
    </div>

    <ul class="list-group list-group-flush mt-2">
      <li class="list-group-item"><small>Assigned to</small> <span class="font-weight-bold text-dark">{{ $item->user->name }}</span></li>
      <li class="list-group-item"><small>Priority</small> <span class="font-weight-bold text-dark">{{ $priorities[$item->priority] }}</span></li>
      <li class="list-group-item"><small>Division</small> <span class="font-weight-bold text-dark">{{ $item->unit->name }}</span></li>
    </ul>
    <div class="btn btn-sm w-100 bg-gradient-{{$labels[$item->status]}} mb-1">{{ $item->status }}</div>

    @empty($isDetail)
    <a href="{{ route('task-detail', $item->uuid) }}" class="text-primary icon-move-right float-end mt-2">See detail
      <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
    </a>
    @endempty
  </div>
  @if(count($item->subtasks) && empty($isDetail))
  <hr class="horizontal dark my-0">
  <div class="card-body">
    @foreach($item->subtasks as $sub)
    <div class="d-flex">
      <div>
        <i class="fas fa-{{ $sub->status == 'done' ? 'check' : ''}} text-success text-sm" aria-hidden="true"></i>
      </div>
      <div class="ps-3">
        <span class="text-sm">{{ $sub->title }} | status : {{ $sub->status }}</span>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>