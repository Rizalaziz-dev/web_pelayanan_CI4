<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Back/users/update_data', ['class' => 'form_edit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <!-- form-group -->

                <div class="form-group row">
                    <label for="user_email" class="col-sm-2 col-form-label">
                        Email<span class="tx-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input id="user_email" name="user_email" type="email" class="form-control" placeholder="User Email" maxlength="255" autocomplete="off" value="<?= $user_email ?>">
                    </div>
                </div>

                <!-- form-group -->

                <div class="form-group row">
                    <label for="user_fullname" class="col-sm-2 col-form-label">
                        Fullname<span class="tx-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input id="user_fullname" name="user_fullname" type="text" class="form-control" placeholder="User Fullname" maxlength="150" autocomplete="off" value="<?= $user_fullname ?>" />
                    </div>
                </div>

                <!-- form-group -->

                <div class="form-group row">
                    <label for="user_phonenumber" class="col-sm-2 col-form-label">
                        No HP<span class="tx-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input id="user_phonenumber" name="user_phonenumber" type="text" class="form-control" autocomplete="off" placeholder="08x xxxx xxxx" maxlength="16" value="<?= $user_phonenumber ?>" />
                        <div class="invalid-feedback errorPhonenumber">
                        </div>
                    </div>
                </div>

                <!-- form-group -->

                <div class="form-group row">
                    <label for="user_level" class="col-sm-2 col-form-label">
                        Group<span class="tx-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select id="user_level" name="user_level" class="form-control select2" autocomplete="off">
                            <option value="">--Select Group--</option>
                            <option value="Admin" <?php if ($user_level == 'Admin') echo "selected" ?>>Admin</option>
                            <option value="Pidum" <?php if ($user_level == 'Pidum') echo "selected" ?>>Pidum</option>
                        </select>
                    </div>
                </div>

                <!-- form-group -->

                <div class="form-group row">
                    <label for="user_password" class="col-sm-2 col-form-label">
                        Password<span id="spn_user_password" class="tx-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input id="user_password" name="user_password" type="password" class="form-control" placeholder="User Password" maxlength="255" autocomplete="off" value="<?= $user_password ?>" />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-save">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form_edit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btn-save').attr('disable', 'disabled');
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-save').removeAttr('disable');
                    $('.btn-save').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.user_email) {
                            $('#user_email').addClass('is-invalid')
                            $('.errorEmail').html(response.error.user_email);
                        } else {
                            $('#user_email').removeClass('is-invalid')
                            $('.errorEmail').html('');
                        }
                        if (response.error.user_fullname) {
                            $('#user_fullname').addClass('is-invalid')
                            $('.errorFullname').html(response.error.user_fullname);
                        } else {
                            $('#user_fullname').removeClass('is-invalid')
                            $('.errorFullname').html('');
                        }
                        if (response.error.user_phonenumber) {
                            $('#user_phonenumber').addClass('is-invalid')
                            $('.errorPhonenumber').html(response.error.user_phonenumber);
                        } else {
                            $('#user_phonenumber').removeClass('is-invalid')
                            $('.errorPhonenumber').html('');
                        }
                        if (response.error.user_level) {
                            $('#user_level').addClass('is-invalid')
                            $('.errorLevel').html(response.error.user_level);
                        } else {
                            $('#user_level').removeClass('is-invalid')
                            $('.errorLevel').html('');
                        }
                        if (response.error.user_password) {
                            $('#user_password').addClass('is-invalid')
                            $('.errorPassword').html(response.error.user_password);
                        } else {
                            $('#user_password').removeClass('is-invalid')
                            $('.errorPassword').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })

                        $('#modal-edit').modal('hide')

                        data_user();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }

            });
            return false;

        });
    });
</script>