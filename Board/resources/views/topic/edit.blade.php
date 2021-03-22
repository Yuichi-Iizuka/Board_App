@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h5 mb-4">
      投稿の編集
    </h1>
    
    
    <form method="post" action="{{ route('topic.update', $item->id)}}">
      @csrf
      @method('put')
      <filedset class="form-group">
        <div class="form-group">
          <lavel for="title">
            タイトル
          </lavel>
          <input id="title" name="title" class="form-control @if($errors->has('title')) is-invalid @endif"value="{{$item->title}}" type="text">
          @if($errors->has('title'))
            <div class="invalid-feedback">
            {{$errors->first('title')}}
          </div>
          @endif
        </div>
        
        <div class="form-group">
          <label for="body">
            内容
          </label>
          <textarea id="body" name="body" class="form-control @if($errors->has('body')) is-invalid @endif" rows="4">
          {{$item->body}}
          </textarea>
          @if($errors->has('body'))
          <div class="invalid-feedback">
            {{$errors->first('body')}}
          </div>
          @endif
        </div>
        <div class="mt-5">
          <a class="btn btn-secondary" href="{{ route('topic.index') }}">
            キャンセル
          </a>

          <button type="submit" class="btn btn-primary">
            更新する
          </button>
        </div>
      </filedset>
    </form>
  
  </div>
</div>
@endsection