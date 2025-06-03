@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card">

                <div class="card-body p-4">
                    <h5 class="mb-4">Edit Category</h5>
                    <form id="addForm" name="addForm">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $category->id }}">
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $category->name }}" id="name"
                                    name="name" placeholder="Enter Category Name">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="sybmit" class="btn btn-primary px-4">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJs')
    <script>
        $('#addForm').submit((e) => {
            e.preventDefault();
            $.ajax({
                url: '{{ route("update.cat") }}',
                type: 'post',
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === false) {
                        let error = response.error;
                        $("#name").addClass('is-invalid');
                        $("#name").next('p').text(error.name[0]).css('color', 'red');
                    } else {
                        window.location.href = '{{ route('category') }}'
                    }
                }
            })
        })
    </script>
@endsection
