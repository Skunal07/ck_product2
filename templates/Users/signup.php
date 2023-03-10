<body>
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <?= $this->element('flash/navbar') ?>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center signupbimage">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header">
                                <?= $this->Flash->render()  ?>
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p class="mb-0">Enter your email and password to register</p>
                            </div>
                            <div class="card-body">
                                <?= $this->Form->create($user, ['id' => 'regform']) ?>
                                <fieldset>
                                    <?= $this->Form->error('name')  ?>
                                    <label id="name-error" class="error" for="name"></label>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Name</label>
                                        <?= $this->Form->input('name', ['required' => 'false', 'type' => 'text', 'class' => 'form-control']) ?>
                                    </div>
                                    <?= $this->Form->error('email')  ?>
                                    <label id="email-error" class="error" for="email"></label>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <?= $this->Form->input('email', ['required' => 'false', 'label' => false, 'type' => 'email', 'id' => 'email', 'class' => 'form-control', "data-validity-message" => "Please enter your email", "oninvalid" => "this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)", "oninput" => "this.setCustomValidity('')", "aria-required" => "true"]) ?>
                                        <div class="error-message" id="email-error"></div>
                                    </div>
                                    <?= $this->Form->error('password')  ?>
                                    <label id="password-error" class="error" for="password"></label>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <?= $this->Form->input('password', ['required' => 'false', 'type' => 'password', 'id' => 'password', 'class' => 'form-control']) ?>
                                    </div>
                                    <label id="checkbox-error" class="error" for="checkbox"></label>
                                    <div class="form-check form-check-info text-start ps-0">
                                        <input class="form-check-input" type="checkbox" name="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </fieldset>
                                <div class="text-center">
                                    <?= $this->Form->button(__('Sign Up'), ["class" => "btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"]) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Already have an account?
                                    <a href="../pages/sign-in.html" class="text-primary text-gradient font-weight-bold">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>