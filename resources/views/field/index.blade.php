<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Field') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table style="width: 100%; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif;">
                    <thead>
                    <tr style="background-color: #f5f5f5; color: #333; text-align: left; padding: 10px;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fields as $field)
                        <tr>
                            <td>{{ $field->id }}</td>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->label }}</td>
                            <td>{{ $field->created_at }}</td>
                            <td>{{ $field->updated_at }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div><a href="{{route('field.create')}}" class="btn btn-success">Create New Client</a>
    </div>
</x-app-layout>


