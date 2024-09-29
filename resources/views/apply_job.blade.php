@include('navbar.header')
<h1>Applying for{{ $job->title }}</h1>

<form method="post" action="{{ route('apply_job', ['id' => $job->id]) }}" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="job_id" value="{{ $job->id }}">
	<div>
		<label>Cover Letter:</label>
		<textarea name="cover_letter" required></textarea>
		@error('cover_letter')
			{{message}}
		@enderror	
	</div>

	<div>
		<label>CV: </label>
		<input type="file" name="attachment">
		@error('attachment')
			{{message}}
		@enderror	
	</div>
	<input type="submit" name="submit">
</form>
@include('navbar.footer')