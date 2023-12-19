<!-- resources/views/basic_project/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="{{ asset('path-to-your-ckeditor/ckeditor.js') }}"></script>
    <title>Edit Basic Project</title>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Edit Basic Project</h2>
        {{ $errors }}
        <form action="{{ route('basic_project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $project->subtitle }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    {{-- <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea> --}}
                    <div id="editor"></div>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="shortDescription" class="form-label">Short Description</label>
                    <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3" required>{{ $project->shortDescription }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $project->category }}" required>
                </div>

                <div class="col-md-6 mb-3">
                <img src="{{asset('assets/uploads/basicProject/'.$project->pictures)}}" style="width: 100px;">

                    <label for="pictures" class="form-label">Pictures</label>
                    <input type="file" class="form-control" id="pictures" name="pictures">
                </div>
            </div>

            <div class="row">
                <!-- Add other form fields as needed -->
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>

</html>
