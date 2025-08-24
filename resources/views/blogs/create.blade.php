@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">新規作成</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-md bg-red-50 p-4 text-red-800">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/blogs" method="POST" class="bg-white rounded-lg shadow p-5 space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="記事タイトルを入力">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">本文</label>
            <textarea name="content" rows="10"
                      class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                      placeholder="本文を入力">{{ old('content') }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">保存</button>
            <a href="/blogs" class="text-gray-600 hover:underline">キャンセル</a>
        </div>
    </form>
@endsection
