@extends('layout.admin')

@section('content')
<body>
    <br>
    <h1 class="text-center mb-4 mt-5">Add News Data</h1>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdata" method="POST" enctype="multipart/form-data">
                            {{-- Untuk menginput data --}}
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <select class="form-select" name="category" aria-label="Default select esample">
                                    <option selected>Choose Category</option>
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
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Input Image</label>
                                <input type="file" name="images" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
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