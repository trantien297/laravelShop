@extends('admin.index')

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            {{-- <div class="form-group">
                <label>SEO URL</label>
                <input type="text" class="form-control" placeholder="Enter name">
            </div> --}}
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name="parent_id">
                    <option value="1">Danh mục 1</option>
                    <option value="2">Danh mục 2</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="editor1"></textarea>
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="act1" name="active" value="1" checked="">
                    <label for="act1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="act0" name="active" value="0">
                    <label for="act0" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
@endsection

@section('jsonly')
    <script src="/ckeditor/ckeditor.js"></script> 
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection