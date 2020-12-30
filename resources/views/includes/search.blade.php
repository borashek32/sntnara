<input type="text" class="w-full shadow appearance-none border my-3 rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
       placeholder="Search posts:" name="search">
@error('search')<span class="text-red-500">{{ $message }}</span>@enderror

