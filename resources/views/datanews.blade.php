@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Administrator</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <a href="/addnews" class="btn btn-success mb-3">Tambah +</a>

        {{-- Form Controll --}}
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
                <form action="/news" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline">
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            {{-- ... --}}
            <!-- Tambahkan kelas text-center pada bagian yang perlu ditengahkan -->

        <div class="row">
            {{-- Display a success above the table --}}
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
            @endif --}}

            <table class="table ">
                <thead class="custom-color">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Images</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- Membuat nomor agar berurut --}}
                    @php
                    $no = 1;
                    @endphp

                    {{-- Menampilkan data --}}
                    @foreach ($data as $index => $row)
                    <tr>
                        {{-- Memanggil data --}}
                        <th scope="row">{{$index + $data->firstItem()}}</th>
                        <td>
                            <img src="{{asset('newsimages/'.$row->images)}}" alt="" style="width: 50px;">
                        </td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->author}}</td>
                        <td>{{$row->created_at->format('D M Y')}}</td>
                        <td>
                            <a href="/showdata/{{$row->id}}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}"
                                data-title="{{$row->title}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

{{-- Jquery CDN minified--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Link CDN Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- CDN Toastr JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

<!-- Sweetalert -->
<script>
    $('.delete').click(function() {
        var newsid = $(this).attr('data-id');
        var newstitle = $(this).attr('data-title');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success'
                , cancelButton: 'btn btn-danger'
            }
            , buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?'
            , text: 'You will delete news data with title ' + newstitle + ' '
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Yes, delete it!'
            , cancelButtonText: 'No, cancel!'
            , reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = '/deletedata/' + newsid + ' '
                swalWithBootstrapButtons.fire(
                    'Deleted!'
                    , 'Your file has been deleted.'
                    , 'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled'
                    , 'Your imaginary file is safe :)'
                    , 'error'
                )
            }
        });
    });
</script>

<script>
    // Display a success toast, with a title
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif
</script>

@endsection




