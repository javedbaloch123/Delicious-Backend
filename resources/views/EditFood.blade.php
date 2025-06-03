@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card">

                <div class="card-body p-4">
                    <h5 class="mb-4">Add Food</h5>
                    <form id="foodForm" name="foodForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $food->name }}" id="name"
                                    name="name" placeholder="Enter Food Name">
                                <p></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input39" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="category" name="category">
                                    <option selected value="">select category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ ($food->category_id == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach

                                </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $food->price }}" id="price"
                                    name="price" placeholder="Enter price">
                                <p></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input40" class="col-sm-3 col-form-label">Describtion</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Description">{{ $food->desc }}</textarea>
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
                        <img src="/food_images/{{ $food->image }}" alt="" width="100px" height="100px">
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
        $('#foodForm').submit((e)=>{
            e.preventDefault();
            let formData = new FormData($('#foodForm')[0]);
            formData.append('id',{{ $food->id }});
            $.ajax({
                url:'{{ route("update.form") }}',
                type:'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success:function(response){
                    console.log(response);
                    let errors = response.error;
                    if(response.status === false){
                        let keys = ['name','category','desc','image'];
                        keys.forEach(element => {
                            $(`#${element}`).removeClass('is-invalid');
                            $(`#${element}`).next('p').text('');
                        });

                        for(let key in errors){
                          $(`#${key}`).addClass('is-invalid');
                          $(`#${key}`).next('p').text(errors[key][0]).css('color','red');
                        }

                         
                    }else{
                        window.location.href = "{{ route('food') }}";
                    }
                }
            })
        })
    </script>
@endsection
