<style>
/* Global Styles */
/* Form Section Styles */
form {
    margin-top: 20px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Form Input Styles */
form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="number"],
form input[type="date"],
form textarea,
form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensure padding and border are included in width */
}

/* Form Submit Button Styles */
form input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #555;
}

/* Error Message Styles */
.red {
    color: red;
    margin-top: 5px;
    font-size: 14px;
}

/* Footer Styles */


</style>

@include('navbar.header')
<h1> Add a new Job</h1>
<form method="POST" action="{{ route('add_job') }}">
	@csrf
	<div class="container">
		<label>Category</label>
		<select name="category">
			@foreach($categories as $category)
				<option value="{{ $category->id }} ">{{ $category->title }}</option>
			@endforeach
		</select>
		@error('category')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<div>
		<label>Job Title</label>
		<input type="text" name="title">
		@error('title')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<div>
		<label>Type</label>
		<input type="text" name="type">
		@error('type')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<div>
		<label>Salary</label>
		<input type="number" name="salary">
		@error('salary')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<div>
		<label>Deadline</label>
		<input type="date" name="deadline">
		@error('deadline')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<div>
		<label>Description</label>
		<textarea name="description"></textarea>
		@error('description')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
	<!-- <div>
		<label>Photo</label>
		<input type="file" name="photo">
		@error('photo')
			<div class="red">{{ $message }}</div>
		@enderror
	</div>
 -->
	
	<div>
		<input type="submit" name="submit">
	</div>
</form>

@include('navbar.footer')
	

