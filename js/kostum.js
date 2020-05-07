$(document).ready(function(){
	$("#selectall").on('click', function(){
		if(this.checked){
			$('.check').each(function(){
				this.checked = true;
			})
		}else{
			$('.check').each(function(){
				this.checked = false;
			})
		}
	});
});

$('.check').on('click',function(){
	if($('.check:checked').length == $('.check').length){
		$('#selectall').prop('checked',true);
	}else{
		$('#selectall').prop('checked',false);
	}
})

function edit(){
	load('edit_user.php');
}

function hapus(){
	var conf = confirm('Yakin akan menghapus data?');
	if(conf){
		window.location = 'mauk_delete.php';
	}
}
