
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Talent Marine</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome-5.14.0.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
  </head>
  <body>
    <section id="formWizard" class="register_section">
        <div class="register_left">
            <div class="login_header">
                <a href="">
                    <img src="{{ asset('assets/frontend/images/logo.svg') }}">
                </a>
            </div>

            <ul class="form_items step_headers">
                <li class="step_header active">
                    <span class="number">1</span>
                    <div class="list_item">
                        <h6>Login details</h6>
                        <p>Please provide your name,email & mobile number</p>
                    </div>
                </li>
                <li class="step_header">
                    <span class="number">2</span>
                    <div class="list_item">
                        <h6>OTP verification</h6>
                        <p>Verify your email address or mobile number</p>
                    </div>
                </li>
                <li class="step_header">
                    <span class="number">3</span>
                    <div class="list_item">
                        <h6>Choose a password</h6>
                        <p>Create a strong password</p>
                    </div>
                </li>
                <li class="step_header">
                    <span class="number">4</span>
                    <div class="list_item">
                        <h6>Your professional information</h6>
                        <p>Please provide your professional information</p>
                    </div>
                </li>
            </ul>
        
            <div class="login_footer">
                <a href="#" class="email_btn">
                    <figure>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33329 3.33325H16.6666C17.5833 3.33325 18.3333 4.08325 18.3333 4.99992V14.9999C18.3333 15.9166 17.5833 16.6666 16.6666 16.6666H3.33329C2.41663 16.6666 1.66663 15.9166 1.66663 14.9999V4.99992C1.66663 4.08325 2.41663 3.33325 3.33329 3.33325Z" stroke="black" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.3333 5L9.99996 10.8333L1.66663 5" stroke="black" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                                
                    </figure>
                    <figcaption>
                        support@talentmarine.com
                    </figcaption>
                </a>
                <p>©2023 Talent Marine.</p>
            </div>
        </div>

        <form class="register_right" id="wizardForm" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="login_block step active">
                <h6>For Candidates</h6>
                <h2>Create an account</h2>
        
                <div class="form-group">
                    <x-input-label for="name" :value="__('Full Name')" class="control-label" />
                    <x-text-input id="name" class="block mt-1 w-full textbox" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email Address')" class="control-label" />
                    <x-text-input id="email" class="block mt-1 w-full textbox" type="email" name="email" :value="old('email')" required autocomplete="off" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group">
                    <x-input-label for="phone" :value="__('Contact Number')" class="control-label" />
                    <x-text-input id="phone" class="block mt-1 w-full textbox" type="tel" name="phone" :value="old('phone')" required autocomplete="off" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>        
                <div class="form-group m-0">
                    <button type="button" class="submit_btn" onclick="nextStep()">Continue</button>
                </div>
            </div>
            <div class="login_block step">
                <h6>For Candidates</h6>
                <h2 class="mb-3">Enter Verification Code</h2>
                <div class="form-group">
                    <p class="text-muted">A verification code has been sent to your register mobile number</p>
                </div>
                <div class="form-group mb-5">
                    <label class="control-label">Mobile Verification Code</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <p class="text-muted">A verification code has been sent to your register email</p>
                </div>
                <div class="form-group">
                    <label class="control-label">Email  Verification Code</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <p class="m-0">Either mobile or email verification is required to continue.</p>
                </div>        
                <div class="form-group m-0">
                    <button type="button" class="submit_btn" onclick="nextStep()">Continue</button>
                </div>
            </div>

            <div class="login_block step">
                <h6>For Candidates</h6>
                <h2 class="mb-3">Choose a password</h2>
                <div class="form-group">
                    <p class="text-muted">Must be at least 8 characters and include  uppercase, lowercase, number & special characters.</p>
                </div>
                <div class="form-group">
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="textbox">
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="textbox">
                </div>      
                <div class="form-group m-0">
                    <button type="button" class="submit_btn" onclick="nextStep()">Continue</button>
                </div>
            </div>

            <div class="login_block step">
                <h6>For Candidates</h6>
                <h2>Complete Details</h2>
                <div class="form-group">
                    <label class="control-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" class="textbox">
                    <div id="passwordHelpBlock" class="form-text">Current / Last Job Title</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Company</label>
                    <input type="text" class="textbox">
                    <div id="passwordHelpBlock" class="form-text">Current / Last employer</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Date of birth <span class="text-danger">*</span></label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <label class="control-label">Gender <span class="text-danger">*</span></label>
                    <select class="textbox">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Current Address <span class="text-danger">*</span></label>
                    <input type="text" class="textbox" placeholder="Location">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <select class="textbox">
                                <option>Country</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="textbox">
                                <option>State</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="textbox" placeholder="City">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="textbox" placeholder="Pin Code">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Nationality <span class="text-danger">*</span></label>
                    <select class="textbox">
                        <option></option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Residency / Visa</label>
                    <select class="textbox">
                        <option></option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">INDOS Number</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <label class="control-label">COC Grade</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <label class="control-label">COC Number</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group">
                    <label class="control-label">Other Qualification</label>
                    <input type="text" class="textbox">
                </div>
                <div class="form-group form_inline">
                    <label class="control-label">Internal Auditor Course</label>
                    <div class="checkbox_inline">
                        <label>
                            <input type="radio" name="auditor"><i></i> Yes
                        </label>
                        <label>
                            <input type="radio" name="auditor"><i></i> No
                        </label>
                    </div>
                </div>
                <div class="form-group form_inline">
                    <label class="control-label">Lead Auditor Course</label>
                    <div class="checkbox_inline">
                        <label>
                            <input type="radio" name="lead"><i></i> Yes
                        </label>
                        <label>
                            <input type="radio" name="lead"><i></i> No
                        </label>
                    </div>
                </div>
                <div class="form-group form_inline">
                    <label class="control-label">VICT / AECS Course</label>
                    <div class="checkbox_inline">
                        <label>
                            <input type="radio" name="aecs"><i></i> Yes
                        </label>
                        <label>
                            <input type="radio" name="aecs"><i></i> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Any other specialized course</label>
                    <input type="text" class="textbox">
                </div>

                <div class="form-group">
                    <label class="control-label">Upload CV <span class="text-danger">*</span></label>
                    <label class="file-upload-wrapper">
                        <span class="file-upload-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 8L12 3L7 8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 3V15" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                        </span>
                        <span class="file-upload-text" id="file-name">Choose Files</span>
                        <input type="file" class="file-upload-input" onchange="updateFileName(event)">
                    </label>
                    <div id="passwordHelpBlock" class="form-text">5 MB / Doc, Pdf, Excel</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="control-label">Availability</label>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="textbox" placeholder="From">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="textbox" placeholder="To">
                        </div>
                    </div>
                </div>

                <div class="form-group form_inline">
                    <label class="control-label">Job Interested <span class="text-danger">*</span></label>
                    <div class="checkbox_inline">
                        <label>
                            <input type="radio" name="job"><i></i> Full Time
                        </label>
                        <label>
                            <input type="radio" name="job"><i></i> Part Time
                        </label>
                    </div>
                </div>
                <div class="form-group form_inline">
                    <label class="control-label">Willing to be available 24/7 for urgent needs</label>
                    <div class="checkbox_inline">
                        <label>
                            <input type="radio" name="available"><i></i> Yes
                        </label>
                        <label>
                            <input type="radio" name="available"><i></i> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Additional Information</label>
                    <textarea class="textarea" placeholder="Job preferences, past experiences, preferred location, expected salary, notice period, or any other additional details"></textarea>
                </div>
                <div class="form-group form_inline">
                    <div class="checkbox_inline">
                        <label>
                            <input type="checkbox" name="available"><i></i> <span>I have read <a href="#">Terms & Conditions</a></span>
                        </label>
                    </div>
                </div>

                <div class="form-group m-0">
                    <button type="submit" class="submit_btn">Submit</button>
                </div>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script  src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/intlTelInput.min.js"></script>
    <script>
        const phoneInput = document.querySelector("#phone");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["us", "in", "gb"],
            geoIpLookup: callback => {
            fetch('https://ipapi.co/json')
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback('us'));
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/utils.js", // optional, for formatting/validation
        });
    </script>

  </body>
</html>