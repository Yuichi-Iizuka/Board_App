@extends('layouts.app')

@section('content')
<div class="container mt-4">
  @foreach($items as $item)
  <div class="card mb-4">
    <div class="card-header">
      {{$item->title}}
    </div>
    <div class="card-body">
      <p class="card-text">
        {{$item->body}}
      </p>
    </div>
    <div class="card-footer">

      投稿者:{{optional($item->user)->name}}
      <!-- <div class="border p-4"> -->
      <div class="card-body pt-0 pb-2 pl-3">
      @if($item->likes()->where('user_id',Auth::id())->exists())
        {!! Form::open(['route' => ['topic.unlike',$item->id],'method'=>'delete']) !!}
        {!! Form::button('<i class="fas fa-heart heart_red"></i>',['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}
      @else
      {!! Form::open(['route' => ['topic.like',$item->id],'method'=>'put']) !!}
        {!! Form::button('<i class="fas fa-heart"></i>',['class' => "btn", 'type' => 'submit']) !!}
        {!! Form::close() !!}

      @endif
      
      <p>{{ $item->likes()->count() }}</p>
      </div>
      @if ($item->user_id === Auth::id())
      <div class="mb-4 text-right">
        <a class="btn btn-primary" href="{{ route('topic.edit',$item->id)}}">
          編集する
        </a>
        <form class="d-inline-block" method="post" action="{{ route('topic.destroy',$item->id)}}">
          @csrf
          @method('delete')
          <button class="btn btn-danger">削除する</button>
        </form>
      </div>
      @endif
    </div>
  </div>
  @endforeach
</div>
@endsection