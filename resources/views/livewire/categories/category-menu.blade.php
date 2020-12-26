@foreach($categories as $category)
    <a href="{{ route('category', $category->id) }}"><p style="font-size: 16px; margin-left: 20px;">{{ $category->name }}</p></a>
@endforeach
