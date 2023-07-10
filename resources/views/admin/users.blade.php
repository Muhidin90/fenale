@extends('layouts.admin.dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-full dark:border-gray-700 mt-14">
        <table class="w-full text-sm text-left shadow-md rounded-lg text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Full name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Str::ucfirst($user->first_name." ".$user->surname." ".$user->last_name) }}
                        </th>
                        <td class="px-6 py-4">
                            {{ Str::ucfirst($user->email) }}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->phone_number}}
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::ucfirst($user->gender) }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Message</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            @if ($users->count() > 0)
                {{ $users->links() }}
            @else
                " "
            @endif 
        </div>
    </div>
</div>

@endsection