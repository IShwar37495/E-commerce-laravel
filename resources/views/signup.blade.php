<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
<div id="notification" class="notification"></div>
<div id="container" class="container">
    <div class="row">
        <!-- SIGN UP -->
        <div class="col align-items-center flex-col sign-up">
            <div class="form-wrapper align-items-center">
           
                <form action="" class="form sign-up" id="signupForm">
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="Username" id="signUpUserName">
                    </div>
                    <div class="input-group">
                        <i class='bx bx-mail-send'></i>
                        <input type="email" placeholder="Email" id="signUpUserEmail">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password" id="signUpUserPassword">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Confirm password" id="signUpUserConfirmPassword">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="number" placeholder="Phone Number" id="signUpUserPhone">
                    </div>
                    <button type="submit" id="submitButtonForSignup" class="btn btn-primary">
    <span id="buttonText">Sign up</span>
    <div id="spinner" class="spinner-border text-white" role="status" style="display:none;">
        <span class="visually-hidden">Loading...</span>
    </div>
</button>
                    <p>
                        <span>Already have an account?</span>
                        <b onclick="toggle()" class="pointer">Sign in here</b>
                    </p>
                </form>
            </div>
        </div>
        <!-- END SIGN UP -->

        <!-- SIGN IN -->
        <div class="col align-items-center flex-col sign-in">
            <div class="form-wrapper align-items-center">
                <form action="" class="form sign-in" id="loginForm">
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="email" placeholder="Email" id="loginUserEmail">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password" id="loginUserPassword">
                    </div>
                    <button type="submit" id="submitButtonForLogin" class="btn btn-primary">
                        <span id="buttonTextForLogin">Sign In</span>
                        <div id="spinnerForLogin" class="spinner-border text-white" role="status" style="display:none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                            </button>
                    <p>
                        <b>Forgot password?</b>
                    </p>
                    <p>
                        <span class="pointer"><label for="signupLink">Don't have an account?</label></span>
                        <b onclick="toggle()" class="pointer" name="signupLink">Sign up here </b>
                    </p>
                </form>
            </div>
        </div>
        <!-- END SIGN IN -->
    </div>

    <!-- CONTENT SECTION -->
    <div class="row content-row">
        <!-- SIGN IN CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="text sign-in">
                <h2>Welcome</h2>
            </div>
            <div class="img sign-in">
                <!-- Sign in image -->
            </div>
        </div>
        <!-- END SIGN IN CONTENT -->

        <!-- SIGN UP CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="img sign-up">
                <!-- Sign up image -->
            </div>
            <div class="text sign-up">
                <h2>Join with us</h2>
            </div>
        </div>
        <!-- END SIGN UP CONTENT -->
    </div>
</div>
<script src="{{ asset('js/signup.js') }}"></script>
@routes
</body>
</html>

