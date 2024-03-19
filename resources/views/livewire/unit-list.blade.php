<div class="main-content">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <form wire:submit.prevent="submit">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input class="form-control form-control-sm @error('name')is-invalid @enderror" type="text" wire:model="name" placeholder="unit name">
                  </div>
                  <button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-footer">
          @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          @if (session()->has('message'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-like-2"></i></span>
              <span class="alert-text text-white text-sm">{{ session('message') }}</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  @foreach ($data as $idx => $item)
                  <tr>
                    <td>
                      <p class="text-xs text-secondary ps-2 mb-0">{{ $idx + 1 }}</p>
                    </td>
                    <td>
                      <div class="text-sm text-dark">{{ $item->name }}</div>
                    </td>
                    <td class="text-sm">{{ 0 }}</td>
                    <td>
                      <span wire:click="selectItem({{ $item->id }}, 'edit')"><i class="cursor-pointer fas fa-edit text-xs"></i></span>
                      <span wire:click="selectItem({{ $item->id }}, 'delete')"><i class="cursor-pointer fas fa-trash text-secondary text-xs ps-3"></i></span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>