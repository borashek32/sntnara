<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Редактировать пост
    </h2>
</x-slot>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <select wire:model="post.category_id" class="form-select" aria-label="Default select example">
                            <option selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            @error('category_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            Документ или фото:
                        </label>
                        @if($img)
                            <img wire:model="img" src="{{ url('/storage/docs/' . $post->img) }}"
                                class="w-40" alt="{{ $post->title }}" />
                        @else
                            <img src="{{}}"
                        @endif
                        <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                             leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                               wire:model="img">
                        @error('img') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            Название:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               placeholder="Введите название" wire:model="post.title">
                        @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                            Текст:
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput3"
                                  wire:model="post.body" placeholder="Введите текст"></textarea>
                        @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full
                          rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium
                          text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                          focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Сохранить
                          </button>
                    </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button type="button" class="inline-flex justify-center w-full
                          rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700
                          shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue
                          transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                              <a href="{{ route('posts') }}">
                                  Выход
                              </a>
                          </button>
                    </span>
            </div>
        </form>
    </div>
</div>



