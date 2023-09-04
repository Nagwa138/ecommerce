<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <a href="{{route('products.create')}}" style="color: blueviolet" class=" text-center">
                    Add new product
                </a>

                <br>
                @if(session()->has('success'))

                    <p style="padding: 10px; background-color: aquamarine">
                        {{session()->get('success')}}
                    </p>

                @endif

                <br>

                <br>
                <table class="table w-full text-center">
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Categories
                        </th>
                    </tr>
                    <tbody>
                    @foreach($products as $product)

                        <tr>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                {{$product->desc}}
                            </td>
                            <td>
                                {{$product->price}}$
                            </td>
                            <td>
                                <img src="{{asset('/storage/' . $product->image)}}" width="150">
                            </td>
                            <td>
                                {{$product->quantity}}
                            </td>
                            <td>
                                <summary>
                                    @foreach($product->categories as $category)
                                        <li>
                                            {{$category->name}}
                                        </li>
                                    @endforeach
                                </summary>
                            </td>
                            <td>
                                <a href="{{route('products.edit', $product->id)}}">
                                    Edit
                                </a>
                            </td>

                            <td>
                                <form action="{{route('products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="ml-3">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
