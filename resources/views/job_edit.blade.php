@include('navbar.header')
<h1>Edit Job</h1>

<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $job->title) }}">
        </div><br>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $job->description) }}</textarea>
        </div><br>

        <div class="form-group">
            <label for="category_id">Category: </label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div><br>

        <div class="form-group">
            <label for="deadline">Deadline: </label>
            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $job->deadline->format('Y-m-d')) }}">
        </div><br>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@include('navbar.footer')