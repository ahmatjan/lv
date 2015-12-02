//头像剪裁js
$(window).load(function() {

	var options =
	{
		thumbBox: '.thumbBox',
		spinner: '.spinner',
		imgSrc: '../../public/image/demo.jpg'
	}
	var cropper = $('.imageBox').cropbox(options);
	$('#upload-file').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = $('.imageBox').cropbox(options);
		}
		reader.readAsDataURL(this.files[0]);
		this.files = [];
	})
	
	if(!$('.cropped').html()){
		$('.cropped').html('<img src="'+options.imgSrc+'" align="absmiddle" style="width:29px;margin-top:4px;border-radius:29px !important;box-shadow:0px 0px 12px #7E7E7E;" ><p>29px*29px</p><img src="'+options.imgSrc+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px !important;box-shadow:0px 0px 12px #7E7E7E;"><p>64px*64px</p><img src="'+options.imgSrc+'" align="absmiddle" style="width:120px;margin-top:4px;border-radius:120px !important;box-shadow:0px 0px 12px #7E7E7E;"><p>120px*120px</p>');
	}
	
	$('#btnCrop').on('click', function(){
		img = cropper.getDataURL();
		$('.cropped').html('');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:29px;margin-top:4px;border-radius:29px !important;box-shadow:0px 0px 12px #7E7E7E;" ><p>29px*29px</p>');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px !important;box-shadow:0px 0px 12px #7E7E7E;"><p>64px*64px</p>');
		$('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:120px;margin-top:4px;border-radius:120px !important;box-shadow:0px 0px 12px #7E7E7E;"><p>120px*120px</p>');
	})
	$('#btnZoomIn').on('click', function(){
		cropper.zoomIn();
	})
	$('#btnZoomOut').on('click', function(){
		cropper.zoomOut();
	})
	$('#submit-portrait').on('click',function(){
		$.post("/user/user_center/imgsave",{
			image: img,
		},
		function(data){
			if(data){
				alert(data);
			}else{
				location.reload();
			}
		});
	})
});