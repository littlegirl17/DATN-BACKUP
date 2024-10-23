@extends('admin.layout.layout')
@section('title', 'Admin | Sửa bài viết')
@section('content')

<div class="container-fluid">
    <h3 class="title-page">
        Chỉnh sửa bài viết
    </h3>
    <form action="{{ route('articleEdit', $Article->id) }}" method="post" class="formAdmin" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="buttonProductForm">
            <div class=""></div>
            <div class="">
                <button type="submit" class="btnFormAdd">
                    <p class="text m-0 p-0">Lưu</p>
                </button>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $Article->title) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="category" class="form-label">Danh Mục</label>
            <select name="categoryArticle_id" class="form-select mt-3" required>
                @foreach ($categoryArticle as $category)
                    <option value="{{ $category->id }}" {{ $Article->categoryArticle_id == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="description_short" class="form-label">Mô tả ngắn</label>
            <textarea class="form-control ckeditor" name="description_short" id="description_short" cols="30" rows="5" required>{{ old('description_short', $Article->description_short) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control ckeditor" name="description" id="description" cols="30" rows="10" required>{{ old('description', $Article->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="image" class="form-label">Ảnh bài viết</label>
            <div class="custom-file">
                <input type="file" name="image" id="image" class="form-control">
                @if($Article->image)
                    <img src="{{ asset('img/' . $Article->image) }}" alt="Hình ảnh hiện tại" style="max-width: 100px; max-height: 100px; margin-top: 10px;">
                @endif
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-select" aria-label="Trạng thái" name="status" required>
                <option value="1" {{ old('status', $Article->status) == 1 ? 'selected' : '' }}>Bật</option>
                <option value="0" {{ old('status', $Article->status) == 0 ? 'selected' : '' }}>Tắt</option>
            </select>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('description_short');
CKEDITOR.replace('description');

    </script>
@endsection
