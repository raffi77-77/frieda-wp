jQuery(document).ready(function () {
	function shoWHideDiv(id, time = 3000, txt = "") {
		if (txt) {
			jQuery(id).text(txt);
		}
		jQuery(id).show(200);
		setTimeout(() => {
			jQuery(id).hide(200);
			if (txt) {
				jQuery(id).text('');
			}
		}, time);
	}

	jQuery(document).on('click', ".register-confirmation-yes", function (e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				action: "registerConfirmation"
			},
			success: function (res) {
				const { status, redirectUrl } = res
				if (status && redirectUrl) {
					window.location.href = redirectUrl;
				}
			},
			error: function (err) {
				console.error({ err });
			}
		});
	})

	jQuery(document).on('submit', "#on-login", function (e) {
		e.preventDefault();
		jQuery('#login-error').hide()

		let email = jQuery('#login-email').val();
		let password = jQuery('#login-pwd').val();
		if (!email) {
			return shoWHideDiv('#email-error', 3000, 'E Mail erforderlich');
		} else if (!validateEmail(email)) {
			return shoWHideDiv('#email-error', 3000, 'Please enter correct email ID.');
		} else if (!password) {
			return shoWHideDiv('#password-error');
		}

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				email,
				password,
				action: "onUserLogin"
			},
			success: function (res) {
				const { status, redirectUrl, msg } = res
				if (status) {
					jQuery('#login-success').text(msg)
					window.location.href = redirectUrl;
				} else {
					return shoWHideDiv('#login-error', 5000, msg);
				}
			},
			error: function (err) {
				console.error({ err });
			}
		});

	})

	jQuery(document).on('submit', "#on-password-forgot", function (e) {
		e.preventDefault();
		jQuery('#login-loading').show()
		jQuery('#login-error').hide()
		jQuery('#login-submit').attr("disabled", true)

		let email = jQuery('#login-email').val();
		if (!email) {
			return shoWHideDiv('#email-error', 3000, 'E Mail erforderlich');
		} else if (!validateEmail(email)) {
			return shoWHideDiv('#email-error', 3000, 'Please enter correct email ID.');
		}

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: {
				email,
				action: "onPasswordForgot"
			},
			success: function (res) {
				console.log({ res });
				const { status, redirectUrl, msg } = res
				jQuery('#login-loading').hide()
				jQuery('#login-submit').attr("disabled", false)
				if (status) {
					jQuery('#login-success').text(msg)
					return shoWHideDiv('#login-success', 5000, msg);
					// window.location.href = redirectUrl;
				} else {
					return shoWHideDiv('#login-error', 5000, msg);
				}
			},
			error: function (err) {
				console.error({ err });
			}
		});

	})

	const validateEmail = (email) => {
		return String(email).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
	};


	jQuery(document).on('click', ".register-confirmation-no", function (e) {
		e.preventDefault();
		console.log('register-confirmation-no');
		jQuery('#selected-none-content').show('200')
		jQuery('.innercontent').remove()
	})

	jQuery(document).on('click', ".verify-email", function (e) {
		e.preventDefault();
		let email = jQuery('#email').val();
		if (!email) {
			return shoWHideDiv('#email-error');
		} else {
			let thisDiv = jQuery(this)
			thisDiv.hide(200);
			jQuery.ajax({
				type: "post",
				url: ajaxurl,
				data: {
					email,
					action: "onEmailVerify"
				},
				success: function (res) {
					const { status, msg } = res
					if (status) {
						jQuery('.verify-otp').show(200);
						jQuery('#email-success').text('Verifizierungscode wurde erfolgreich gesendet.')
						countdown(10);
						setTimeout(() => {
							jQuery('#email-success').hide(200);
						}, 5000);
					} else {
						thisDiv.show(200);
						jQuery('#email-error').text(msg)
						shoWHideDiv('#email-error', 5000)
					}
				},
				error: function (err) {
					thisDiv.show(200);
				}
			});
		}
	});

	jQuery(document).on('submit', "#register-form", function (e) {
		e.preventDefault();

		let email = jQuery('#email').val();
		let surname = jQuery('#surname').val();
		let address = jQuery('#address').val();
		let password = jQuery('#password').val();
		let firstName = jQuery('#first_name').val();
		let confirmPassword = jQuery('#confirm_password').val();
		let insuranceCompany = jQuery('#insurance_company').find(":selected").val();
		let street = jQuery('#street').val();
		let plz = jQuery('#plz').val();
		let city = jQuery('#city').val();
		let region = jQuery('#region').val();
		let country = jQuery('#country').val();

		console.log({ email, surname, address, password, firstName, insuranceCompany, street, plz, city, region, country });
		if (password != confirmPassword) {
			console.log('data1');
			shoWHideDiv('#password-error');
			return false;
		} else if (insuranceCompany == 'none_of_the_above') {
			console.log('data2');
			shoWHideDiv('#insurance-company-section');
			return false;
		} else if (!email && !surname && !address && !password && !firstName && !insuranceCompany && !street && !plz && !city && !region && !country) {
			console.log('data3');
			shoWHideDiv('#form-error');
			return false;
		} else {
			console.log('data4');
			jQuery.ajax({
				type: "post",
				url: ajaxurl,
				data: {
					action: "onRegisterFormSubmit",
					formData: { email, surname, address, password, firstName, insuranceCompany, street, plz, city, region, country }
				},
				success: function (res) {
					const { status, msg, insuranceCompany, userLogin, redirectUrl } = res
					console.log({ res });
					if (status && insuranceCompany) {
						shoWHideDiv('#insurance-company-section');
					} else if (status) {
						if (userLogin && redirectUrl) {
							window.location.href = redirectUrl;
						} else {
							jQuery('#form-error').text(msg)
							shoWHideDiv('#form-error');
						}
					}
				},
				error: function (err) {
					console.error(err);
					// jQuery('#quiz-section-container').html(msg)
				}
			});
		}
	});

	jQuery('.verify-otp').find('input').each(function () {
		jQuery(this).attr('maxlength', 1);

		jQuery(this).on('keyup', function (e) {
			jQuery('#verify-error').hide();
			let val = e.target.value
			console.log(isInt(val));
			if (isInt(val)) {
				var parent = jQuery(jQuery(this).parent());

				if (e.keyCode === 8 || e.keyCode === 37) {
					var prev = parent.find('input#' + jQuery(this).data('previous'));
					if (prev.length) {
						jQuery(prev).select();
					}
				} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
					var next = parent.find('input#' + jQuery(this).data('next'));

					if (next.length) {
						jQuery(next).select();
					} else {
						let otp = [];
						for (let index = 1; index <= 6; index++) {
							let digit = jQuery(`#digit-${index}`);
							let val = digit.val();
							otp.push(val[0])
							digit.val(val[0])
						}
						jQuery("input").blur();

						jQuery.ajax({
							type: "post",
							url: ajaxurl,
							data: {
								action: "_onOtpSubmit",
								email: jQuery('#email').val(),
								updateEmail: jQuery('#email').attr('update'),
								otp: otp.join('')
							},
							success: function (res) {
								const { status, verify, msg } = res
								if (status) {
									if (verify) {
										jQuery('#email-success').text(msg)
										shoWHideDiv('#email-success', 5000)
										jQuery('.innercontent').addClass('active');
										jQuery('.verify-otp').remove();
										// jQuery("#email-section").hide();
										jQuery("#email").prop('disabled', true);
									} else {
										jQuery('#verify-error').text(msg)
										shoWHideDiv('#verify-error', 5000)
									}
								}
							},
							error: function (err) {
								console.error(err);
								// jQuery('#quiz-section-container').html(msg)
							}
						});
					}
				}
			} else {
				// alert('Only Number Allowed.');
			}
		});
	});

	jQuery('#insurance_company').on('change', function () {
		let description = jQuery(this).find(':selected').attr("data-description");
		jQuery('.description>p').text(description)
		jQuery('.description').show(200)
	});

	jQuery(document).on('click', "#update-profile", function (e) {
		e.preventDefault();

		let profileImage = null
		let image = jQuery('.profile-upload .circle img').attr('src');
		if (image.includes('data:image/')) {
			profileImage = image
		}

		let fname = jQuery('#fname').val();
		let lname = jQuery('#lname').val();
		if (!fname) {
			return shoWHideDiv('.error-fname')
		} else if (!lname) {
			return shoWHideDiv('.error-lname')
		}

		let action = 'onEditProfile'
		let type = jQuery(this).attr('type')

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: { type, action, fname, lname, profileImage },
			success: function (res) {
				const { status } = res
				if (status) {
					return shoWHideDiv('.success-profile-update', 5000)
				}
				return shoWHideDiv('.error-profile-update')
			},
			error: function (err) {
				console.error({ err });
			}
		});
	})

	jQuery(document).on('click', "#update-password", function (e) {
		e.preventDefault();

		let oldPwd = jQuery('#old-pwd').val();
		let newPwd = jQuery('#new-pwd').val();
		let confirmPwd = jQuery('#confirm-pwd').val();
		if (!oldPwd) {
			return shoWHideDiv('.error-old-pwd')
		} else if (!newPwd) {
			return shoWHideDiv('.error-new-pwd')
		} else if (!confirmPwd) {
			return shoWHideDiv('.error-confirm-pwd')
		} else if (newPwd != confirmPwd) {
			return shoWHideDiv('.error-pwd-not-match')
		}

		let action = 'onEditProfile'
		let type = jQuery(this).attr('type')

		jQuery.ajax({
			type: "post",
			url: ajaxurl,
			data: { type, action, oldPwd, newPwd },
			success: function (res) {
				const { status, msg } = res
				console.log({ res });
				if (status) {
					return shoWHideDiv('.password-update-message', 5000, msg)
				}
				return shoWHideDiv('.error-password-update', 5000, msg)
			},
			error: function (err) {
				console.error({ err });
			}
		});
	})

	jQuery(document).on('click', "#delete-account", function (e) {
		e.preventDefault();

		if (confirm("Are you sure you want to delete account?")) {
			jQuery.ajax({
				type: "post",
				url: ajaxurl,
				data: {
					action: 'onProfileDelete'
				},
				success: function (res) {
					const { status, url } = res
					if (status) {
						window.location.href = url;
					}
				},
				error: function (err) {
					console.error({ err });
				}
			});
		}
	})

	jQuery(document).on('click', ".resend-btn", function (e) {
		jQuery('.resend-btn').addClass('disable')
		jQuery('.verify-email').trigger('click')
		countdown(10);
	})

	jQuery('#insuranceCompany').on('change', function () {
		let regularPrice = jQuery('.regularPrice').text()
		let percentage = jQuery(this).find(':selected').val();
		let pending = regularPrice-percentage;
		// let pending = (parseInt(regularPrice)*parseInt(percentage)/100);
		jQuery('.discountPercentage').text(percentage)
		jQuery('.pendingPrice').text(pending.toFixed(2))
	});
});

function isInt(value) {
	return !isNaN(value) && (function (x) { return (x | 0) === x; })(parseFloat(value))
}

//Required html element for countdown clock
function countdown(minutes, seconds = 0) {
	var endTime, hours, mins, msLeft, time;
	function twoDigits(n) { return (n <= 9 ? "0" + n : n); }
	endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
	updateTimer();
	function updateTimer() {
		msLeft = endTime - (+new Date);
		console.log({ msLeft });
		if (msLeft < 1000) {
			jQuery('.resend-btn').removeClass('disable')
			jQuery('.time-count').text('0:00')
		} else {
			time = new Date(msLeft);
			hours = time.getUTCHours();
			mins = time.getUTCMinutes();
			let timer = (hours ? hours + ':' + twoDigits(mins) : mins) + ':' + twoDigits(time.getUTCSeconds());
			jQuery('.time-count').text(timer)
			setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
		}
	}
} 