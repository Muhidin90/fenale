@extends('layouts.admin.dashboard')


@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-full dark:border-gray-700 mt-14">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center h-96 rounded bg-gray-50 dark:bg-gray-800">
                <img class="w-full h-96 rounded-lg" src="/storage/{{$advert->picture}}" alt="">
            </div>
            <div class="flex items-center justify-center h-full w-80 rounded-lg bg-gray-50 dark:bg-gray-800"> 
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold">Full name:</span> 
                        <span class="text-semi font-medium text-gray-600">{{Str::ucfirst($advert->first_name ." ". $advert->surname ." ". $advert->last_name) }}</span>
                    </li>
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold">Gender:</span> <span class="text-semi font-medium text-gray-600">{{ Str::ucfirst($advert->gender) }}</span>
                    </li>
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold">Avarage age:</span> <span class="text-semi font-medium text-gray-600">{{$advert->avg_age." yrs old"}}</span>
                    </li>
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold">Lost date:</span> <span class="text-semi font-medium text-gray-600">{{$advert->lost_date}}</span>
                    </li>
                    @if ($advert->gender == 'male')
                        <li class="pb-3 sm:pb-4">
                            <span class="p-0 text-semi font-bold">He was last seen at:</span> <span class="text-semi font-medium text-gray-600">{{$advert->last_seen}}</span>
                        </li>
                    @endif
                    @if ($advert->gender == 'female')
                        <li class="pb-3 sm:pb-4">
                            <span class="p-0 text-semi font-bold">She was last seen at:</span> <span class="text-semi font-medium text-gray-600">{{$advert->gender}}</span>
                        </li>
                    @endif
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold">Description:</span> <p class="text-semi font-medium text-gray-600">{{$advert->description}}</p>
                    </li>
                    <li class="pb-3 sm:pb-4">

                        <span class="p-0 text-semi font-bold">Related to:</span> <p class="text-semi font-medium text-blue-500">{{Str::ucfirst($advert->user->surname." ". $advert->user->first_name)}} <span class="text-red-900">AS</span> {{ Str::ucfirst($advert->relation)}}</p>
                    </li>
                    <li class="pb-3 sm:pb-4">
                        <span class="p-0 text-semi font-bold text-blue-800">Reward Offered:</span> <span class="text-semi font-medium text-red-800">{{$advert->reward_offered. "/="}}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection




