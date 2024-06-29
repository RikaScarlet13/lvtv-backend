{{-- resources/views/components/footer.blade.php --}}
<style>
    .bg-header {
        background-color: #232848;
    }
    .text-list {
        color: #232848;
    }
    .text-black {
        color: #232848;
    }
    .text-yellow-400 {
        color: #FFBC42;
    }
    .text-4xl {
        font-size: 2.25rem;
    }
    .text-xl {
        font-size: 1.25rem;
    }
    .p-10 {
        padding: 10px;
    }
    .pb-4 {
        padding-bottom: 1rem;
    }

    .underline {
        text-decoration: none;
        color: white;
    }

    footer ul,
    footer ol {
        list-style: none;
        padding-left: 0;
    }

    footer a {
        color: #232848; /* Default link color */
        text-decoration: none; /* Remove underline */
        transition: color 0.3s ease; /* Smooth transition for color change */
    }

    /* Hover effect */
    footer a:hover {
        color: wheat; /* New color on hover */
    }
</style>

<footer style="background-color: #FFBC42; padding-top: 50px;">
    <div class="p-10 text-list">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md mb-5">
                    <!-- <h4 class="font-weight-bold text-4xl">LVTV</h4> -->
                    <div class="flex justify-between pt-3">
                        <img src="{{ asset('images/bluelogo.png') }}" class="w-full object-contain" style="height: 150px;" alt="logoo">
                    </div>
                </div>
                <div class="col-md mb-5">
                    <h4 class="font-weight-bold text-xl pb-4">Useful Links</h4>
                    <ul>
                        <li class="pb-1"><a href="/" class="text-list text-decoration-none">Home</a></li>
                        <!-- <li class="pb-1"><a href="/Teleradio" class="text-list text-decoration-none">Teleradio</a></li> -->
                        <li class="pb-1"><a href="#" class="text-list text-decoration-none">Course</a></li>
                        <li class="pb-1"><a href="/our-story" class="text-list text-decoration-none">Our Story</a></li>
                        <!-- <li class="pb-1"><a href="/Archives" class="text-list text-decoration-none">Archives</a></li> -->
                    </ul>
                </div>
                <div class="col-md mb-5">
                    <h4 class="font-weight-bold text-xl pb-4">Contact Information</h4>
                    <p><strong>Phone:</strong> 09123456789 <br>
                    <strong>Email:</strong> lvcc@lvcc.edu.ph <br>
                    McArthur Highway <br>
                    Sampaloc, Apalit <br>
                    Pampanga 2016</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 bg-header text-white px-10">
        <div class="container">
            <div class="text-center">
            <div class="row justify-content-center mb-2">
                    <div class="col-auto">
                        <a href="/FAQs" class="underline hover:text-gray-400">FAQs</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="underline hover:text-gray-400" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy Policy</a>
                    </div>
                    <div class="col-auto">
                        <a href="/TermsOfUse" class="underline hover:text-gray-400">Terms of Use</a>
                    </div>
                    
                    
                </div>
                <div>
                    Copyright <strong><span>LVTV</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyPolicyModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>In compliance with data privacy laws such as, but not limited to, Republic Act No. 10173 (Philippine Data Privacy Act of 2012) and its implementing rules and regulations, we within the Organization of La Verdad Christian College (LVCC), collect and process your personal information in this Survey (LVTV: A Live Streaming Platform for Bachelor of Arts Broadcasting Program of La Verdad Christian College - Apalit) for Capstone Project purposes only, keeping them securely and with confidentiality using our organizational, technical, and physical security measures, and retain them in accordance with our retention policy. We don’t share them to any external group without your consent, unless otherwise stated in our privacy notice. You have the right to be informed, to object, to access, to rectify, to erase or to block the processing of your personal information, as well as your right to data portability, to file a complaint and be entitled to damages for violation of your rights under this data privacy.
                    <br><br>
                    For your data privacy inquiries, you may reach our Data Protection Officer through:
                    <br>
                    Email: dpo@laverdad.edu.ph</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
