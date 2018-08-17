<div class="box mt-5">
	<div class="heading">
		<h3 class="text-uppercase">Change password</h3>
	</div>
	<form method="post" action="{{ url('admin/change-password') }}">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="password_old">Old password</label>
					<input id="password_old" name="old_password" type="password" 
					class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}">
					@if($errors->has('old_password'))
					<div class="invalid-feedback">
						{{ $errors->first('old_password') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="password_1">New password</label>
					<input id="password_1" name="new_password" type="password" 
					class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}">
					@if($errors->has('new_password'))
					<div class="invalid-feedback">
						{{ $errors->first('new_password') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="password_2">Retype new password</label>
					<input id="password_2" name="new_password_confirmation" type="password" class="form-control">
				</div>
			</div>
		</div>
		<div class="text-left">
			<button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Save new password</button>
		</div>
	</form>
</div>