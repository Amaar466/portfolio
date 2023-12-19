<!-- resources/views/basic_project/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <title>Create Basic Project</title>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


        <h2>Create Basic Project</h2>
        {{ $errors }}
        <form action="{{ route('basic_project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="shortDescription" class="form-label">Short Description</label>
                    <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pictures" class="form-label">Pictures</label>
                    <input type="file" class="form-control" id="pictures" name="pictures">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="featured" class="form-label">Featured</label>
                    <input type="file" name="images[]" multiple>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="youtube_link" class="form-label">YouTube Link</label>
                    <input type="text" class="form-control" id="youtube_link" name="youtube_link">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

</body>
</html>
