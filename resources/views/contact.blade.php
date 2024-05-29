@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-16 pb-0">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mb-5">
                <h1 class="text-3xl md:text-5xl text-primary font-serif">{{$page->title}}</h1>
                <div class="divider bg-red-600"></div>
            </div>
            <div class="grid md:grid-cols-2 grid-gap-4">
                <div class="text-left mx-8 md:mx-0 mb-8 md:mb-0">
                    <h2 class="text-2xl font-medium">Hotel Simal</h2>

                    <div class="flex mt-4 items-center">
                        <div class="h-8 w-6 mr-5 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor"
                                      d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-lg">Address</span> <br>
                            {!! label('contact:address', true) !!}
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="h-8 w-6 mr-5 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-lg">E-mail</span> <br>
                            {!! label('contact:emails', true)  !!}
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="h-8 w-6 mr-5 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-lg">Phone</span> <br>
                            {!! label('contact:phones', true)  !!}
                        </div>
                    </div>

                </div>

                <div class="text-left mx-8 md:mx-0">
                    <h2 class="text-xl">Contact Form</h2>

                    <form method="POST">
                        @csrf

                        <x-honeypot/>

                        <x-forms.input :value="old('name')" name="name" label="Full Name" class="mt-5"/>
                        <x-forms.input :value="old('email')" name="email" label="Email" class="mt-5"/>
                        <x-forms.textarea :value="old('message')" name="message" label="Message" class="mt-5"/>

                        <x-forms.btn label="Submit" class="mt-5" />

                    </form>
                </div>
            </div>
        </div>
        <section>
            <div class="max-w-4xl mx-auto mt-12">
                <h2 class="text-2xl font-medium mx-8 md:mx-0 mb-2">Location Map</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2100.1412227562205!2d85.3090065603709!3d27.717210585022315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1965f1df2047%3A0x5cfa6f3134e2c54f!2sHotel%20Simal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1664004369710!5m2!1sen!2snp"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </section>

@endsection
