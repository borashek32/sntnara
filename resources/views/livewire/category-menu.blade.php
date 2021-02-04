@foreach($categories as $category)
    <a href="{{ route('category', $category->id) }}"><p style="font-size: 16px; margin-left: 20px;">
            {{ $category->name }} ({{ $category->posts->count() }})
        </p></a>
@endforeach
