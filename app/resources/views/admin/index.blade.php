@extends('layouts.admin')
@section('title', '管理画面')

@section('content')
    <div class="user-flex">
    @foreach($items as $item)
        <div class="user-box">
            <p>ＩＤ：{{$item->id}}</p>
            <p>名前：{{$item->name}}</p>
            <form method="post" action={{"/admin/edit/$item->id"}}>
                <label for="school">学校：@if($item->school == null)未設定@else{{$school[$item->school-1]->name}}@endif</label>
                <select id="school" name="school">
                    @foreach($school as $schoolItem)
                        <option value="{{$schoolItem->id}}">{{$schoolItem->name}}</option>
                    @endforeach
                </select>
                <label for="role">権限：{{$item->role}}</label>
                <select id="role" name="role">
                    <option value="admin">admin</option>
                    <option value="general">general</option>
                </select>
                @csrf
                <div class="user-item">
                    <button type="submit" class="btn btn-primary">
                        {{ __('更新') }}
                    </button>
                </div>
            </form>
        </div>
    @endforeach
    </div>
    <div class="paging-system">
        {{$items->links()}}
    </div>
@endsection

