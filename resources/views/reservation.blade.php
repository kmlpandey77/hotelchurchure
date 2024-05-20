@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-16">
        <div class="max-w-2xl mx-auto">
            <div class="mb-5 text-center">
                <h1 class="text-3xl md:text-5xl text-primary font-serif">Reservation</h1>
                <div class="divider bg-orange-600"></div>
            </div>
            <div class="mx-8 md:mx-0">
                <form method="POST">
                    @csrf

                    <x-honeypot/>

                    <x-forms.input :value="old('name')" name="name" label="Full Name" class="mb-3"/>
                    <x-forms.input :value="old('email')" name="email" label="Email" type="email" class="mb-3"/>
                    <x-forms.input :value="old('phone')" name="phone" label="Phone" class="mb-3"/>

                    <h3 class="mt-8 mb-3 text-2xl">Room Details</h3>
                    <x-forms.select name="room_type" label="Room Type" class="mb-3" :disabled="!!request('room')">
                        <option value="">Select room</option>
                        @foreach($rooms as $room)
                            <option @selected(request('room') == $room->title) value="{{$room->title}}">{{$room->title}}
                                - ${{$room->price}}</option>
                        @endforeach
                    </x-forms.select>

                    <div class="grid md:grid-cols-2 gap-x-4 mb-3">
                        <x-forms.input :value="old('no_of_room')" name="no_of_room" label="No of room" class="mb-3 md:mb-0" />
                        <div class="md:mt-8">
                            <label class="mr-5 text-sm font-medium text-gray-900">Extra Bed: </label>
                            <label class="mr-2">
                                <input @checked(old('extra_bed') == 'yes') type="radio" name="extra_bed" value="yes">
                                Yes
                            </label>
                            <label>
                                <input @checked(old('extra_bed', 'no') == 'no') type="radio" name="extra_bed"
                                       value="no"> No
                            </label>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-4 mb-3">
                        <x-forms.input :value="old('check_in_date')" name="check_in_date" label="Check-in date"
                                       type="date" class="mb-3 md:mb-0"/>
                        <x-forms.input :value="old('check_out_date')" name="check_out_date" label="Check-out date"
                                       type="date"/>
                    </div>

                    <div class="mb-3">
                        <label class="mr-5 text-sm font-medium text-gray-900">Airport pickup? </label>
                        <label class="mr-2">
                            <input @checked(old('airport_pickup') == 'yes') type="radio" name="airport_pickup"
                                   value="yes"> Yes
                        </label>
                        <label>
                            <input @checked(old('airport_pickup', 'no') == 'no') type="radio" name="airport_pickup"
                                   value="no"> No
                        </label>
                    </div>

                    <x-forms.textarea :value="old('message')" name="message" label="Message" class="mb-3"/>
                    <x-forms.btn label="Submit" class="mt-5"/>
                </form>
            </div>

        </div>
    </section>

@endsection