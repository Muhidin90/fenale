@extends('layouts.admin.dashboard')

@section('content')
{{-- <div class="my-20 flex justify-center "> --}}

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-full dark:border-gray-700 mt-14">
            <table class="w-full text-sm text-left shadow-md rounded-lg text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Profile picture
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Full name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last seen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nextkin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Related as
                        </th>
                        <th scope="col" class="px-6 py-3">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adverts as $advert)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-8 h-8 rounded-full" src="/storage/{{$advert->picture}}" alt="user photo">
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ Str::ucfirst($advert->first_name." ".$advert->surname." ".$advert->last_name) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ Str::ucfirst($advert->gender) }}
                            </td>
                            <td class="px-6 py-4">
                                {{$advert->avg_age ."". 'yrs'}}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::ucfirst($advert->last_seen) }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" title="{{$advert->first_name}}">{{ $advert->user->first_name." ".$advert->user->surname." ".$advert->user->last_name}}</a>
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::ucfirst($advert->relation) }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('admin.advert', $advert)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-1">Details</a>
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-1">Message</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        @if ($adverts->count() > 0)
            {{ $adverts->links() }}
        @else
            " "
        @endif 
    </div>
{{-- </div> --}}

@endsection