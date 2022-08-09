    <x-modal size="modal-lg" data-backdrop="static" data-keyboard="false">
        <x-slot name="title">
            Tambah
        </x-slot>

        @method('POST')
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
                    <label for="roles">Roles</label>
                    <select name="roles[]" id="roles" multiple required class="form-control select2">
                       @foreach ($roles as $id => $role)
                           <option value="{{ $role->id }} {{ in_array($role->id, old('roles', [])) ? 'selected' : '' }}">{{ $role->title }}</option>
                       @endforeach
                    </select>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="submitForm(this.form)" class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-modal>
