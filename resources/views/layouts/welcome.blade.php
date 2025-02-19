<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Brainwave</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @php
    $template = App\Models\Template::where('id','<>','~')->first();
        @endphp
        <link rel="shortcut icon" href="{{asset($template->logo_kecil)}}" />
</head>

<body class="bg-white text-gray-800">
    <nav id="navbar" class="bg-white p-4 fixed top-0 left-0 w-full z-50 transition-shadow duration-300">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo dan Nama Brand -->
            <div class="flex items-center space-x-2">
                <img src="{{asset($template->logo_kecil)}}" alt="Brainwave Logo" class="w-10 h-10">
                <a href="#" class="text-2xl font-bold text-black-600">BrainWave</a>
            </div>

            <!-- Menu Navigasi untuk Desktop -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-purple-600">Home</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">Features</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">Pricing</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">Contact</a>
                <!-- Mengubah button menjadi <a> agar sesuai dengan route -->
                <a href="{{ route('login') }}"
                    class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition-shadow flex items-center">
                    Login
                </a>
            </div>

            <!-- Tombol Menu Mobile -->
            <button id="menu-btn" class="md:hidden text-gray-600 focus:outline-none">
                ☰
            </button>
        </div>
    </nav>

    <!-- Tambahkan padding-top agar konten tidak tertutup oleh navbar -->
    <main class="px-4 py-8 md:px-6 md:py-12 pt-16 mt-16">
        <section class="text-center md:text-left md:flex md:items-center md:justify-between">
            <div class="md:w-1/2">
                <h1 class="text-3xl md:text-5xl font-black leading-tight">
                    Investing in
                    <br />
                    Knowledge and
                    <br />
                    <span class="text-orange-500">Your Future</span>
                </h1>
                <p class="mt-4 mr-4 text-gray-600">
                    Our e-learning programs have been developed to deliver multimedia learning solutions for your
                    business.
                </p>
                <div class="mt-6 flex flex-wrap justify-center md:justify-start items-center space-x-4">
                    <a href="{{url('buatakun')}}"
                        class="bg-purple-500 text-white px-6 py-2 rounded-full hover:bg-purple-600">
                        Register
                    </a>
                    <div class="text-center">
                        <div class="text-2xl font-bold">50+</div>
                        <div class="text-gray-600">Berbagai Kelas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">1M+</div>
                        <div class="text-gray-600">Pengguna Aktif</div>
                    </div>
                </div>
            </div>
            <div class="mt-8 md:mt-0 md:w-1/2 relative flex justify-center">
                <img alt="A student holding books and a backpack, with a learning chart in the background"
                    class="rounded-lg shadow-lg w-4/5 h-auto object-cover"
                    src="https://storage.googleapis.com/a1aa/image/V1FSIx6gbDJrKh97Ksavuf4v798UT1ze98NYNia3om3DQiHUA.jpg" />

                <!-- Kotak Assisted Students -->
                <div class="absolute top-4 left-4 bg-white p-3 rounded-lg shadow-lg flex flex-col items-center w-24">
                    <div class="text-base font-semibold text-gray-700">175K</div>
                    <div class="text-xs text-gray-500 text-center">Assisted Students</div>
                </div>

                <!-- Kotak Learning Chart -->
                <div
                    class="absolute bottom-4 right-4 bg-white p-3 rounded-lg shadow-lg flex flex-col items-center w-28">
                    <div class="text-sm font-semibold text-gray-700">Learning Chart</div>
                    <img alt="A bar chart showing learning progress" class="mt-2 rounded-md w-full"
                        src="https://storage.googleapis.com/a1aa/image/jilCL22sj7LrCRQ09yBe6clh78ewPmHIe19wBePWRG4JAJegC.jpg" />
                </div>
            </div>

        </section>
        <section class="mt-16">
            <h2 class="text-3xl font-bold text-center md:text-left">Tingkatkan Skill dan Raih Masa Depan Cerah Bersama
                BrainWave</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div
                    class="bg-pink-100 p-6 rounded-lg text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-paint-brush text-4xl text-pink-500"></i>
                    <h3 class="mt-4 text-xl font-bold">Akses Materi Berkualitas</h3>
                </div>
                <div
                    class="bg-purple-100 p-6 rounded-lg text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-code text-4xl text-purple-500"></i>
                    <h3 class="mt-4 text-xl font-bold">Latihan Soal & Try Out</h3>
                </div>
                <div
                    class="bg-blue-100 p-6 rounded-lg text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-bullhorn text-4xl text-blue-500"></i>
                    <h3 class="mt-4 text-xl font-bold">Fleksibilitas Belajar</h3>
                </div>
                <div
                    class="bg-orange-100 p-6 rounded-lg text-center transition-transform transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-chalkboard-teacher text-4xl text-orange-500"></i>
                    <h3 class="mt-4 text-xl font-bold">Sertifikat Resmi</h3>
                </div>
            </div>
            <div class="mt-8 text-center">
                <button
                    class="bg-purple-500 text-white px-6 py-2 rounded-full hover:bg-purple-600 transition duration-300">Browse
                    All</button>
            </div>
        </section>
        <section class="mt-16 bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-4xl font-extrabold text-center text-gray-800">Pricing Plans</h2>
                <p class="text-lg text-center text-gray-600 mt-4">
                    Choose the plan that’s right for you.
                </p>
                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    <!-- Basic Plan -->
                    <div
                        class="flex flex-col justify-between bg-white border rounded-xl shadow-lg hover:shadow-2xl p-8 text-center transition-all transform hover:scale-105">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Basic Plan</h3>
                            <p class="text-gray-500 mt-2">Perfect for individuals getting started</p>
                            <div class="mt-4">
                                <p class="text-4xl font-extrabold text-gray-800">IDR 20K</p>
                                <span class="text-sm text-gray-500">/month</span>
                            </div>
                            <ul class="mt-6 space-y-2 text-gray-600 text-left">
                                <li>✔ Access to basic courses</li>
                                <li>✔ Community Support</li>
                            </ul>
                        </div>
                        <button
                            class="mt-8 bg-purple-500 text-white px-6 py-3 rounded-xl hover:bg-purple-600 transition-all font-semibold">
                            Choose Plan
                        </button>
                    </div>
                    <!-- Pro Plan -->
                    <div
                        class="flex flex-col justify-between bg-white border rounded-xl shadow-lg hover:shadow-2xl p-8 text-center transition-all transform hover:scale-105 border-purple-500 ring-4 ring-purple-200">
                        <div>
                            <span
                                class="absolute top-0 right-4 bg-purple-500 text-white text-xs font-bold uppercase px-3 py-1 rounded-full shadow-md">Most
                                Popular</span>
                            <h3 class="text-2xl font-bold text-gray-800">Pro Plan</h3>
                            <p class="text-gray-500 mt-2">For professionals ready to go pro</p>
                            <div class="mt-4">
                                <p class="text-4xl font-extrabold text-gray-800">IDR 50K</p>
                                <span class="text-sm text-gray-500">/month</span>
                            </div>
                            <ul class="mt-6 space-y-2 text-gray-600 text-left">
                                <li>✔ Access to all courses</li>
                                <li>✔ Community Support</li>
                                <li>✔ Exclusive Content</li>
                            </ul>
                        </div>
                        <button
                            class="mt-8 bg-purple-600 text-white px-6 py-3 rounded-xl hover:bg-purple-700 transition-all font-semibold">
                            Choose Plan
                        </button>
                    </div>
                    <!-- Premium Plan -->
                    <div
                        class="flex flex-col justify-between bg-white border rounded-xl shadow-lg hover:shadow-2xl p-8 text-center transition-all transform hover:scale-105">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Premium Plan</h3>
                            <p class="text-gray-500 mt-2">Ultimate package with mentorship</p>
                            <div class="mt-4">
                                <p class="text-4xl font-extrabold text-gray-800">IDR 100K</p>
                                <span class="text-sm text-gray-500">/month</span>
                            </div>
                            <ul class="mt-6 space-y-2 text-gray-600 text-left">
                                <li>✔ Access to all courses</li>
                                <li>✔ Personal Mentorship</li>
                                <li>✔ Community Support</li>
                            </ul>
                        </div>
                        <button
                            class="mt-8 bg-purple-500 text-white px-6 py-3 rounded-xl hover:bg-purple-600 transition-all font-semibold">
                            Choose Plan
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="mt-16 bg-gray-100 py-8">
            <h2 class="text-3xl font-bold text-center">What Our Students Say</h2>
            <div class="mt-8 flex justify-center space-x-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <p class="italic text-gray-600">"The courses were really insightful, and the instructors were
                        excellent!"</p>
                    <div class="mt-4 font-bold text-gray-800">John Doe</div>
                    <div class="text-sm text-gray-600">UI/UX Designer</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <p class="italic text-gray-600">"I gained so much knowledge, and it's helped me level up my
                        career."</p>
                    <div class="mt-4 font-bold text-gray-800">Jane Smith</div>
                    <div class="text-sm text-gray-600">Web Developer</div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="mt-16 bg-purple-500 text-white py-12 text-center">
            <h2 class="text-3xl font-bold">Ready to Kickstart Your Career?</h2>
            <p class="mt-4">Join thousands of students who are boosting their skills with our courses. Start today!
            </p>
            <button
                class="mt-6 bg-white text-purple-500 px-8 py-3 rounded-full text-lg hover:bg-purple-200 transition duration-300">Join
                Now</button>
        </section>

        <!-- FAQ Section -->
        <section class="mt-16 px-4 md:px-8">
            <h2 class="text-3xl font-bold text-center">Frequently Asked Questions</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800">How do I sign up for a course?</h3>
                    <p class="mt-2 text-gray-600">Simply create an account and browse the available courses. Click the
                        'Join Now' button to enroll.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800">Are the courses beginner-friendly?</h3>
                    <p class="mt-2 text-gray-600">Yes, many of our courses are designed for beginners, with clear
                        instructions and practical examples.</p>
                </div>
            </div>
        </section>
        <script>
            // Toggle menu mobile saat tombol diklik
            document.getElementById("menu-btn").addEventListener("click", function() {
                document.getElementById("mobile-menu").classList.toggle("hidden");
            });
        </script>


    </main>
    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="flex flex-col items-center">
            <p>&copy; 2025 Brainwave. All rights reserved.</p>
            <div class="mt-4 space-x-4">
                <a href="#" class="text-gray-400 hover:text-gray-300">Facebook</a>
                <a href="#" class="text-gray-400 hover:text-gray-300">Instagram</a>
                <a href="#" class="text-gray-400 hover:text-gray-300">Twitter</a>
            </div>
        </div>
    </footer>
</body>
<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 10) {
            navbar.classList.add("shadow-md");
        } else {
            navbar.classList.remove("shadow-md");
        }
    });
</script>

</html>