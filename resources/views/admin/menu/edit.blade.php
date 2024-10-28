@extends('admin.master')

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $menu->name }}">
            </div>
            {{-- <div class="form-group">
                <label>SEO URL</label>
                <input type="text" class="form-control" placeholder="Enter name">
            </div> --}}
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Chọn 1 danh mục</option>
                    @foreach($menus as $menuParent)
                    <option value="{{ $menuParent->id }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }} {{ $menu->id == $menuParent->id ? 'disabled' : '' }}>{{ $menuParent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="description">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="editor1">{{ $menu->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="act1" name="active" value="1" {{ $menu->active == 1 ? 'checked' : '' }}>
                    <label for="act1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="act0" name="active" value="0" {{ $menu->active == 0 ? 'checked' : '' }}>
                    <label for="act0" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection

@section('jsonly')
    <script src="/ckeditor/ckeditor.js"></script> 
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection