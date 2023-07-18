<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Summernote Editor Image Upload Example - Techsolutionstuff</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
    <div class="alert alert-success">
        {{-- {{ dd($des)}} --}}
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Laravel 10 Summernote </h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label><strong>Title:</strong></label>
                            <input type="text" name="title" class="form-control" />
                            @error('title')
                                <div class="is-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control summernote"  name="description">
                            </textarea>
                            @error('description')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
         $('.summernote').summernote({
               height: 200,
          });
       });
    </script>
</body>
</html>
