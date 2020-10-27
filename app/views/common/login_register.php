<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PTKI.Inc | Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?= BASEURL ?>/asset3/css/style.css">
    <link rel="icon" href="<?= BASEURL; ?>/asset/images/fevicon/fevicon.png" type="image/png" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="logmod" >   
        <div class="logmod__wrapper">
            <span class="logmod__close">Close</span>
            <div class="logmod__container">
                <ul class="logmod__tabs">
                    <li data-tabtar="lgm-2"><a href="#">Login</a></li>
                    <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
                </ul>
                <!-- REGISTER -->
                <div class="logmod__tab-wrapper">
                    <div class="logmod__tab lgm-1">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
                        </div>
                        <div class="logmod__form">
                            <form method="POST" action="<?= BASEURL;?>/Account/createAccount" accept-charset="utf-8" action="#" class="simform">
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="form-group" for="user-name">Username*</label>
                                        <input class="form-control" maxlength="255" id="username" name="username" placeholder="Username" type="text" size="50" />
                                        <div class="error">
                                            <?php if(!empty($data['usernameError'])) : echo $data['usernameError']; endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="form-group" for="user-name">Nama*</label>
                                        <input class="form-control" maxlength="255" id="nama" name="nama" placeholder="Nama" type="text" size="50" />
                                        <div class="error">
                                          <?php if(!empty($data['namaError'])) : echo $data['namaError']; endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="form-group" for="user-name">Email*</label>
                                        <input class="form-control" maxlength="255" id="email" name="email" placeholder="Email" type="email" size="50" />
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="form-group" for="user-pw">Password *</label>
                                        <input class="form-control" maxlength="255" id="password" name="password" placeholder="Password" type="text" size="50" />
                                        <div class="error">
                                          <?php if(!empty($data['passwordError'])) : echo $data['passwordError']; endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="simform__actions">
                                    <button class="sumbit" name="submit" type="sumbit" value="submit" id="submit">
                                        Register
                                    </button>
                                    <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                    <!-- LOGIN -->
                    <div class="logmod__tab lgm-2">
                        <div class="logmod__heading">
                            <span class="logmod__heading-subtitle">Enter your username and password <strong>to sign in</strong></span>
                        </div>
                        <div class="logmod__form">
                            <form method="POST" action="<?= BASEURL;?>/Account/checkingLogin" accept-charset="utf-8" action="#" class="simform">
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" for="user-name">Username*</label>
                                        <input class="string optional" maxlength="255" id="username" name="username" placeholder="username" type="text" size="50" />
                                    </div>
                                </div>
                                <div class="sminputs">
                                    <div class="input full">
                                        <label class="string optional" for="user-pw">Password *</label>
                                        <input class="string optional" maxlength="255" id="password" name="password" placeholder="Password" type="password" size="50" />
                                        <span class="hide-password">Show</span>
                                    </div>
                                </div>
                                <div class="simform__actions">
                                    <button class="sumbit" name="submit" type="sumbit" value="submit" id="submit">
                                        Login
                                    </button>
                                    <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?= BASEURL ?>/asset3/js/script.js"></script>

</body>

</html>