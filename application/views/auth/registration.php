<div class="container">

    <div class="row justify-content-center">

        <div class="col-5">

            <div class="card">

                <div class="card-body">

                <form class="user" method="POST" action="<?= base_url('auth/registration') ?>">

                <div class="form-row">
                    <div class="col mb-3">
                        <label for="Name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                        <label for="Email">Email address</label>
                        <input type="text" class="form-control" id="Email" name="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password1" name="password1">
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col mb-3">
                        <label for="Password">Repeat Password</label>
                        <input type="password" class="form-control" id="Password2" name="password2">
                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </form>

                <hr>

                    <div class="text-center">
                        <a href="<?= base_url('auth') ?>">Login</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>