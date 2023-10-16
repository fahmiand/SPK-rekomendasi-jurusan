$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

$(".form-check-input").on("click", function () {
	const menuId = $(this).data("menu");
	const roleId = $(this).data("role");
	$.ajax({
		url: "<?= base_url('admin/changeaccess') ?>",
		type: "post",
		data: {
			menuId: menuId,
			roleId: roleId,
		},
		success: function () {
			document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
		},
	});
});

$("#tombol-hapus").on("click", function (event) {
	console.log("ok");
});

$("#mytable_bobot").on("click", ".hapus", function (e) {
	event.preventDefault();
	const href = $(this).attr("href");
	var nama = $(this).data("nama_bobot");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data " + nama + " akan dihapus!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
