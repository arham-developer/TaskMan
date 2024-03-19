<!-- Pagination and search -->
<div class="row">
	<div class="col-md-5 col-lg-6">
		{{ $data->onEachSide(0)->links() }}
	</div>
	<div class="col-md-4 col-lg-4">
		<div class="form-group">
			<input type="search" class="form-control" wire:model="search" placeholder="Search">
		</div>
	</div>
	<div class="col-sm-6 col-md-2 col-lg-2 clearfix">
		<div class="dropdown">
			<button class="btn bg-gradient-secondary dropdown-toggle" type="button" id="pageCountButton" data-bs-toggle="dropdown" aria-expanded="false">per {!! $pageCount !!}</button>
			<ul class="dropdown-menu" aria-labelledby="pageCountButton">
				<li><div class="dropdown-item @if($pageCount == 10)d-none @endif" wire:click="updatePageCount(10)">per 10</div></li>
				<li><div class="dropdown-item @if($pageCount == 15)d-none @endif" wire:click="updatePageCount(25)">per 15</div></li>
				<li><div class="dropdown-item @if($pageCount == 25)d-none @endif" wire:click="updatePageCount(25)">per 25</div></li>
				<li><div class="dropdown-item @if($pageCount == 50)d-none @endif" wire:click="updatePageCount(50)">per 50</div></li>
				<li><div class="dropdown-item @if($pageCount == 100)d-none @endif" wire:click="updatePageCount(100)">per 100</div></li>
			</ul>
		</div>
	</div>
</div>
<!-- End pagination and search -->