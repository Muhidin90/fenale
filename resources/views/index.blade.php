@extends('layouts.welcome')
@section('content')

<div class="flex justify-center p-3 py-4">
    <form action="" class="">
        <input type="text" name="" placeholder="Search by first name, phone number, email" id="" class="rounded py-1 pl-2 w-[700px]">
        <input type="button" value="Search"
            class="bg-zinc-600 rounded-lg text-white text-sm px-7 rounded py-2 hover:bg-zinc-400 w-[200px]">
    </form>
</div>

@guest
    <div class="py-10 px-[200px] text-6xl text-center text-black-200 font-semibold bg-white ">
        <p>Post & find lost loved ones <br>
            find a lost loved one <br>
            and get rewarded</p>
    </div>
@endguest

<div class="container mx-auto px-[200px] py-[70px]">
    <h2 class="text-zinc-600 font-bold text-4xl">Recent Ads</h2>
    <a href="" class="pl-2  text-zinc-500 font-bold hover:text-zinc-600">view all Ads</a>
    <div class="grid grid-cols-4 gap-x-4 gap-y-4">
        @foreach ($ads as $ad )
            <div
            class=" drop-shadow-md  w-[250px] p-2 rounded-xl flex-col border-4 border-grey-300 space-y-2 bg-white">
            {{-- <h2 class="inline p-1 bg-red-400 rounded text-white font-semibold text-sm">lost</h2>
            --}}
            <div class="w-[227px] h-[227px]"> 
                <img src="/storage/{{$ad->picture}}" alt="" class="w-[227px] h-[227px] rounded transform hover:scale-105 object-fit object-cover">
            </div>
            <div class="flex flex-row relative text-gray-500 ">
                <p class="text-sm absolute right-2">{{$ad->created_At}}</p>
            </div>
            <div class="flex flex-col">
                <p>Name: {{$ad->first_name ." ". $ad->last_name}}</p>
                <p class="font-bold text-zinc-600">Reward : {{$ad['reward_offered']}}</p>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection