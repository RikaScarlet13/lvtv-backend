{{-- resources/views/components/footer.blade.php --}}
<style>
    body, h1, h2, h3, h4, h5, h6, p, a, div, span, input, button {
    font-family: 'Poppins', sans-serif;
}
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

    .accordion-header{
        font-weight: bold;
    }

    .modal-dialog {
    max-width: 50%; /* Adjust the percentage as needed */
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
                        <li class="pb-1"><a href="/auth-home" class="text-list text-decoration-none">Home</a></li>
                        <li class="pb-1"><a href="#" class="text-list text-decoration-none">Teleradio</a></li>
                        <li class="pb-1"><a href="#" class="text-list text-decoration-none">Course</a></li>
                        <li class="pb-1"><a href="#" class="text-list text-decoration-none">Our Story</a></li>
                        <li class="pb-1"><a href="#" class="text-list text-decoration-none">Archives</a></li>
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
                        <a href="#" class="underline hover:text-gray-400" data-bs-toggle="modal" data-bs-target="#faqModal">FAQs</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="underline hover:text-gray-400" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy Policy</a>
                    </div>
                    <div class="col-auto">
                        <a href="" class="underline hover:text-gray-400" data-bs-toggle="modal" data-bs-target="#termsOfUseModal">Terms of Use</a>
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
                    <p>In compliance with data privacy laws such as, but not limited to, Republic Act No. 10173 (Philippine Data Privacy Act of 2012) and its implementing rules and regulations, we within the Organization of La Verdad Christian College (LVCC), collect and process your personal information in this Survey (LVTV: A Live Streaming Platform for Bachelor of Arts Broadcasting Program of La Verdad Christian College - Apalit) for Capstone Project purposes only, keeping them securely and with confidentiality using our organizational, technical, and physical security measures, and retain them in accordance with our retention policy.<br><br> We don’t share them to any external group without your consent, unless otherwise stated in our privacy notice. You have the right to be informed, to object, to access, to rectify, to erase or to block the processing of your personal information, as well as your right to data portability, to file a complaint and be entitled to damages for violation of your rights under this data privacy.
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

     <!-- FAQ Modal -->
     <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyPolicyModalLabel">Frequently Asked Questions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                            <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is LV.TV?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    LV.TV is a livestreaming website for La Verdad Christian College to improve academic excellence.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What devices can I use to watch?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can watch on smartphones, tablets, laptops, and desktop computers.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    The video is buffering or not playing smoothly. How can I fix this?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Check your internet connection, close other apps or tabs, clear your browser cache, update your browser or app, and restart your device.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    I can’t log in. What should I do?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    If you’re having trouble logging in, click the "Refresh" button and try logging in your La Verdad Email. If issues persist, contact customer support.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How can I find out about upcoming releases and new content?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    New content is added regularly. Check the "Home Page" section and find the "Schedules & Programs" for the latest updates.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms of Use Modal -->
    <div class="modal fade" id="termsOfUseModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container py-5">
        <h1 class="text-primary text-center font-weight-bold mb-4">Terms Of Use</h1>
        
        <div class="accordion" id="accordionTermsOfUse">
            <!-- Section 1: Introduction -->
            <div class="card mb-3">
                <div class="card-header" id="headingIntroduction">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left" type="button" data-toggle="collapse" data-target="#collapseIntroduction" aria-expanded="true" aria-controls="collapseIntroduction">
                            Introduction
                        </button>
                    </h2>
                </div>
                <div id="collapseIntroduction" class="collapse show" aria-labelledby="headingIntroduction" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            This Terms of Use is for educational purposes only and is intended to outline the development of a system called LVTV. This project aims to provide Bachelor of Arts in Broadcasting students with a platform to create their own streaming service, showcasing their skills, projects, and practicing their professions. LVTV requires the use of LV Google Suites for access, ensuring exclusive viewing and interaction. Additionally, LVTV is not intended for broadcast and is not intended for monetization.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 2: User Responsibilities -->
            <div class="card mb-3">
                <div class="card-header" id="headingUserResponsibilities">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseUserResponsibilities" aria-expanded="false" aria-controls="collapseUserResponsibilities">
                            User Responsibilities
                        </button>
                    </h2>
                </div>
                <div id="collapseUserResponsibilities" class="collapse" aria-labelledby="headingUserResponsibilities" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            By accessing and using LVTV, you agree to the following responsibilities:
                        </p>
                        <ul>
                            <li><span class="font-weight-bold">Lawful Conduct:</span> Use LVTV in accordance with all applicable laws and regulations. You must not use the site for any illegal activities or to promote any illegal acts.</li>
                            <li><span class="font-weight-bold">Content Posting:</span> Ensure any content you upload or post is appropriate and does not contain offensive, defamatory, obscene, or unlawful material. Respect intellectual property rights and do not upload content you do not own or have permission to use.</li>
                            <li><span class="font-weight-bold">Respectful Interaction:</span> Engage with other users in a respectful manner. Avoid any form of harassment, bullying, or abusive behavior.</li>
                            <li><span class="font-weight-bold">Security:</span> Keep your account information confidential and secure. You are responsible for all activities that occur under your account. Notify us immediately if you suspect any unauthorized use of your account.</li>
                            <li><span class="font-weight-bold">Accurate Information:</span> Provide accurate and truthful information when creating an account or interacting on LVTV. Do not impersonate others or provide misleading information.</li>
                            <li><span class="font-weight-bold">System Integrity:</span> Do not attempt to interfere with the operation of LVTV. This includes, but is not limited to, uploading or distributing viruses, hacking, or any other activity that disrupts LVTV’s functionality.</li>
                            <li><span class="font-weight-bold">Feedback and Reporting:</span> If you encounter any issues or see any content or behavior that violates these terms, report it to LVTV administrators promptly.</li>
                        </ul>
                        <p class="text-justify">
                            Failure to comply with these responsibilities may result in the suspension or termination of your access to the LVTV.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 3: Intellectual Property -->
            <div class="card mb-3">
                <div class="card-header" id="headingIntellectualProperty">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseIntellectualProperty" aria-expanded="false" aria-controls="collapseIntellectualProperty">
                            Intellectual Property
                        </button>
                    </h2>
                </div>
                <div id="collapseIntellectualProperty" class="collapse" aria-labelledby="headingIntellectualProperty" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            All content on this live streaming platform, including videos, audio, graphics, and text, is the property of LVTV or its content creators and is protected by copyright and trademark laws.
                        </p>
                        <ul>
                            <li><span class="font-weight-bold">Personal Use:</span> You may view and use the content for personal, non-commercial purposes only. Reproduction, distribution, or modification of the content without permission is prohibited.</li>
                            <li><span class="font-weight-bold">Trademarks:</span> All trademarks and logos on this platform are owned by LVTV or respective owners. Unauthorized use is prohibited.</li>
                            <li><span class="font-weight-bold">User-Generated Content:</span> By streaming or uploading content, you grant LVTV the right to use, reproduce, and display your content as necessary for platform operations.</li>
                            <li><span class="font-weight-bold">Attribution:</span> Keep all copyright notices intact on any copies of the content you make.</li>
                            <li><span class="font-weight-bold">Reporting Violations:</span> If you believe any content infringes your rights, please contact us with details.</li>
                        </ul>
                        <p class="text-justify">
                            Unauthorized use of the platform's content may result in legal action.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 4: Limitation of Liability -->
            <div class="card mb-3">
                <div class="card-header" id="headingLimitationOfLiability">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseLimitationOfLiability" aria-expanded="false" aria-controls="collapseLimitationOfLiability">
                            Limitation of Liability
                        </button>
                    </h2>
                </div>
                <div id="collapseLimitationOfLiability" class="collapse" aria-labelledby="headingLimitationOfLiability" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            By using LVTV, you agree to the following limitations of liability:
                        </p>
                        <ul>
                            <li><span class="font-weight-bold">Service Availability:</span> LVTV strives to provide a reliable live streaming service, but we do not guarantee uninterrupted or error-free operation. Service may be affected by factors beyond our control, including but not limited to internet disruptions, hardware failures, and software bugs.</li>
                            <li><span class="font-weight-bold">Content Accuracy:</span> We do not endorse or take responsibility for the accuracy, reliability, or legality of user-generated content. Views and opinions expressed in streams are those of the content creators and do not reflect our views.</li>
                            <li><span class="font-weight-bold">No Warranties:</span> The platform and its content are provided "as is" without any warranties of any kind, either express or implied. We disclaim all warranties, including but not limited to, implied warranties of merchantability, fitness for a particular purpose, and non-infringement.</li>
                            <li><span class="font-weight-bold">Limited Liability:</span> LVTV and its team are not liable for any direct, indirect, incidental, special, consequential, or punitive damages arising from your use of the platform.</li>
                            <li><span class="font-weight-bold">Third-Party Links:</span> Our platform may contain links to third-party websites or services that are not owned or controlled by LVTV. We are not responsible for the content, privacy policies, or practices of any third-party websites or services.</li>
                            <li><span class="font-weight-bold">Indemnification:</span> You agree to indemnify and hold LVTV harmless from any claims, damages, liabilities, and expenses (including reasonable attorneys' fees) arising from your use of the platform or violation of these terms.</li>
                            <li><span class="font-weight-bold">Changes to Terms:</span> We reserve the right to modify these terms at any time. Continued use of the platform constitutes acceptance of any changes.</li>
                        </ul>
                        <p class="text-justify">
                            By using this platform, you acknowledge that you understand and agree to these limitations of liability. If you do not agree, please refrain from using the platform.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 5: Termination -->
            <div class="card mb-3">
                <div class="card-header" id="headingTermination">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTermination" aria-expanded="false" aria-controls="collapseTermination">
                            Termination
                        </button>
                    </h2>
                </div>
                <div id="collapseTermination" class="collapse" aria-labelledby="headingTermination" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            Upon graduation from La Verdad Christian College - Apalot, students will lose access to LVTV. This termination is effective upon the official graduation date.
                        </p>
                        <ul>
                            <li><span class="font-weight-bold">Account Deactivation:</span> Graduated students’ accounts will be deactivated, and they will no longer be able to log in or use the platform’s services.</li>
                            <li><span class="font-weight-bold">Content Access:</span> Access to all live streams, recorded videos, and any other content on the platform will be revoked upon account deactivation.</li>
                            <li><span class="font-weight-bold">Data Retention:</span> Personal data and any user-generated content may be retained by LVTV as necessary for administrative purposes, in accordance with our privacy policy. Graduated students may contact us to request deletion of their data.</li>
                        </ul>
                        <p class="text-justify">
                            By using this platform, students acknowledge and agree to these terms regarding termination upon graduation. If there are any questions or concerns, please contact our support team.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 6: Contact Information -->
            <div class="card mb-3">
                <div class="card-header" id="headingContactInformation">
                    <h2 class="mb-0">
                        <button class="btn btn-link font-weight-bold text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseContactInformation" aria-expanded="false" aria-controls="collapseContactInformation">
                            Contact Information
                        </button>
                    </h2>
                </div>
                <div id="collapseContactInformation" class="collapse" aria-labelledby="headingContactInformation" data-parent="#accordionTermsOfUse">
                    <div class="card-body">
                        <p class="text-justify">
                            If you have any questions, concerns, or feedback regarding our platform, please feel free to reach out to us using the following contact information:
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold">General Inquiries</h3>
                                <ul>
                                    <li>Email: info@[yourplatformname].com</li>
                                    <li>Phone: (123) 456-7890</li>
                                    <li>Address: McArthur Highway, Sampaloc, Apalit, Pampanga</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="font-weight-bold">Technical Support</h3>
                                <ul>
                                    <li>Email: support@LVTV.com</li>
                                    <li>Phone: 09XXXXXXXXX</li>
                                    <li>Support Hours: Monday to Friday, 9:00 AM - 5:00 PM</li>
                                </ul>
                            </div>
                        </div>

                        <h3 class="font-weight-bold">Privacy Concerns</h3>
                        <ul>
                            <li>Email: dpo@laverdad.edu.ph</li>
                        </ul>

                        <p class="text-justify">
                            For a quicker response, please include your name, contact details, and a brief description of your inquiry in your email. We aim to respond to all queries within 48 hours.
                        </p>

                        <p class="text-justify">
                            Thank you for using LVTV!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
