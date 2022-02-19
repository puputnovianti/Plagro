$('.addprofile').on('click', function () {
    addprofile();
});
function addprofile() {
    var profile = '<div><a class="remove btn btn-danger mb-3" href="#">Hapus</a><input name="criteria_id[]" type="hidden" class="form-control" value="{{ $criteria_id }}"><div class="mb-3 mt-3"><label for="name[]" class="form-label">Nama Profil</label><input name="name" type="text" class="form-control" required></div><div class="mb-3 mt-3"><label for="score" class="form-label">Nilai</label><input name="score[]" type="text" class="form-control" required></div></div>';
    $('.profile').append(profile);
};

$('.remove').live('click', function () {
    $(this).parent().remove();
});