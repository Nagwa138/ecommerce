<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <a href="{{route('vendors.create')}}" style="color: blueviolet" class=" text-center">
                    Add new vendor
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
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Added at
                        </th>
                    </tr>
                    <tbody>
                    @foreach($vendors as $vendor)

                        <tr>
                            <td>
                                {{$vendor->name}}
                            </td>
                            <td>
                                {{$vendor->email}}
                            </td>
                            <td>
                                {{$vendor->created_at}}
                            </td>
                            <td>
                                <a href="{{route('vendors.edit', $vendor->id)}}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{route('vendors.destroy', $vendor->id)}}" method="post">
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
