@extends('layouts.hru')
@section('hru-layout')
<h4 class="text-sm text-uppercase">Create new course</h4>
@include('alert.alert')
<div class="container p-1">
	<div class="card">
		<div class="p-3">
			<form action="{{route('course-method', 'post')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-floating mb-3">		
					<input type="text" name="name" class="form-control" required>
					<label>Course Name</label>
					<div class="invalid-feedback">
			      Enter Course Name
			    </div>
					<div class="valid-feedback">
			      Looks good!
			    </div>
				</div>
				<div class="form-floating mb-3">		
					<input type="file" name="cover_photo" class="form-control" required>
					<label>Cover Photo</label>
					<div class="invalid-feedback">
			      Upload Cover Photo
			    </div>
					<div class="valid-feedback">
			      Looks good!
			    </div>
				</div>
				<div class="form-floating mb-3">		
					<select class="form-control" name="level" required>
						<option value="up-skill">Up-skill Graduate Level</option>
						<option value="artisan">Artisan Graduate Level</option>
						<option value="up-skill">Craft-certificate Graduate Level</option>
						<option value="diploma">Diploma Graduate Level</option>
					</select>
					<label>Select Education Level</label>
					<div class="invalid-feedback">
			      Select Education Level
			    </div>
					<div class="valid-feedback">
			      Looks good!
			    </div>
				</div>
				<div>
					<button type="submit" class="btn btn-info"><span class="fas fa-check"></span> Save Changes</button>
				</div>
			</form>		
		</div>
	</div>
</div>
@endsection