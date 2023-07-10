@extends('layouts.welcome')


@section('content')
<div class="flex justify-center m-8">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <h3 class="py-3 flex justify-center">Announce the loss</h3>
        <form action="{{route('advert_post')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                  <input type="text" name="first_name" value="{{old('first_name')}}" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                  <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                  @error('first_name')
                    <p class="text-red-800">{{ $message }}</p>
                  @enderror  
                  
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="surname" value="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="surname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Surname</label>
                    @error('surname')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="last_name" value="{{old('last_name')}}" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                    @error('last_name')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select name="gender" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected disabled>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
              </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <select name="age" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected disabled>Average age</option>
                        @for ($age = 10; $age <= 100; $age+=5)
                            <option>{{ $age }}</option>
                        @endfor
                    </select>
                    @error('age')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="place" value="{{old('place')}}" id="place" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="place" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last place seen (Mwenge)</label>
                    @error('place')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="date" name="lost_date" id="lost_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="lost_date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Lost date</label>
                    @error('lost_date')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
            </div>
            <div class="grid md:grid-cols-1 md:gap-6 py-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload recent picture</label>
                <div class="flex items-center justify-between w-full">
                    <input type="file" name="image_file" value="{{ old('image_file') }}" class="@error('image_file') border-red-500 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                </div>
                @error('image_file')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror 
            </div>
            <div class="grid md:grid-cols-1 md:gap-6 py-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="message" name="description" rows="4" class=" @error('description') border-red-800 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please describe the person you are looking for..."></textarea>
                @error('description')
                    <p class="text-red-800">{{ $message }}</p>
                @enderror 
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="reward" value="{{old('reward')}}" id="reward" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="reward" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Offer a reward</label>
                    @error('reward')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror 
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" value="{{old('phone_number')}}" name="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact when found</label>
                    @error('phone_number')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select name="related_as" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected disabled>Related to you as</option>
                        <option value="father">Father</option>
                        <option value="mother">Mother</option>
                        <option value="sister">Sister</option>
                        <option value="brother">Brother</option>
                        <option value="friend">Friend</option>
                        <option value="son">Son</option>
                        <option value="daughter">Daughter</option>
                        <option value="nephew">Nephew</option>
                        <option value="niece">Niece</option>
                        <option value="other">Other</option>
                    </select>
                    @error('related_as')
                        <p class="text-red-800">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
        </form>
    </div>
</div>
@endsection