@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content">
           
            <div class="card">
                 
                <div class="card-body p-4">
                     <h5 class="mb-4">Add Slot</h5>
                    <form id="slotForm" name="slotForm"> 
                        @csrf
                    <div class="row mb-3">
                        <label for="input35" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                            <p></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input35" class="col-sm-3 col-form-label">Initial Time</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="itime" name="itime">
                            <p></p>
                        </div>
                    </div>
                     <div class="row mb-3">
                        <label for="input35" class="col-sm-3 col-form-label">End Time</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="etime" name="etime">
                            <p></p>
                        </div>
                    </div>
                      <div class="row mb-3">
                        <label for="input35" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                <option value="" selected>select option</option>
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
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
        $('#slotForm').submit((e)=>{
            e.preventDefault();
            let formData = new FormData($('#slotForm')[0]);
            $.ajax({
                url:'{{ route("process.slot") }}',
                type:'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success:function(response){
                    console.log(response);
                    let errors = response.error;
                    if(response.status === false){
                        let keys = ['date','itime','etime','status'];
                        keys.forEach(element => {
                            $(`#${element}`).removeClass('is-invalid');
                            $(`#${element}`).next('p').text('');
                        });

                        for(let key in errors){
                          $(`#${key}`).addClass('is-invalid');
                          $(`#${key}`).next('p').text(errors[key][0]).css('color','red');
                        }

                         
                    }else{
                        window.location.href = "{{ route('slot') }}";
                    }
                }
            })
        })
    </script>
@endsection


