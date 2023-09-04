<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <h1 class="py-3 text-center">
                    Edit product
                </h1>
                <br>
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @if(session()->has('success'))

                        <p style="padding: 10px; background-color: aquamarine">
                            {{session()->get('success')}}
                        </p>

                    @endif

                    <div>
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <br>

                    <div>
                        <x-input-label for="desc" :value="__('Description')" />
                        <textarea id="desc" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="desc" value="{{old('desc')}}" autofocus ></textarea>
                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                    </div>

                    <br>

                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')"  autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <br>

                    <img src="{{asset('/storage/' . $product->image)}}" width="400">

                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <input id="image" class="form-control block mt-1 w-full" type="file" name="image"  autofocus />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <br>

                    <div>
                        <x-input-label for="quantity" :value="__('Quantity')" />
                        <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')"  autofocus />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>

                    <br>

                    <div class="row">
                        @foreach($categories as $category)

                            <div class="col-end-3 mt-1">
                                <input id="'{{$category->id}}'" class="form-control mt-1"
                                       type="checkbox" name="categories[]" value="{{$category->id}}"
                                       {{ $product->categories()->where('category_id', $category->id)->exists() ? 'checked' : '' }}
                                />
                                <label for="'{{$category->id}}'">{{$category->name}}</label>
                            </div>

                        @endforeach
                    </div>

                    @error('categories')
                    <p style="color:red">
                        {{$message}}
                    </p>
                    @enderror
                    @error('categories.*')
                    <p style="color:red">
                        {{$message}}
                    </p>
                    @enderror
                    <br>

                    <x-primary-button class="ml-3">
                        Save
                    </x-primary-button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
