<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#subjectFModel">
    <i class="fa fa-filter"></i> Filters
</button>

<div class="modal right fade" id="subjectFModel" tabindex="-1" role="dialog" aria-labelledby="subjectFModelL">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="subjectFModelL">Filters</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body text-start">
                    <form action="{{route('subjects')}}" method="get" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Filter by code / name</label>
                            <input type="text" name="searchKey" class="form-control form-control-sm" placeholder="Title" value="{{$searchKey}}">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-search w-100"><i class="fa fa-search"></i> Filter Records</button>
                            <a href="{{route('subjects')}}"><button type="button" class="btn btn-primary btn-search w-100 mt-1"><i class="fa fa-refresh"></i> Reset Filters</button></a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

