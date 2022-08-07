    <x-modal size="modal-lg" data-backdrop="static" data-keyboard="false">
        <x-slot name="title">
            Tambah
        </x-slot>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" required
                        placeholder="Nama lengkap">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off"
                        required placeholder="Username">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" autocomplete="off" required
                        placeholder="Email">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off"
                        required placeholder="Password">
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-modal>
