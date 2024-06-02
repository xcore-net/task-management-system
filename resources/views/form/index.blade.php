<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is Form Page!") }}
                    <x-nav-link :href="route('form.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="text-white w-full table-auto text-left">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Fields</th>
                                <th>User ID</th>
                                <th>Last Updated By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($forms as $form)
                            <tr>
                                <td>{{ $form->id }}</td>
                                <td>{{ $form->title }}</td>
                                <td>{{ $form->description }}</td>
                                <td>{{ $from->user_id }}</td>
                                <td>{{ $form->last_updated_by }}</td>
                                <td><select>
                                     @foreach ($form->fields as $field)
                                     <option value="{{ $field->id }}">{{ $field->label }}</option>
                                      @endforeach
                                    </select></td>
                                    
                                <td>{{ $form->created_at }}</td>
                                <td>{{ $form->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/form/' . $form->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/form/' . $form->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('form.destroy', $form->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this form?');">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td>no forms</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>



                </div>
            </div>
</x-app-layout>