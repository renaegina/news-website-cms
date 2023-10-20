@extends('layout.admin')

@section('content')

<body>
    <h1 class="text-center mb-4">Edit News Data</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            {{-- Untuk menginput data --}}
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <select class="form-select" name="category" aria-label="Default select esample">
                                    <option selected>{{$data->category}}</option>
                                    <option value="animals">Animals</option>
                                    <option value="business">Business</option>
                                    <option value="culinary">Culinary</option>
                                    <option value="entertainment">Entertainment</option>
                                    <option value="fashion">Fashion</option>
                                    <option value="health">Health</option>
                                    <option value="lifestyle">Lifestyle</option>
                                    <option value="politics">Politics</option>
                                    <option value="sports">Sports</option>
                                    <option value="technology">Technology</option>  
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Author</label>
                                <input type="text" name="author" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{$data->author}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

@endsection