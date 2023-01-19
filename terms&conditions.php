<?php
session_start();
include("config/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Secrery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Secrery">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="assets/css/icons.css">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/uikit.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="unpkg.com/tailwindcss%402.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="assets/css/toastr.min.css" rel="stylesheet">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>


</head>
<body>


<div id="wrapper">

    <!-- Header -->
    <header>
        <div class="header_wrap">
            <div class="header_inner mcontainer">
                <div class="left_side">
                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path
                                        d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z"
                                        fill="currentColor"></path></svg>
                        </span>
                    <div id="logo">
                        <a href="#">
                            <span>Secrery</span>
                            <!--<img src="assets/images/logo.png" alt="">
                            <img src="assets/images/logo-mobile.png" class="logo_mobile" alt="">-->
                        </a>
                    </div>
                </div>

                <!-- search icon for mobile -->
                <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
                <div class="header_search"><i class="uil-search-alt"></i>
                    <input value="" type="text" class="form-control"
                           placeholder="Search" autocomplete="off">
                    <!-- -->
                </div>
                <?php
                include("include/head_right.php");
                ?>
            </div>
        </div>
    </header>

    <!-- sidebar -->
    <div class="sidebar">

        <div class="sidebar_inner" data-simplebar>

             

                <!--industry section starts-->
                <?php include("include/industry_menu.php"); ?>
                <!--industry section ends-->

        </div>

        <!-- sidebar overly for mobile -->
        <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

    </div>

    <!-- Main Contents -->
    <div class="main_content">

        <div class="mcontainer">

            <div class="bg-white max-w-4xl mx-auto md:p-10 p-6 relative rounded-md shadow">

                <div class="md:space-y-6 space-y-4 text-gray-400 md:text-lg">

                    <div class="md:leading-8 leading-7"> Updated November 24, 2022</div>
                    <div class="font-semibold md:text-2xl text-xl text-gray-700"> TERMS & DATA PRIVACY</div>
                    <div class="md:leading-8 leading-7"> Version 1.1, Revision 1</div>

                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 1 – Introduction</div>
                    <div class="md:leading-8 leading-7"> At gongsecrets.com we respect the privacy and confidentiality
                        of the personal data of our Clients, Associates and others whom we interact with in the course
                        of providing our services. We are committed to implementing policies, practices and processes to
                        safeguard the collection
                        We have developed this Data Privacy Notice to assist you in understanding how we collect, use,
                        disclose, process, protect and retain your personal data that is in our possession.
                    </div>

                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 2 – How We Collect
                        Your Personal Data
                    </div>
                    <div class="md:leading-8 leading-7"> Personal data refers to any information that can uniquely
                        identify an individual person (a) on its own, or (b) when combined with other information. Under
                        the PDPA, business contact information (e.g. full name, business address, business telephone
                        number) is not considered as personal data so long as it is used strictly for
                        business-to-business (B2B) transactions.
                        We collect your personal data when you:<br><br>
                        <ol>
                            <li>Register an account on our forums at gongsecrets.com</li>
                            <li>Enquire about media invitations/releases</li>
                            <li>Work with us for advertorials or campaigns</li>
                            <li>Visit our website and leave behind your contact information through our contact form
                            </li>
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 3 – Types of Personal
                        Data We Collect About You
                    </div>
                    <div class="md:leading-8 leading-7">The types of personal data we collect about you include:
                        <br><br>
                        <ol>
                            <li>Your contact information (Name, Email Address)</li>
                            <li>Your personal details (Name)</li>
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 4 – How We Use Your
                        Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">The types of personal data we collect about you include:
                        <br><br>
                        <ol>
                            <li>Analyse your visits to our website</li>
                            <li>Conduct joint marketing with other companies and service providers</li>
                            <li>Communicate with customers, members and website visitors</li>
                            <li>Respond to your inquiries and feedback to improve our quality of service</li>
                            <li>Analyse the use of our products, services or websites</li>
                            <li>Comply with or fulfil legal obligations and regulatory requirements</li>
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 5 – Who We Disclose
                        Your Personal Data To
                    </div>
                    <div class="md:leading-8 leading-7">We disclose some of the personal data you provide us to the
                        following entities or organisations outside Salary.sg in order to fulfil our services to you:
                        <br><br>
                        <ol>
                            <li>EDM/Email Service Vendors</li>
                            <li>Cloud Service Providers</li>
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 6 – How We Manage the
                        Collection, Use and Disclosure of Your Personal Data
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 6.1 Obtaining
                        Consent
                    </div>
                    <div class="md:leading-8 leading-7">Before we collect, use or disclose your personal data, we will
                        notify you of the purpose why we are doing so. We will obtain written confirmation from you on
                        your expressed consent. We will not collect more personal data than is necessary for the stated
                        purpose. We will seek fresh consent from you if the original purpose for the collection, use or
                        disclosure of your personal data has changed.
                    </div>
                    <div class="md:leading-8 leading-7">Under certain circumstances, we may assume deemed consent from
                        you when you voluntarily provide your personal data for the stated purpose, e.g. when you apply
                        for a job with us by sending in your resume/CV containing personal information.
                    </div>
                    <div class="md:leading-8 leading-7">We may rely on exceptions to the need for consent under the PDPA
                        for the collection, use or disclosure of your personal data under the following circumstances
                        (only those relevant to Salary.sg are included):
                    </div>
                    <div class="md:leading-8 leading-7">
                        <ol>
                            <li>The personal data is publicly available</li>
                            <li>The personal data is disclosed by a public agency or disclosed to a public agency</li>
                            <li>The personal data is necessary for any investigation or proceedings</li>
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 6.2 Withdrawal of
                        Consent
                    </div>
                    <div class="md:leading-8 leading-7">If you wish to withdraw consent, you should give us reasonable
                        advance notice. We will advise you of the likely consequences of your withdrawal of consent,
                        e.g. without your personal contact information we may not be able to inform you of future
                        services offered by us.
                    </div>
                    <div class="md:leading-8 leading-7">Your request for withdrawal of consent can take the form of an
                        email or letter to us, or through the “Unsubscribe” feature in an online service
                    </div>

                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 6.3 Use of Cookies
                    </div>

                    <div class="md:leading-8 leading-7">We use “cookies” to collect information about your online
                        activity on our website. A cookie is a small text file created by the website that is stored in
                        your computer to provide a way for the website to recognise you and keep track of your
                        preferences. The cookie makes it convenient for you such that you do not have to retype the same
                        information again when you revisit the website or in filling electronic forms.
                    </div>
                    <div class="md:leading-8 leading-7">Most cookies we use are “session cookies”, which will be deleted
                        automatically from the hard disk of your computer at the end of the session.
                    </div>
                    <div class="md:leading-8 leading-7">You may choose not to accept cookies by turning off this feature
                        in your web browser. Note that by doing so, you may not be able to use some of the features and
                        functions in our web applications.
                    </div>

                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10"> 6.4 Third-Party
                        Consent
                    </div>

                    <div class="md:leading-8 leading-7">We do not get consent on behalf of another individual. We only
                        get consent from the individual who will be dealing directly with us.
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">7 – How We Ensure the
                        Accuracy of Your Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">We will take reasonable steps to ensure that the personal data
                        we collect about you is accurate, complete, not misleading and kept up-to-date.
                    </div>
                    <div class="md:leading-8 leading-7">From time to time, we may do a data verification exercise for
                        you to update us on any changes to the personal data we hold about you. If we are in an ongoing
                        relationship with you, it is important that you update us of any changes to your personal data
                        (such as a change in your email address).
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">8 – How We Protect Your
                        Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">We have implemented appropriate information security and
                        technical measures (such as data encryption, firewalls and secure network protocols) to protect
                        the personal data we hold about you against loss; misuse; destruction; unauthorised
                        alteration/modification, access, disclosure; or similar risks.
                        We have also put in place reasonable and appropriate organisational measures to maintain the
                        confidentiality and integrity of your personal data, and will only share your data with
                        authorised persons on a ‘need to know’ basis.
                        When we engage third-party data processors to process personal data on our behalf, we will
                        ensure that they provide sufficient guarantees to us to have implemented the necessary
                        organisational and technical security measures, and have taken reasonable steps to comply with
                        these measures.
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">9 – How We Retain Your
                        Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">We have a document retention policy that keeps track of the
                        retention schedules of the personal data you provide us, in paper or electronic forms. We will
                        not retain any of your personal data when it is no longer needed for any business or legal
                        purposes.
                        We will dispose of or destroy such documents containing your personal data in a proper and
                        secure manner when the retention limit is reached.
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">10 – How You Can Access
                        and Make Correction to Your Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">You may write in to us to find out how we have been using or
                        disclosing your personal data over the past one year. Before we accede to your request, we may
                        need to verify your identity by checking your NRIC or other legal identification document. We
                        will respond to your request as soon as possible, or within 30 days from the date we receive
                        your request. If we are unable to do so within the 30 days, we will let you know and give you an
                        estimate of how much longer we require. We may also charge you a reasonable fee for the cost
                        involved in processing your access request.
                    </div>
                    <div class="md:leading-8 leading-7">If you find that the personal data we hold about you is
                        inaccurate, incomplete, misleading or not up-to-date you may ask us to correct the data. Where
                        we are satisfied on reasonable grounds that a correction should be made, we will correct the
                        data as soon as possible, or within 30 days from the date we receive your request.
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">11 – Transfer of
                        Personal Data
                    </div>
                    <div class="md:leading-8 leading-7">Where there is a need to transfer your personal data to another
                        country outside Singapore, we will ensure that the standard of data protection in the recipient
                        country is comparable to that of Singapore’s PDPA. If this is not so, we will enter into a
                        contractual agreement with the receiving party to accord similar levels of data protection as
                        those in Singapore.
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">12 – Contacting Us
                    </div>
                    <div class="md:leading-8 leading-7">If you have any query or feedback regarding this Notice, or any
                        complaint you have relating to how we manage your personal data, you may contact our Data
                        Protection Officer (DPO) at: contact@gongsecrets.com
                        Any query or complaint should include, at least, the following details:
                    </div>
                    <div class="md:leading-8 leading-7">
                        <ol>
                            <li>Your full name and contact information</li>
                            <li>Brief description of your query or complaint</li><br>
                            We treat such queries and feedback seriously and will deal with them confidentially and within reasonable time.
                        </ol>
                    </div>
                    <div class="font-semibold md:text-2xl text-2xl text-gray-700 md:pt-12 pt-10">13 – Changes to this Data Privacy Notice
                    </div>
                    <div class="md:leading-8 leading-7">
                        We may update this Data Privacy Notice from time to time. We will notify you of any changes by posting the latest Notice on our website. Please visit our website periodically to note any changes.
                        Changes to this Notice take effect when they are posted on our website.<br>
                        Last updated: 24 Nov 2022

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);

    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);

    function alertCompany(){
        alert("Please add a company email to your profile first!");
    }
</script>

<!-- Javascript
================================================== -->

<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/toastr-init.js"></script>

</body>


</html>