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
        @if ($item->user_id === Auth::id())
        <div class="mb-4 text-right">
          <a class="btn btn-primary" href="{{ route('topic.edit',$item->id)}}">
            編集する
          </a>
          <form style="display: inline-block;" method="post" action="{{ route('topic.destroy',$item->id)}}">
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