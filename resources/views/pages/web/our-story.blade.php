<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .text-primary {
        color: #232848 !important;
    }

    .text-4xl{
        color: #232848;
    }
</style>
<body>
    @include('components.webpage.navbar')

    <div class="container px-10">
        <div class="p-10 text-center">
            <h1 class="text-4xl fw-bold mt-5">Our Story</h1>
        </div>
        <div class="border-top border-3 border-warning my-4"></div>

        <div class="d-flex justify-content-between align-items-center mx-auto p-4 flex-column flex-md-row gap-3">
            <div class="mx-auto text-justify text-xl">
                <p class="fs-5">The LVTV project emerges as a response to challenges, aiming to create a centralized platform tailored to the needs of Broadcasting students, with a focus on overcoming limitations of current platforms, enhancing content archiving, and providing efficient navigation. This project builds upon the program's foundation of innovation and adaptability, aspiring to create a more cohesive and technologically advanced broadcasting experience for students.</p>
            </div>
            <div class="bg-warning border-start border-2 border-warning h-100"></div>
        </div>

        <div class="d-flex justify-content-start mx-auto p-4 container flex-column flex-md-row gap-4">
            <div class="mx-auto d-flex flex-column gap-3">
                <h2 class="text-2xl fw-bold">History</h2>
                <p class="fs-5 text-justify">The journey of La Verdad Christian College's Broadcasting program, which began in 1998, reflects a remarkable story of resilience and adaptation. Despite facing initial challenges and operating within limited resources, the program's pioneering efforts, including the innovative "Pera sa Basura" concept, demonstrated a commitment to creative resourcefulness and marked the first public viewing of student-produced content. As the program evolved, so did its projects, such as the initiative to "Tagalize" movies to fundraise for equipment, leading to the acquisition of a television used in present times.</p>
                <div class="rounded shadow-sm hover:shadow-lg">
                    <img src="{{ asset('images/historypage-pic2.jpg') }}" class="img-fluid rounded" alt="History Image 1">
                </div>
            </div>

            <div class="mx-auto d-flex flex-column gap-4">
                <div class="rounded shadow-sm hover:shadow-lg">
                    <img src="{{ asset('images/historypage-pic1.jpg') }}" class="img-fluid rounded" alt="History Image 2">
                </div>
                <div class="rounded shadow-sm p-4 hover:shadow-lg">
                    <p class="fs-5 text-justify">The transition to La Verdad Christian College-Caloocan for studio use and the subsequent exploration of remote broadcasting alternatives during the COVID-19 pandemic underscored the program's adaptability to changing circumstances. Despite setbacks and initial struggles with online platforms, instructors' dedicated efforts and the adoption of software like OBS and VMix enabled the continuation of broadcasts during challenging times. However, with the transition to digital broadcasting came new challenges, particularly regarding copyright enforcement on platforms like Facebook, prompting the exploration of a dedicated live-streaming platform tailored specifically for LVCC's Broadcasting program.</p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mx-auto py-4 gap-4 flex-wrap">
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-2xl fw-bold ">Vision</h1>
                <div class="rounded shadow-sm p-4 hover:shadow-lg">
                    <p class="fs-5 text-center">The institution that Ensures quality learning and Biblical moral standards.</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-2xl fw-bold">Objective</h1>
                <div class="rounded shadow-sm p-4 hover:shadow-lg">
                    <p class="fs-5 text-center">La Verdad Christian College, Inc. aims to provide help through educational assistance to poor but deserving students from different parts of the country so that they may acquire quality education without the worries of high cost of education. It also aims to alleviate poverty by offering opportunities to poor but determined students to acquire higher quality of education to fulfill their dreams and succeed with God's help and mercy.</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-2xl fw-bold ">Mission</h1>
                <div class="rounded shadow-sm p-4 hover:shadow-lg">
                    <p class="fs-5 text-center">To be the frontrunner in providing academic excellence and morally upright principles.</p>
                </div>
            </div>
        </div>

        <div class="py-4">
            <div class="pb-4 text-center">
                <h1 class="text-2xl fw-bold ">Bachelor of Arts in Broadcasting</h1>
            </div>
            <div class="d-flex justify-content-center p-2">
                <img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded shadow-sm hover:shadow-lg" alt="Broadcasting Banner">
            </div>
        </div>

        <div class="d-flex justify-content-center mx-auto py-4 gap-4 flex-wrap">
            <div class="text-center">
                <h1 class="text-2xl fw-bold ">Development Team</h1>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/devteam/khai.png') }}" class="img-fluid rounded-circle shadow hover:shadow-lg" alt="Team Member 1">
                            <h1 class="fs-5 fw-bold">Khaihou James D. Law</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/devteam/hanzel.png') }}" class="img-fluid rounded-circle shadow hover:shadow-lg" alt="Team Member 2">
                            <h1 class="fs-5 fw-bold">Rommel Hanzel D. Navarro</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/devteam/rika.jpg') }}" class="img-fluid rounded-circle shadow hover:shadow-lg" alt="Team Member 3">
                            <h1 class="fs-5 fw-bold">Erika Mae Camille T. Corpuz</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/devteam/tim.png') }}" class="img-fluid rounded-circle shadow hover:shadow-lg" alt="Team Member 4">
                            <h1 class="fs-5 fw-bold">Timothy Carl I. Bundalian</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('images/devteam/joshua.png') }}" class="img-fluid rounded-circle shadow hover:shadow-lg" alt="Team Member 5">
                            <h1 class="fs-5 fw-bold">Joshua James D. Mar</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    @include('components.webpage.footer')
</body>
</html>
