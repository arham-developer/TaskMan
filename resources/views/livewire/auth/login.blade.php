<section>
	<div class="page-header section-height-75">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
					<div class="card card-plain mt-8">
						<div class="card-header pb-0 text-left bg-transparent">
							<h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
						</div>
						<div class="card-body">
							<form wire:submit.prevent="login" action="#" method="POST" role="form text-left">
								<div class="mb-3">
									<label for="email">Email</label>
									<div class="@error('email')border border-danger rounded-3 @enderror">
										<input wire:model="email" id="email" type="email" class="form-control"
											placeholder="Email" aria-label="Email" aria-describedby="email-addon">
									</div>
									@error('email') <div class="text-danger">{{ $message }}</div> @enderror
								</div>
								<div class="mb-3">
									<label for="password">Password</label>
									<div class="@error('password')border border-danger rounded-3 @enderror">
										<input wire:model="password" id="password" type="password" class="form-control"
											placeholder="Password" aria-label="Password"
											aria-describedby="password-addon">
									</div>
									@error('password') <div class="text-danger">{{ $message }}</div> @enderror
								</div>
								<div class="form-check form-switch">
									<input wire:model="remember_me" class="form-check-input" type="checkbox" id="rememberMe">
									<label class="form-check-label" for="rememberMe">Remember me</label>
								</div>
								<div class="text-center">
									<button type="submit" class="btn bg-gradient-info w-100 mt-4">Sign in</button>
									<button class="btn btn-sm bg-gradient-secondary w-50 mt-2 mb-0" wire:click="loginAsGuest">Login as guest</button>
								</div>
							</form>
						</div>
						<div class="card-footer text-center pt-0 px-lg-2 px-1 h-80">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
						<div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
							style="background-image:url('../assets/img/curved-images/curved-8.jpg')"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
