<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

        :root {
            --first-color: rgb(138, 206, 187);
            --first-color-dark: #35826d;
            --first-color-light: #a49eac;
            --first-color-lighten: #f2f2f2;


            --body-font: 'Open Sans', sans-serif;
            --h1-font-size: 1.5rem;
            --normal-font-size: .938rem;
            --small-font-size: .813rem;

        }

        @media screen and (min-width: 768px) {
            :root {
                --normal-font-size: 1rem;
                --small-font-size: .875rem;
            }
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            color: var(--first-color-dark);
        }

        h1 {
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
            height: auto;
        }

        .login {
            display: grid;
            grid-template-columns: 100%;
            height: 100vh;
            margin-left: 1.5rem;
            margin-right: 1.5rem;
        }

        .login__content {
            display: grid;
        }

        .login__img {
            justify-self: center;
        }

        .login__img img {
            width: 310px;
            margin-top: 1.5rem;
        }

        .login__forms {
            position: relative;
            text-align: center;
            height: 368px;
        }

        .login__registre,
        .login__create {
            position: absolute;
            bottom: 1rem;
            background-color: var(--first-color-lighten);
            padding: 2rem 1rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: 0 8px 20px rgb(1, 54, 27);
            animation-duration: .4s;
            animation-name: animate-login;
        }

        @keyframes animate-login {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(1.1, 1.1);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .login__title {
            font-size: var(--h1-font-size);
            margin-bottom: 2rem;
        }

        .login__box {
            display: grid;
            grid-template-columns: max-content 1fr;
            column-gap: .5rem;
            padding: 1.125rem 1rem;
            background-color: #fff;
            margin-top: 1rem;
            border-radius: .5rem;
        }

        .login__icon {
            font-size: 1.5rem;
            color: var(--first-color);
        }

        .login__input {
            border: none;
            outline: none;
            font-size: var(--normal-font-size);
            font-weight: 700;
            color: var(--first-color-dark);
        }

        .login__input::placeholder {
            font-size: var(--normal-font-size);
            font-family: var(--body-font);
            color: var(--first-color-light);
        }

        .login__button {
            display: block;
            width: 100%;
            outline: none;
            padding: 1rem;
            margin: 2rem 0;
            background-color: var(--first-color);
            color: #fff;
            font-weight: 600;
            text-align: center;
            border-radius: .5rem;
            transition: .3s;
            box-shadow: none !important;
        }

        .login__button:hover {
            background-color: var(--first-color-dark);
        }

        .login__account,
        .login_signin,
        .login_signup {
            font-weight: 600;
            font-size: var(--small-font-size);
        }

        .login__account {
            color: var(--first-color-dark);
        }

        .login_signin,
        .login_signup {
            color: var(--first-color);
            cursor: pointer;
        }

        #sign-in,
        #sign-up {
            color: var(--first-color);
            cursor: pointer;
        }

        .block {
            display: block;
        }

        .none {
            display: none;
        }

        @media screen and (min-width: 576px) {
            .login__forms {
                width: 348px;
                justify-self: center;
            }
        }

        @media screen and (min-width: 1024px) {
            .login {
                height: 100vh;
                overflow: hidden;
            }

            .login__content {
                grid-template-columns: repeat(2, max-content);
                justify-content: center;
                align-items: center;
                margin-left: 10rem;
            }

            .login__img {
                display: flex;
                width: 600px;
                height: 588px;
                background-color: var(--first-color-lighten);
                border-radius: 1rem;
                padding-left: 1rem;
            }

            .login__img img {
                width: 390px;
                margin-top: 0;
            }

            .login__registre,
            .login__create {
                left: -11rem;
            }

            .login__registre {
                bottom: -2rem;
            }

            .login__create {
                bottom: -5.5rem;
            }

            .bg-light {
                background-color: rgb(138, 206, 187) !important;
            }
        }
    </style>
</head>

<body>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="<?php echo base_url(); ?>assets/img/login.svg" alt="">
            </div>


            <div class="login__forms">
                <form action="<?php echo base_url(); ?>auth" method="post" class="login__registre block" id="login-in">
                    <h1 class="login__title">Log In</h1>

                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="username" class="login__input" placeholder="Username">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
                    <div class="login__box">
                        <i class='bx bx-lock login__icon'></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('password'); ?></small>

                    <button type="submit" class="login__button btn btn-light">Sign In</button>
                    <div>
                        <span class="login__account">Anda belum punya akun?</span>
                        <span class="login__signin" id="sign-up">Registrasi</span>
                    </div>
                </form>

                <form action="<?php echo base_url(); ?>auth/register" method="post" class="login__create none" id="login-up">
                    <h1 class="login__title">Buat Akun</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="username" class="login__input" placeholder="Username">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="email" name="email" class="login__input" placeholder="Email">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('email'); ?></small>
                    <div class="login__box">
                        <i class='bx bx-lock login__icon'></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('password'); ?></small>

                    <button type="submit" class="login__button btn btn-light">Sign Up</button>
                    <div>
                        <span class="login__account">Sudah punya akun?</span>
                        <span class="login__signup" id="sign-in">Log In</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const signUp = document.getElementById('sign-up'),
            signIn = document.getElementById('sign-in'),
            loginIn = document.getElementById('login-in'),
            loginUp = document.getElementById('login-up')

        signUp.addEventListener('click', () => {
            loginIn.classList.remove('block')
            loginUp.classList.remove('none')

            loginIn.classList.add('none')
            loginUp.classList.add('block')
        })

        signIn.addEventListener('click', () => {
            loginIn.classList.remove('none')
            loginUp.classList.remove('block')

            loginIn.classList.add('block')
            loginUp.classList.add('none')
        })
    </script>
</body>

</html>