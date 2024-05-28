
<div style="display: none" id="create-todo-form" class="card">
    <div class="card-header row">
        <div class="col-6">
            Create Todo
        </div>
        <div class="col-6 text-end">
            <button id="close-create-form-btn" class="btn btn-sm btn-outline-dark">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div><!-- /.card-header -->

    <div class="card-body">
        <div class="my-3 row">
            <div class="col-sm-2">
                <label for="title">Title</label>
            </div><!-- /.col-sm-2 -->
            <div class="col-sm-10">
                <input type="text" id="title" class="form-control">
            </div><!-- /.col-sm-10 -->
        </div><!-- /.my-3 --> 

        <div class="my-3 row">
            <div class="col-sm-2">
                <label for="description">Description</label>
            </div><!-- /.col-sm-2 -->
            <div class="col-sm-10">
                <textarea type="text" id="description" class="form-control"></textarea>
            </div><!-- /.col-sm-10 -->
        </div><!-- /.my-3 --> 

        <button id="store-todo" type="button" class="btn btn-primary float-end">Create Todo</button>
    </div><!-- /.card-body -->
</div><!-- /.card -->