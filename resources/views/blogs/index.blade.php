@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">ブログ一覧</h1>

    @if ($blogs->isEmpty())
        <p class="text-gray-600">まだ記事がありません。<a href="/blogs/create" class="text-blue-600 underline">最初の記事を作成</a>しましょう。</p>
    @else
        <ul class="divide-y divide-gray-200 bg-white rounded-lg shadow">
            @foreach ($blogs as $blog)
                <li class="p-4 sm:p-5">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <div>
                            <a href="/blogs/{{ $blog->id }}" class="text-lg font-semibold text-gray-900 hover:underline">
                                {{ $blog->title }}
                            </a>
                            <p class="text-xs text-gray-500 mt-1">
                                投稿日: {{ $blog->created_at?->format('Y-m-d H:i') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
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
                        </div>
                    </div>
                    <p class="mt-3 text-gray-700 line-clamp-2">{{ Str::limit($blog->content, 120) }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
