@extends('layout')

@section('main')
    <div class="page-wrapper">
        <div class="page-content">
            <a href="{{ route('add.category') }}"><button class="btn btn-primary">Add Category</button></a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example_length"><label>Show <select
                                                name="example_length" aria-controls="example"
                                                class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                class="form-control form-control-sm" placeholder=""
                                                aria-controls="example"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered dataTable"
                                        style="width: 100%;" role="grid" aria-describedby="example_info">
                                        <thead>
                                           <tr>
                                             <th>Name</th>
                                             <th>Created_at</th>
                                             <th>Updated_at</th>
                                             
                                           </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $cat)
                                                 <tr role="row" class="even">
                                                
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->created_at }}</td>
                                                <td>{{ $cat->updated_at }}</td>
                                                <td><a href="{{ route('edit.cat',$cat->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                                                <td><button class="btn btn-danger" onclick="Delete({{ $cat->id }})">Delete</button></td>
 
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                             <th>Name</th>
                                             <th>Created_at</th>
                                             <th>Updated_at</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                        Showing 1
                                        to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="example_previous">
                                                <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Prev</a>
                                            </li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="example" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="example" data-dt-idx="2" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="example" data-dt-idx="3" tabindex="0"
                                                    class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="example" data-dt-idx="4" tabindex="0"
                                                    class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="example" data-dt-idx="5" tabindex="0"
                                                    class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="example" data-dt-idx="6" tabindex="0"
                                                    class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="example_next"><a
                                                    href="#" aria-controls="example" data-dt-idx="7"
                                                    tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJs')
    <script>
        function Delete(id) {
            $.ajax({
                url: '{{ route("delete.cat",":id") }}'.replace(':id',id),
                dataType: 'json',
                success: function(response) {
                    let errors = response.error;
                    if (response.status === true) {
                        window.location.href = "{{ route('category') }}";
                    }
                }
            })
        }
    </script>
@endsection