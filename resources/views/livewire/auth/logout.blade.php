<div>
    <i class="fa fa-user me-sm-1 text-dark"></i>
    <span class="d-sm-inline d-none text-dark">{{ ucfirst(auth()->user()->name) }}</span>
    <span class="btn btn-sm btn-outline-dark d-sm-inline d-none text-dark ms-3 p-2" wire:click="logout">Sign Out</span>
</div>
