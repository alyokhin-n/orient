AOS.init();

$(".program-block").mouseover(function(){
	$(".program-block").css("transition","all 600ms!important");
	$(".program-block").css("transform","translateX(0)translateY(0)scaleX(1.1)scaleY(1.1)rotate(0deg)skewX(0deg)skewY(0deg)!important");
	$(".program-block").css("transition","all 0.4s ease-in-out 0s");
});

$(".login-btn").click(function(){
	var email = $(".email").val();
	var password = $(".password").val();

	$.post( "api/api.php", { type: "login", email: email, password: password })
	.done(function( data ) {
		var string1 = JSON.stringify(data);
		const obj = JSON.parse(string1);
		console.log(string1);
		console.log(obj);
		console.log(obj[0]["error"]);

		if(obj[0]["error"] == true){
			Command: toastr["error"](obj[0]["description"])

			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "1000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
		}else{
			$.post( "admin/scripts/login_site.php", { client: obj[0]["id"] })
			.done(function( data ) {
				location.href = "/balance.php";
			});
		}
	});
});