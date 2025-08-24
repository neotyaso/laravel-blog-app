@extends('layouts.app')

@section('content')
    <article class="bg-white rounded-lg shadow p-6">
        <header class="mb-4">
            <h1 class="text-2xl font-bold">{{ $blog->title }}</h1>
            <p class="text-xs text-gray-500 mt-1">投稿日: {{ $blog->created_at?->format('Y-m-d H:i') }}</p>
        </header>

        <div class="prose max-w-none whitespace-pre-wrap">
            {{ $blog->content }}
        </div>

        <div class="mt-6 flex items-center gap-3">
            <a href="/blogs/{{ $blog->id }}/edit"
               class="inline-flex items-center rounded-md border px-3 py-1.5 text-sm hover:bg-gray-50">
                編集
            </a>
            <form action="/blogs/{{ $blog->id }}" method="POST"
                  onsubmit="return confirm('削除してよろしいですか？');">
                @csrf
                @method('DELETE')
                <button class="inline-flex items-center rounded-md bg-red-600 px-3 py-1.5 text-sm text-white hover:bg-red-700">
                    削除
                </button>
            </form>
            <a href="/blogs" class="ml-auto text-blue-600 hover:underline">一覧へ戻る</a>
        </div>
    </article>
@endsection
