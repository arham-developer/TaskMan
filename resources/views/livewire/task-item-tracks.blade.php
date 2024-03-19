<div class="card shadow-none mb-4">
  <div class="card-header pb-0">
    <div class="row">
      <div class="col-6">
        <h5>Time Tracks</h5>
      </div>
      <div class="col-6">
        <button wire:click="doTrack" class="btn btn-sm btn-outline-{{$isAnyTrackStarted ? 'danger' : 'info'}} float-end">{{ $isAnyTrackStarted ? 'Stop' : 'Start' }} tracking</button>
      </div>
    </div>
  </div>
  <div class="card-body text-left pt-3 pb-3 px-4" style="max-height: 240px; overflow-y: scroll;">

    @foreach($data as $track)
    <div class="d-flex pb-3">
      <div>
        <i class="fas fa-clock {{ $track->end ? '' : 'text-success' }} text-sm" aria-hidden="true"></i>
      </div>
      <div class="text-sm ps-3">
        <span class="font-weight-bold">{{ ucfirst($track->user->name) }}</span> : 
        {{ date('d-m-Y H:i a', strtotime($track->start)) }} {{ $track->end ? ' to '. date('d-m-Y H:i a', strtotime($track->end)) : '' }}
      </div>
    </div>
    @endforeach

  </div>
</div>