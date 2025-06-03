@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card">

                <div class="card-body p-4">
                    <h5 class="mb-4">Add Chef</h5>
                    <form id="chefForm" name="chefForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Food Name">
                                <p></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Profession</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="profession" name="profession"
                                    placeholder="profession">
                                <p></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input40" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image">
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
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
        $('#chefForm').submit((e) => {
            e.preventDefault();
            let formData = new FormData($('#chefForm')[0]);
            $.ajax({
                url: '{{ route('process.chef') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    let errors = response.error;
                    if (response.status === false) {
                        let keys = ['name','profession', 'image'];
                        keys.forEach(element => {
                            $(`#${element}`).removeClass('is-invalid');
                            $(`#${element}`).next('p').text('');
                        });

                        for (let key in errors) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`#${key}`).next('p').text(errors[key][0]).css('color', 'red');
                        }


                    } else {
                        window.location.href = "{{ route('chef') }}";
                    }
                }
            })
        })
    </script>
@endsection
