<div class="container">

    <div class="row justify-content-center">

        <div class="col-5 mt-5">

            <div class="card">

                <div class="card-body">

                <form method="POST" action="<?= base_url('auth') ?>">

                <?= $this->session->flashdata('message'); ?>

                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="text" class="form-control" id="Email" name="email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" value="<?= set_value('email') ?>">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>

                <hr>

                    <div class="text-center">
                        <a href="<?= base_url('auth/registration') ?>">Registration</a>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>