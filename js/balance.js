AOS.init();

$(".program-block").mouseover(function(){
	$(".program-block").css("transition","all 600ms!important");
	$(".program-block").css("transform","translateX(0)translateY(0)scaleX(1.1)scaleY(1.1)rotate(0deg)skewX(0deg)skewY(0deg)!important");
	$(".program-block").css("transition","all 0.4s ease-in-out 0s");
});

var expDate = document.getElementById('exp');
expDate.onkeyup = function (e) {
	if (this.value == this.lastValue) return;
	var caretPosition = this.selectionStart;
	var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
	var parts = [];

	for (var i = 0, len = sanitizedValue.length; i < len; i +=2) { parts.push(sanitizedValue.substring(i, i + 2)); } for (var i=caretPosition - 1; i>= 0; i--) {
		var c = this.value[i];
		if (c < '0' || c> '9') {
			caretPosition--;
		}
	}
	caretPosition += Math.floor(caretPosition / 2);

	this.value = this.lastValue = parts.join('/');
	this.selectionStart = this.selectionEnd = caretPosition;
}

function createElement(obj) {
	var div_obj = document.getElementById(obj);

	var span_obj = document.createElement("span");
	span_obj.setAttribute("class", "ticket-shape");

	div_obj.appendChild(span_obj);
}

for (var i = 0; i <= 100; i++) {
	createElement("parent_div");
}

var eur = 0;
var prism = 0;
var method = "";

$('.radio-type').click(function(){
	eur = $(this).attr("data-eur");
	prism = $(this).attr("data-prism");
	$(this).parent().parent().find('.radio-type').removeClass('selected');
	$(this).addClass('selected');
});
$('.radio-method').click(function(){
	method = $(this).attr("data-id");
	if(method == 'cardpay'){
		$(".bank-card").show();
	}else{
		$(".bank-card").hide();
	}
	$(this).parent().parent().find('.radio-method').removeClass('selected');
	$(this).addClass('selected');
});

$.post( "api/api.php", { type: "get_client_info", client_id: "<?php echo $_SESSION['client']; ?>" })
.done(function( data ) {
	var string1 = JSON.stringify(data);
	const obj = JSON.parse(string1);
	console.log(string1);
	if(obj[0]["error"] != true){
		$(".image-block .avatar").attr("src", obj[0]["client_avatar"]);
		var balance = 0;
		if(obj[0]["balance"] != '' && obj[0]["balance"] != null){
			balance = obj[0]["balance"];
		}
		$(".my-balance p").html('<img src="admin/images/prism.png" class="icon"> ' + balance);
		$(".image-block h4").html(obj[0]["client_login"]);
	}
});

$(".pay-btn").click(function(){
	var number = $("#ccn").val();
	var exp = $("#exp").val();
	var cvv = $("#cvv").val();

	if(eur > 0){
		if(method == 'cardpay'){
			if(number != '' && exp != '' && cvv != ''){
				const date = exp.split("/");
				var month = date[0];
				var year = Number(date[1]) + 2000;

				if(number.length == 16){
					if(month >= 1 && month <= 12){
						if(year >= new Date().getFullYear()){
							$(".pay-btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
							$.post( "admin/scripts/stripe.php", { number: number, month: month, year: year, cvv: cvv, eur: eur })
							.done(function( data ) {
								var string1 = JSON.stringify(data);
								const obj = JSON.parse(string1);

								if(obj[0]["error"] == false){
									$.post( "api/api.php", { type: "add_balance", count: prism, client_id: "<?php echo $_SESSION['client']; ?>" })
									.done(function( data ) {
										var string2 = JSON.stringify(data);
										const obj2 = JSON.parse(string2);

										$(".pay-btn").html('Pay');

										if(obj2[0]["error"] != true){
											$(".my-balance p").html('<img src="admin/images/prism.png" class="icon"> ' + obj2[0]["balance"]);
											Command: toastr["success"](obj2[0]["description"])

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
											Command: toastr["error"](obj2[0]["description"])

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
										}
									});
								}else{
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
								}
							});
						}else{
							Command: toastr["error"]("Year is incorect.")

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
						}
					}else{
						Command: toastr["error"]("Month is incorect.")

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
					}
				}else{
					Command: toastr["error"]("Num card is incorect.")

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
				}
			}else{
				Command: toastr["error"]("Not all parameters were passed(Num card, Exp date, CVV).")

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
			}
		}else{
			Command: toastr["error"]("We are so sorry, Google Pay and Apple Pay are not working now.")

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
		}
	}else{
		Command: toastr["error"]("Please select the number of prisms.")

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
	}
});