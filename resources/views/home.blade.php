    <style>
        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white flex justify-between">
        <h1 class="text-2xl font-bold">Hospital Management</h1>
        <div>
            <a href="/" class="mr-4">Home</a>
            <a href="/about" class="mr-4">About</a>
            <a href="/services" class="mr-4">Services</a>
            <a href="/contact" class="mr-4">Contact</a>
            <a href="/login" class="bg-white text-blue-600 px-4 py-2 rounded">Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-16 bg-blue-500 text-white">
        <h2 class="text-4xl font-bold">Welcome to Our Hospital</h2>
        <p class="mt-4 text-lg">Providing quality healthcare with the best facilities.</p>
        <a href="/appointment/create" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded">Book an Appointment</a>
    </section>

   <!-- Services Section -->
<section class="py-12 px-6 text-center">
    <h3 class="text-3xl font-semibold mb-6">Our Services</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Emergency Care -->
        <div class="relative perspective-1000">
            <div x-data="{ flipped: false }" @mouseenter="flipped = true" @mouseleave="flipped = false"
                class="relative w-full h-56 transform-style-3d transition-transform duration-500"
                :class="{ 'rotate-y-180': flipped }">
                <!-- Front -->
                <div class="absolute w-full h-full bg-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-center backface-hidden">
                    <h4 class="text-xl font-semibold">🚑 Emergency Care</h4>
                    <p class="text-gray-600">24/7 emergency services with specialized doctors.</p>
                </div>
                <!-- Back -->
                <div class="absolute w-full h-full bg-blue-500 text-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-start rotate-y-180 backface-hidden">
                    <h4 class="text-lg font-semibold mb-2">Emergency Services Include:</h4>
                    <ul class="list-disc list-inside">
                        <li>🚑 24/7 Ambulance Support</li>
                        <li>🩺 Specialized Emergency Doctors</li>
                        <li>🏥 Trauma & Critical Care Unit</li>
                        <li>💉 Advanced Life-Saving Equipment</li>
                        <li>📞 Rapid Response Team</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Online Consultation -->
        <div class="relative perspective-1000">
            <div x-data="{ flipped: false }" @mouseenter="flipped = true" @mouseleave="flipped = false"
                class="relative w-full h-56 transform-style-3d transition-transform duration-500"
                :class="{ 'rotate-y-180': flipped }">
                <!-- Front -->
                <div class="absolute w-full h-full bg-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-center backface-hidden">
                    <h4 class="text-xl font-semibold">💻 Online Consultation</h4>
                    <p class="text-gray-600">Talk to our doctors from the comfort of your home.</p>
                </div>
                <!-- Back -->
                <div class="absolute w-full h-full bg-green-500 text-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-start rotate-y-180 backface-hidden">
                    <h4 class="text-lg font-semibold mb-2">Benefits of Online Consultation:</h4>
                    <ul class="list-disc list-inside">
                        <li>📹 Instant Video Calls with Experts</li>
                        <li>🔒 Secure & Private Chat Options</li>
                        <li>💊 E-Prescriptions Sent Instantly</li>
                        <li>🌍 Accessible Anytime, Anywhere</li>
                        <li>📅 Easy Appointment Scheduling</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pharmacy -->
        <div class="relative perspective-1000">
            <div x-data="{ flipped: false }" @mouseenter="flipped = true" @mouseleave="flipped = false"
                class="relative w-full h-56 transform-style-3d transition-transform duration-500"
                :class="{ 'rotate-y-180': flipped }">
                <!-- Front -->
                <div class="absolute w-full h-full bg-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-center backface-hidden">
                    <h4 class="text-xl font-semibold">💊 Pharmacy</h4>
                    <p class="text-gray-600">Get medicines delivered to your doorstep.</p>
                </div>
                <!-- Back -->
                <div class="absolute w-full h-full bg-red-500 text-white p-6 shadow-lg rounded-lg flex flex-col justify-center items-start rotate-y-180 backface-hidden">
                    <h4 class="text-lg font-semibold mb-2">Why Choose Our Pharmacy?</h4>
                    <ul class="list-disc list-inside">
                        <li>🏠 Home Delivery of Medicines</li>
                        <li>💵 Discounts & Affordable Prices</li>
                        <li>📄 Digital Prescription Upload</li>
                        <li>🔄 Automatic Refill Reminders</li>
                        <li>💊 Wide Range of Medicines Available</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} Hospital Management System. All Rights Reserved.</p>
    </footer>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js"></script>
