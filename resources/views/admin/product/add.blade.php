@extends('admin.master')

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            {{-- <div class="form-group">
                <label>SEO URL</label>
                <input type="text" class="form-control" placeholder="Enter name">
            </div> --}}
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0" selected>Chọn 1 danh mục</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Giá bán</label>
                <input type="text" class="form-control" name="price_sale" placeholder="Nhập Giá bán">
            </div>
            <div class="form-group">
                <label>Giá gốc</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập Giá gốc">
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
                <label>Hình ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image-show"></div>  
                <input type="hidden" class="form-control" name="thumb" id="thumb">
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